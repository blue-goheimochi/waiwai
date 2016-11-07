<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\UserRepository::class
        );
        $this->app->bind(
            \App\Repositories\TopicRepositoryInterface::class,
            \App\Repositories\TopicRepository::class
        );
        $this->app->bind(
            \App\Repositories\CommentRepositoryInterface::class,
            \App\Repositories\CommentRepository::class
        );
        $this->app->bind(
            \App\Repositories\LinkRepositoryInterface::class,
            \App\Repositories\LinkRepository::class
        );
    }
}
