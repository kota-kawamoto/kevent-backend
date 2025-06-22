<?php

namespace packages\Domain\Models\Pagination;

use packages\Domain\Models\User;

/**
 * ユーザドメインモデルのページネーションクラス
 * @package packages\Domain\Models\Pagination
 */
class UserPagination extends Pagination
{
    /**
     * @param callable(User, int): mixed $callback
     * @return mixed
     */
    public function mapData(callable $callback): mixed
    {
        return parent::mapData($callback);
    }
}
