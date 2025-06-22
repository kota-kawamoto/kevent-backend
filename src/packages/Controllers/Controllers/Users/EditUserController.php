<?php

namespace packages\Controllers\Controllers\Users;

use Illuminate\Http\JsonResponse;
use packages\Presenter\Resources\Users\EditUserResource;
use packages\UseCase\Interfaces\Users\EditUserUseCaseInterface;

/**
 * ユーザ編集画面 Controller クラス
 * @package packages\Controllers\Controllers\Users
 */
class EditUserController
{
    public function __construct(private EditUserUseCaseInterface $useCase) {}

    /**
     * @param integer $id
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        return response()->json(
            new EditUserResource($this->useCase->handle($id))
        );
    }
}
