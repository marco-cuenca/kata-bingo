<?php

namespace Tests\Feature;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_game_can_be_create()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/games', []);

        $response->assertStatus(201);

        $this->assertCount(1, Game::all());

        $game = Game::first();

        $this->assertEquals($game->number_of_plays, 0);
    }

    /** @test */
    public function a_card_can_be_create()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/games', []);

        $response->assertStatus(201);

        $response = $this->post('/api/cards', [
            'gamer' => "Marco Antonio Cuenca Dominguez",
            'game_id' => 1,
        ]);

        $response->assertStatus(201);

        $card = Card::first();

        $this->assertEquals($card->gamer, "Marco Antonio Cuenca Dominguez");
    }

    /** @test */
    public function you_can_get_a_random_number()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/games', []);

        $response->assertStatus(201);

        $response = $this->post('/api/cards', [
            'gamer' => "Marco Antonio Cuenca Dominguez",
            'game_id' => 1,
        ]);

        $response->assertStatus(201);

        $response = $this->get('/api/games/get-number/1');

        $response->assertStatus(200);
    }

    /** @test */
    public function you_can_confirm_winner()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/games', []);

        $response->assertStatus(201);

        $response = $this->post('/api/cards', [
            'gamer' => "Marco Antonio Cuenca Dominguez",
            'game_id' => 1,
        ]);

        $response->assertStatus(201);

        $card = Card::first();

        $response = $this->post('/api/games/check-winner/1', [
            'card_id' => $card->id,
        ]);

        $response->assertStatus(200);
    }
}
