<?php

namespace App\Livewire\Admin;

use App\Models\members;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $pendingMembersCount;
    public $approvedMembersCount;
    public $totalUsersCount;

    public function mount()
    {

        $this->pendingMembersCount = members::where('status', 'pending')->count();


        $this->approvedMembersCount = members::where('status', 'approved')->count();


        $this->totalUsersCount = User::where('is_admin', 0)->count();
    }

    public function render()
    {
        return view('livewire.admin.index', [
            'pendingMembersCount' => $this->pendingMembersCount,
            'approvedMembersCount' => $this->approvedMembersCount,
            'totalUsersCount' => $this->totalUsersCount,
        ]);
    }
}
