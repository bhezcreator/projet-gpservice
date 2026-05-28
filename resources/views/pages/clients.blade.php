@extends('layouts.app')
@section('title') {{ 'Clients' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Clients</li>
        </ul>
    </nav>

    @livewire('ui.tab-client')

@endsection