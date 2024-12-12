<?php

namespace Modules\User\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Http\Responses\AuthResponse;
use Modules\User\Models\User;
use Modules\User\Repositories\UserRepository;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $user = resolve(UserRepository::class)->create($request->validated());



        $token =  auth()->login($user);

        AuthResponse::SuccessRegisterResponse($user,$token);

    }


    public function login(LoginRequest $request)
    {
        if (! $token = auth()->attempt($request->validated()))
            AuthResponse::failedLoginResponse();

        AuthResponse::successLoginResponse($token);


    }

    public function logout()
    {
        auth()->logout();
        AuthResponse::logoutResponse();
    }
}
