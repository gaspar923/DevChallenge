<?php

namespace App\Domains\Player\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Team\Models\Team;

class Player extends Model
{
    protected $fillable = ['name', 'age', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
