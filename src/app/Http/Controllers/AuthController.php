<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * csrf-tokenを取得
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCsrfToken(Request $request): JsonResponse
    {
        Log::info('csrf-token set');
        return response()->json(['message' => 'csrf-token set']);
    }

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

        /**
         * 認証ドライバ
         * @var SessionGuard $auth
         */
        $auth = auth('web');

        $credentials = [
            'login_id' => $request->login_id,
            'password' => $request->password
        ];

        // ID、パスワード判定
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'login_id' => ['ログインIDまたはパスワードが正しくありません。'],
            ]);
        }

        $user = $auth->user();

        // セッションの生成
        $request->session()->regenerate();

        $request->session()->put('user', $user);

        return response()->json([
            // 'token' => $token,
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

    /**
     * ログインユーザー情報の取得
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLoginUserInfo(Request $request): JsonResponse
    {
        return response()->json([
            'user' => [
                'id' => $request->user()->id,
                'user_name' => $request->user()->user_name,
                'login_id' => $request->user()->login_id,
            ]
        ]);
    }
}
