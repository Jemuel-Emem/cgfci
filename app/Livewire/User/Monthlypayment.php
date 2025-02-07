<?php

namespace App\Livewire\User;

use App\Models\members;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\approved_members as ApprovedMember;

class MonthlyPayment extends Component
{
    use WithFileUploads;

    public $receipt;
    public $amount;
    public $approvedTotal = 0;
    public $showForm = false; // Tracks the visibility of the modal
    public $fees; // Stores fee records for the user

    public function mount()
    {
        // Get the user_id from the authenticated user's record
        $userId = auth()->user()->user_id;

        // Get total approved payments for the user
        $this->approvedTotal = ApprovedMember::where('user_id', $userId)
            ->where('status', 'approved')
            ->sum('amount');

        // Fetch fee records for the user
        $this->fees = ApprovedMember::where('user_id', $userId)->get();
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
            ['user_id' => auth()->user()->user_id, 'status' => 'pending'],
            [
                'amount' => $this->amount,
                'receipt' => $receiptPath,
                'status' => 'on-process',
            ]
        );

        session()->flash('message', 'Payment submitted successfully!');
        $this->resetForm();
        $this->render();
    }

    private function resetForm()
    {
        $this->amount = null;
        $this->receipt = null;
        $this->showForm = false;
    }

    public function render()
    {
        $userId = auth()->user()->user_id;


        $approvedMembers = ApprovedMember::where('user_id', $userId)->get();

        return view('livewire.user.monthlypayment', [
            'fees' => $this->fees,
            'approvedMembers' => $approvedMembers,
        ]);
    }
}
