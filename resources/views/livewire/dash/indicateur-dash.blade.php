<div class="indic-wrapper-indic">

    {{-- Loader --}}
    <div
        wire:loading
        wire:target="loadIndicators"
        class="loader-overlay"
    >
        <div class="loader-spinner"></div>
    </div>

    <h2 class="indic-title-indic"><i class="las la-thumbtack"></i>
        Indicateurs clés</h2>

    <div class="indic-grid-indic">

        <div class="indic-card-indic indic-warning-indic">
            <p>Contrats expirant</p>
            <h3>{{ $contractsExpiring }}</h3>
            <span>30 prochains jours</span>
        </div>

        <div class="indic-card-indic indic-info-indic">
            <p>Formations à venir</p>
            <h3>{{ $upcomingTrainings }}</h3>
            <span>Planifiées</span>
        </div>

        <div class="indic-card-indic indic-danger-indic">
            <p>Absences récentes</p>
            <h3>{{ $recentAbsences }}</h3>
            <span>7 derniers jours</span>
        </div>

        <div class="indic-card-indic indic-primary-indic">
            <p>Timesheets soumis</p>
            <h3>{{ $submittedTimesheets }}</h3>
            <span>Validations en attente</span>
        </div>

        <div class="indic-card-indic indic-success-indic">
            <p>Documents ajoutés</p>
            <h3>{{ $recentDocuments }}</h3>
            <span>7 derniers jours</span>
        </div>

    </div>
</div>
