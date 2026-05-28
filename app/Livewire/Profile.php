<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public $employee;
    public $showPasswordModal = false;
    public $currentPassword;
    public $newPassword;
    public $newPasswordConfirmation;

    public function mount()
    {
        $user = User::find(Auth::id());
        $this->employee = $user->employee ?? null;
    }

    public function render()
    {
        return view('livewire.profile');
    }

    // Changer le mot de passe
    public function changePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6|confirmed',
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'Le mot de passe actuel est incorrect.');
            return;
        }

        $user->password = bcrypt($this->newPassword);
        $user->save();

        $this->reset(['currentPassword', 'newPassword', 'newPasswordConfirmation']);
        $this->showPasswordModal = false;

        session()->flash('success', 'Mot de passe changé avec succès !');
    }
}
