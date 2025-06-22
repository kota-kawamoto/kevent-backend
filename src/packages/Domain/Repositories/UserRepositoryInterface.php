<?php

namespace packages\Domain\Repositories;

use packages\Domain\Models\Pagination\UserPagination;
use packages\Domain\Models\User;

/**
 * ユーザ Repository インターフェース
 * @package packages\Domain\Repositories
 */
interface UserRepositoryInterface
{
    /**
     * @param int $id
     * @return User
     */
    public function find(int $id): User;

    /**
     * @param integer $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data): void;

    /**
     * @param array $params
     * @return UserPagination
     */
    public function index(array $params): UserPagination;
}
