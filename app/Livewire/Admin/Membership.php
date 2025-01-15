<?php

namespace App\Livewire\Admin;
use App\Models\member_fee as MembershipFee;
use App\Models\beneficiaries as Beneficiary;
use App\Models\members as Member;
use Livewire\Component;

class Membership extends Component
{
    public $members;
    public $beneficiaries = [];
    public $showModal = false;

    public function mount()
    {
        $this->members = Member::all();
    }

    public function viewBeneficiaries($memberId)
    {
        $this->beneficiaries = Beneficiary::where('member_id', $memberId)->get();
        $this->showModal = true; // Show the modal
    }
    public function approveMember($memberId)
    {
        $member = Member::find($memberId);
        if ($member) {
            $member->status = 'approved';
            $member->save();


            MembershipFee::create([
                'member_id' => $member->user_id,
            ]);

            session()->flash('message', 'Member approved and membership fee record created!');
        }
    }

    public function declineMember($memberId)
    {
        $member = Member::find($memberId);
        if ($member) {
            $member->status = 'declined';
            $member->save();
            session()->flash('message', 'Member declined successfully!');
        }
    }

    public function closeModal()
    {
        $this->showModal = false; // Hide the modal
    }

    public function render()
    {
        return view('livewire.admin.membership', [
            'members' => $this->members,
        ]);
    }
}
