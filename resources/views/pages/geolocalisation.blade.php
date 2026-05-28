@extends('layouts.app')
@section('title') {{ 'Géolocalisation' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li class="active">Géolocalisation</li>
        </ul>
    </nav>

@livewire('ui.tab-geolocalisation')

@endsection