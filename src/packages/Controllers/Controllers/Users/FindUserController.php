<?php

namespace packages\Controllers\Controllers\Users;

// use Illuminate\Container\Attributes\Log;
use Illuminate\Http\JsonResponse;
use packages\Presenter\Resources\Users\FindUserResource;
use packages\UseCase\Interfaces\Users\FindUserUseCaseInterface;

/**
 * ユーザ詳細 Controller クラス
 * @package packages\Controllers\Controllers\Users
 */
class FindUserController
{
    public function __construct(private FindUserUseCaseInterface $useCase) {}

    /**
     * @param integer $id
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        return response()->json(
            new FindUserResource($this->useCase->handle($id))
        );
    }
}
