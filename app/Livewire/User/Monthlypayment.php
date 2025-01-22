<?php

namespace App\Livewire\User;
use App\Models\members;
use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\approved_members as ApprovedMember;

class MonthlyPayment extends Component
{
    use WithFileUploads;
    public $isEligible = false;
    public $receipt;
    public $amount;
    public $approvedTotal = 0;
    public $showForm = false; // Tracks the visibility of the modal
    public $fees; // Stores fee records for the user

    public function mount()
    {
        // Check if the user has an approved membership
        $approvedMembership = members::where('user_id', auth()->id())
            ->where('status', 'approved')
            ->first();

        if ($approvedMembership) {
            $this->isEligible = true;
            $this->fees = ApprovedMember::where('user_id', auth()->id())->get();
        } else {
            $this->isEligible = false;
            $this->fees = collect();
        }

        $this->approvedTotal = ApprovedMember::where('user_id', auth()->id())
        ->where('status', 'approved')
        ->sum('amount');
    }

    public function showPaymentForm()
    {
        $this->showForm = true; // Show the modal
    }

    public function hidePaymentForm()
    {
        $this->showForm = false; // Hide the modal
    }

    public function submitReceipt()
    {
        $this->validate([
            'amount' => 'required|numeric|min:1',
            'receipt' => 'required|mimes:jpg,jpeg,png,pdf|max:10240',
        ]);


        $receiptPath = $this->receipt->store('receipts', 'public');


        ApprovedMember::updateOrCreate(
            ['user_id' => auth()->id(), 'status' => 'pending'],
            [
                'amount' => $this->amount,
                'receipt' => $receiptPath,
                'status' => 'on-process',
            ]
        );

        session()->flash('message', 'Payment submitted successfully!');
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->amount = null;
        $this->receipt = null;
        $this->showForm = false;
    }

    public function render()
    {
        return view('livewire.user.monthlypayment', [
            'fees' => $this->fees,
            'isEligible' => $this->isEligible,
        ]);
    }
}
