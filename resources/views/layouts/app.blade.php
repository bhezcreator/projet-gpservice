<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>GPS - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Line Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    </head>
    <body>
        <!-- Loader -->
        <div id="loader">
            <div class="spinner"></div>
            <div class="loader-text">Chargement...</div>
            <i class="la la-rocket la-2x" style="margin-top: 1rem; color: var(--primary); animation: bounce 1s infinite;"></i>
        </div>

        <header class="topbar">
            <div class="left">
                <div class="logo">
                    <!-- <img src="logo.png" alt="Logo"> -->
                    <i class="la la-chart-pie"></i>
                    <span>GP-SERVICES</span>
                </div>

                <button id="menuToggle" class="icon-btn bars">
                    <i class="la la-bars"></i>
                </button>
            </div>

            <div class="center">
                <input type="search" placeholder="Recherche...">
            </div>

            <div class="right">
                <button id="themeToggle" class="icon-btn">
                    <i class="la la-moon"></i>
                </button>
                <!-- SETTINGS (lien) -->
                <a href="{{ route('notifications') }}" class="icon-link" title="Paramètres">
                    <i class="la la-cog"></i>
                </a>

                <!-- NOTIFICATIONS -->
                <div class="icon-wrapper">
                    <i class="la la-bell"></i>
                    <span class="badge-noti">3</span>
                </div>

                <!-- USER MENU -->
                <div class="user-menu" id="userMenu">
                    <i class="la la-user-circle" id="userToggle"></i>

                    <div class="dropdown">
                        <strong>{{ auth()->user()->name }}</strong>
                        {{-- <small>{{ auth()->user()->getRoleNames()->first() }}</small> --}}

                        <hr>

                        <form method="POST" action="{{ route('logout') }}" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="logout">
                                <i class="la la-sign-out-alt"></i> Déconnexion
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </header>

        @include('partials.nav')

        <main class="container">
            @yield('content')
        </main>
        <script src="{{ asset('assets/js/app.js') }}"></script>
    </body>
</html>
