<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use JWTAuth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	$user = User::where('email','=',$request->get('email'))->where('isVerified','=',1)->first();
    	if($user){
    		$credentials = $request->only('email', 'password');

	        if ( ! $token = JWTAuth::attempt($credentials)) {
	            return response([
	                'status' => 'error',
	                'error' => 'invalid.credentials',
	                'msg' => 'Invalid Credentials.'
	            ], 400);
	        }

	        return response([
	            'status' => 'success',
                'data' => $token
	        ],200)
	        ->header('Authorization', $token);
    	}else{
    		return response()->json(['error' => 'Your OTP is not verified so go to verified or resend otp '], 401);
    	}
        
    }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate();

        return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }
}
