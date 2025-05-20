<?php

namespace App\Http\Controllers\Auth;


use App\Dtos\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function __construct(private readonly UserServiceInterface $userService)
    {
    }

    public function register(RegisterUserRequest $request):JsonResponse
    {
        $userDto = UserDto::fromAPiFormRequest($request);
        $user = $this->userService->createUser($userDto);
        return $this->sendSuccess(['user' => new UserResource($user)],"User created successfully");
    }

    public function login(LoginRequest $request):JsonResponse
    {
        $credentials = $request->validated();
        if(!Auth::attempt($credentials)){
            return $this->sendError("Invalid credentials");
        }
        $user = $request->user();
        $token= $user->createToken('token')->plainTextToken;
        return $this->sendSuccess(
            ['user'=>new UserResource($user),'token' => $token],
            "User logged in successfully"
        );
    }

    public function getUserAccount(Request $request): JsonResponse
    {
        return $this->sendSuccess([
            'user' => new UserResource($request->user()),
        ], 'Authenticated user retrieved');
    }


    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->tokens()->delete();
        return $this->sendSuccess([], 'Logged out successfully');
    }
}
