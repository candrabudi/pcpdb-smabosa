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

    public function storeStudentParent(Request $request, $parentType)
    {
        $check_parent = StudentParent::whereIn('type_parent', ['Wali'])
            ->select('id')
            ->first();
        if($check_parent){
            Alert::error('Yah!', 'Maaf anda sudah menambahkan wali.');
            return redirect()->back();
        }
        $rules = [
            'mother_parent_name' => 'required|string|max:191',
            'mother_birth_place' => 'required|string|max:191',
            'mother_birth_date' => 'required',
            'mother_education' => 'required',
            'mother_religion' => 'required',
            'mother_profession' => 'required',
            'mother_income' => 'required',
            'mother_whatsapp_phone' => 'required',

            'father_parent_name' => 'required|string|max:191',
            'father_birth_place' => 'required|string|max:191',
            'father_birth_date' => 'required',
            'father_education' => 'required',
            'father_religion' => 'required',
            'father_profession' => 'required',
            'father_income' => 'required',
            'father_whatsapp_phone' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Alert::error('Yah', 'Mohon check kembali inputan kamu.');
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }

        try {
            $user_id = Auth::user()->id;

            $parentDataMother = [
                'parent_name' => $request->{'mother_parent_name'},
                'birth_place' => $request->{'mother_birth_place'},
                'birth_date' => $request->{'mother_birth_date'},
                'education' => $request->{'mother_education'},
                'religion' => $request->{'mother_religion'},
                'profession' => $request->{'mother_profession'},
                'income' => $request->{'mother_income'},
                'whatsapp_phone' => $request->{'mother_whatsapp_phone'},
                'type_parent' => 'Ibu'
            ];

            StudentParent::updateOrCreate(
                ['user_id' => $user_id, 'type_parent' => 'Ibu'],
                $parentDataMother
            );

            $parentDataFather = [
                'parent_name' => $request->{'father_parent_name'},
                'birth_place' => $request->{'father_birth_place'},
                'birth_date' => $request->{'father_birth_date'},
                'education' => $request->{'father_education'},
                'religion' => $request->{'father_religion'},
                'profession' => $request->{'father_profession'},
                'income' => $request->{'father_income'},
                'whatsapp_phone' => $request->{'father_whatsapp_phone'},
                'type_parent' => 'Ayah'
            ];

            StudentParent::updateOrCreate(
                ['user_id' => $user_id, 'type_parent' => 'Ayah'],
                $parentDataFather
            );

            Alert::success('Yay!', 'Berhasil Merubah data Orang Tua');
        } catch (\Exception $e) {
            Alert::error('Yah!', 'Maaf ada kesalahan internal.' . $e->getMessage());
        }

        return redirect()->back();
    }

    public function storeStudentWali(Request $request)
    {
        $check_parent = StudentParent::whereIn('type_parent', ['Ibu', 'Ayah'])
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
