<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'motherland',
        'points',
        'wins',
        'defeats',
    ];

    public function player(){
        $this->hasMany(Players::class);
    }
}
