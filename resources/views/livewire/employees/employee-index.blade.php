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
                Gestion des employés
            </h2>
            <p>Recherchez, filtrez et gérez vos données efficacement</p>
        </div>

        <div class="center">
            @livewire('employees.employee-export')
        </div>

        <div class="banner-right">
            <select class="form-group" wire:model.live="status">
                <option value="">Tous les statuts</option>
                <option value="active">Actif</option>
                <option value="inactive">Inactif</option>
                <option value="archived">Archivé</option>
            </select>

            <div class="search-box">
                <input type="text" placeholder="Rechercher..." wire:model.live="search">
                <button type="button">
                    <i class="las la-search"></i>
                </button>
            </div>

            <a href="{{ route('employees.form') }}" class="btn btn-primary">
                <i class="las la-user-plus"></i>
                Nouvel employé
            </a>
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
                        <th>Poste</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @forelse($employees as $employee)
                        <tr>
                            <td data-label="#">
                                {{ $employee->matricule }}
                            </td>

                            <td data-label="Nom">
                                <i class="las la-user text-muted"></i>
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </td>

                            <td data-label="Email">
                                <i class="las la-envelope text-muted"></i>
                                {{ $employee->email }}
                            </td>

                            <td data-label="Poste">
                                <i class="las la-briefcase text-muted"></i>
                                {{ $employee->position?->title ?? '-' }}
                            </td>

                            <td data-label="Statut">
                                <span class="badge 
                                    {{ $employee->status === 'active' ? 'badge-success' : 'badge-warning' }}">
                                    <i class="las la-circle"></i>
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>

                            <td data-label="Actions" class="text-end">
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-action">
                                    <i class="las la-eye"></i>
                                </a>

                                <a href="{{ route('employees.form', $employee->id) }}" class="btn btn-action">
                                    <i class="las la-edit"></i>
                                </a>

                                <button
                                    class="btn btn-action btn-danger"
                                    wire:click="askDelete({{ $employee->id }})">
                                    <i class="las la-trash"></i>
                                </button>

                                <x-confirm-modal wire:model="confirmDelete" title="Supprimer Employé"
                                    message="Cette action est irréversible" confirmText="Oui, supprimer" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                <i class="las la-info-circle"></i>
                                Aucun employé trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$employees" />
            </div>

        </div>
    </div>
</div>

