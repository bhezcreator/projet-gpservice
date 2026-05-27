@extends('layouts.auth')
@section('title') {{ 'Réinitialiser le mot de passe' }} @endsection
@section('content')
    <div class="container">
        <h1>Réinitialiser le mot de passe</h1>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <input type="email" name="email" placeholder="Votre adresse e-mail" value="{{ old('email', $request->email) }}" required autofocus>
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <input type="password" name="password" placeholder="Nouveau mot de passe" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>

            <button type="submit">Réinitialiser</button>
        </form>

        <div style="margin-top: 1rem;">
            <a href="{{ route('login') }}">Se connecter</a>
        </div>
    </div>
@endsection
