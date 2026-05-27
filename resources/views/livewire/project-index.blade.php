<div>
    {{-- Alert --}}
    @if (session()->has('success'))
        <div class="alert-success-u" id="successAlert">
            <span class="alert-icon">✔️</span>
            <span class="alert-message">{{ session('success') }}</span>
            <button class="alert-close"
                onclick="document.getElementById('successAlert').style.display='none'">&times;</button>
        </div>
    @endif

    {{-- BANNER --}}
    <div class="banner">
        <div class="banner-left">
            <h2>
                <i class="las la-project-diagram"></i>
                Gestion des projets
            </h2>
            <p>Créer et gérer les projets</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text"
                       placeholder="Rechercher un projet..."
                       wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouveau projet
            </button>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="table-card">
        <div class="table-responsive">
            <table class="table-ui">
                <thead class="table-ui__head">
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Projet</th>
                        <th>Bailleur</th>
                        <th>Budget RH</th>
                        <th>Budget total</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($projects as $project)
                        <tr>
                            <td>
                                {{ ($projects->currentPage() - 1) * $projects->perPage() + $loop->iteration }}
                            </td>

                            <td>{{ $project->code }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->donor->name ?? '-' }}</td>
                            <td>
                                {{ $project->hr_budget
                                    ? number_format($project->hr_budget, 0, ',', ' ') . ' $'
                                    : '-' }}
                            </td>

                            <td>
                                {{ $project->total_budget
                                    ? number_format($project->total_budget, 0, ',', ' ') . ' $'
                                    : '-' }}
                            </td>
                            <td>
                                <span class="badge {{ $project->status === 'Actif' ? 'badge-success' : 'badge-warning' }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </td>

                            <td class="text-end">
                                <a href="{{ route('projects.dashboard', [$project->id]) }}" class="btn btn-action"> <i class="las la-chart-line"></i></a>
                                <a href="{{ route('projects.indicateur', [$project->id]) }}" class="btn btn-action"> <i class="las la-list"></i></a>
                                <button wire:click="openModal({{ $project->id }})"
                                        class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>

                                <button wire:click="askDelete({{ $project->id }})"
                                        class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>

                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer projet"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucun projet trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$projects" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Projet" size="xl">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.input label="Code projet" wire:model.defer="code" required />
            <x-form.input label="Nom du projet" wire:model.defer="name" required />

            <x-form.textarea label="Description" wire:model.defer="description" />

            <x-form.select
                label="Bailleur"
                wire:model.defer="donor_id"
                :options="$donors->pluck('name','id')"
                required />

            <x-form.input type="number" label="Budget total" wire:model.defer="total_budget" />
            <x-form.input type="number" label="Budget RH" wire:model.defer="hr_budget" />

            <x-form.input type="date" label="Date début" wire:model.defer="start_date" required />
            <x-form.input type="date" label="Date fin" wire:model.defer="end_date" />

            <x-form.select
                label="Statut"
                wire:model.defer="status"
                :options="[
                    'Planning' => 'Planning',
                    'Actif' => 'Actif',
                    'Terminé' => 'Terminé',
                    'Suspendu' => 'Suspendu'
                ]"
                required />

            <div class="form-actions">
                <button class="btn btn-primary">
                    <i class="las la-save"></i> Sauvegarder
                </button>

                <button type="button"
                        wire:click="closeModal"
                        class="btn btn-secondary">
                    Annuler
                </button>
            </div>
        </form>
    </x-modal>
</div>
