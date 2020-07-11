<?php

namespace App\Providers;

use App\TopMenu;
use Illuminate\Support\ServiceProvider;

class TopMenuProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


        view()->share('categories', TopMenu::whereNull('drop_id')
            ->with('childrenTittle')
            ->get()
        );

    }
}
