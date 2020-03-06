<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        //
        $env = env('APP_ENV');
        switch ($env) {
        case('production'):
            $this->registerForProduction();
            break;
        
        case('testing'):
            $this->registerForLocalRdbByQueryBuilder();
            break;

        case('testing.inmemory'):
            $this->registerForLocalRdbByEloquent();
            break;

        case('testing.inmemory'):
            $this->registerForLocalInMemory();
            break;

        default:
            $this->registerForProduction();
        }

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register Providers for Production Environment.
     *
     * @return void
     */
    private function registerForProduction()
    {
        // Application Service.
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Register\UserRegisterServiceInterface::class,
            \packages\Techno\Sns\Application\User\Register\UserRegisterService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\GetInfo\UserGetInfoServiceInterface::class,
            \packages\Techno\Sns\Application\User\GetInfo\UserGetInfoService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Update\UserUpdateServiceInterface::class,
            \packages\Techno\Sns\Application\User\Update\UserUpdateService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Delete\UserDeleteServiceInterface::class,
            \packages\Techno\Sns\Application\User\Delete\UserDeleteService::class
        );

        // Repository
        $this->app->bind(
            \packages\Techno\Sns\Domain\User\UserRepositoryInterface::class,
            \packages\Techno\Sns\Infrastructure\QueryBuilder\User\UserRepository::class
        );

    }

    /**
     * Register Providers.
     *
     * @return void
     */
    private function registerForLocalRdbByQueryBuilder()
    {
        // Application Service.
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Register\UserRegisterServiceInterface::class,
            \packages\Techno\Sns\Application\User\Register\UserRegisterService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\GetInfo\UserGetInfoServiceInterface::class,
            \packages\Techno\Sns\Application\User\GetInfo\UserGetInfoService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Update\UserUpdateServiceInterface::class,
            \packages\Techno\Sns\Application\User\Update\UserUpdateService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Delete\UserDeleteServiceInterface::class,
            \packages\Techno\Sns\Application\User\Delete\UserDeleteService::class
        );

        // Repository
        $this->app->singleton(
            \packages\Techno\Sns\Domain\User\UserRepositoryInterface::class,
            \packages\Techno\Sns\Infrastructure\QueryBuilder\User\UserRepository::class
        );

    }

    /**
     * Register Providers.
     *
     * @return void
     */
    private function registerForLocalRdbByEloquent()
    {
        // Application Service.
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Register\UserRegisterServiceInterface::class,
            \packages\Techno\Sns\Application\User\Register\UserRegisterService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\GetInfo\UserGetInfoServiceInterface::class,
            \packages\Techno\Sns\Application\User\GetInfo\UserGetInfoService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Update\UserUpdateServiceInterface::class,
            \packages\Techno\Sns\Application\User\Update\UserUpdateService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Delete\UserDeleteServiceInterface::class,
            \packages\Techno\Sns\Application\User\Delete\UserDeleteService::class
        );

        // Repository
        $this->app->singleton(
            \packages\Techno\Sns\Domain\User\UserRepositoryInterface::class,
            \packages\Techno\Sns\Infrastructure\Eloquent\User\UserRepository::class
        );

    }

    /**
     * Register Providers.
     *
     * @return void
     */
    private function registerForLocalInMemory()
    {
        // Application Service.
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Register\UserRegisterServiceInterface::class,
            \packages\Techno\Sns\Application\User\Register\UserRegisterService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\GetInfo\UserGetInfoServiceInterface::class,
            \packages\Techno\Sns\Application\User\GetInfo\UserGetInfoService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Update\UserUpdateServiceInterface::class,
            \packages\Techno\Sns\Application\User\Update\UserUpdateService::class
        );
        $this->app->bind(
            \packages\Techno\Sns\UseCase\User\Delete\UserDeleteServiceInterface::class,
            \packages\Techno\Sns\Application\User\Delete\UserDeleteService::class
        );

        // Repository
        $this->app->singleton(
            \packages\Techno\Sns\Domain\User\UserRepositoryInterface::class,
            \packages\Techno\Sns\Infrastructure\InMemory\User\InMemoryUserRepository::class
        );

    }
}
