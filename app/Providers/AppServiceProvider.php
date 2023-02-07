<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        Schema::defaultStringLength(191); 
        view()->composer(['layouts.web_header'],function ($view){                 
                $category = Category::with('subcategory')->get();
                view::share('category',$category);
                
              
        });
    }
}
