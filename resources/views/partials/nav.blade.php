<nav class="menu" id="menu">
    <a href="{{ route('home') }}" class="button {{ request()->routeIs('home') ? 'active' : '' }}">
        <i class="la la-home"></i> Tableau de bord
    </a>
    <a href="{{ route('employees.index') }}" class="button {{ request()->routeIs('employees.*') ? 'active' : '' }}">
        <i class="la la-users"></i> Employés
    </a>
    <a href="{{ route('departments') }}" class="button {{ request()->routeIs('departments') ? 'active' : '' }}">
        <i class="la la-sitemap"></i> Départements & postes
    </a>

    <a href="{{ route('attendance') }}" class="button {{ request()->routeIs('attendance') ? 'active' : '' }}">
        <i class="la la-calendar-check"></i> Présences / Absences
    </a>
    <a href="{{ route('benefits.index') }}" class="button {{ request()->routeIs('benefits.*') ? 'active' : '' }}">
        <i class="la la-gift"></i> Primes
    </a>
    <a href="{{ route('training') }}" class="button {{ request()->routeIs('training') ? 'active' : '' }}">
        <i class="la la-graduation-cap"></i> Formations & Évaluations
    </a>
    <a href="{{ route('projects.index') }}" class="button {{ request()->routeIs('projects.*') ? 'active' : '' }}">
        <i class="la la-tasks"></i> Projets / Donateurs 
    </a>
    <a href="{{ route('finances') }}" class="button {{ request()->routeIs('finances') ? 'active' : '' }}">
        <i class="la la-money-bill"></i> Finance
    </a>
    <a href="{{ route('timesheets') }}" class="button {{ request()->routeIs('timesheets') ? 'active' : '' }}">
        <i class="la la-clock"></i> Feuille de temps
    </a>
</nav>
