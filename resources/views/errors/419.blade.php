@extends('layouts.errors')

@section('title') {{ 'Session expirée' }} @endsection

@section('content')
<div class="container">
    <div class="error-code">419</div>
    <div class="error-message">
        Votre session a expiré. Veuillez vous reconnecter.
    </div>

    <a href="{{ route('login') }}" class="btn-home">
        <i class="la la-sign-in-alt"></i> Se reconnecter
    </a>
</div>
@endsection
