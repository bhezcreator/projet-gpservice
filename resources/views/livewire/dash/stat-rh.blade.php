<div class="stat-rh-wrapper">
    <h2 class="stat-rh-title"><i class="las la-chart-bar"></i>

 Statistiques RH</h2>

    <div class="stat-rh-grid">
        <!-- Employés actifs -->
        <div class="stat-rh-card stat-rh-success">
            <p class="stat-rh-label">Employés actifs</p>
            <h3 class="stat-rh-value">{{ $employeesActive }}</h3>
        </div>

        <!-- Employés inactifs -->
        <div class="stat-rh-card stat-rh-danger">
            <p class="stat-rh-label">Employés inactifs</p>
            <h3 class="stat-rh-value">{{ $employeesInactive }}</h3>
        </div>

        <!-- Bénévoles -->
        <div class="stat-rh-card stat-rh-info">
            <p class="stat-rh-label">Bénévoles</p>
            <h3 class="stat-rh-value">{{ $employeesVolunteer }}</h3>
        </div>

        <!-- Congés -->
        <div class="stat-rh-card stat-rh-warning">
            <p class="stat-rh-label">Congés en cours</p>
            <h3 class="stat-rh-value">{{ $leavesInProgress }}</h3>
        </div>

        <!-- Primes -->
        <div class="stat-rh-card stat-rh-primary">
            <p class="stat-rh-label">Primes disponibles</p>
            <h3 class="stat-rh-value">{{ $totalBenefits }}</h3>
        </div>

        <div class="stat-rh-card stat-rh-primary">
            <p class="stat-rh-label">Montant total primes</p>
            <h3 class="stat-rh-value">{{ number_format($totalBenefitsAmount, 0) }} $</h3>
        </div>

        <div class="stat-rh-card stat-rh-primary">
            <p class="stat-rh-label">Employés bénéficiaires</p>
            <h3 class="stat-rh-value">{{ $employeesWithBenefits }}</h3>
        </div>
    </div>
</div>
