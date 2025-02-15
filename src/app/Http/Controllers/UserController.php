<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    /**
     * ユーザー一覧を取得
     *
     * @return JsonResponse 
     */
    public function index(): JsonResponse
    {
        try {
            $users = User::with('group')->get();
            Log::info($users);
            return response()->json($users);

        } catch (\Exception $e) {
            Log::error('Error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'user not found'], 404);
        }
    }

    /**
     * 指定されたIDのユーザー情報を取得
     *
     * @param int $id ユーザーID
     * @return JsonResponse 
     */
    public function show($id): JsonResponse
    {
        try {
            $user = User::with('group')->where('user_id', $id)->firstOrFail();
            Log::info($user);
            return response()->json([
                'user_id' => $user->user_id,
                'user_name' => $user->user_name,
                'login_id' => $user->login_id,
                'group_name' => $user->group->group_name,
            ], 200, ['Content-Type' => 'application/json']);

        } catch (\Exception $e) {
            Log::error('Error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'user not found'], 404);
        }
    }
}
