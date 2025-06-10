<?php

namespace packages\Domain\Models\Enums;

/**
 * ユーザ権限タイプ Enum クラス
 * @package packages\Domain\Models\Enums
 */
enum UserRoleType: int
{
    case GENERAL    = 1;
    case ADMIN      = 2;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::GENERAL   => '一般',
            self::ADMIN     => '管理者',
        };
    }

    /**
     * @return array<int>
     */
    public static function values(): array
    {
        return [
            self::GENERAL->value,
            self::ADMIN->value,
        ];
    }
}
