<div class="employee-profile-ui">

    {{-- Alert --}}
    @if (session()->has('success'))
        <div class="alert-success-u" id="successAlert">
            <span class="alert-icon">✔️</span>
            <span class="alert-message">{{ session('success') }}</span>
            <button class="alert-close"
                onclick="document.getElementById('successAlert').style.display='none'">&times;</button>
        </div>
    @endif

    @if($employee)
        <!-- Header -->
        <div class="employee-header-ui">
            {{-- <div class="employee-photo-ui">
                @if($employee->getFirstMediaUrl('employees'))
                    <img src="{{ $employee->getFirstMediaUrl('employees') }}" alt="Photo de {{ $employee->first_name }}">
                @else
                    <img src="https://placehold.co/150" alt="Photo par défaut">
                @endif
            </div> --}}

            <div class="employee-basic-ui">
                <h1 class="employee-name-ui">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
                <p class="employee-matricule-ui">Matricule : {{ $employee->matricule }}</p>
                <p class="employee-status-ui {{ $employee->status == 'active' ? 'status-active-ui' : 'status-inactive-ui' }}">
                    {{ ucfirst($employee->status) }}
                </p>
            </div>
        </div>

        <!-- Details Section -->
        <div class="employee-details-ui">
            <h2 class="details-section-title-ui">Informations personnelles</h2>
            <div class="details-grid-ui">
                <div class="detail-item-ui"><span>Genre :</span> {{ $employee->gender }}</div>
                <div class="detail-item-ui"><span>Date de naissance :</span> {{ $employee->birth_date }}</div>
                <div class="detail-item-ui"><span>Nationalité :</span> {{ $employee->nationality }}</div>
                <div class="detail-item-ui"><span>Téléphone :</span> {{ $employee->phone }}</div>
                <div class="detail-item-ui"><span>Email :</span> {{ $employee->email }}</div>
                <div class="detail-item-ui"><span>Adresse :</span> {{ $employee->address }}</div>
            </div>
        </div>

    @else
        <p>Aucune information employé disponible.</p>
    @endif

                    <button class="btn-change-password-ui" wire:click="$toggle('showPasswordModal')">
                    <i class="las la-key"></i> Changer le mot de passe
                </button>

    <!-- Modal Changer mot de passe -->
    @if($showPasswordModal)
        <div class="modal-overlay-ui">
            <div class="modal-ui">
                <h3>Changer le mot de passe</h3>
                <div class="modal-body-ui">
                    <input type="password" placeholder="Mot de passe actuel" wire:model.defer="currentPassword">
                    @error('currentPassword') <span class="error-ui">{{ $message }}</span> @enderror

                    <input type="password" placeholder="Nouveau mot de passe" wire:model.defer="newPassword">
                    @error('newPassword') <span class="error-ui">{{ $message }}</span> @enderror

                    <input type="password" placeholder="Confirmer le nouveau mot de passe" wire:model.defer="newPasswordConfirmation">
                </div>

                <div class="modal-footer-ui" style="margin-top:10px;">
                    <button class="btn btn-danger" wire:click="$toggle('showPasswordModal')">Annuler</button>
                    <button class="btn btn-primary" wire:click="changePassword">Valider</button>
                </div>
            </div>
        </div>
    @endif
</div>
