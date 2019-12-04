<?php

namespace App\Providers;
use App\Categorie;


use Illuminate\Support\ServiceProvider;

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

   
    public function boot()
    {
        
  view()->composer('my.view', function($view)
  {
    $view->with('categorys', 'categorie::all()->toArray()');
});
}
}