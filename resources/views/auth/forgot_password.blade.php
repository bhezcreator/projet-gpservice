@extends('layouts.auth')
@section('title') {{ 'Mot de passe oublié' }} @endsection
@section('content')

    <div class="container">
        <h1>Mot de passe oublié</h1>

        @if(session('status'))
            <div class="error">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email" placeholder="Votre adresse e-mail" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <button type="submit">Envoyer le lien de réinitialisation</button>
        </form>

        <div style="margin-top: 1rem;">
            <a href="{{ route('login') }}">Se connecter</a>
        </div>
    </div>
@endsection
