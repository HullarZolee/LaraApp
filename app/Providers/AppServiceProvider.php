<?php

namespace App\Providers;
use App\Post;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
{
    Schema::defaultStringLength(191);



    /** Share data with all view in the application **/
    // view()->share('posts', Post::all());
    /** Share data with specific view **/
    // view()->composer('*.index', \App\Http\ViewComposers\PostComposer::class);
}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
