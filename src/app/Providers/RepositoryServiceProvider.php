<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Repository 用の ServiceProvider クラス
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \packages\Domain\Repositories\UserRepositoryInterface::class,
            \packages\Infrastructure\Repositories\UserRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
