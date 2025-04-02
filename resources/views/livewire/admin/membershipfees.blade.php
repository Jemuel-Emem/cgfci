<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <div class="flex justify-between mb-4">
        <div>
            <span class="font-semibold text-lg">Monthly Fees</span>
        </div>

    </div>

    @if(session()->has('message'))
        <div class="mb-4 text-green-600">
            {{ session('message') }}
        </div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left">Receipt</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Amount</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($fees as $fee)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">
                        @if($fee->receipt)
                            <img src="{{ asset('storage/' . $fee->receipt) }}" alt="Receipt" class="w-16 h-16 object-cover">
                        @else
                            <span class="text-gray-500">No payment</span>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($fee->amount) }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($fee->status) }}</td>

                    <td class="border border-gray-300 px-4 py-2">
                        @if($fee->status != 'approved' && $fee->status != 'cancelled')
                            <button
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                                wire:click="approveFee({{ $fee->id }})">
                                Approve
                            </button>
                            <button
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2"
                                wire:click="cancelFee({{ $fee->id }})">
                                Cancel
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
            @empty
                <tr>
                    <td colspan="3" class="border border-gray-300 px-4 py-2 text-center">
                        No records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
