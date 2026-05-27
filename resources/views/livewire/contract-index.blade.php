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
                <i class="las la-briefcase"></i>
                Gestion des contrats
            </h2>
            <p>Créer et gérer les contrats des employés</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text" placeholder="Rechercher un contrat..." wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouveau contrat
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
                        <th>Employé</th>
                        <th>Type</th>
                        <th>Projet</th>
                        <th>Salaire</th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($contracts as $contract)
                        <tr>
                            <td data-label="#"> {{ ($contracts->currentPage() - 1) * $contracts->perPage() + $loop->iteration }} </td>
                            <td data-label="Employé"> {{ $contract->employee->name ?? '-' }} </td>
                            <td data-label="Type"> {{ $contract->type }} </td>
                            <td data-label="Projet"> {{ $contract->project->name ?? '-' }} </td>
                            <td data-label="Salaire"> {{ $contract->salary ? number_format($contract->salary, 0, ',', ' ') . ' FC' : '-' }} </td>
                            <td data-label="Début"> {{ $contract->start_date }} </td>
                            <td data-label="Fin"> {{ $contract->end_date ?? '-' }} </td>
                            <td class="text-end">
                                <button wire:click="openModal({{ $contract->id }})" class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>
                                <button wire:click="askDelete({{ $contract->id }})" class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>
                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer contrat"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucun contrat trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$contracts" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Contrat" size="md">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.select
                label="Employé"
                :options="$employees->mapWithKeys(fn($e) => [$e->id => $e->first_name . ' ' . $e->last_name])"
                wire:model.defer="employee_id"
                required
            />

            <x-form.input
                label="Type de contrat"
                wire:model.defer="type"
                required
            />

            <x-form.select
                label="Projet"
                :options="$projects->pluck('name', 'id')"
                wire:model.defer="project_id"
            />

            <x-form.input
                type="number"
                step="0.01"
                label="Salaire"
                wire:model.defer="salary"
            />

            <x-form.input
                type="date"
                label="Date de début"
                wire:model.defer="start_date"
                required
            />

            <x-form.input
                type="date"
                label="Date de fin"
                wire:model.defer="end_date"
            />

            <div class="form-actions">
                <button class="btn btn-primary">
                    <i class="las la-save"></i> Sauvegarder
                </button>

                <button type="button" wire:click="closeModal" class="btn btn-secondary">
                    Annuler
                </button>
            </div>
        </form>
    </x-modal>
</div>
