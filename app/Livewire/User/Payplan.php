<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\member_fee as MemberFee;
use App\Models\beneficiaries as Beneficiary;

class Payplan extends Component
{
    use WithFileUploads;
    public $receipt;
    public $fees;
    public $beneficiaries;
    public $showModal = false; // Controls modal visibility
    public $currentFeeId; // Holds the current fee ID to fetch beneficiaries

    public function mount()
    {
        // Get the current user fees
        $this->fees = MemberFee::where('member_id', auth()->user()->id)->get();
    }

    public function openModal($feeId)
    {
        $this->currentFeeId = $feeId;
        // Fetch beneficiaries for this member
        $this->beneficiaries = Beneficiary::where('member_id', $feeId)->get();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function submitReceipt()
    {

        $this->validate([
            'receipt' => 'required|mimes:jpg,jpeg,png,pdf|max:10240',
        ]);


        $receiptPath = $this->receipt->store('receipts', 'public');


        $fee = MemberFee::find($this->currentFeeId);
        if ($fee) {
            $fee->receipt = $receiptPath;
            $fee->status = 'on-process';
            $fee->save();
        }

        session()->flash('message', 'Receipt uploaded successfully!');


        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.user.payplan');
    }
}
