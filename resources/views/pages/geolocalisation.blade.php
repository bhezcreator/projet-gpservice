@extends('layouts.app')
@section('title') {{ 'Géolocalisation' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li class="active">Géolocalisation</li>
        </ul>
    </nav>

    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi,
        magni voluptatum consequatur ut molestias ullam quisquam minus eos veniam est quidem pariatur 
        dolor placeat labore magnam ducimus atque enim? Delectus.
    </p>

@endsection