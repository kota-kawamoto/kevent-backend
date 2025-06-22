<?php

namespace packages\Domain\Models\Enums;

/**
 * ユーザ権限タイプ Enum クラス
 * @package packages\Domain\Models\Enums
 */
enum Group: int
{
    case IT         = 1;
    case SALES      = 2;
    case MANAGEMENT = 3;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::IT         => 'IT部',
            self::SALES      => '営業部',
            self::MANAGEMENT => '経営戦略部',
        };
    }

    /**
     * @return array<int>
     */
    public static function values(): array
    {
        return [
            self::IT->value,
            self::SALES->value,
            self::MANAGEMENT->value,
        ];
    }
}
