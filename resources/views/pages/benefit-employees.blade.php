@extends('layouts.app')
@section('title') {{ 'Avantages & Primes' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li><a href="{{ route('benefits') }}">Avantages & Primes</a></li>
            <li class="active">Attribution</li>
        </ul>
    </nav>

    @livewire('benefit-employees', [$benefit_id])

@endsection