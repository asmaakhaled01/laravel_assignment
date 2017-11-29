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
        $this->app->singleton('logger', function () 
        {
            return new \App\Services\LogService();
        });
        
        $this->app->singleton('filmService', function () 
        {
            return new \App\Services\FilmService(new \App\Repositories\FilmRepository());
        });
        
        $this->app->singleton('genreService', function () 
        {
            return new \App\Services\GenreService(new \App\Repositories\GenreRepository());
        });
        
         
        $this->app->singleton('filmValidator', function () 
        {
            return new \App\Validators\FilmValidator();
        });       
        
    }
}
