<div class="max-7-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    @if (session()->has('message'))
    <div class="mt-4 text-green-600">
        {{ session('message') }}
    </div>
@endif
    <div class="flex justify-end">
        <button
            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
            wire:click="showPaymentForm">
            Pay Now
        </button>
    </div>

    <div class="overflow-x-auto">
        <h3 class="font-semibold text-lg mb-4">Your Payment Records</h3>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
  <th class="border border-gray-300 px-4 py-2 text-xl">Date</th>
                    <th class="border border-gray-300 px-4 py-2 text-xl">Receipt</th>
                    <th class="border border-gray-300 px-4 py-2 text-xl">Status</th>

                    <th class="border border-gray-300 px-4 py-2 text-xl">Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fees as $fee)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center text-xl">
                            {{ $fee->created_at->format('Y-m-d') }}
                        </td>

                        <td class="border border-gray-300 px-4 py-2 text-center text-xl">
                            @if($fee->receipt)
                                <a href="{{ asset('storage/' . $fee->receipt) }}" target="_blank" class="text-blue-500 underline">View</a>
                            @else
                                <span class="text-gray-500">No receipt</span>
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center text-xl">{{ ucfirst($fee->status) }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center text-xl">{{ $fee->amount ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500">No fee records found.</td>
                    </tr>
                @endforelse
            </tbody>

            <tfoot>
                <tr class="bg-gray-100">
                    <td colspan="3" class="text-right font-semibold px-4 py-2 text-xl">Total Payments:</td>
                    <td class="text-center font-semibold px-4 py-2 text-xl text-blue-500" >{{ $approvedTotal }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    @if ($showForm)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white w-5/12 rounded-lg shadow-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Submit Payment</h2>

                <div class="mt-4">
                    <label for="amount" class="block text-sm font-semibold">Amount</label>
                    <input
                        type="number"
                        id="amount"
                        wire:model="amount"
                        class="border px-4 py-2 rounded w-full mt-2"
                        placeholder="Enter the amount">
                    @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="receipt" class="block text-sm font-semibold">Upload Receipt</label>
                    <input
                        type="file"
                        id="receipt"
                        wire:model="receipt"
                        class="border px-4 py-2 rounded w-full mt-2">
                    @error('receipt') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>


                <div class="flex justify-end mt-4">
                    <button
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                        wire:click="submitReceipt">
                        Submit
                    </button>

                    <button
                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2"
                        wire:click="hidePaymentForm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif


</div>
