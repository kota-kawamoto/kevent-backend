<?php

namespace packages\UseCase\Interfaces\Users;

/**
 * ユーザ削除 UseCase インターフェース
 * @package packages\UseCase\Interfaces\Users
 */
interface DeleteUserUseCaseInterface
{
    /**
     * @param int $id
     * @return void
     */
    public function handle(int $id): void;
}
