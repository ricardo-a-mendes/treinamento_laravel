<?php

namespace CodeCommerce\Providers;

use CodeCommerce\Repositories\AddressRepository;
use CodeCommerce\Repositories\AddressRepositoryEloquent;
use CodeCommerce\Repositories\CartRepository;
use CodeCommerce\Repositories\CartRepositoryEloquent;
use CodeCommerce\Repositories\CategoryRepository;
use CodeCommerce\Repositories\CategoryRepositoryEloquent;
use CodeCommerce\Repositories\OrderItemRepository;
use CodeCommerce\Repositories\OrderItemRepositoryEloquent;
use CodeCommerce\Repositories\OrderRepository;
use CodeCommerce\Repositories\OrderRepositoryEloquent;
use CodeCommerce\Repositories\PhoneRepository;
use CodeCommerce\Repositories\PhoneRepositoryEloquent;
use CodeCommerce\Repositories\ProductImageRepository;
use CodeCommerce\Repositories\ProductImageRepositoryEloquent;
use CodeCommerce\Repositories\ProductRepository;
use CodeCommerce\Repositories\ProductRepositoryEloquent;
use CodeCommerce\Repositories\StatusRepository;
use CodeCommerce\Repositories\StatusRepositoryEloquent;
use CodeCommerce\Repositories\TagRepository;
use CodeCommerce\Repositories\TagRepositoryEloquent;
use CodeCommerce\Repositories\UserRepository;
use CodeCommerce\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
			AddressRepository::class,
			AddressRepositoryEloquent::class
		);

		$this->app->bind(
			CartRepository::class,
			CartRepositoryEloquent::class
		);

		$this->app->bind(
			CategoryRepository::class,
			CategoryRepositoryEloquent::class
		);

		$this->app->bind(
			OrderRepository::class,
			OrderRepositoryEloquent::class
		);

		$this->app->bind(
			OrderItemRepository::class,
			OrderItemRepositoryEloquent::class
		);

		$this->app->bind(
			PhoneRepository::class,
			PhoneRepositoryEloquent::class
		);

		$this->app->bind(
			ProductRepository::class,
			ProductRepositoryEloquent::class
		);

		$this->app->bind(
			ProductImageRepository::class,
			ProductImageRepositoryEloquent::class
		);

		$this->app->bind(
			StatusRepository::class,
			StatusRepositoryEloquent::class
		);

		$this->app->bind(
			TagRepository::class,
			TagRepositoryEloquent::class
		);

		$this->app->bind(
			UserRepository::class,
			UserRepositoryEloquent::class
		);

        //:end-bindings:
    }
}
