<?php

namespace packages\UseCase\Interactors\Users;

use packages\Domain\Repositories\UserRepositoryInterface;
use packages\UseCase\Interfaces\Users\DeleteUserUseCaseInterface;

/**
 * ユーザ削除 UseCase 実装クラス
 * @package packages\UseCase\Interactors\Users
 */
class DeleteUserInteractor implements DeleteUserUseCaseInterface
{
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * @param int $id
     * @return void
     */
    public function handle(int $id): void
    {
        $this->repository->delete($id);
    }
}
