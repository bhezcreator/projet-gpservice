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
                <i class="las la-tasks"></i>
                Gestion des activités
            </h2>
            <p>Créer et gérer les activités des projets</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text"
                       placeholder="Rechercher une activité..."
                       wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouvelle activité
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
                        <th>Activité</th>
                        <th>Projet</th>
                        <th>Budget</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($activities as $activity)
                        <tr>
                            <td>
                                {{ ($activities->currentPage() - 1) * $activities->perPage() + $loop->iteration }}
                            </td>

                            <td>{{ $activity->code }}</td>
                            <td>{{ $activity->title }}</td>
                            <td>{{ $activity->project->name ?? '-' }}</td>
                            <td>
                                {{ $activity->budget
                                    ? number_format($activity->budget, 0, ',', ' ') . ' $'
                                    : '-' }}
                            </td>
                            <td>
                                <span class="badge badge-info">
                                    {{ ucfirst($activity->status) }}
                                </span>
                            </td>

                            <td class="text-end">
                                <button wire:click="openModal({{ $activity->id }})"
                                        class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>

                                <button wire:click="askDelete({{ $activity->id }})"
                                        class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>

                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer activité"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucune activité trouvée
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$activities" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Activité" size="xl">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.select
                label="Projet"
                wire:model.defer="project_id"
                :options="$projects->pluck('name','id')"
                required
            />

            <x-form.input label="Code activité" wire:model.defer="code" required />
            <x-form.input label="Titre de l’activité" wire:model.defer="title" required />

            <x-form.textarea label="Description" wire:model.defer="description" />

            <x-form.input type="number" label="Budget" wire:model.defer="budget" />

            <x-form.input type="date" label="Date début" wire:model.defer="start_date" required />
            <x-form.input type="date" label="Date fin" wire:model.defer="end_date" />

            <x-form.select
                label="Statut"
                wire:model.defer="status"
                :options="[
                    'Planning' => 'Planning',
                    'En cours' => 'En cours',
                    'Terminée' => 'Terminée',
                    'Suspendue' => 'Suspendue'
                ]"
                required
            />

            <!-- Nouvelle section : sélection multiple des employés -->
            <x-form.select
                label="Attribuer aux employés"
                wire:model.defer="selectedEmployees"
                :options="$employees->mapWithKeys(fn($e) => [$e->id => $e->first_name . ' ' . $e->last_name])"
                multiple
            />

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
