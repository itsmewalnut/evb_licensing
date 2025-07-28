<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Flux\Flux;

class CreateUser extends Component
{
    public $branch = "", $department = "", $name, $email, $password = "Evbgroup123!", $role = "";

    protected function rules()
    {
        return [
            'branch' => 'required|string',
            'department' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'role' => 'required|string',
        ];
    }

    public function AddUser()
    {
        $this->validate();

        User::create([
            "branch" => $this->branch,
            "department" => $this->department,
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "role" => $this->role,
        ]);

        $this->reset();
        Flux::modal('create-user')->close();
        session()->flash("success", "User successfully Added.");
        $this->redirectRoute('users', navigate: true);
        // $this->dispatch("reloadUsers");
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}
