@extends('layouts.app')
@section('title') {{ 'Documents' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            {{-- <li><a href="{{ route('home') }}">Test</a></li> --}}
            <li class="active">Documents</li>
        </ul>
    </nav>

    

@endsection