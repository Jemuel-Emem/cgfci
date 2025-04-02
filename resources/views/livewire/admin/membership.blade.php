<div>
    <h1 class="text-xl font-bold mb-4">Members</h1>


    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200 text-left text-sm font-semibold">
                <th class="py-2 px-4">Member ID</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Address</th>
                <th class="py-2 px-4">Religion</th>
                <th class="py-2 px-4">Membership Fee</th>
                <th class="py-2 px-4">Benefeciaries</th>
                <th class="py-2 px-4">Action</th>


            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $member->id }}</td>
                    <td class="py-2 px-4">{{ $member->email }}</td>
                    <td class="py-2 px-4">{{ $member->first_name }} {{ $member->middle_initial }} {{ $member->last_name }}</td>
                    <td class="py-2 px-4">{{ $member->address }}</td>
                    <td class="py-2 px-4">{{ $member->religion }}</td>
                    <td class="py-2 px-4">
                        @if ($member->membership_fee)
                            <a href="{{ asset('storage/' . $member->membership_fee) }}" target="_blank" rel="noopener noreferrer" class="inline-block">
                                <img src="{{ asset('storage/' . $member->membership_fee) }}"
                                     alt="Membership Fee Receipt"
                                     class="w-32 h-32 object-cover hover:opacity-80 transition-opacity duration-200 cursor-pointer">
                            </a>
                        @endif
                    </td>
                    <td class="py-2 px-4">
                        <button
                            class=" text-green-500 px-3 py-1 rounded hover:text-green-600"
                            wire:click="viewBeneficiaries({{ $member->id }})">
                            View Beneficiaries
                        </button>
                    </td>
                    <td>
                        <a href="{{ route('admin.add_account') }}" class="bg-blue-700 p-1 text-white rounded-md hover:bg-blue-900">Create Account</a>
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
