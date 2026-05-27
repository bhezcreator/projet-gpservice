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
                <i class="las la-file-alt"></i>
                Gestion des documents
            </h2>
            <p>Créer, modifier et organiser les documents</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text"
                       placeholder="Rechercher un document..."
                       wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i>
                Nouveau document
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
                        <th>Type</th>
                        <th>Employé</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($documents as $document)
                        <tr>
                            <td data-label="#">{{ ($documents->currentPage() - 1) * $documents->perPage() + $loop->iteration }}</td>
                            <td data-label="Nom">{{ $document->name }}</td>
                            <td data-label="Type">{{ $document->type }}</td>
                            <td data-label="Employé">
                                {{ optional($document->employee)->first_name . ' ' . optional($document->employee)->last_name ?? '—' }}
                            </td>

                            <td class="text-end">
                                <button wire:click="openModal({{ $document->id }})" class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </button>
                                <button wire:click="askDelete({{ $document->id }})" class="btn btn-action btn-danger">
                                    <i class="las la-trash"></i>
                                </button>
                                <x-confirm-modal
                                    wire:model="confirmDelete"
                                    title="Supprimer document"
                                    message="Cette action est irréversible"
                                    confirmText="Oui, supprimer"
                                    wire:click="confirm" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucun document trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$documents" />
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Document" size="md">
        <form class="form-grid" wire:submit.prevent="save">

            <x-form.select
                label="Employé"
                :options="$employees->mapWithKeys(fn($e) => [$e->id => $e->first_name . ' ' . $e->last_name])"
                wire:model.defer="employee_id"
                required
            />

            <x-form.input
                label="Nom du document"
                wire:model.defer="name"
                required
            />

            <x-form.select
                label="Type de document"
                wire:model.defer="type"
                :options="[
                    'contrat' => 'Contrat',
                    'cv' => 'CV',
                    'attestation' => 'Attestation',
                    'rapport' => 'Rapport',
                    'lettre_officielle' => 'Lettre officielle',
                    'formulaire' => 'Formulaire',
                    'facture' => 'Facture',
                    'projet' => 'Projet',
                    'Autre' => 'Autre'
                ]"
                placeholder="Sélectionnez un type"
                required
            />

            <x-form.input
                label="Fichier"
                type="file"
                wire:model="file_path"
            />

            <div class="form-radio">
                <input type="radio" value="Archivé" wire:model.defer="is_archived"> Archivé
            </div>

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
