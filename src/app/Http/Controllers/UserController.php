<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            $users = User::with('group')->paginate(5);
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
            return response()->json([
                'id' => $user->user_id,
                'name' => $user->user_name,
                'login_id' => $user->login_id,
                'group_name' => $user->group->group_name,
            ]);

        } catch (\Exception $e) {
            Log::error('Error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'user not found'], 404);
        }
    }
}
