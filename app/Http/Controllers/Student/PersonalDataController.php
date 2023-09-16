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
use Validator;

class PersonalDataController extends Controller
{
    public function settingPersonalData(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $student = Student::where('user_id', $user->id)->first();
            $userData = [
                'full_name' => $request->input('user_full_name', $user->full_name),
                'email' => $request->input('user_email', $user->email),
            ];
            User::where('id', $user->id)->update($userData);
            $nisn = $request->input('user_nisn');
            $check_nisn = Student::where('nisn', $nisn)->select('id', 'user_id')->first();
            if ($check_nisn && $check_nisn->user_id != $user->id) {
                DB::rollback();
                return redirect()
                    ->back()
                    ->with('error', 'Maaf nisn sudah di gunakan');
            }

            $studentData = [
                'nisn', 'gender', 'religion', 'birth_place',
                'birth_date', 'phone_number', 'whatsapp_phone', 'address',
            ];
            foreach ($studentData as $field) {
                $student->$field = $request->input("user_$field", $student->$field);
            }
            $student->save();

            $student_detail = StudentDetail::firstOrNew(['user_id' => $user->id]);
            $detailFields = ['phone_house', 'parent_address'];
            if($student_detail->parent_address === false){
                if($request->parent_address == null){
                    DB::rollback();
                    return redirect()
                        ->back()
                        ->with('error', 'Maaf tolong masukan alamat orang tua');
                }
            }
            foreach ($detailFields as $field) {
                $student_detail->$field = $request->input("user_$field", $student_detail->$field);
            }
            $student_detail->save();

            $student = StudentSchool::where('user_id', $user->id)->firstOrFail();
            $fieldsToUpdate = ['school_name', 'school_phone', 'school_address'];
            foreach ($fieldsToUpdate as $field) {
                $student->$field = $request->input("user_$field", $student->$field);
            }
            $student->save();

            DB::commit();
            return redirect()
                ->back()
                ->with('success', 'Berhasil merubah informasi peserta didik');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->with('error', 'Maaf ada masalah internal');
        }
    }
}
