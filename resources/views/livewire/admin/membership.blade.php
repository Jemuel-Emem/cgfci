<div>
    <h1 class="text-xl font-bold mb-4">Members</h1>

    <!-- Members Table -->
    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200 text-left text-sm font-semibold">

                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Address</th>
                <th class="py-2 px-4">Religion</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr class="border-t">

                    <td class="py-2 px-4">{{ $member->first_name }} {{ $member->middle_initial }} {{ $member->last_name }}</td>
                    <td class="py-2 px-4">{{ $member->address }}</td>
                    <td class="py-2 px-4">{{ $member->religion }}</td>
                    <td class="py-2 px-4">{{ $member->status }}</td>
                    <td class="py-2 px-4">
                        @if($member->status != 'approved' && $member->status != 'declined')
                            <button
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                                wire:click="approveMember({{ $member->id }})"
                                wire:loading.attr="disabled"
                                wire:target="approveMember({{ $member->id }})">
                                Approve
                            </button>
                            <button
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2"
                                wire:click="declineMember({{ $member->id }})"
                                wire:loading.attr="disabled"
                                wire:target="declineMember({{ $member->id }})">
                                Decline
                            </button>
                        @else
                            <button
                                class="bg-gray-500 text-white px-4 py-2 rounded cursor-not-allowed"
                                disabled>
                                Action Disabled
                            </button>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>


    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white w-1/2 rounded-lg shadow-lg p-4">
                <h2 class="text-lg font-bold mb-4">Beneficiaries</h2>

                <table class="min-w-full bg-gray-100 shadow rounded">
                    <thead>
                        <tr class="bg-gray-300 text-left text-sm font-semibold">

                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Birthdate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($beneficiaries as $beneficiary)
                            <tr class="border-t">

                                <td class="py-2 px-4">{{ $beneficiary->beneficiary_name }}</td>
                                <td class="py-2 px-4">{{ $beneficiary->birthdate }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 mt-4"
                    wire:click="closeModal">
                    Close
                </button>
            </div>
        </div>
    @endif
</div>
