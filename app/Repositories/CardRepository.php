<?php

namespace App\Repositories;

use App\Core\Helpers\CardControlHelper;
use App\Http\Resources\CardCollection;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\CardColumn;
use App\Models\Game;
use App\Repositories\Interfaces\ICardRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CardRepository implements ICardRepository
{
    protected $model;

    /**
     * CardRepository constructor.
     *
     * @param Card $card
     */
    public function __construct(Card $card)
    {
        $this->model = $card;
    }

    public function all()
    {
        return new CardCollection($this->model->all());
    }

    public function create($data)
    {
        $game = Game::find($data->game_id);

        if (!$game) {
            throw new ModelNotFoundException("Game not found");
        }

        if (count(json_decode($game->numbers_left)) != 75) {
            throw new ModelNotFoundException("The game has already started");
        }

        $card = CardControlHelper::generateCard();

        $new = $this->model->create($data->all());

        foreach ($card as $value) {
            foreach ($value['values'] as $row) {
                CardColumn::create([
                    'card_id' => $new->id,
                    'column_id' => $value['column'],
                    'number' => $row,
                ]);
            }
        }

        return $new;
    }

    public function update($data, $id)
    {
        if (null == $card = $this->model->find($id)) {
            throw new ModelNotFoundException("Card not found");
        }

        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        if (null == $card = $this->model->find($id)) {
            throw new ModelNotFoundException("Card not found");
        }

        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null == $card = $this->model->find($id)) {
            throw new ModelNotFoundException("Card not found");
        }

        return new CardResource($card);
    }
}
