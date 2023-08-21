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
use Auth;
class AuthController extends Controller
{
    public function studentRegister(Request $request)
    {
        DB::beginTransaction();
        try{
            $rules = [
                'user_nisn' => 'required|numeric|unique:students,nisn',
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
    
            $user = new User();
            $user->full_name = $request->full_name;
            $user->email = $request->user_email;
            $user->password = Hash::make($request->user_password);
            $user->role_name = 'Student';
            $user->save();
            $user->fresh();
    
            $store = new Student();
            $store->user_id = $user->id;
            $store->nisn = $request->user_nisn;
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
                ->withInput();
        }

    }

    public function studentLogin(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'email' => 'required|email', 
                'password' => 'required', 
                'nisn' => 'required'
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

            if($check_user->nisn != $request->nisn){
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'error' => 'Maaf NISN yang kamu masukan salah.'
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
            ->withErrors(['error' => 'Maaf ada gangguan internal']);
        }
    }
}
