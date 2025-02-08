<?php
namespace App\Livewire\User;

use App\Models\Members;
use App\Models\Beneficiaries;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MyAccount extends Component
{
    public $beneficiaries;

    public function mount()
    {
        // Get the logged-in user
        $user = Auth::user();

        // Check if the user has a valid member_id
        if ($user && $user->member_id) {
            // Find beneficiaries linked to this member_id
            $this->beneficiaries = Beneficiaries::where('member_id', $user->member_id)->get();
        } else {
            $this->beneficiaries = collect(); // Return an empty collection if no member_id is found
        }
    }

    public function render()
    {
        return view('livewire.user.myaccount', [
            'beneficiaries' => $this->beneficiaries,
        ]);
    }
}
