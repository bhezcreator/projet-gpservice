@extends('layouts.app')
@section('title') {{ 'Finance' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Finance</li>
        </ul>
    </nav>

@livewire('ui.tab-finance')

@endsection