<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepoInterface;
use App\Repositories\CategoryRepo;
use App\Services\CategoryService;

class CategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(CategoryRepoInterface::class,CategoryRepo::class);
        $this->app->bind(CategoryService::class,function($app){
           return new CategoryService($app->make(CategoryRepoInterface::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
