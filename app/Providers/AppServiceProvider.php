<?php

namespace App\Providers;

use App\Repositories\CardRepository;
use App\Repositories\GameRepository;
use App\Repositories\Interfaces\ICardRepository;
use App\Repositories\Interfaces\IGameRepository;
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
        $this->app->bind(ICardRepository::class, CardRepository::class);
        $this->app->bind(IGameRepository::class, GameRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
