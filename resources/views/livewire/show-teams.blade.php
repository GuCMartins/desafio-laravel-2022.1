@extends('layouts.app')
@section('title', 'Teams')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <livewire:data-team></livewire:data-team>
                </div>
            </div>
        </div>
    </div>
@endsection
