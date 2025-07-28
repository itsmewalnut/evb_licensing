<?php

namespace App\Livewire\Users;

use App\Models\User;
use Flux\Flux;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.users.users');
    }

    public $users, $user_name, $userID;

    public function mount()
    {
        $this->users = User::where('role', '!=', 'ADMINISTRATOR')->orderByDesc('id')->get();
    }

    public function editUser($id)
    {
        $this->dispatch("editUser", $id);
    }

    protected function setUser($id)
    {
        $user = User::find($id);
        $this->userID = $id;
        $this->user_name = $user?->name;
    }

    public function delete($id)
    {
        $this->setUser($id);
    }

    public function deleteUser()
    {
        User::find($this->userID)->delete();
        session()->flash("success", "User successfully Deleted.");
        $this->redirectRoute('users', navigate: true);
        Flux::modal('delete-user')->close();
    }

    public function resetPassword($id)
    {
        $this->setUser($id);
    }

    public function ResetPass()
    {
        $user = User::find($this->userID);
        if ($user) {
            $user->password = bcrypt('Evbgroup123!');
            $user->save();
            session()->flash("success", "User password has been reset to 'Evbgroup123!'.");
        } else {
            session()->flash("error", "User not found.");
        }
        $this->redirectRoute('users', navigate: true);
        Flux::modal('reset-password')->close();
    }

    // #[On("reloadUsers")]
    // public function reloadUsers()
    // {
    //     $this->users = User::where('role', '!=', 'ADMINISTRATOR')->orderByDesc('id')->get();
    // }
}
