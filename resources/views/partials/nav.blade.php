<nav class="menu" id="menu">
    <a href="{{ route('home') }}" class="button {{ request()->routeIs('home') ? 'active' : '' }}">
        <i class="la la-home"></i> <span class="nav-cache-text">Accueil</span>
    </a>

    <a href="{{ route('clients') }}" class="button {{ request()->routeIs('clients') ? 'active' : '' }}">
        <i class="la la-gift"></i>  <span class="nav-cache-text">clients</span>
    </a>

    <a href="{{ route('contrats') }}" class="button {{ request()->routeIs('contrats') ? 'active' : '' }}">
        <i class="la la-graduation-cap"></i>  <span class="nav-cache-text">contrats</span>
    </a>

    <a href="{{ route('commerciale') }}" class="button {{ request()->routeIs('commerciale') ? 'active' : '' }}">
        <i class="la la-users"></i>  <span class="nav-cache-text">commerciale</span>
    </a>

    <a href="{{ route('missions') }}" class="button {{ request()->routeIs('missions') ? 'active' : '' }}">
        <i class="la la-sitemap"></i>  <span class="nav-cache-text">missions</span>
    </a>

    <a href="{{ route('interventions') }}" class="button {{ request()->routeIs('interventions') ? 'active' : '' }}">
        <i class="la la-calendar-check"></i>  <span class="nav-cache-text">interventions</span>
    </a>

    <a href="{{ route('finance') }}" class="button {{ request()->routeIs('finance') ? 'active' : '' }}">
        <i class="la la-tasks"></i> <span class="nav-cache-text">finance</span>
    </a>

    <a href="{{ route('logistique') }}" class="button {{ request()->routeIs('logistique') ? 'active' : '' }}">
        <i class="la la-money-bill"></i>  <span class="nav-cache-text">logistique</span>
    </a>

    <a href="{{ route('geolocalisation') }}" class="button {{ request()->routeIs('geolocalisation') ? 'active' : '' }}">
        <i class="la la-clock"></i>  <span class="nav-cache-text">geolocalisation</span>
    </a>

        <a href="{{ route('communication') }}" class="button {{ request()->routeIs('communication') ? 'active' : '' }}">
        <i class="la la-clock"></i>  <span class="nav-cache-text">communication</span>
    </a>

        <a href="{{ route('documents') }}" class="button {{ request()->routeIs('documents') ? 'active' : '' }}">
        <i class="la la-clock"></i>  <span class="nav-cache-text">documents</span>
    </a>

        <a href="{{ route('rapports') }}" class="button {{ request()->routeIs('rapports') ? 'active' : '' }}">
        <i class="la la-clock"></i>  <span class="nav-cache-text">rapports</span>
    </a>

        <a href="{{ route('administration') }}" class="button {{ request()->routeIs('administration') ? 'active' : '' }}">
        <i class="la la-clock"></i>  <span class="nav-cache-text">administration</span>
    </a>

        <a href="{{ route('parametres') }}" class="button {{ request()->routeIs('parametres') ? 'active' : '' }}">
        <i class="la la-clock"></i>  <span class="nav-cache-text">parametres</span>
    </a>
{{-- 
        <a href="{{ route('notifications') }}" class="button {{ request()->routeIs('notifications') ? 'active' : '' }}">
        <i class="la la-clock"></i>  <span class="nav-cache-text">notifications</span>
    </a> --}}
</nav>
