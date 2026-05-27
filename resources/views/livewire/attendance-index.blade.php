<div class="attendance-container">

    {{-- Alert --}}
    @if(session()->has('success'))
        <div class="alert-success-u" id="successAlert">
            <span class="alert-icon">✔️</span>
            <span class="alert-message">{{ session('success') }}</span>
            <button class="alert-close" onclick="document.getElementById('successAlert').style.display='none'">&times;</button>
        </div>
    @endif

    {{-- Card Préabs --}}
    <div class="attendance-card">
        <h2 class="attendance-title">
            <i class="las la-calendar-check"></i> Gestion des présences
        </h2>

        {{-- Filtres et navigation --}}
        <div class="attendance-filters">
            <div class="attendance-filters-item">
                <x-form.select
                    label="Année"
                    :options="collect(range(2020, now()->year + 1))->mapWithKeys(fn($y) => [$y => $y])"
                    wire:model.live="year"
                />

                <x-form.select
                    label="Mois"
                    :options="collect(range(1,12))->mapWithKeys(fn($m) => [$m => \Carbon\Carbon::create()->month($m)->locale('fr')->isoFormat('MMMM')])"
                    wire:model.live="month"
                />
            </div>

                            <x-form.input
                    label="Rechercher un employé"
                    placeholder="Nom ou prénom"
                    wire:model.live="search"
                />

            <div class="attendance-nav">
                <button wire:click="previousMonth" class="btn btn-secondary">&lt; Précédent</button>
                <span class="attendance-month">{{ \Carbon\Carbon::create($year, $month, 1)->locale('fr')->isoFormat('MMMM YYYY') }}</span>
                <button wire:click="nextMonth" class="btn btn-secondary">Suivant &gt;</button>
            </div>
        </div>

        <div class="attendance-legend">
            <h3> Significations : </h3>
            <span class="legend-item">
                <span class="legend-color attendance-cell bg-green"></span> Présent
            </span>
            <span class="legend-item">
                <span class="legend-color attendance-cell bg-red"></span> Absent
            </span>
            <span class="legend-item">
                <span class="legend-color attendance-cell bg-yellow"></span> Congé
            </span>
            <span class="legend-item">
                <span class="legend-color attendance-cell bg-blue"></span> Malade
            </span>
        </div>

        {{-- Tableau --}}
        <div class="attendance-table-wrapper">
            <table class="attendance-table">
                <thead>
                    <tr>
                        <th class="th-left">Nom & Prénom</th>
                        @foreach($daysInMonth as $day)
                            <th>{{ ucfirst($day->locale('fr')->isoFormat('ddd')) }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td class="td-left">{{ $employee->first_name.' '.$employee->last_name }}</td>
                            @foreach($daysInMonth as $day)
                                @php
                                    $status = $this->getAttendanceStatus($employee->id, $day->toDateString());
                                    $reason = $this->getAttendanceReason($employee->id, $day->toDateString());
                                    $statusColor = match($status) {
                                        'present' => 'bg-green',
                                        'absent' => 'bg-red',
                                        'leave' => 'bg-yellow',
                                        'sick' => 'bg-blue',
                                        default => ''
                                    };
                                    $isSunday = $day->isSunday();
                                @endphp
                                <td class="attendance-cell {{ $statusColor }} {{ $isSunday ? 'bg-darkgray non-clickable' : '' }}"
                                    @if(!$isSunday)
                                        wire:click="openModal({{ $employee->id }}, '{{ $day->toDateString() }}')"
                                        title="{{ $reason }}"
                                    @endif
                                >
                                    @if(!$isSunday)
                                        <i class="las la-plus"></i>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal --}}
    <x-modal wire:model="showModal" title="Éditer présence" size="sm">
        <form wire:submit.prevent="save" class="form-grid">
            <x-form.select
                label="Status"
                :options="collect(['present'=>'Présent','absent'=>'Absent','leave'=>'Congé','sick'=>'Malade'])"
                wire:model.defer="status"
                required
            />

            <x-form.input
                label="Raison"
                wire:model.defer="reason"
            />

            <div class="form-actions">
                <button class="btn btn-primary"><i class="las la-save"></i> Sauvegarder</button>
                <button type="button" wire:click="$set('showModal', false)" class="btn btn-secondary">Annuler</button>
            </div>
        </form>
    </x-modal>
</div>
