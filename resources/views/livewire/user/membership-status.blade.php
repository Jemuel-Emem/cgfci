<div class="max-w-4xl mx-auto p-8 bg-gray-50 shadow-md rounded-lg border border-gray-200">
    <h2 class="text-2xl font-extrabold text-center mb-6 text-gray-800">Membership Status</h2>

    <p class="text-lg text-gray-700 mb-6 text-center">
        🎉 You have successfully submitted your membership application.
    </p>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-500 font-medium">Name</p>
                <p class="text-lg font-semibold text-gray-900">
                    {{ $membership->first_name }} {{ $membership->middle_initial }} {{ $membership->last_name }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500 font-medium">Address</p>
                <p class="text-lg font-semibold text-gray-900">{{ $membership->address }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500 font-medium">Birthdate</p>
                <p class="text-lg font-semibold text-gray-900">{{ $membership->birthdate }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500 font-medium">Religion</p>
                <p class="text-lg font-semibold text-gray-900">{{ $membership->religion }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500 font-medium">Join Date</p>
                <p class="text-lg font-semibold text-gray-900">{{ $membership->join_date }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500 font-medium">Parent Leader</p>
                <p class="text-lg font-semibold text-gray-900">{{ $membership->parent_leader }}</p>
            </div>
        </div>
    </div>


</div>
