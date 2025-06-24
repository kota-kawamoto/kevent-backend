<?php

namespace packages\UseCase\Interfaces\Users;

/**
 * ユーザ更新 UseCase インターフェース
 * @package packages\UseCase\Interfaces\Users
 */
interface UpdateUserUseCaseInterface
{
    /**
     * @param integer $id
     * @param array $data
     * @return void
     */
    public function handle(int $id, array $data): void;
}
