<?php

namespace App\Repositories;

use App\Core\Helpers\CardControlHelper;
use App\Http\Resources\GameCollection;
use App\Http\Resources\GameResource;
use App\Models\Card;
use App\Models\Game;
use App\Repositories\Interfaces\IGameRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GameRepository implements IGameRepository
{
    protected $model;

    /**
     * GameRepository constructor.
     *
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        $this->model = $game;
    }

    public function all()
    {
        return new GameCollection($this->model->all());
    }

    public function create($data)
    {
        return $this->model->create([
            'numbers_left' => json_encode(CardControlHelper::allNumbers()),
        ]);
    }

    public function update($data, $id)
    {
        if (null == $game = $this->model->find($id)) {
            throw new ModelNotFoundException("Game not found");
        }

        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        if (null == $game = $this->model->find($id)) {
            throw new ModelNotFoundException("Game not found");
        }

        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null == $game = $this->model->find($id)) {
            throw new ModelNotFoundException("Game not found");
        }

        return new GameResource($game);
    }

    public function getNumber($id)
    {
        $game = $this->model->find($id);

        if (!$game) {
            throw new ModelNotFoundException("Game not found");
        }

        if (count(json_decode($game->numbers_left)) == 0) {
            throw new \Exception("Game over");
        }

        $newData = CardControlHelper::getNumber(json_decode($game->numbers_left));

        $game->numbers_left = json_encode($newData['numbers_left']);
        $game->number_of_plays = $game->number_of_plays + 1;
        $game->last_number_obtained = $newData['number_obtained'];

        $game->save();

        return $game;
    }

    public function checkWinner($id, $request)
    {
        $game = $this->model->find($id);

        if (!$game) {
            throw new ModelNotFoundException("Game not found");
        }

        $card = Card::find($request->card_id);

        if (!$card) {
            throw new ModelNotFoundException("Card not found");
        }

        $numbers = collect($card->CardColumns)->where('is_marked', true)->pluck('number')->toArray();

        $validateWinner = CardControlHelper::validateWinner(json_decode($game->numbers_left), $numbers);

        return [
            'is_winner' => $validateWinner,
            'gamer' => $card->gamer,
        ];
    }
}
