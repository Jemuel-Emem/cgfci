<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Membership extends Component
{
    public function approve($userId)
    {
        $user = User::findOrFail($userId);
        $user->approval_request = true; // Assuming this field tracks approval status
        $user->save();

        session()->flash('message', 'User approved successfully.');
    }

    public function decline($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete(); // Or update a status field to mark as declined
        session()->flash('message', 'User declined successfully.');
    }

    public function render()
    {
        $users = User::where('is_admin', 0)->get();
        return view('livewire.admin.membership', compact('users'));
    }
}
