@extends('layouts.auth')
@section('title') {{ 'Connexion' }} @endsection
@section('content')

    <div class="container">
        <h1>Connexion</h1>

        @if(session('status'))
            <div class="error">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <input type="password" name="password" placeholder="Mot de passe" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <div style="text-align: left;">
                <label>
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </label>
            </div>

            <button type="submit">Se connecter</button>
        </form>

        <div style="margin-top: 1rem;">
            <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            <br>
            <a href="/">Quitter</a>
        </div>
    </div>
@endsection