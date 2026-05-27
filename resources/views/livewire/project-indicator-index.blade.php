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
                <i class="las la-chart-line"></i>
                Indicateurs du projet : {{ $project->name ?? '' }}
            </h2>
            <p>Suivi des indicateurs de performance</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text"
                       placeholder="Rechercher un indicateur..."
                       wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouvel indicateur
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
                        <th>Unité</th>
                        <th>Cible</th>
                        <th>Réalisé</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($indicators as $indicator)
                        <tr>
                            <td>{{ ($indicators->currentPage()-1)*$indicators->perPage()+$loop->iteration }}</td>
                            <td>{{ $indicator->name }}</td>
                            <td>{{ $indicator->unit ?? '-' }}</td>
                        <td>
                            {{ is_numeric($indicator->target)
                                ? rtrim(rtrim(number_format($indicator->target, 0, ',', ' '), '0'), ',')
                                : '-' }}
                        </td>

                        <td>
                            {{ is_numeric($indicator->actual)
                                ? rtrim(rtrim(number_format($indicator->actual, 0, ',', ' '), '0'), ',')
                                : '-' }}
                        </td>

                            <td class="text-end">
                                <button wire:click="openModal({{ $indicator->id }})"
                                        class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>

                                <button wire:click="askDelete({{ $indicator->id }})"
                                        class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>

                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer l’indicateur"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Aucun indicateur trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$indicators" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Indicateur du projet" size="md">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.input label="Nom de l’indicateur" wire:model.defer="name" required />
            <x-form.input label="Unité (%, FC, jours…)" wire:model.defer="unit" />
            <x-form.input type="number" step="0.01" label="Valeur cible" wire:model.defer="target" />
            <x-form.input type="number" step="0.01" label="Valeur actuelle" wire:model.defer="actual" />

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
