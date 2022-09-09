<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'motheland',
        'points',
        'wins',
        'defeats',
    ];

    protected $casts = [
        'players_id' =>'array',
        'champioship_id' =>'array',
    ];

    public function player(){
        $this->hasMany(Players::class);
    }
}
