<?php

namespace packages\Domain\Models;

use packages\Domain\Models\Enums\Group;

/**
 * ユーザ ドメインモデルクラス
 * @package packages\Domain\Models
 */
class User extends Entity
{
    private function __construct(
        protected ?int $id,
        private string $userName,
        private string $loginId,
        private string $groupId,
    ) {}

    public static function reconstruct(
        int $id,
        string $userName,
        string $loginId,
        string $groupId,
    ): User {
        return new User(
            id: $id,
            userName: $userName,
            loginId: $loginId,
            groupId: $groupId,
        );
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getLoginId(): string
    {
        return $this->loginId;
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }

    public function getGroupName(): string
    {
        return Group::tryFrom((int)$this->groupId)?->label() ?? '';
    }
}
