<?php

namespace packages\Domain\Models;

use packages\Domain\Models\Enums\Group;

/**
 * ユーザ編集画面用データ ドメインモデルクラス
 * @package packages\Domain\Models
 */
class EditUserData
{
    private function __construct(
        private User $user,
        private array $groups,
    ) {}

    public static function reconstruct(
        User $user,
        array $groups,
    ): EditUserData {
        return new EditUserData(
            user: $user,
            groups: $groups,
        );
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getGroups(): array
    {
        return $this->groups;
    }
}
