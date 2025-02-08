<div class="p-6 bg-white rounded-xl shadow-lg border border-gray-200">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
        <svg class="w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2a10 10 0 11-10 10A10 10 0 0112 2zm0 18a8 8 0 100-16 8 8 0 000 16z"/>
            <path d="M14 10a2 2 0 11-2-2 2 2 0 012 2zm1 6.93V16a2 2 0 00-2-2H9a2 2 0 00-2 2v.93a6.991 6.991 0 0010 0z"/>
        </svg>
        Beneficiaries
    </h2>

    @if($beneficiaries->isEmpty())
        <p class="text-gray-500 text-center py-4 italic">No beneficiaries found for this user.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($beneficiaries as $beneficiary)
                <div class="bg-gray-100 rounded-lg p-4 shadow-sm border border-gray-300 hover:shadow-md transition-all">
                    <h3 class="text-lg font-semibold text-gray-700">
                        <svg class="inline w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2a10 10 0 11-10 10A10 10 0 0112 2zm0 18a8 8 0 100-16 8 8 0 000 16z"/>
                            <path d="M14 10a2 2 0 11-2-2 2 2 0 012 2zm1 6.93V16a2 2 0 00-2-2H9a2 2 0 00-2 2v.93a6.991 6.991 0 0010 0z"/>
                        </svg>
                        {{ $beneficiary->beneficiary_name }}
                    </h3>
                    <p class="text-gray-600 text-sm mt-1">
                        <strong>Birthdate:</strong> {{ \Carbon\Carbon::parse($beneficiary->birthdate)->format('F d, Y') }}
                    </p>
                </div>
            @endforeach
        </div>
    @endif
</div>
