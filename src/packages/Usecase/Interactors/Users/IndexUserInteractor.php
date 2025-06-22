<?php

namespace packages\UseCase\Interactors\Users;

use packages\Domain\Models\Pagination\UserPagination;
use packages\Domain\Repositories\UserRepositoryInterface;
use packages\UseCase\Interfaces\Users\IndexUserUseCaseInterface;

/**
 * ユーザ一覧 UseCase 実装クラス
 * @package packages\UseCase\Interactors\Users
 */
class IndexUserInteractor implements IndexUserUseCaseInterface
{
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * @param array $params
     * @return UserPagination
     */
    public function handle(array $params): UserPagination
    {
        return $this->repository->index($params);
    }
}
