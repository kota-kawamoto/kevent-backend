<?php

namespace packages\Controllers\Controllers\Users;

use Illuminate\Http\Response;
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
     * @return Response
     */
    public function __invoke(UpdateUserRequest $request, int $id): Response
    {
        $this->useCase->handle($id, $request->validated());
        return response()->noContent();
    }
}
