<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Championships extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'game',
        'begin date',
        'end date',
        'participant teams',
    ];

    protected $casts = [
        'participant teams' => 'array',
    ];
}
