@extends('layouts.app')
@section('title') {{ 'Logistiques' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Logistiques</li>
        </ul>
    </nav>

@livewire('ui.tab-logistique')

@endsection