<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use JWTAuth;
use App\User;
use App\Http\Requests\RegisterFormRequest;

class RegisterController extends Controller
{
    public function register(RegisterFormRequest $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->role = 1;
        $user->isVerified = 0;
        
        $OTP = rand(100000, 999999);
        $message='New OTP is:'.$OTP;
        $mobile_no = $request->phone;

        

        $user->otp = $OTP;
        $user->save();

        return response([
            'status' => 'success',
            'data' => $user
        ], 200);
    }


}
