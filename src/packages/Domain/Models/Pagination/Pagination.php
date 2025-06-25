<?php

namespace packages\Domain\Models\Pagination;

use Illuminate\Support\Collection;

/**
 * ページネーション 抽象クラス
 * @package packages\Domain\Models\Pagination
 */
abstract class Pagination
{
    protected function __construct(
        protected int $total,
        protected int $currentPage,
        protected int $lastPage,
        protected Collection $data,
    ) {}

    public static function reconstruct(
        int $total,
        int $currentPage,
        int $lastPage,
        Collection $data,
    ): static {
        return new static(
            total: $total,
            currentPage: $currentPage,
            lastPage: $lastPage,
            data: $data
        );
    }

    /**
     * @return integer
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return integer
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @return integer
     */
    public function getLastPage(): int
    {
        return $this->lastPage;
    }

    /**
     * @return Collection
     */
    public function getData(): Collection
    {
        return $this->data;
    }

    /**
     * @param callable(mixed, int): mixed $callback
     * @return mixed
     */
    public function mapData(callable $callback): mixed
    {
        return $this->data->map(fn($item, $key) => $callback($item, $key));
    }
}
