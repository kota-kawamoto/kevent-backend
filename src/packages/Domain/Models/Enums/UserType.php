<?php

namespace packages\Domain\Models\Enums;

/**
 * ユーザ権限タイプ Enum クラス
 * @package packages\Domain\Models\Enums
 */
enum UserType: int
{
    case MANAGER  = 1;
    case USER     = 2;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::MANAGER  => '管理者',
            self::USER     => '一般ユーザ',
        };
    }

    /**
     * @return array<int>
     */
    public static function values(): array
    {
        return [
            self::MANAGER->value,
            self::USER->value,
        ];
    }
}
