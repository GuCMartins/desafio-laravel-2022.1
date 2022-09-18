@extends('layouts.app')
@section('title','Teams')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="list-disc">
                @foreach($teams as $team)
                    <tr>
                        @livewire('data-team', ['team' => $team], key($team->id))
                        <button wire:click="deleteTeam({{$team->id}})">Apagar</button>
                    </tr>       
                @endforeach
            </div>       
        </div>    
    </div>
@endsection    