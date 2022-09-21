@extends('layouts.app')
@section('title','Players')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-end m-2 p-2">
            <x-jet-button wire:click="showPlayerModal">Criar</x-jet-button>
        </div>
    </div>
@endsection
   