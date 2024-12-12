<?php

namespace Modules\User\Http\Responses;

use Illuminate\Validation\ValidationException;

class AuthResponse
{

    public static function SuccessRegisterResponse($user,$token)
    {
        response()->json([
            'user'=>$user,
            'token'=>$token
        ])->throwResponse();
    }

    public static function successLoginResponse($token)
    {
        response()->json([
            'token'=>$token
        ])->throwResponse();
    }

    public static function failedLoginResponse()
    {
        throw ValidationException::withMessages(['email'=>'wrong email or password']);
    }

    public static function logoutResponse()
    {
        response('ok')->throwResponse();
    }
}
