@extends('layouts.app')
@section('title') {{ 'Employées' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li><a href="{{ route('employees.index') }}">Employés</a></li>
            <li class="active">Traitement de l'Employé</li>
        </ul>
    </nav>


    @livewire('employees.employee-form', [$employee])

@endsection