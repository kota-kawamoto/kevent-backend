<?php

namespace packages\UseCase\Interfaces\Users;

use packages\Domain\Models\Pagination\UserPagination;

/**
 * ユーザ一覧 UseCase インターフェース
 * @package packages\UseCase\Interfaces\Users
 */
interface IndexUserUseCaseInterface
{
    /**
     * @param array $params
     * @return UserPagination
     */
    public function handle(array $params): UserPagination;
}
