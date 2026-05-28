@extends('layouts.app')
@section('title') {{ 'Rapports' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Rapports</li>
        </ul>
    </nav>

@livewire('ui.tab-rapport')

@endsection