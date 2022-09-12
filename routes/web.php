<?php

use App\Http\Livewire\CreatePlayer;
use App\Http\Livewire\CreateTeam;
use App\Http\Livewire\CreateChampionship;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/players',ShowPlayers::class);
Route::get('/new-player',CreatePlayer::class);

Route::get('/teams',ShowTeams::class);
Route::get('/new-team',CreateTeam::class);

Route::get('/change-team',ShowChampionships::class);
Route::get('/new-championship',CreateChampionship::class);