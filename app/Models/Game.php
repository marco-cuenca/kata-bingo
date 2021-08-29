<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_plays',
        'numbers_left',
        'last_number_obtained',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class, 'game_id');
    }
}
