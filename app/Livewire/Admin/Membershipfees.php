<?php

namespace App\Livewire\Admin;

use App\Models\member_fee as MemberFee;
use Livewire\Component;

class Membershipfees extends Component
{

    public function approveFee($feeId)
    {
        $fee = MemberFee::find($feeId);
        if ($fee) {
            $fee->status = 'approved';
            $fee->save();
            session()->flash('message', 'Membership fee approved!');
        }
    }


    public function cancelFee($feeId)
    {
        $fee = MemberFee::find($feeId);
        if ($fee) {
            $fee->status = 'cancelled';
            $fee->save();
            session()->flash('message', 'Membership fee cancelled!');
        }
    }

    public function render()
    {
        
        $fees = MemberFee::all();

        return view('livewire.admin.membershipfees', compact('fees'));
    }
}
