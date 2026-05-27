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
            <h2><i class="las la-gift"></i> Gestion des avantages</h2>
            <p>Créer, modifier et organiser les avantages des employés</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text" placeholder="Rechercher un avantage..."
                       wire:model.live="search">
                <button type="button"><i class="las la-search"></i></button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i> Nouveau avantage
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
                        <th>Montant</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($benefits as $benefit)
                        <tr>
                            <td>{{ ($benefits->currentPage() - 1) * $benefits->perPage() + $loop->iteration }}</td>
                            <td>{{ $benefit->name }}</td>
                            <td>{{ number_format($benefit->amount, 0).'$' }}</td>
                            <td class="text-end">
                                <a href="{{ route('benefits.employees',[$benefit]) }}" class="btn btn-action"> <i class="las la-list"></i></a>
                                <button wire:click="openModal({{ $benefit->id }})" class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>
                                <button wire:click="askDelete({{ $benefit->id }})" class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>
                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer avantage"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                <i class="las la-info-circle"></i> Aucun avantage trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$benefits" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Avantage" size="md">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.input
                label="Nom de l'avantage"
                wire:model.defer="name"
                required
            />

            <x-form.input
                label="Montant"
                type="number"
                step="0.01"
                wire:model.defer="amount"
                required
            />

            <div class="form-actions">
                <button class="btn btn-primary"><i class="las la-save"></i> Sauvegarder</button>
                <button type="button" wire:click="closeModal" class="btn btn-secondary">Annuler</button>
            </div>
        </form>
    </x-modal>
</div>
