<?php

namespace packages\UseCase\Interactors\Users;

use packages\Domain\Repositories\UserRepositoryInterface;
use packages\UseCase\Interfaces\Users\UpdateUserUseCaseInterface;

/**
 * ユーザ更新 UseCase 実装クラス
 * @package packages\UseCase\Interactors\Users
 */
class UpdateUserInteractor implements UpdateUserUseCaseInterface
{
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * @param integer $id
     * @param array $data
     * @return void
     */
    public function handle(int $id, array $data): void
    {
        $this->repository->update($id, $data);
    }
}
