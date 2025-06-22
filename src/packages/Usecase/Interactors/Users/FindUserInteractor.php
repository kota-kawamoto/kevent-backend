<?php

namespace packages\UseCase\Interactors\Users;

use packages\Domain\Models\User;
use packages\Domain\Repositories\UserRepositoryInterface;
use packages\UseCase\Interfaces\Users\FindUserUseCaseInterface;

/**
 * ユーザ詳細 UseCase 実装クラス
 * @package packages\UseCase\Interactors\Users
 */
class FindUserInteractor implements FindUserUseCaseInterface
{
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * @param int $id
     * @return User
     */
    public function handle(int $id): User
    {
        return $this->repository->find($id);
    }
}
