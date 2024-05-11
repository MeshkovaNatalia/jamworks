<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Storages\Product\ProductStorage;
use App\Storages\Product\ProductStorageInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;
use App\Storages\Order\OrderStorage;
use App\Storages\Order\OrderStorageInterface;
use App\Services\Order\OrderService;
use App\Services\Order\OrderServiceInterface;
use App\Storages\User\UserStorage;
use App\Storages\User\UserStorageInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use App\Storages\OrderItem\OrderItemStorageInterface;
use App\Storages\OrderItem\OrderItemStorage;
use App\Storages\Order\OrderStorageLogDecorator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Product section
        $this->app->bind(ProductStorageInterface::class, ProductStorage::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);

        // Order Section
        $this->app->bind(OrderStorageInterface::class, function ($app) {
            return new OrderStorageLogDecorator($app->make(OrderStorage::class));
        });
        $this->app->bind(OrderServiceInterface::class, OrderService::class);

        // User Section
        $this->app->bind(UserStorageInterface::class, UserStorage::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);

        // Order item section
        $this->app->bind(OrderItemStorageInterface::class, OrderItemStorage::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
