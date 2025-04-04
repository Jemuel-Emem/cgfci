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
                <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
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
                            <a href="{{ asset('storage/' . $fee->receipt) }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('storage/' . $fee->receipt) }}" alt="Receipt" class="w-16 h-16 object-cover hover:opacity-75 transition-opacity">
                            </a>
                        @else
                            <span class="text-gray-500">No payment</span>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $fee->user->name ?? 'No user linked' }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($fee->amount) }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($fee->status) }}</td>

                    <td class="border border-gray-300 px-4 py-2">
                        @if($fee->status != 'approved' && $fee->status != 'cancelled')
                            <button
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                                wire:click="approveFee({{ $fee->id }})">
                                RECEIVED
                            </button>
                            <button
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2"
                                wire:click="cancelFee({{ $fee->id }})">
                                DECLINE
                            </button>
                        @else
                            <button
                                class="bg-gray-500 text-white px-4 py-2 rounded cursor-not-allowed"
                                disabled>
                                Action Disabled
                            </button>
                        @endif

                        <button wire:click="openModal({{ $fee->id }})"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Send Email
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border border-gray-300 px-4 py-2 text-center">
                        No records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Email Modal --}}
    <div x-data="{ open: @entangle('showModal') }">
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
            <div class="bg-white w-1/3 rounded-lg shadow-lg p-6">
                <h2 class="text-lg font-bold mb-4">Send Email</h2>

                <form wire:submit.prevent="sendCustomEmail">
                    <label for="emailMessage" class="block text-gray-700">Message:</label>
                    <textarea wire:model.defer="emailMessage"
                        class="w-full border border-gray-300 rounded p-2 mb-4 h-32" required></textarea>

                    <div class="flex justify-end">
                        <button type="button" wire:click="closeModal"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">
                            Cancel
                        </button>

                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
