<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Validate;

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
                'group_id' => $user->group_id,
                'group_name' => $user->group->group_name,
            ]);

        } catch (\Exception $e) {
            Log::error('Error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'user not found'], 404);
        }
    }

    /**
     * グループ情報を全て取得
     *
     * @return JsonResponse
     */
    public function getGroups(): JsonResponse
    {
        try {
            $groups = Group::all();
            return response()->json($groups);
        } catch (\Exception $e) {
            Log::error('Error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'group not found'], 404);
        }
    }

    /**
     * ユーザー情報の更新
     *
     * @param Validate $request
     * @param int $id ユーザーID
     */
    public function update(Validate $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->update([
                'user_name' => $request->name,
                'login_id' => $request->login_id,
                'group_id' => $request->group_id,
            ]);

        } catch (\Exception $e) {
            Log::error('Error updating user', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to update user'], 500);
        }
    }

    /**
     * 指定されたIDのユーザー情報を削除
     *
     * @param int $id ユーザーID
     */
    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
        } catch (\Exception $e) {
            Log::error('Error deleting user', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to delete user'], 500);
        }
    }

}
