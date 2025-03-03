<?php

namespace App\Livewire\Admin;
use App\Models\User;
use App\Models\approved_members as am;
use Livewire\Component;
use App\Mail\AccountCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;



class AddAccount extends Component
{
    public $name, $number, $email, $password, $account_number, $account_id, $member_id;

    public function createAccount()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|unique:users,number',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', Password::min(8)->letters()->numbers()],

        ]);

        am::create([
            'user_id' => $this->account_number,
        ]);

        User::create([
            'member_id'=> $this->member_id,
            'user_id' => $this->account_number,
            'name' => $this->name,
            'number' => $this->number,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'is_admin' => 0,
        ]);
        $this->sendEmailNotification($this->email, $this->email, $this->password);
        session()->flash('message', 'Account created successfully!');
        $this->reset();
    }

    public function editAccount($id)
    {
        $account = User::findOrFail($id);
        $this->member_id = $account->member_id;
        $this->account_id = $account->id;
        $this->account_number = $account->user_id;
        $this->name = $account->name;
        $this->number = $account->number;
        $this->email = $account->email;
    }

    public function updateAccount()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|unique:users,number,' . $this->account_id,
            'email' => 'required|email|unique:users,email,' . $this->account_id,
        ]);

        $account = User::findOrFail($this->account_id);
        $account->update([
            'member_id' => $this->member_id,
            'user_id' => $this->account_number,
            'name' => $this->name,
            'number' => $this->number,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Account updated successfully!');
        $this->reset();
    }

    private function sendEmailNotification($email, $username, $password)
{
    $subject = "Account Created - VERIFY";

    $message = "
        <p>Dear {$this->name},</p>
        <p>Your account has been successfully created.</p>
        <p><strong>Login Credentials:</strong></p>
        <ul>
            <li><strong>Email:</strong> {$username}</li>
            <li><strong>Password:</strong> {$password}</li>
        </ul>
        <p>Please change your password after logging in.</p>
        <p>Thank you,<br>GPFCI Team</p>
    ";

    Mail::raw(strip_tags($message), function ($mail) use ($email, $subject, $message) {
        $mail->to($email)
            ->subject($subject)
            ->html($message); // Use .html() if sending HTML emails
    });
}
    public function deleteAccount($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'Account deleted successfully!');
    }

    public function render()
    {
        return view('livewire.admin.add-account', [
            'accounts' => User::where('is_admin', 0)->get(),
        ]);
    }
}
