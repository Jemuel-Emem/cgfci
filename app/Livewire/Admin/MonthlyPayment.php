<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\approved_members as ApprovedMember;
use Illuminate\Support\Facades\Mail;

class MonthlyPayment extends Component
{
    public $fees;

    public function mount()
    {
        $this->fees = ApprovedMember::all();
    }

    public function approveFee($feeId)
    {
        $fee = ApprovedMember::with('user')->find($feeId);

        if ($fee && $fee->user) {


            $fee->status = 'approved';
            $fee->save();

            $this->sendEmailNotification($fee->user->email, 'approved');

            session()->flash('message', 'Fee approved successfully.');
            $this->mount();
        } else {
            dd("User not found or email is null");
        }
    }

    public function cancelFee($feeId)
    {
        $fee = ApprovedMember::find($feeId);

        if ($fee) {
            $fee->status = 'cancelled';
            $fee->save();


            $this->sendEmailNotification($fee->user->email, 'cancelled');

            session()->flash('message', 'Fee cancelled successfully.');
            $this->mount();
        }
    }

    private function sendEmailNotification($email, $status)
    {
        $subject = "Payment Status Update - GPFCI";
        $message = "
            <p>Dear User,</p>
            <p>Your payment has been <strong>{$status}</strong>.</p>
            <p>Thank you,<br>GPFCI Team</p>
        ";

        Mail::send([], [], function ($mail) use ($email, $subject, $message) {
            $mail->to($email)
                ->subject($subject)
                ->html($message);
        });

    }

    public function render()
    {
        return view('livewire.admin.monthly-payment');
    }
}
