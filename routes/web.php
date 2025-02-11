<?php

use App\Http\Livewire\PlayerIndex;
use App\Http\Livewire\TeamsIndex;
use App\Http\Livewire\ChampionshipIndex;
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

Route::get('/players',PlayerIndex::class);

Route::get('/teams',TeamsIndex::class);


Route::get('/championships',ChampionshipIndex::class);
