@extends('layouts.app')
@section('title') {{ 'Paramètres' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li class="active">Paramètres</li>
        </ul>
    </nav>

    <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit perferendis recusandae eos ipsum, facilis vitae consequuntur cum nesciunt. Cupiditate modi ipsa accusamus autem at asperiores quia natus molestiae quis cum?
    </p>

@endsection