@extends('layouts.app')
@section('title') {{ 'Communication' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Communication</li>
        </ul>
    </nav>

@livewire('ui.tab-communication')

@endsection