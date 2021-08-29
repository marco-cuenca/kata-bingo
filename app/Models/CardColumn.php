<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardColumn extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'column_id',
        'is_marked',
        'number',
    ];

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }

    public function column()
    {
        return $this->belongsTo(Columns::class, 'column_id');
    }
}
