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
        $rules = [
            $parentType . '_parent_name' => 'required|string|max:191',
            $parentType . '_birth_place' => 'required|string|max:191',
            $parentType . '_birth_date' => 'required',
            $parentType . '_education' => 'required',
            $parentType . '_religion' => 'required',
            $parentType . '_profession' => 'required',
            $parentType . '_income' => 'required',
            $parentType . '_whatsapp_phone' => 'required',
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

            $parentData = [
                'parent_name' => $request->{$parentType . '_parent_name'},
                'birth_place' => $request->{$parentType . '_birth_place'},
                'birth_date' => $request->{$parentType . '_birth_date'},
                'education' => $request->{$parentType . '_education'},
                'religion' => $request->{$parentType . '_religion'},
                'profession' => $request->{$parentType . '_profession'},
                'income' => $request->{$parentType . '_income'},
                'whatsapp_phone' => $request->{$parentType . '_whatsapp_phone'},
                'type_parent' => ($parentType == 'father') ? 'Ayah' : 'Ibu'
            ];

            StudentParent::updateOrCreate(
                ['user_id' => $user_id, 'type_parent' => $parentType],
                $parentData
            );

            Alert::success('Yay!', 'Berhasil Merubah data ' . ($parentType == 'father' ? 'ayah' : 'ibu') . '.');
        } catch (\Exception $e) {
            Alert::error('Yah!', 'Maaf ada kesalahan internal.' . $e->getMessage());
        }

        return redirect()->back();
    }
}
