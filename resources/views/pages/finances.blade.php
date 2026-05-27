@extends('layouts.app')
@section('title') {{ 'Finance' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li class="active">Finances</li>
        </ul>
    </nav>

    @livewire('ui.tab-finance-donors')

@endsection