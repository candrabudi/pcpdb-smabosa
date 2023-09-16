<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\StudentParent;
use Validator;

class ParentController extends Controller
{
    public function storeStudentFather(Request $request)
    {
        return $this->storeStudentParent($request, 'father');
    }

    public function storeStudentMother(Request $request)
    {
        return $this->storeStudentParent($request, 'mother');
    }

    public function storeStudentParent(Request $request)
    {
        $user_id = Auth::user()->id;

        if (StudentParent::where('type_parent', 'Wali')->where('user_id', $user_id)->exists()) {
            return redirect()->back()->with('error', 'Maaf anda sudah menambahkan wali.');
        }

        try {

            $parentTypes = ['mother', 'father'];
            $check_input = [];
            foreach ($parentTypes as $type) {
                $fieldPrefix = "{$type}_";
                $type_parent = $type == "father" ? "Ayah" : "Ibu";
                $hasData = collect($request->only([
                    "{$type}_parent_name",
                    "{$type}_birth_place",
                    "{$type}_birth_date",
                    "{$type}_education",
                    "{$type}_religion",
                    "{$type}_profession",
                    "{$type}_income",
                    "{$type}_whatsapp_phone",
                ]))->filter()->isNotEmpty();
                array_push($check_input, $hasData);
                if ($hasData) {
                    $rules = [
                        "{$type}_parent_name" => 'required|string|max:191',
                        "{$type}_birth_place" => 'required|string|max:191',
                        "{$type}_birth_date" => 'required',
                        "{$type}_education" => 'required',
                        "{$type}_religion" => 'required',
                        "{$type}_profession" => 'required',
                        "{$type}_income" => 'required',
                        "{$type}_whatsapp_phone" => 'required',
                    ];

                    $validator = Validator::make($request->all(), $rules);

                    if ($validator->fails()) {
                        return redirect()->back()->withInput()->withErrors($validator->errors());
                    }

                    $parentData = collect($request->only([
                        "{$type}_parent_name",
                        "{$type}_birth_place",
                        "{$type}_birth_date",
                        "{$type}_education",
                        "{$type}_religion",
                        "{$type}_profession",
                        "{$type}_income",
                        "{$type}_whatsapp_phone",
                    ]))->mapWithKeys(function ($value, $key) use ($fieldPrefix) {
                        return [str_replace($fieldPrefix, '', $key) => $value];
                    })->put('type_parent', ucfirst($type_parent))->toArray();
                   
                    StudentParent::updateOrCreate(['user_id' => $user_id, 'type_parent' => ucfirst($type_parent)], $parentData);
                }
            }
            // return $check_input;
            if($check_input[0] == false){
                if($check_input[1] == false){
                    return redirect()->back()->with('success', 'Tidak ada data yang dirubah');
                }
            }else{
                return redirect()->back()->with('success', 'Berhasil Merubah data Orang Tua');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return redirect()->back()->with('error', 'Maaf ada kesalahan internal.');
        }
    }

    public function storeStudentWali(Request $request)
    {
        $check_parent = StudentParent::whereIn('type_parent', ['Ibu', 'Ayah'])
            ->where('user_id', Auth::user()->id)
            ->select('id')
            ->first();
        if($check_parent){
            Alert::error('Yah!', 'Maaf anda sudah menambahkan data orangtua.');
            return redirect()->back();
        }
        $rules = [
            'wali_parent_name' => 'required|string|max:191',
            'wali_birth_place' => 'required|string|max:191',
            'wali_birth_date' => 'required',
            'wali_education' => 'required',
            'wali_religion' => 'required',
            'wali_profession' => 'required',
            'wali_income' => 'required',
            'wali_whatsapp_phone' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }

        try {
            $user_id = Auth::user()->id;

            $parentDataMother = [
                'parent_name' => $request->{'wali_parent_name'},
                'birth_place' => $request->{'wali_birth_place'},
                'birth_date' => $request->{'wali_birth_date'},
                'education' => $request->{'wali_education'},
                'religion' => $request->{'wali_religion'},
                'profession' => $request->{'wali_profession'},
                'income' => $request->{'wali_income'},
                'whatsapp_phone' => $request->{'wali_whatsapp_phone'},
                'type_parent' => 'Wali'
            ];

            StudentParent::updateOrCreate(
                ['user_id' => $user_id, 'type_parent' => 'Wali'],
                $parentDataMother
            );

            Alert::success('Yay!', 'Berhasil Melakukan Perubahan Wali');
        } catch (\Exception $e) {
            Alert::error('Yah!', 'Maaf ada kesalahan internal.' . $e->getMessage());
            return redirect()->back()
                ->withInput();
        }

        return redirect()->back();
    }
}
