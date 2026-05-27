@extends('layouts.errors')

@section('title') {{ 'Trop de requêtes' }} @endsection

@section('content')
<div class="container">
    <div class="error-code">429</div>
    <div class="error-message">
        Trop de requêtes envoyées. Veuillez réessayer plus tard.
    </div>

    <a href="{{ url()->previous() }}" class="btn-home">
        <i class="la la-arrow-left"></i> Retour à la page précédente
    </a>
</div>
@endsection
