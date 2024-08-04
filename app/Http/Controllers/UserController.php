<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\LoginRequest;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Register a new user.
     * 
     * @param mixed $request request
     * 
     * @return mixed 
     */
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create(
                [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                ]
            );
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return response()->json(
            $user->createToken('MyApp')->plainTextToken , 
            200
        );
    }

    /**
     * Login a user.
     * 
     * @param \App\Http\Requests\User\LoginRequest $request request
     * 
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        )
        ) {
            $user = Auth::user();
            return response()->json(
                $user->createToken('MyApp')->plainTextToken, 
                200
            );
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    /**
     * Get the user information.
     * 
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function me() 
    {
        if (Auth::check()) {
            $user = Auth::user();
            return response()->json(
                $user, 
                200
            );
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }   
}
