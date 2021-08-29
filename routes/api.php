<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('cards', 'CardController@create');
Route::post('games', 'GameController@create');
Route::get('games/get-number/{game_id}', 'GameController@getNumber');
Route::post('games/check-winner/{game_id}', 'GameController@checkWinner');
