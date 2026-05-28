@extends('layouts.app')
@section('title') {{ 'Commerciale' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Commerciale</li>
        </ul>
    </nav>

@livewire('ui.tab-commerciale')

@endsection