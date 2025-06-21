<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * UseCase 用の ServiceProvider クラス
 * @package App\Providers
 */
class UseCaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \packages\UseCase\Interfaces\Users\FindUserUseCaseInterface::class,
            \packages\UseCase\Interactors\Users\FindUserInteractor::class
        );

        $this->app->bind(
            \packages\UseCase\Interfaces\Users\IndexUserUseCaseInterface::class,
            \packages\UseCase\Interactors\Users\IndexUserInteractor::class
        );

        $this->app->bind(
            \packages\UseCase\Interfaces\Users\UpdateUserUseCaseInterface::class,
            \packages\UseCase\Interactors\Users\UpdateUserInteractor::class
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
