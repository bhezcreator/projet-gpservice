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
                Gestion des postes
            </h2>
            <p>Créer et gérer les postes de l’organisation</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text"
                    placeholder="Rechercher un poste..."
                    wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouveau poste
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
                        <th>Poste</th>
                        <th>Grade</th>
                        <th>Salaire de base</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($positions as $position)
                        <tr>
                            {{-- Auto-increment visuel --}}
                            <td data-label="#">
                                {{ ($positions->currentPage() - 1) * $positions->perPage() + $loop->iteration }}
                            </td>

                            <td data-label="Poste">
                                <i class="las la-user-tie text-muted"></i>
                                {{ $position->title }}
                            </td>

                            <td data-label="Grade">
                                {{ $position->grade ?? '-' }}
                            </td>

                            <td data-label="Salaire de base">
                                {{ $position->base_salary
                                    ? number_format($position->base_salary, 0, ',', ' ') . ' FC'
                                    : '-' }}
                            </td>

                            <td class="text-end">
                                <button
                                    wire:click="openModal({{ $position->id }})"
                                    class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>

                                <button
                                    wire:click="askDelete({{ $position->id }})"
                                    class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>

                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer poste"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucun poste trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$positions" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Poste" size="md">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.input
                label="Intitulé du poste"
                wire:model.defer="title"
                required
            />

            <x-form.input
                label="Grade"
                wire:model.defer="grade"
            />

            <x-form.input
                type="number"
                step="0.01"
                label="Salaire de base"
                wire:model.defer="base_salary"
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
