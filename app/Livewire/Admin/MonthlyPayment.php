<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\approved_members as ApprovedMember;

class MonthlyPayment extends Component
{
    public $fees;

    public function mount()
    {
        // Fetch all approved members' payments
        $this->fees = ApprovedMember::all();
    }

    public function approveFee($feeId)
    {
        $fee = ApprovedMember::find($feeId);

        if ($fee) {
            $fee->status = 'approved';
            $fee->save();

            session()->flash('message', 'Fee approved successfully.');
            $this->mount(); // Refresh the data
        }
    }

    public function cancelFee($feeId)
    {
        $fee = ApprovedMember::find($feeId);

        if ($fee) {
            $fee->status = 'cancelled';
            $fee->save();

            session()->flash('message', 'Fee cancelled successfully.');
            $this->mount(); // Refresh the data
        }
    }

    public function render()
    {
        return view('livewire.admin.monthly-payment');
    }
}
