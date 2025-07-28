<?php

namespace App\Livewire\Users;

use App\Models\User;
use Flux\Flux;
use Livewire\Component;
use Livewire\Attributes\On;

class EditUser extends Component
{
    public $userID, $user_name, $branch, $department, $name, $email, $role;

    protected function rules()
    {
        return [
            'branch' => 'required|string',
            'department' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'role' => 'required|string',
        ];
    }

    public function render()
    {
        return view('livewire.users.edit-user');
    }

    #[On("editUser")]
    public function editUser($id)
    {
        $users = User::find($id);
        $this->userID = $id;
        $this->user_name = $users->name;
        $this->branch = $users->branch;
        $this->department = $users->department;
        $this->name = $users->name;
        $this->email = $users->email;
        $this->role = $users->role;
    }

    public function UpdateUser()
    {
        $this->validate();

        $users = User::find($this->userID);
        $users->branch = $this->branch;
        $users->department = $this->department;
        $users->name = $this->name;
        $users->email = $this->email;
        $users->role = $this->role;

        $users->save();
        Flux::modal('edit-user')->close();
        session()->flash("success", "User successfully Updated.");
        $this->redirectRoute('users', navigate: true);
    }
}
