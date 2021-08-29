<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'number_of_plays' => $this->number_of_plays,
            'numbers_left' => $this->numbers_left,
            'created_at' => $row->created_at->format('Y-m-d H:i:s'),
            'gamers' => $row->cards,
        ];
    }
}
