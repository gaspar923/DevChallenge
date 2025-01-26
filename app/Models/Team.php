<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'id',
        'name',
        'shortName',
        'tla',
        'crest',
        'address',
        'website',
        'founded',
        'club_colors',
        'venue',
    ];

    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'competition_teams');
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'team_players');
    }
}
