@extends('layouts.auth')
@section('title') {{ 'Inscription' }} @endsection
@section('content')
    <div class="container">
        <h1>Créer un compte</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Nom complet" value="{{ old('name') }}" required autofocus>
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <input type="email" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <input type="password" name="password" placeholder="Mot de passe" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>

            <button type="submit">S'inscrire</button>
        </form>

        <div style="margin-top: 1rem;">
            <a href="{{ route('login') }}">Déjà un compte ? Se connecter</a>
        </div>
    </div>
@endsection
