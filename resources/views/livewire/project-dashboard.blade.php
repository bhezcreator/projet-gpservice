<div class="dashboard-wrapper">

    {{-- HEADER --}}
    <div class="banner mb-4">
        <div class="banner-left">
            <h2>
                <i class="las la-project-diagram"></i>
                Dashboard — {{ $this->project->name }}
            </h2>
            <p>Donateur : {{ $this->project->donor->name ?? '-' }}</p>
        </div>
    </div>

    {{-- STATS --}}
    <div class="stats-row mb-4">
        <div class="stat-card-wrapper">
            <div class="stat-card">
                <h6 class="stat-title">Budget total</h6>
                <h3 class="stat-value">{{ number_format($this->stats['total_budget'], 0, ',', ' ') }} $</h3>
            </div>
        </div>

        <div class="stat-card-wrapper">
            <div class="stat-card">
                <h6 class="stat-title">Budget consommé</h6>
                <h3 class="stat-value">{{ number_format($this->stats['activities_budget'], 0, ',', ' ') }} $</h3>
            </div>
        </div>

        <div class="stat-card-wrapper">
            <div class="stat-card">
                <h6 class="stat-title">Exécution budgétaire</h6>
                <h3 class="stat-value">{{ $this->stats['execution_rate'] }} %</h3>
            </div>
        </div>

        <div class="stat-card-wrapper">
            <div class="stat-card">
                <h6 class="stat-title">Avancement</h6>
                <h3 class="stat-value">{{ $this->stats['progress_rate'] }} %</h3>
            </div>
        </div>
    </div>

    {{-- CHARTS --}}
    <div class="charts-row mb-4">
        <div class="chart-card">
            <canvas id="budgetChart"></canvas>
        </div>
        <div class="chart-card">
            <canvas id="statusChart"></canvas>
        </div>
    </div>

    {{-- TABLE ACTIVITÉS --}}
    <div class="table-card custom-table-card">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Activité</th>
                    <th>Budget</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @forelse($this->activities as $activity)
                    <tr>
                        <td>{{ $activity->code }}</td>
                        <td>{{ $activity->title }}</td>
                        <td>{{ number_format($activity->budget, 0, ',', ' ') }} $</td>
                        <td>
                            <span class="badge badge-status {{ strtolower($activity->status) }}">
                                {{ $activity->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Aucune activité
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- CHART JS --}}
    <script>
        document.addEventListener('livewire:init', () => {
            const budgetData = @json($this->chartData['budget']);
            const statusData = @json($this->chartData['status']);

            new Chart(document.getElementById('budgetChart'), {
                type: 'doughnut',
                data: {
                    labels: budgetData.labels,
                    datasets: [{
                        data: budgetData.data,
                        backgroundColor: ['#4CAF50', '#E0E0E0'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });

            new Chart(document.getElementById('statusChart'), {
                type: 'bar',
                data: {
                    labels: statusData.labels,
                    datasets: [{
                        label: 'Nombre d\'activités',
                        data: statusData.data,
                        backgroundColor: '#2196F3'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    </script>

</div>
