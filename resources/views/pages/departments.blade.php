@extends('layouts.app')
@section('title') {{ 'Départements' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li class="active">Départements</li>
        </ul>
    </nav>

    @livewire('ui.tab-department-poste')

@endsection