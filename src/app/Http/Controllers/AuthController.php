<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * ログイン処理
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'login_id' => 'required|string',
            'password' => 'required|string',
        ]);
        // IDパスワード検証（attemptだとセッション生成してくれる）
        if (!Auth::attempt($request->only('login_id', 'password'))) {
            throw ValidationException::withMessages([
                'login_id' => ['ログインIDまたはパスワードが正しくありません。'],
            ]);
        }

        // ログインユーザ取得
        $user = User::query()->where('login_id', $request->login_id)->first();

        // トークン発行
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'user_name' => $user->user_name,
                'login_id' => $user->login_id,
            ]
        ]);
    }

    /**
     * ログアウト処理
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'ログアウトしました。']);
    }
}
