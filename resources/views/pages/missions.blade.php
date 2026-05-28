@extends('layouts.app')
@section('title') {{ 'Missions' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Missions</li>
        </ul>
    </nav>

@livewire('ui.tab-mission')

@endsection