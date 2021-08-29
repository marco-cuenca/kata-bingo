<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Columns extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lower_limit',
        'upper_limit',
    ];

    public function CardColumns()
    {
        return $this->hasMany(CardColumn::class, 'column_id');
    }
}
