<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'id',
        'name',
        'code',
        'type',
        'emblem',
        'plan',
        'number_of_available_seasons',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'competition_teams');
    }
}
