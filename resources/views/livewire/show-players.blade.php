@extends('layouts.app')
@section('title','Players')

@section('content')
    <div>
        <h1>Jogadores</h1>
        @foreach($players as $player)
            <tr>
                @livewire('data-player', ['player' => $player], key($player->id))
            </tr>    
        @endforeach
    </div>
@endsection    