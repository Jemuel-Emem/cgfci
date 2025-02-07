<?php

namespace App\Livewire\Admin;

use App\Models\members;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{

    public $members;
    public $totalUsersCount;

    public function mount()
    {

        $this->members = members::count();

      //  $this->approvedMembersCount = members::where('status', 'approved')->count();


        $this->totalUsersCount = User::where('is_admin', 0)->count();
    }

    public function render()
    {
        return view('livewire.admin.index', [

            'members' => $this->members,
            'totalUsersCount' => $this->totalUsersCount,
        ]);
    }
}
