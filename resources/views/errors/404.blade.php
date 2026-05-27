@extends('layouts.errors')
@section('title') {{ 'Erreur 404' }} @endsection
@section('content')
    <div class="container">
        <div class="error-code">404</div>
        <div class="error-message">Oups ! La page que vous recherchez n'existe pas.</div>
        <a href="{{ url()->previous() }}" class="btn-home">
            <i class="la la-arrow-left"></i> Retour à la page précédente
        </a>
    </div>
@endsection