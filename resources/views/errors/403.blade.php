@extends('layouts.errors')

@section('title') {{ 'Erreur 403' }} @endsection

@section('content')
<div class="container">
    <div class="error-code">403</div>
    <div class="error-message">
        Accès refusé. Vous n'avez pas les permissions nécessaires.
    </div>

    <a href="{{ url()->previous() }}" class="btn-home">
        <i class="la la-arrow-left"></i> Retour à la page précédente
    </a>
</div>
@endsection
