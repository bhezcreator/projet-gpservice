@extends('layouts.app')
@section('title') {{ 'Formations' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li class="active">Formations</li>
        </ul>
    </nav>


    @livewire('ui.tab-trainings')

@endsection