<div>
    {{-- Alert --}}
    @if (session()->has('success'))
        <div class="alert-success-u" id="successAlert">
            <span class="alert-icon">✔️</span>
            <span class="alert-message">{{ session('success') }}</span>
            <button class="alert-close" onclick="document.getElementById('successAlert').style.display='none'">&times;</button>
        </div>
    @endif

    {{-- BANNER --}}
    <div class="banner">
        <div class="banner-left">
            <h2>
                <i class="las la-clock"></i>
                Feuilles de temps
            </h2>
            <p>Enregistrer vos heures de travail</p>
        </div>

        <div class="banner-right">
            <div class="search-box">
                <input type="text" placeholder="Rechercher..." wire:model.live="search">
                <button type="button"><i class="las la-search"></i></button>
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="las la-plus"></i> Nouvelle feuille
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
                        <th>Activité</th>
                        <th>Projet</th>
                        <th>Date</th>
                        <th>Heures</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-ui__body">
                    @forelse($timesheets as $timesheet)
                        <tr>
                            <td>{{ ($timesheets->currentPage()-1)*$timesheets->perPage() + $loop->iteration }}</td>
                            <td>{{ $timesheet->activity->title ?? '-' }}</td>
                            <td>{{ $timesheet->activity->project->name ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($timesheet->work_date)->format('d/m/Y') }}</td>
                            <td>{{ number_format($timesheet->hours, 0, '.', '') }}</td>
                            <td>{{ $timesheet->status }}</td>
                            <td class="text-end">
                                <button wire:click="openModal({{ $timesheet->id }})" class="btn btn-action"><i class="las la-edit"></i></button>
                                <button wire:click="askDelete({{ $timesheet->id }})" class="btn btn-action btn-danger"><i class="las la-trash"></i></button>
                                <x-confirm-modal wire:model="confirmDelete" title="Supprimer timesheet" message="Cette action est irréversible" confirmText="Oui, supprimer" wire:click="confirmDeleteTimesheet"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                <i class="las la-info-circle"></i> Aucune feuille trouvée
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                <x-pagination :paginator="$timesheets"/>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <x-modal wire:model="showModal" title="Feuille de temps" size="md">
        <form wire:submit.prevent="save" class="form-grid">
            <x-form.select label="Activité" wire:model.live="activity_id" :options="$assignedActivities" required />
            <x-form.input label="Projet" wire:model="project_id" disabled />

            <x-form.input type="date" label="Date" wire:model.defer="work_date" required />
            <x-form.input type="number" label="Heures" wire:model.defer="hours" required />

            <x-form.select label="Statut" wire:model.defer="status" :options="['Pending'=>'Pending','Approved'=>'Approved','Rejected'=>'Rejected']" required />

            <div class="form-actions">
                <button class="btn btn-primary"><i class="las la-save"></i> Sauvegarder</button>
                <button type="button" wire:click="closeModal" class="btn btn-secondary">Annuler</button>
            </div>
        </form>
    </x-modal>
</div>
