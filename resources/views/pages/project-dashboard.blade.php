@extends('layouts.app')
@section('title') {{ 'Tableau de bord' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li><a href="{{ route('projects') }}">Projets</a></li>
            <li class="active">Tableau de bord</li>
        </ul>
    </nav>

    @livewire('project-dashboard', [$project_id])

@endsection