<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateUserRequet;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

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
            $user = User::with('group')->where('id', $id)->firstOrFail();
            return response()->json([
                'id' => $user->id,
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
     * ユーザー情報の更新
     *
     * @param UpdateUserRequet $request
     * @param int $id ユーザーID
     */
    public function update(UpdateUserRequet $request, $id)
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

    /**
     * ユーザー情報の作成
     *
     * @param CreateUserRequest $request
     */
    public function create(CreateUserRequest $request)
    {
        try {
            User::create([
                'user_name' => $request->user_name,
                'login_id' => $request->login_id,
                'password' => Hash::make($request->password),
                'group_id' => $request->group_id,
                'type_id' => $request->type_id,
            ]);
            return response()->json(['message' => 'User created successfully']);
        } catch (\Exception $e) {
            Log::error('Error creating user', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to create user'], 500);
        }
    }

}
