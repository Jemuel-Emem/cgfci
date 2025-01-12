<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class Members extends Component
{

    public $users;


    public function render()
    {

        $this->users = User::where('request_approval', 'approved')->get();


        return view('livewire.admin.members', ['users' => $this->users]);
    }
}
