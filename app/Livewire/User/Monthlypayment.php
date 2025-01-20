<?php


namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\approved_members as ApprovedMember;

class MonthlyPayment extends Component
{
    use WithFileUploads;

    public $receipt;
    public $amount;
    public $fees;
    public $showModal = false;
    public $currentFeeId;

    public function mount()
    {

        $this->fees = ApprovedMember::where('user_id', auth()->user()->id)->get();
    }

    public function openModal($feeId)
    {
        $this->currentFeeId = $feeId;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function submitReceipt()
    {
        $this->validate([
            'amount' => 'required|numeric|min:1',
            'receipt' => 'required|mimes:jpg,jpeg,png,pdf|max:10240',
        ]);

        $receiptPath = $this->receipt->store('receipts', 'public');

        $fee = ApprovedMember::find($this->currentFeeId);
        if ($fee) {
            $fee->receipt = $receiptPath;
            $fee->amount = $this->amount;
            $fee->status = 'on-process';
            $fee->save();
        }

        session()->flash('message', 'Receipt and amount submitted successfully!');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.user.monthlypayment');
    }
}
