<?php

namespace packages\Controllers\Controllers\Users;

use Illuminate\Http\JsonResponse;
use packages\UseCase\Interfaces\Users\DeleteUserUseCaseInterface;

/**
 * ユーザ削除 Controller クラス
 * @package packages\Controllers\Controllers\Users
 */
class DeleteUserController
{
    public function __construct(private DeleteUserUseCaseInterface $useCase) {}

    /**
     * @param integer $id
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $this->useCase->handle($id);
        return response()->json(['message' => 'ユーザーを削除しました'], 200);
    }
}