<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Flux\Flux;
use Livewire\Attributes\On;

class Users extends Component
{
    public function render()
    {
        return view('livewire.users');
    }

    public $users, $userID;

    public function mount()
    {
        $this->users = User::where('role', '!=', 'ADMINISTRATOR')->orderByDesc('id')->get();
    }

    public function editUser($id)
    {
        $this->dispatch("editUser", $id);
    }

    public function delete($id)
    {
        $this->userID = $id;
    }

    public function deleteUser()
    {
        User::find($this->userID)->delete();
        session()->flash("success", "User successfully Deleted.");
        $this->redirectRoute('users', navigate: true);
        Flux::modal('delete-user')->close();
    }

    // #[On("reloadUsers")]
    // public function reloadUsers()
    // {
    //     $this->users = User::where('role', '!=', 'ADMINISTRATOR')->orderByDesc('id')->get();
    // }
}
