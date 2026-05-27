@extends('layouts.app')
@section('title') {{ 'Paramètres' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li class="active">Paramètres</li>
        </ul>
    </nav>

    @livewire('ui.tab-setting')

@endsection