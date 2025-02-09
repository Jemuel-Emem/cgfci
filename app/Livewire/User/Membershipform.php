<?php

namespace App\Livewire\User;
use Livewire\WithFileUploads;
use App\Models\Beneficiaries;
use App\Models\Members;
use Livewire\Component;

class Membershipform extends Component
{
    use WithFileUploads;

    public $membership_fee;
    public $first_name;
    public $middle_initial;
    public $last_name;
    public $address;
    public $email;
    public $birthdate;
    public $religion;
    public $join_date;
    public $parent_leader;
    public $beneficiaryCount = 1;
    public $beneficiaries = [];
    public $successMessage = '';

    public function mount()
    {
        $this->initializeBeneficiaries();
    }

    // public function applyNow()
    // {

    //     $this->validate([
    //         'first_name' => 'required|string',
    //         'last_name' => 'required|string',
    //         'address' => 'required|string',
    //         'birthdate' => 'required|date',
    //         'religion' => 'required|string',
    //         'join_date' => 'required|date',
    //         'parent_leader' => 'required|string',


    //         'beneficiaries.*.name' => 'required|string',
    //         'beneficiaries.*.birthdate' => 'required|date',
    //     ]);
    //     $member = Members::create([
    //         'user_id' => auth()->id(),
    //         'first_name' => $this->first_name,
    //         'middle_initial' => $this->middle_initial,
    //         'last_name' => $this->last_name,
    //         'address' => $this->address,
    //         'birthdate' => $this->birthdate,
    //         'religion' => $this->religion,
    //         'join_date' => $this->join_date,
    //         'parent_leader' => $this->parent_leader,
    //     ]);

    //     foreach ($this->beneficiaries as $beneficiary) {
    //         Beneficiaries::create([
    //             'member_id' => $member->id,
    //             'beneficiary_name' => $beneficiary['name'],
    //             'birthdate' => $beneficiary['birthdate'],
    //         ]);
    //     }

    //     $this->successMessage = 'Application submitted successfully!';


    //     $this->reset();
    // }

    public function applyNow()
{

    // $existingMember = Members::where('user_id', auth()->id())->first();

    // if ($existingMember) {
    //     $this->addError('duplicate', 'You have already submitted a membership application.');
    //     return;
    // }


    $this->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'address' => 'required|string',
        'email' => 'required|string',
        'birthdate' => 'required|date',
        'religion' => 'required|string',
        'join_date' => 'required|date',
        'parent_leader' => 'required|string',
        'beneficiaries.*.name' => 'required|string',
        'beneficiaries.*.birthdate' => 'required|date',
        'membership_fee' => 'required|image|max:2048',
    ]);
    $photoPath = $this->membership_fee->store('membership_fees', 'public');

    $member = Members::create([
        'user_id' => auth()->id(),
        'first_name' => $this->first_name,
        'middle_initial' => $this->middle_initial,
        'last_name' => $this->last_name,
        'address' => $this->address,
        'email' => $this->email,
        'birthdate' => $this->birthdate,
        'religion' => $this->religion,
        'join_date' => $this->join_date,
        'parent_leader' => $this->parent_leader,
        'membership_fee' => $photoPath,
    ]);


    foreach ($this->beneficiaries as $beneficiary) {
        Beneficiaries::create([
            'member_id' => $member->id,
            'beneficiary_name' => $beneficiary['name'],
            'birthdate' => $beneficiary['birthdate'],
        ]);
    }


    session()->flash('message', 'Application submitted successfully!');
    $this->reset();
}

    public function initializeBeneficiaries()
    {
        $this->beneficiaries = array_fill(0, $this->beneficiaryCount, ['name' => '', 'birthdate' => '']);
    }

    public function updateBeneficiaries()
    {
        $this->initializeBeneficiaries(); // Reinitialize with the specified number
    }

    public function render()
    {
        // $existingMember = Members::where('user_id', auth()->id())->first();

        // if ($existingMember) {
        //     return view('livewire.user.membership-status', [
        //         'membership' => $existingMember,
        //     ]);
        // }

        return view('livewire.user.membershipform');
    }
}


