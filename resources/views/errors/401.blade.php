@extends('layouts.errors')

@section('title') {{ 'Erreur 401' }} @endsection

@section('content')
<div class="container">
    <div class="error-code">401</div>
    <div class="error-message">
        Vous devez être authentifié pour accéder à cette page.
    </div>

    <a href="{{ url()->previous() }}" class="btn-home">
        <i class="la la-arrow-left"></i> Retour à la page précédente
    </a>
</div>
@endsection
