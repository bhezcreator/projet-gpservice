@extends('layouts.app')
@section('title') {{ 'Home' }} @endsection
@section('content')

    @livewire('dash.stat-rh')
    @livewire('dash.indicateur-dash')
    @livewire('dash.budget-projects')

@endsection

