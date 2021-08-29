<?php

namespace App\Traits;

use App\Models\CardColumn;
use DB;

trait GameTrait
{

    public function getNumber($game)
    {
        $columns = CardColumn::select('card_columns.*')
            ->join('cards', 'cards.id', 'card_columns.card_id')
            ->where('cards.game_id', $game->id)
            ->where('card_columns.number', $game->last_number_obtained)
            ->get();

        foreach ($columns as $column) {
            $column->is_marked = true;
            $column->save();
        }

        return $columns;

    }

}
