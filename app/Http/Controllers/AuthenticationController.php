<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends BaseController
{
    public function create($role, $request){
        $validator = Validator::make($request->all(), [
            'identity_number' => 'required|max:15',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $user = User::create([
            'identity_number' => $request->identity_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $role
        ]);
        $token = $user->createToken('API token')->accessToken;
        $message = $role == 2 ? "user registered successfully" : "admin registered successfully";

        return $this->sendResponse($result=[$user, $token], $message, 200);
    }

    public function register(Request $request){
        return $this->create(2, $request);
    }

    public function registerAdmin(Request $request){
        return $this->create(1, $request);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        if(auth()->attempt($request->only(['email', 'password']))){
            $token = auth()->user()->createToken('API Token')->accessToken;
            return $this->sendResponse($result=[
               'data' => auth()->user(), 
               'token' => $token
            ], "user login successfully", 200);
        }
    }
}
