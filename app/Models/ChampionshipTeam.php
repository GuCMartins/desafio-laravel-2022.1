<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChampionshipTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'championship_id',
        'team_id',
    ];
}
