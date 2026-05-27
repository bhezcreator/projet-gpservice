<div class="dash-budget-cs">
    <h2 class="indic-title-indic">
        <i class="la la-tasks"></i>
        Indicateurs des projets
    </h2>

    <section class="dash-budget-cards">
            <!-- Budget -->
        <div class="dash-budget-card">
            <h3>Budget Projet vs Dépensé</h3>

            <div class="dash-budget-bar">
                <span style="width: {{ $this->budgetPercent }}%"></span>
            </div>

            <p class="dash-budget-text">
                Dépensé :
                <strong>{{ number_format($totalHrBudget, 2) }}</strong><br>
                Budget Total :
                <strong>{{ number_format($totalBudget, 2) }}</strong>
            </p>
        </div>

        <!-- Stats projets -->
        <div class="dash-budget-card">
            <h3>Projets</h3>

            <ul class="dash-budget-stats">
                <li>{{ $activeProjects }} <span class="up">▲</span> Actifs</li>
                <li>{{ $pendingProjects }} <span class="down">▼</span> En attente</li>
                <li>{{ $completedProjects }} <span class="up">▲</span> Terminés</li>
            </ul>
        </div>

        <!-- Performance -->
        <div class="dash-budget-card dash-budget-center">
            <h3>Performance Budget</h3>
            <div class="dash-budget-circle">
                {{ $this->budgetPercent }}%
            </div>
        </div>
    </section>
</div>
