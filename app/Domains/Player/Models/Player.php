<?php

namespace App\Domains\Player\Models;

use App\Domains\Team\Models\Team;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'age', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
