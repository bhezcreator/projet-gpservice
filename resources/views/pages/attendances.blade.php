@extends('layouts.app')
@section('title') {{ 'Présences' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li class="active">Présences</li>
        </ul>
    </nav>

    @livewire('attendance-index')

@endsection