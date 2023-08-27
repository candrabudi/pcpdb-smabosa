<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
     
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
     
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['role_name'] = 'Admin';
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['full_name'] =  $user->name;
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;
   
            return response()->json([
                'status' => 'success', 
                'code' => 200, 
                'message' => 'success login',
                'data' => $success
            ]);
        } 
        else{ 
            return response()->json([
                'status' => 'failed', 
                'code' => 400, 
                'message' => 'failed login',
                'data' => []
            ]);
        } 
    }
}
