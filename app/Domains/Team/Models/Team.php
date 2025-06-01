<?php

namespace App\Domains\Team\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'description'];

    // public function team()
    // {
    //     return $this->belongsTo(Team::class);
    // }
}
