<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Slide;

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
        view()->composer('admin.layout.header',function($view)
        {
           if(Auth::check())
           {
            $view->with('user_login',Auth::user());
           }
        });
        // view()->composer('layout.slide',function($view){
        //     $slide=Slide::all();
        //      $view->with('slide',$slide);
        // });
       view()->composer('layout.header',function($view){
        if(Auth::check())
        {
            $view->with('nguoidung',Auth::user());
        }

       });
    }
}
