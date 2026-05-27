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
                <i class="las la-graduation-cap"></i>
                Gestion des formations
            </h2>
            <p>Créer, modifier et organiser les formations</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text"
                       placeholder="Rechercher une formation..."
                       wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouvelle formation
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
                        <th>Dates</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($trainings as $training)
                        <tr>
                            <td data-label="#">
                                {{ ($trainings->currentPage() - 1) * $trainings->perPage() + $loop->iteration }}
                            </td>

                            <td data-label="Nom">
                                <i class="las la-graduation-cap text-muted"></i>
                                {{ $training->title }}
                            </td>

                            <td data-label="Dates">
                                {{ $training->start_date->format('d/m/Y') }} - {{ $training->end_date->format('d/m/Y') }}
                            </td>

                            <td class="text-end">
                                <button
                                    wire:click="openModal({{ $training->id }})"
                                    class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>

                                <button
                                    wire:click="askDelete({{ $training->id }})"
                                    class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>

                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer formation"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer"
                                    wire:click="delete" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucune formation trouvée
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$trainings" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Formation" size="md">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.input
                label="Titre de la formation"
                wire:model.defer="title"
                required
            />

            <x-form.input
                label="Date de début"
                type="date"
                wire:model.defer="start_date"
                required
            />

            <x-form.input
                label="Date de fin"
                type="date"
                wire:model.defer="end_date"
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
