<?php

namespace App\Providers;

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

        $this->app->bind(\App\Contracts\Repositories\UserRepository::class,\App\Repositories\Eloquent\UserRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\ProfileRepository::class,\App\Repositories\Eloquent\ProfileRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\PostRepository::class, \App\Repositories\Eloquent\PostRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\CatePostRepository::class, \App\Repositories\Eloquent\CatePostRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\PostRepository::class, \App\Repositories\Eloquent\PostRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\CommentRepository::class, \App\Repositories\Eloquent\CommentRepositoryEloquent::class);
        //:end-bindings:
    }
}
