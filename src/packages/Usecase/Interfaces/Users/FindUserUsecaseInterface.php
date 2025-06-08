<?php

namespace packages\UseCase\Interfaces\Users;

use packages\Domain\Models\User;

/**
 * ユーザ詳細 UseCase インターフェース
 * @package packages\UseCase\Interfaces\Users
 */
interface FindUserUseCaseInterface
{
    /**
     * @param int $id
     * @return User
     */
    public function handle(int $id): User;
}
