@extends('layouts.app')
@section('title') {{ 'Employées' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li class="active">Employés</li>
        </ul>
    </nav>


    @livewire('ui.tab-employés')


@endsection