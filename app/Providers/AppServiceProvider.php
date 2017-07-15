<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billing\Stripe;

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

        view()->composer('layouts.sidebar', function ($view){

            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');// load archives every where, where there is a sidebar



            $view->with(compact('archives', 'tags'));

        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        // binding
        $this->app->singleton(Stripe::class, function ()
        {
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
