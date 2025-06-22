<?php

namespace packages\Controllers\Controllers\Users;

use Illuminate\Http\JsonResponse;
use packages\Controllers\Requests\Users\UpdateUserRequest;
use packages\UseCase\Interfaces\Users\UpdateUserUseCaseInterface;

/**
 * ユーザ更新 Controller クラス
 * @package packages\Controllers\Controllers\Users
 */
class UpdateUserController
{
    public function __construct(private UpdateUserUseCaseInterface $useCase) {}

    /**
     * @param UpdateUserRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function __invoke(UpdateUserRequest $request, int $id): JsonResponse
    {
        $this->useCase->handle($id, $request->validated());
        return response()->json(['message' => 'ユーザー情報を更新しました'], 200);
    }
}
