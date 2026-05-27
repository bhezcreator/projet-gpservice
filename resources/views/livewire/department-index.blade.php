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
                <i class="las la-sitemap"></i>
                Gestion des départements
            </h2>
            <p>Créer, modifier et organiser les départements</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text"
                       placeholder="Rechercher un département..."
                       wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouveau département
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
                        <th>Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($departments as $department)
                        <tr>
                            <td data-label="#">
                                {{ ($departments->currentPage() - 1) * $departments->perPage() + $loop->iteration }}
                            </td>

                            <td data-label="Nom">
                                <i class="las la-building text-muted"></i>
                                {{ $department->name }}
                            </td>

                            <td data-label="Description">
                                {{ Str::limit($department->description, 50) ?? '-' }}
                            </td>

                            <td class="text-end">
                                <button
                                    wire:click="openModal({{ $department->id }})"
                                    class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>

                                <button
                                    wire:click="askDelete({{ $department->id }})"
                                    class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>

                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer département"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucun département trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$departments" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Département" size="md">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.input
                label="Nom du département"
                wire:model.defer="name"
                required
            />

            <x-form.textarea
                label="Description"
                wire:model.defer="description"
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
