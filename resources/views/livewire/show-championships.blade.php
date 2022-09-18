@extends('layouts.app')
@section('title','Championships')

@section('content')
    <div>
        <h1>Campeonatos</h1>
        @foreach($championships as $championship)
            <tr>
                @livewire('data-championship', ['championship' => $championship], key($championship->id))
            </tr>    
        @endforeach
    </div>
@endsection    