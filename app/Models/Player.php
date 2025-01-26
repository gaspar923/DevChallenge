<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'id',
        'name',
        'position',
        'date_of_birth',
        'nationality',
        'shirt_number',
    ];
}
