<div>
    {{-- Alert --}}
    @if (session()->has('success'))
        <div class="alert-success-u" id="successAlert">
            <span class="alert-icon">✔️</span>
            <span class="alert-message">{{ session('success') }}</span>
            <button class="alert-close" onclick="document.getElementById('successAlert').style.display='none'">&times;</button>
        </div>
    @endif

    {{-- Banner --}}
    <div class="banner">
        <div class="banner-left">
            <h2>
                <i class="las la-user-shield"></i>
                Gestion des rôles
            </h2>
            <p>Créer, modifier et attribuer des permissions aux rôles</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text" placeholder="Rechercher un rôle..." wire:model.live="search">
                <button type="button"><i class="las la-search"></i></button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i> Nouveau rôle
            </button>
        </div>
    </div>

    {{-- Table --}}
    <div class="table-card">
        <div class="table-responsive">
            <table class="table-ui">
                <thead class="table-ui__head">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Permissions</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($roles as $role)
                        <tr>
                            <td>{{ ($roles->currentPage() - 1) * $roles->perPage() + $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->permissions->pluck('name')->join(', ') }}</td>
                            <td class="text-end">
                                <button wire:click="openModal({{ $role->id }})" class="btn btn-action"><i class="las la-edit"></i></button>
                                <button wire:click="askDelete({{ $role->id }})" class="btn btn-action btn-danger"><i class="las la-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted"><i class="las la-info-circle"></i> Aucun rôle trouvé</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$roles" />
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <x-modal wire:model="showModal" title="Rôle" size="md">
        <form class="form-grid" wire:submit.prevent="save">
            <x-form.input label="Nom du rôle" wire:model.defer="name" required />

            <div class="form-group">
                <label>Permissions</label>
                <div class="permissions-grid">
                    @foreach($allPermissions as $perm)
                        <label class="permission-item">
                            <input type="checkbox" value="{{ $perm }}" wire:model.defer="permissions">
                            {{ $perm }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-actions">
                <button class="btn btn-primary"><i class="las la-save"></i> Sauvegarder</button>
                <button type="button" wire:click="closeModal" class="btn btn-secondary">Annuler</button>
            </div>
        </form>
    </x-modal>

    {{-- Confirmation suppression --}}
    <x-confirm-modal
        wire:model="confirmDelete"
        title="Supprimer rôle"
        message="Cette action est irréversible"
        confirmText="Oui, supprimer"
        wire:click="delete" />
</div>
