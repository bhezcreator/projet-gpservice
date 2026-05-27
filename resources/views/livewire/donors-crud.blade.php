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
                <i class="las la-hand-holding-heart"></i>
                Gestion des donateurs
            </h2>
            <p>Créer, modifier et organiser les donateurs</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text"
                       placeholder="Rechercher un donateur..."
                       wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouveau donateur
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
                        <th>Nom</th>
                        <th>Pays</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($donors as $donor)
                        <tr>
                            <td data-label="#">{{ ($donors->currentPage() - 1) * $donors->perPage() + $loop->iteration }}</td>
                            <td data-label="Nom">{{ $donor->name }}</td>
                            <td data-label="Pays">{{ $donor->country }}</td>
                            <td class="text-end">
                                <button wire:click="openModal({{ $donor->id }})" class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>
                                <button wire:click="askDelete({{ $donor->id }})" class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>
                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer donateur"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer"
                                    wire:click="confirm" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucun donateur trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$donors" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Donateur" size="md">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.input
                label="Nom"
                wire:model.defer="name"
                required
            />

            <x-form.input
                label="Pays"
                wire:model.defer="country"
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
