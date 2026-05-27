@extends('layouts.app')
@section('title') {{ 'Feuilles de temps' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li class="active">Feuilles de temps</li>
        </ul>
    </nav>

    @livewire('timesheets-crud')

@endsection