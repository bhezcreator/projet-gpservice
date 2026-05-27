@extends('layouts.errors')

@section('title') {{ 'Erreur serveur' }} @endsection

@section('content')
<div class="container">
    <div class="error-code">500</div>
    <div class="error-message">
        Une erreur interne est survenue. Veuillez réessayer plus tard.
    </div>

    <a href="{{ url()->previous() }}" class="btn-home">
        <i class="la la-arrow-left"></i> Retour à la page précédente
    </a>
</div>
@endsection
