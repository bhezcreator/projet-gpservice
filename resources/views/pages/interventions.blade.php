@extends('layouts.app')
@section('title') {{ 'Interventions' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Interventions</li>
        </ul>
    </nav>

@livewire('ui.tab-intervention')

@endsection