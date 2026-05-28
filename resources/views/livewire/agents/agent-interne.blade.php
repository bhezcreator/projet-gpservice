<div>
    <!-- Alert Success -->
    @if (session()->has('success'))
        <div class="alert-success-u" id="successAlert">
            <span class="alert-icon">✔️</span>
            <span class="alert-message">{{ session('success') }}</span>
            <button class="alert-close" onclick="document.getElementById('successAlert').style.display='none'">&times;</button>
        </div>
    @endif

    <!-- BANNER -->
    <div class="banner">
        <div class="banner-left">
            <h2>
                <i class="las la-users"></i>
                Gestion des agents
            </h2>
            <p>Recherchez, filtrez et gérez vos données efficacement</p>
        </div>

        <div class="center">
            {{-- @livewire('employees.employee-export') --}}
        </div>

        <div class="banner-right">
            <select class="form-group" wire:model.live="status">
                <option value="">Tous les statuts</option>
                <option value="actif">Actif</option>
                <option value="inactive">Non actif</option>
            </select>

            <div class="search-box">
                <input type="text" placeholder="Rechercher..." wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-user-plus"></i>
                Nouvel agent
            </button>
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-card">
        <div class="table-responsive">
            <table class="table-ui">
                <thead class="table-ui__head">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Département</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($agents as $agent)
                        <tr>
                            <td data-label="#">
                                {{ $agent->employee_number }}
                            </td>

                            <td data-label="Nom">
                                <i class="las la-user text-muted"></i>
                                {{ $agent->user->name }}
                            </td>

                            <td data-label="Email">
                                <i class="las la-envelope text-muted"></i>
                                {{ $agent->user->email }}
                            </td>

                            <td data-label="Poste">
                                <i class="las la-briefcase text-muted"></i>
                                {{ $agent->department ?? '-' }}
                            </td>

                            <td data-label="Statut">
                                <span class="badge 
                                    {{ $agent->is_available ? 'badge-success' : 'badge-warning' }}">
                                    <i class="las la-circle"></i>
                                    {{ $agent->is_available ? 'Actif' : 'Non actif' }}
                                </span>
                            </td>

                            <td data-label="Actions" class="text-end">
                                {{-- <a href="{{ route('employees.show', $agent->id) }}" class="btn btn-action">
                                    <i class="las la-eye"></i>
                                </a> --}}

                                <button wire:click="openModal({{ $agent->id }}) class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </a>

                                <button
                                    class="btn btn-action btn-danger"
                                    wire:click="askDelete({{ $agent->id }})">
                                    <i class="las la-trash"></i>
                                </button>

                                <x-confirm-modal wire:model="confirmDelete" title="Supprimer Agent"
                                    message="Cette action est irréversible" confirmText="Oui, supprimer" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucun agent trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$agents" />
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

