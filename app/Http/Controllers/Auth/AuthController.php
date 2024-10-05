<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // 회원가입
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    // 로그인
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!$token = JWTAuth::attempt($request->only('email', 'password'))) {
        return response()->json(['error' => 'invalid_credentials'], 401);
        }

        // 세션에 토큰 저장
        session(['jwt_token' => $token]);

        return response()->json(compact('token'));
    }

    // 토큰 갱신
    public function refresh()
    {
        try {
            $token = JWTAuth::refresh(session('jwt_token'));
            session(['jwt_token' => $token]);

            return response()->json(compact('token'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not refresh token'], 500);
        }
    }

    // 로그아웃
    public function logout()
    {
        JWTAuth::invalidate(session('jwt_token'));
        session()->forget('jwt_token');

        return response()->json(['message' => 'Successfully logged out']);
    }
}
