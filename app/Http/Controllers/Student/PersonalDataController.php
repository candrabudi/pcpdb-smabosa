<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentDetail;
use Illuminate\Http\Request;
use DB;
use Auth;
use Alert;
use App\Models\Student;
use App\Models\StudentSchool;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PersonalDataController extends Controller
{
    public function settingPersonalData(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $student = Student::where('user_id', $user->id)->first();
            $check_nisn = Student::where('nisn', $request->nisn)
                ->select('id', 'user_id')
                ->first();
            if($check_nisn){
                if($check_nisn->user_id != Auth::user()->id){
                    Alert::error('Gagal', 'Nisn Sudah di gunakan oleh orang lain!');
                    return redirect()->back();
                }
            }
            $userData = [
                'full_name' => $request->user_full_name ?? $user->full_name,
                'email' => $request->user_email ?? $user->email,
            ];
            User::where('id', $user->id)->update($userData);
            $studentData = [
                'nisn', 'gender', 'religion', 'birth_place',
                'birth_date', 'phone_number', 'whatsapp_phone', 'address'
            ];
            foreach ($studentData as $field) {
                $student->$field = $request->{"user_$field"} ?? $student->$field;
            }
            $student->save();

            $student_detail = StudentDetail::where('user_id', $user->id)->first();
            if ($student_detail) {
                $detailFields = ['phone_house', 'parent_address'];
                foreach ($detailFields as $field) {
                    $student_detail->$field = $request->{"user_$field"} ?? $student_detail->$field;
                }
                $student_detail->save();
            } else {
                $student_detail = new StudentDetail();
                $student_detail->user_id = $user->id;
                $detailFields = ['phone_house', 'parent_address'];
                foreach ($detailFields as $field) {
                    $student_detail->$field = $request->{"user_$field"};
                }
                $student_detail->save();
            }

            $user = Auth::user();
            $student = StudentSchool::where('user_id', $user->id)->firstOrFail();
    
            $fieldsToUpdate = ['school_name', 'school_phone', 'school_address'];
            foreach ($fieldsToUpdate as $field) {
                $student->$field = $request->input("user_$field", $student->$field);
            }
            $student->save();

            DB::commit();
            Alert::success('Berhasil', 'Merubah Data Diri');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Gagal', 'Ada Kesalahan Internal. ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function settingSchoolOrigin(Request $request)
    {
        try {
            $user = Auth::user();
            $student = StudentSchool::where('user_id', $user->id)->firstOrFail();
    
            $fieldsToUpdate = ['school_name', 'school_phone', 'school_address'];
            foreach ($fieldsToUpdate as $field) {
                $student->$field = $request->input("user_$field", $student->$field);
            }
            $student->save();
    
            Alert::success('Berhasil', 'Merubah Data Asal Sekolah');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Ada Kesalahan Internal.');
        }
    
        return redirect()->back();
    }    
}
