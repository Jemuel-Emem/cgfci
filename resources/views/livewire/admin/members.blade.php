<div class="max-w-4xl mx-auto p-6 bg-white  rounded-lg">
    <h2 class="text-lg font-bold mb-4">Approved Members</h2>

    @if($approvedMembers->isEmpty())
        <p class="text-gray-500 text-center">No approved members found.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approvedMembers as $member)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $member->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $member->user->number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
