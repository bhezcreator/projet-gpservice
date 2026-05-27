@extends('layouts.app')
@section('title') {{ 'Projets' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li><a href="{{ route('projects') }}">Projets</a></li>
            <li class="active">Indicateurs</li>
        </ul>
    </nav>

    @livewire('project-indicator-index', [$project_id])

@endsection