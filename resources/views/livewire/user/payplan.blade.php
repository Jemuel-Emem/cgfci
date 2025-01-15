<div>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        @if($fees->isEmpty())
            <p class="text-center text-gray-500">No membership fees found for your account.</p>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">Receipt</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fees as $fee)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                @if($fee->receipt)

                                    <img src="{{ asset('storage/' . $fee->receipt) }}" alt="Receipt" class="w-16 h-16 object-cover">
                                @else
                                    No payment
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ ucfirst($fee->status) }}</td>

                            <td class="border border-gray-300 px-4 py-2">
                                @if($fee->status === 'not-paid')
                                    <button
                                        class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
                                        wire:click="openModal({{ $fee->id }})">
                                        Pay Now
                                    </button>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    @if ($showModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white w-1/2 rounded-lg shadow-lg p-4">

            <div class="mt-4">
                <label for="receipt" class="block text-sm font-semibold">Upload Receipt</label>
                <input type="file" id="receipt" wire:model="receipt" class="border px-4 py-2 rounded w-full mt-2">
                @error('receipt') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end mt-4">
                <button
                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
                    wire:click="submitReceipt">
                    Submit
                </button>

                <button
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2"
                    wire:click="closeModal">
                    Close
                </button>
            </div>
        </div>
    </div>
@endif


</div>
