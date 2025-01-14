<?php

namespace App\Livewire\User;
use App\Models\Beneficiaries;
use App\Models\Members;
use App\Models\User;
use Livewire\Component;

class Membershipform extends Component
{
    public $beneficiaryCount = 1; // Default to 1 beneficiary
    public $beneficiaries = []; // Holds beneficiary data

    public function mount()
    {
        $this->initializeBeneficiaries();
    }

    public function initializeBeneficiaries()
    {
        $this->beneficiaries = array_fill(0, $this->beneficiaryCount, ['name' => '', 'birthdate' => '']);
    }

    public function updateBeneficiaries()
    {
        $this->initializeBeneficiaries(); // Reinitialize with the specified number
    }

    public function applyNow()
    {
        
        $this->validate([
            'beneficiaries.*.name' => 'required|string',
            'beneficiaries.*.birthdate' => 'required|date',
        ]);


        $user = User::create([

        ]);

        foreach ($this->beneficiaries as $beneficiary) {
            Beneficiaries::create([
                'user_id' => $user->id,
                'name' => $beneficiary['name'],
                'birthdate' => $beneficiary['birthdate'],
            ]);
        }


        session()->flash('message', 'Application submitted successfully!');
    }

    public function render()
    {
        return view('livewire.user.membershipform');
    }
}
