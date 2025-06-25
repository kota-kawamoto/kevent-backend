<?php

namespace packages\Domain\Models;

use packages\Domain\Models\Enums\Group;
use packages\Domain\Models\Enums\UserRoleType;

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
        private string $typeId,
    ) {}

    public static function reconstruct(
        int $id,
        string $userName,
        string $loginId,
        string $groupId,
        string $typeId,
    ): User {
        return new User(
            id: $id,
            userName: $userName,
            loginId: $loginId,
            groupId: $groupId,
            typeId: $typeId,
        );
    }

    public function getName(): string
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

    public function getTypeId(): string
    {
        return $this->typeId;
    }

    public function getGroupName(): string
    {
        return Group::tryFrom((int)$this->groupId)?->label() ?? '';
    }

    public function getRoleType(): UserRoleType
    {
        return UserRoleType::tryFrom((int)$this->typeId) ?? UserRoleType::GENERAL;
    }
}
