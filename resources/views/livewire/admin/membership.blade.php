<div class="p-6 bg-white shadow rounded-lg">


    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    @if ($users->isEmpty())
        <p class="text-gray-700">No pending memberships to display.</p>
    @else
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Number</th>
                    <th class="border px-4 py-2">Membership Fee</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ $user->number }}</td>
                        <td class="border px-4 py-2">
                            @if ($user->membership_fee)
                                <img src="{{ asset('storage/' . $user->membership_fee) }}" alt="Photo" class="w-16 h-16 rounded-full">
                            @else
                                <span class="text-gray-500">No Photo</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">

                            <button
                                wire:click="approve({{ $user->id }})"
                                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 disabled:opacity-50 disabled:cursor-not-allowed"
                                wire:loading.attr="disabled"
                                wire:target="approve({{ $user->id }})"
                                @if($user->approval_request == true) disabled @endif>
                                Approve
                            </button>


                            <button
                                wire:click="decline({{ $user->id }})"
                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 disabled:opacity-50 disabled:cursor-not-allowed"
                                wire:loading.attr="disabled"
                                wire:target="decline({{ $user->id }})"
                                @if($user->approval_request == true) disabled @endif>
                                Decline
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
