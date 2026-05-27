@extends('layouts.app')
@section('title') {{ 'Projets' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li class="active">Projets</li>
        </ul>
    </nav>


    @livewire('ui.tab-project')

@endsection