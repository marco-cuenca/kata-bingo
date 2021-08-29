<?php

namespace App\Providers;

use App\Models\Game;
use App\Traits\GameTrait;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{
    use GameTrait;

    public function register()
    {
    }

    public function boot()
    {
        $this->game();

    }

    private function game()
    {
        Game::updated(function ($game) {

            $this->getNumber($game);

        });

    }

}
