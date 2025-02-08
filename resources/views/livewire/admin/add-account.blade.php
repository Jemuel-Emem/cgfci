<div class="mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-xl font-bold text-center mb-4">{{ $account_id ? 'Update Account' : 'Create Account' }}</h2>

    @if (session()->has('message'))
        <p class="text-green-500 mb-4">{{ session('message') }}</p>
    @endif

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block font-semibold mb-1">Member ID:</label>
            <input type="text" wire:model="member_id" class="border px-4 py-2 rounded w-full" placeholder="Member Id">
            @error('member_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">Account Number:</label>
            <input type="text" wire:model="account_number" class="border px-4 py-2 rounded w-full" placeholder="Account number">
            @error('account_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">Full Name:</label>
            <input type="text" wire:model="name" class="border px-4 py-2 rounded w-full" placeholder="Full name">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Phone Number:</label>
            <input type="text" wire:model="number" class="border px-4 py-2 rounded w-full" placeholder="Phone number">
            @error('number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block font-semibold mb-1">Email:</label>
            <input type="email" wire:model="email" class="border px-4 py-2 rounded w-full" placeholder="Email">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Password:</label>
            <input type="password" wire:model="password" class="border px-4 py-2 rounded w-full" placeholder="Password">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="mt-6">
        @if($account_id)
            <button wire:click="updateAccount" class="px-6 py-3 bg-yellow-500 text-white rounded hover:bg-yellow-600 w-full">
                Update Account
            </button>
        @else
            <button wire:click="createAccount" class="px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600 w-full">
                Create Account
            </button>
        @endif
    </div>

    <h2 class="text-xl font-bold mt-8">Account List</h2>

    <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Member ID</th>
                <th class="border p-2">Account Number</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Phone</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td class="border p-2 text-center">{{ $account->member_id }}</td>
                    <td class="border p-2 text-center">{{ $account->user_id }}</td>
                    <td class="border p-2 text-center">{{ $account->name }}</td>
                    <td class="border p-2 text-center">{{ $account->email }}</td>
                    <td class="border p-2 text-center">{{ $account->number }}</td>
                    <td class="border p-2 text-center flex gap-2 justify-center">
                        <button wire:click="editAccount({{ $account->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                        <button wire:click="deleteAccount({{ $account->id }})" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
