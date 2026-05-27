<div class="form-card">

    <h3 class="form-title">
        <i class="fa-solid fa-user"></i>
        {{ $employee ? 'Modifier l\'employé' : 'Créer un employé' }}
    </h3>

    <form class="form-grid" wire:submit.prevent="save">

        <x-form.input label="Matricule" wire:model.defer="matricule"/>

        <x-form.input label="Prénom" wire:model.defer="first_name"/>
        <x-form.input label="Nom" wire:model.defer="last_name"/>

        <x-form.select
            label="Type"
            wire:model.defer="type"
            :options="[
                'employee' => 'employee',
                'benevole' => 'benevole',
                'consultant' => 'consultant',
                'interne' => 'interne'
            ]"
        />

        <x-form.input type="email" label="Email" wire:model.defer="email"/>

        @if($create_user)
            <x-form.input type="password" label="Mot de passe" wire:model.defer="password"/>
        @endif

        <x-form.input label="Téléphone" wire:model.defer="phone"/>
        <x-form.input label="Nationalité" wire:model.defer="nationality"/>
        <x-form.input type="date" label="Date de naissance" wire:model.defer="birth_date"/>
        <x-form.input type="date" label="Date d'embauche" wire:model.defer="hire_date"/>

        <x-form.textarea label="Adresse" wire:model.defer="address"/>

        <x-form.select
            label="Département"
            wire:model.defer="department_id"
            :options="$departments->pluck('name','id')"
        />

        <x-form.select
            label="Poste"
            wire:model.defer="position_id"
            :options="$positions->pluck('title','id')"
        />

        <x-form.select
            label="Superviseur"
            wire:model.defer="supervisor_id"
            :options="$supervisors->pluck('first_name','id')"
        />

        {{-- Genre --}}
        <div class="form-radio">
            <input type="radio" value="M" wire:model="gender"> Homme
            <input type="radio" value="F" wire:model="gender"> Femme
        </div>

        <x-form.select
            label="Rôle utilisateur"
            wire:model.defer="role"
            :options="$roles"
            required
        />

        {{-- Statut --}}
        <x-form.select
            label="Status"
            wire:model.defer="status"
            :options="[
                'active' => 'active',
                'inactive' => 'inactive',
                'archived' => 'archived'
            ]"
        />

        <x-form.file label="Photo" wire:model="photo"/>

        <div class="form-actions">
            <button class="btn btn-primary">
                <i class="fa-solid fa-save"></i> Sauvegarder
            </button>

            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                Annuler
            </a>
        </div>

    </form>
</div>
