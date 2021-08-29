<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
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
            'game_id' => $this->game_id,
            'gamer' => $this->gamer,
            'is_winner' => (bool) $this->is_winner,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
