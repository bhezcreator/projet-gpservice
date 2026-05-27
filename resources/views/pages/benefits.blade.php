@extends('layouts.app')
@section('title') {{ 'Avantages & Primes' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li class="active">Avantages & Primes</li>
        </ul>
    </nav>

    @livewire('benefits-index')

@endsection