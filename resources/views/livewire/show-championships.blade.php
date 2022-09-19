@extends('layouts.app')
@section('title','Championships')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <livewire:data-championship></livewire:data-championship>
                </div>
            </div>
        </div>
    </div>
@endsection
