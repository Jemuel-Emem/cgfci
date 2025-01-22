<?php

namespace App\Livewire\Admin;

use App\Models\members as ApprovedMember;
use Livewire\Component;

class Members extends Component
{
    public $approvedMembers;

    public function mount()
    {

        $this->approvedMembers = ApprovedMember::with('user:id,name,number')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.members', [
            'approvedMembers' => $this->approvedMembers,
        ]);
    }
}
