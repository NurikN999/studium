<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\V1\Auth\LoginUserRequest;
use App\Http\Requests\Api\V1\Auth\RegisterUserRequest;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->validated();
        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->errorResponse(
                message: 'Unauthorized', 
                code: 401
            );
        }

        return $this->successResponse(
            data: [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => JWTAuth::factory()->getTTL() * 60
            ],
            code: 200,
            message: 'Авторизация прошла успешно'
        );
    }

    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->validated());
        $token = JWTAuth::fromUser($user);

        return $this->successResponse(
            message: 'Регистрация прошла успешно',
            code: 201,
            data: [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => JWTAuth::factory()->getTTL() * 60,
                'user' => new UserResource($user)
            ]
        );
    }

    public function logout()
    {
        JWTAuth::parseToken()->invalidate();

        return $this->successResponse(
            data: [],
            code: 200,
            message: 'Выход выполнен успешно'
        );
    }
}
