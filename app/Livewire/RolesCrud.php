<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesCrud extends Component
{
    use WithPagination;

    public $search = '';
    public $showModal = false;
    public $confirmDelete = false;
    public $roleId;
    public $name;
    public $permissions = [];

    public $allPermissions = [];

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'permissions' => 'array',
        'permissions.*' => 'exists:permissions,name',
    ];

    public function mount()
    {
        $this->allPermissions = Permission::all()->pluck('name');
    }

    // Réinitialise les champs
    public function resetFields()
    {
        $this->roleId = null;
        $this->name = '';
        $this->permissions = [];
    }

    // Ouvre le modal pour créer ou éditer
    public function openModal($id = null)
    {
        $this->resetValidation();

        if ($id) {
            $role = Role::findOrFail($id);
            $this->roleId = $role->id;
            $this->name = $role->name;
            $this->permissions = $role->permissions->pluck('name')->toArray();

            // Supprime la règle d'unicité pour l'édition
            $this->rules['name'] = 'required|string|max:255|unique:roles,name,' . $role->id;
        } else {
            $this->resetFields();
            $this->rules['name'] = 'required|string|max:255|unique:roles,name';
        }

        $this->showModal = true;
    }

    // Ferme le modal
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

    // Sauvegarde ou met à jour
    public function save()
    {
        // Ajuste la règle unique pour l'update
        if ($this->roleId) {
            $this->rules['name'] = 'required|string|max:255|unique:roles,name,' . $this->roleId;
        } else {
            $this->rules['name'] = 'required|string|max:255|unique:roles,name';
        }

        $this->validate();

        if ($this->roleId) {
            $role = Role::findOrFail($this->roleId);
            $role->update(['name' => $this->name]);
        } else {
            $role = Role::create(['name' => $this->name]);
        }

        $role->syncPermissions($this->permissions);

        session()->flash('success', $this->roleId ? 'Rôle mis à jour avec succès !' : 'Rôle créé avec succès !');
        $this->closeModal();
    }


    // Demande confirmation suppression
    public function askDelete($id)
    {
        $this->roleId = $id;
        $this->confirmDelete = true;
    }

    // Supprime le rôle
    public function delete()
    {
        $this->confirmDelete = false;
        $this->resetFields();
    }

    public function confirm()
    {
        $role = Role::findOrFail($this->roleId);
        $role->delete();

        $this->confirmDelete = false;
        session()->flash('success', 'Rôle supprimé avec succès !');
    }

    public function render()
    {
        $roles = Role::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.roles-crud', [
            'roles' => $roles,
        ]);
    }
}
