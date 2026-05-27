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
                <i class="las la-wallet"></i>
                Gestion des budgets RH
            </h2>
            <p>Créer, modifier et suivre les budgets alloués</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text"
                       placeholder="Rechercher un budget..."
                       wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouveau budget
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
                        <th>Projet</th>
                        <th>Montant alloué</th>
                        <th>Montant utilisé</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($budgets as $budget)
                        <tr>
                            <td data-label="#">{{ ($budgets->currentPage() - 1) * $budgets->perPage() + $loop->iteration }}</td>
                            <td data-label="Projet">{{ $budget->project->name ?? '—' }}</td>
                            <td data-label="Montant alloué">{{ number_format($budget->allocated_amount, 0, ',', ' ') }} $</td>
                            <td data-label="Montant utilisé">{{ number_format($budget->used_amount, 0, ',', ' ') }} $</td>
                            <td class="text-end">
                                <button wire:click="openModal({{ $budget->id }})" class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>
                                <button wire:click="askDelete({{ $budget->id }})" class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>
                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer budget"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer"
                                    wire:click="confirm" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucun budget trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$budgets" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Budget RH" size="md">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.select
                label="Projet"
                :options="$projects->pluck('name', 'id')"
                wire:model.live="project_id"
                required
            />

            <x-form.input
                label="Montant alloué"
                type="number"
                step="0.01"
                wire:model.defer="allocated_amount"
                :disabled="!$project_id"
                required
            />

            <x-form.input
                label="Montant utilisé"
                type="number"
                step="0.01"
                wire:model.defer="used_amount"
                required
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
