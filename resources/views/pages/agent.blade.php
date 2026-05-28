@extends('layouts.app')
@section('title') {{ 'Agents' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Agents</li>
        </ul>
    </nav>

@livewire('ui.tab-agent')

@endsection