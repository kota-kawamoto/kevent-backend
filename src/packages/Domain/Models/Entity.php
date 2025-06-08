<?php

namespace packages\Domain\Models;

/**
 * ドメインモデル 抽象クラス
 * @package packages\Domain\Models
 */
abstract class Entity
{
    protected ?int $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
