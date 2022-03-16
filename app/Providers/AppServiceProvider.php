<?php

namespace App\Providers;

use App\Repositories\CategoriesRepository;
use App\Repositories\CartRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\UserRepository;

use App\Repositories\Impl\CartRepositoryImpl;
use App\Repositories\Impl\CustomerRepositoryImpl;
use App\Repositories\Impl\CategoriesRepositoryImpl;
use App\Repositories\Impl\OrderRepositoryImpl;
use App\Repositories\Impl\ProductRepositoryImpl;
use App\Repositories\Impl\OrderDetailRepositoryImpl;
use App\Repositories\Impl\UserRepositoryImpl;

use App\Repositories\OrderRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\ProductRepository;

use App\Services\CategoriesService;
use App\Services\UserService;

use App\Services\Impl\CategoriesServiceImpl;
use App\Services\Impl\OrderServiceImpl;
use App\Services\Impl\ProductServiceImpl;
use App\Services\Impl\OrderDetailServiceImpl;
use App\Services\Impl\UserServiceImpl;

use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\OrderDetailService;
use App\Services\CustomerService;
use App\Services\CartService;

use App\Services\Impl\CartServiceImpl;
use App\Services\Impl\CustomerServiceImpl;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Http\Views\Composers\CategoriesComposer;
use App\Repositories\Impl\SliderRepositoryImpl;
use App\Repositories\SliderRepository;
use App\Services\Impl\SliderServiceImpl;
use App\Services\SliderService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ProductRepository::class,
            ProductRepositoryImpl::class
        );
        $this->app->singleton(
            OrderRepository::class,
            OrderRepositoryImpl::class
        );
        $this->app->singleton(
            CategoriesRepository::class,
            CategoriesRepositoryImpl::class
        );
        $this->app->singleton(
            CartRepository::class,
            CartRepositoryImpl::class
        );
        $this->app->singleton(
            CustomerRepository::class,
            CustomerRepositoryImpl::class
        );
        $this->app->singleton(
            OrderDetailRepository::class,
            OrderDetailRepositoryImpl::class
        );
        $this->app->singleton(
            UserRepository::class,
           UserRepositoryImpl::class
        );
        $this->app->singleton(
            CategoriesService::class,
            CategoriesServiceImpl::class
        );
        $this->app->singleton(
            OrderDetailService::class,
            OrderDetailServiceImpl::class
        );
        $this->app->singleton(
            OrderService::class,
            OrderServiceImpl::class
        );
        $this->app->singleton(
            ProductService::class,
            ProductServiceImpl::class
        );
        $this->app->singleton(
            CartService::class,
            CartServiceImpl::class
        );
        $this->app->singleton(
            CustomerService::class,
            CustomerServiceImpl::class
        );
        $this->app->singleton(
            UserService::class,
           UserServiceImpl::class
        );
        $this->app->singleton(
            SliderService ::class,
            SliderServiceImpl::class
        );
        $this->app->singleton(
            SliderRepository::class,
            SliderRepositoryImpl::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        // View::share('key', 'value');
        View::composer(
            '*', CategoriesComposer::class
        );
    }
}
