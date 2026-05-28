<?php

namespace App\Livewire\Agents;

use App\Models\InternalAgent;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Livewire\WithPagination;
use Ramsey\Uuid\Type\Decimal;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class AgentInterne extends Component
{

    use WithPagination;

    // protected $paginationTheme = 'custom';

    public $search = '';
    public $status = '';
    protected $queryString = ['search', 'status'];

    // Modal 
    public bool $showModal = false;
    public bool $confirmDelete = false;
    public int|null $agentId = null;

    // Propriétés
    public Int $user_id;
    public Int $employee_number;
    public String $department;
    public String $position;
    public Date $hire_date;
    public Decimal $salary;
    public Bool $is_available = true;

    public String $name;
    public String $email;
    public $create_user = true;
    public String $password;
    public $role = 'Agent Interne'; // rôle par défaut

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'employee_number' => ['required', Rule::unique('internal_agents')->ignore($this->agentId)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user_id)],
            'hire_date'     => 'nullable|date',
            'password'      => $this->create_user ? 'required|min:6' : 'nullable',
            'role'          => 'required|exists:roles,name',
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openModal($id = null)
    {
        $this->resetForm();

        if ($id) {
            $agent = InternalAgent::findOrFail($id);
            $this->agentId = $agent->id;
            $this->name = $agent->name;
            $this->amount = $agent->amount;
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function resetForm()
    {
        $this->reset(['agentId', 'name', 'amount']);
    }

    public function save()
    {
        $data = $this->validate();
        /** USER */
        if ($this->create_user) {
            $user = User::create([
                'name'     => $this->first_name . ' ' . $this->last_name,
                'email'    => $this->email,
                'password' => Hash::make($this->password),
            ]);

            $user->syncRoles([$this->role]); // assigner le rôle choisi
            $data['user_id'] = $user->id;
        } else {
            $data['user_id'] = $this->employee->user_id;

            // Si on veut permettre de changer le rôle sur un employé existant :
            $this->employee->user->syncRoles([$this->role]);
        }

        /** EMPLOYEE */
        $employeeData = collect($data)->only([
            'matricule',
            'first_name',
            'last_name',
            'gender',
            'birth_date',
            'nationality',
            'phone',
            'email',
            'address',
            'type',
            'status',
            'department_id',
            'position_id',
            'supervisor_id',
            'hire_date',
            'user_id'
        ])->toArray();

        $employee = Employee::updateOrCreate(
            ['id' => $this->employee?->id],
            $employeeData
        );

        /** PHOTO */
        if ($this->photo) {
            $employee->addMedia($this->photo)->toMediaCollection('employees');
        }

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employé enregistré avec succès');
    }

    /* 
    public function save()
    {
        $this->validate();

        InternalAgent::updateOrCreate(
            ['id' => $this->agentId],
            [
                'name' => $this->name,
                'amount' => $this->amount,
            ]
        );

        session()->flash(
            'success',
            $this->agentId
                ? 'Agent modifié avec succès'
                : 'Agent créé avec succès'
        );

        $this->closeModal();
    }
 */
    public function render()
    {
        $agents = InternalAgent::with(['user'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhere('department', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%")
                        ->orWhere('employee_number', 'like', "%{$this->search}%");
                });
            })
            ->when($this->status, fn($q) => $q->where('is_available', $this->status))
            ->latest()
            ->paginate(10);

        return view('livewire.agents.agent-interne', compact('agents'));
    }


    public function askDelete(Int $id)
    {
        $this->agentId = $id;
        $this->confirmDelete = true;
    }

    public function confirm()
    {
        $agent = InternalAgent::findOrFail($this->employeId);

        // Supprimer l'utilisateur lié
        if ($agent->user) {
            $agent->user->delete();
        }

        // Supprimer l'employé
        $agent->delete();

        $this->confirmDelete = false;
        session()->flash('success', 'Agent supprimé avec succès');
    }
}
