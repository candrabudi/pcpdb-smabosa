<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Auth;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('admin.auth.login');
    }
    public function viewReset()
    {
        return view('admin.auth.reset');
    }
    public function processLogin(Request $request)
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
                ->where('role_name', 'Admin')
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
                return redirect()->route('admin.dashboard')
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
}
