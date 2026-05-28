@extends('layouts.app')
@section('title') {{ 'Administration' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Administration</li>
        </ul>
    </nav>

@livewire('ui.tab-administration')

@endsection