<?php

namespace packages\UseCase\Interfaces\Users;

use packages\Domain\Models\EditUserData;

/**
 * ユーザ編集画面 UseCase インターフェース
 * @package packages\UseCase\Interfaces\Users
 */
interface EditUserUseCaseInterface
{
    /**
     * @param int $id
     * @return EditUserData
     */
    public function handle(int $id): EditUserData;
}
