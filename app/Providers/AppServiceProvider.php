<?php

namespace App\Providers;

use App\Channel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        \View::composer('*', function ($view) {
            $view->with('channels', Channel::all());
        });
    }

    public function register()
    {
        //
    }

}
