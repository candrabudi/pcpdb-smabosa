<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;
use DB;
use Alert;
use App\Models\SchoolYear;
use Auth;
class AuthController extends Controller
{
    public function studentRegister(Request $request)
    {
        DB::beginTransaction();
        try{
            $rules = [
                'full_name' => 'required|string|max:191',
                'user_email' => 'required|email|unique:users,email',
                'user_password' => 'required',
                'user_gender' => 'required',
                'user_religion' => 'required', 
                'user_birth_place' => 'required',
                'user_birth_date' => 'required', 
                'user_phone_number' => 'required|numeric', 
                'user_whatsapp_phone' => 'required|numeric', 
                'user_address' => 'required',
                'user_school_name' => 'required', 
                'user_school_phone' => 'required|numeric',
                'user_school_address' => 'required',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validator->errors());
            }

            $number_register = $this->createAutoCode();
            
            if($request->registration_number_offline){
                $register_number = $request->registration_number_offline;
            }else{
                $register_number = $number_register['nomor_student'];
            }
            $user = new User();
            $user->full_name = $request->full_name;
            $user->email = $request->user_email;
            $user->password = Hash::make($request->user_password);
            $user->role_name = 'Student';
            $user->save();
            $user->fresh();
    
            $store = new Student();
            $store->user_id = $user->id;
            $store->school_year_id = $number_register['school_year_id'];
            if($request->registration_number_offline){
                $store->registration_number_offline = $register_number;
            }else{
                $store->registration_number = $number_register['nomor_student'];
            }
            $store->gender = $request->user_gender;
            $store->religion = $request->user_religion;
            $store->birth_date = $request->user_birth_date;
            $store->birth_place = $request->user_birth_place;
            $store->phone_number = $request->user_phone_number;
            $store->whatsapp_phone = $request->user_whatsapp_phone;
            $store->address = $request->user_address;
            $store->save();
    
            $store_school = new StudentSchool();
            $store_school->user_id = $user->id;
            $store_school->school_name = $request->user_school_name;
            $store_school->school_phone = $request->user_school_phone;
            $store_school->school_address = $request->user_school_address;
            $store_school->save();
            DB::commit();
            Alert::success('Hore!', 'Berhasil Registrasi PCPDB SMABOSA');
            return redirect()->route('login');
        }catch(\Exception $e){ 
            DB::rollback();
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
        }

    }

    public function studentLogin(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'email' => 'required|email', 
                'password' => 'required', 
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validator->errors());
            }

            $check_user = User::where('email', $request->email)
                ->join('students', 'students.user_id', '=', 'users.id')
                ->where('role_name', 'Student')
                ->first();
            if(!$check_user){
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'error' => 'Maaf akun yang kamu masukan tidak ada di data.'
                    ]);
            }

            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];
    
            if(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect()->route('dashboard')
                    ->withSuccess('You have successfully logged in!');
            }
    
            return back()->withErrors([
                'password' => 'Maaf password yang kamu masukan salah.',
            ]);

        }catch(\Exception $e){
            return redirect()->back()
            ->withInput()
            ->withErrors(['error' => 'Maaf ada gangguan internal'.$e->getMessage()]);
        }
    }

    private function createAutoCode()
    {
        $ticket_default_now = "N001";
        $check_number = "N";
        $check_school_year = SchoolYear::where('status', 'active')
            ->first();
        $check_nomor_student = Student::where('school_year_id', $check_school_year->id)
                                    ->where('registration_number', 'LIKE', '%'.$check_number.'%')
                                    ->orderBy('registration_number', 'DESC')
                                    ->first();
        if(!empty($check_nomor_student)){
            $three_last_character = substr($check_nomor_student->registration_number, -3);
            $plus_nomor_student = $three_last_character + 1;
            $add_zero_number = str_pad($plus_nomor_student,3,"0", STR_PAD_LEFT);
            $nomor_student = "N".$add_zero_number;
        }else{
            $nomor_student = $ticket_default_now;
        }

        return array(
            'school_year_id' => $check_school_year->id,
            'nomor_student' => $nomor_student,
        );
    }
}
