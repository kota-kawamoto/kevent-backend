<?php

namespace packages\Controllers\Controllers\Users;

use Illuminate\Http\JsonResponse;
use packages\Controllers\Requests\Users\IndexUserRequest;
use packages\Presenter\Resources\Users\IndexUserResource;
use packages\UseCase\Interfaces\Users\IndexUserUseCaseInterface;

/**
 * ユーザ一覧 Controller クラス
 * @package packages\Controllers\Controllers\Users
 */
class IndexUserController
{
    public function __construct(private IndexUserUseCaseInterface $useCase) {}

    /**
     * @param integer $id
     * @return JsonResponse
     */
    public function __invoke(IndexUserRequest $request): JsonResponse
    {
        $data = $this->useCase->handle($request->validated());
        return response()->json(
            new IndexUserResource($data)
        );
    }
}
