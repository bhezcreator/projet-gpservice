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
                <i class="las la-clipboard-list"></i>
                Gestion des évaluations
            </h2>
            <p>Créer, modifier et organiser les évaluations</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text"
                       placeholder="Rechercher par employé ou score..."
                       wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouvelle évaluation
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
                        <th>Date</th>
                        <th>Score</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($evaluations as $evaluation)
                        <tr>
                            <td data-label="#">
                                {{ ($evaluations->currentPage() - 1) * $evaluations->perPage() + $loop->iteration }}
                            </td>

                            <td data-label="Employé">
                                <i class="las la-user text-muted"></i>
                                {{ $evaluation->employee->first_name.' '.$evaluation->employee->last_name ?? '-' }}
                            </td>

                            <td data-label="Date">
                                {{ \Carbon\Carbon::parse($evaluation->evaluation_date)->format('d/m/Y') }}
                            </td>

                            <td data-label="Score">
                                {{ $evaluation->score }}
                            </td>

                            <td class="text-end">
                                <button wire:click="openModal({{ $evaluation->id }})" class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>

                                <button wire:click="askDelete({{ $evaluation->id }})" class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>

                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer évaluation"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer"
                                    wire:click="delete" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucune évaluation trouvée
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$evaluations" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Évaluation" size="md">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.select
                label="Employé"
                wire:model.defer="employee_id"
                :options="$employees->mapWithKeys(fn($e) => [$e->id => $e->first_name . ' ' . $e->last_name])"
                required
            />

            <x-form.input
                label="Date de l'évaluation"
                type="date"
                wire:model.defer="evaluation_date"
                required
            />

            <x-form.input
                label="Score"
                type="number"
                min="0"
                max="100"
                wire:model.defer="score"
                required
            />

            <x-form.textarea
                label="Commentaires"
                wire:model.defer="comments"
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
