<div>
    <div class="max-w-7xl mx-auto p-8 bg-white shadow-md rounded-lg">



            <div class=" ">
                <p class="text-lg text-gray-800 mb-2">Gcash Number <span class="font-bold text-blue-600">09360250208</span> </p>
            </div>




        @if (session()->has('message'))
            <p class="text-green-500 mb-4">{{ session('message') }}</p>
        @endif

        <h2 class="text-xl font-bold text-center mb-4">MEMBERSHIP FORM</h2>


        <div class="mb-4 ">
            <label class="block font-semibold mb-1">Member:</label>
            <div class="grid grid-cols-3 gap-4">
                <input wire:model="first_name" type="text" placeholder="First Name" class="border px-4 py-2 rounded w-full">
                @error('first_name') <span class="text-red-500">{{ $message }}</span> @enderror

                <input wire:model="middle_initial" type="text" placeholder="MI" class="border px-4 py-2 rounded w-full">
                @error('middle_initial') <span class="text-red-500">{{ $message }}</span> @enderror

                <input wire:model="last_name" type="text" placeholder="Last Name" class="border px-4 py-2 rounded w-full">
                @error('last_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Address:</label>
            <input wire:model="address" type="text" placeholder="Address" class="border px-4 py-2 rounded w-full">
            @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Email:</label>
            <input wire:model="email" type="text" placeholder="email" class="border px-4 py-2 rounded w-full">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Birthdate (mm/dd/yy):</label>
            <input wire:model="birthdate" type="date" class="border px-4 py-2 rounded w-full">
            @error('birthdate') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Religion:</label>
            <input wire:model="religion" type="text" placeholder="Religion" class="border px-4 py-2 rounded w-full">
            @error('religion') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


        <h3 class="text-lg font-bold mt-6 mb-4">BENEFICIARIES</h3>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Number of Beneficiaries:</label>
            <div class="flex gap-4">
                <input wire:model="beneficiaryCount" type="number" min="1" class="border px-4 py-2 rounded w-full">
                @error('beneficiaryCount') <span class="text-red-500">{{ $message }}</span> @enderror

                <button wire:click="updateBeneficiaries" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Set
                </button>
            </div>
        </div>

        @foreach ($beneficiaries as $index => $beneficiary)
            <div class="grid grid-cols-2 gap-4 mb-4">
                <input wire:model="beneficiaries.{{ $index }}.name" type="text" placeholder="Name (Fname/MI/Lname)" class="border px-4 py-2 rounded w-full">
                @error('beneficiaries.' . $index . '.name') <span class="text-red-500">{{ $message }}</span> @enderror

                <input wire:model="beneficiaries.{{ $index }}.birthdate" type="date" class="border px-4 py-2 rounded w-full">
                @error('beneficiaries.' . $index . '.birthdate') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        @endforeach


        <div class="mt-6">
            <label class="block font-semibold mb-1">Join Date:</label>
            <input wire:model="join_date" type="date" class="border px-4 py-2 rounded w-full">
            @error('join_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


        <div class="mt-4">
            <label class="block font-semibold mb-1">Parent Leader:</label>
            <input wire:model="parent_leader" type="text" placeholder="Parent Leader" class="border px-4 py-2 rounded w-full">
            @error('parent_leader') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <label class="block font-semibold mb-1">Membership Fee Receipt:</label>
            <input type="file" wire:model="membership_fee" class="border px-4 py-2 rounded w-full">
            @error('membership_fee') <span class="text-red-500">{{ $message }}</span> @enderror

            @if ($membership_fee)
                <img src="{{ $membership_fee->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover">
            @endif
        </div>



        <div class="mt-6">
            <button wire:click="applyNow" class="px-6 py-3 bg-yellow-500 text-white rounded hover:bg-yellow-600 w-full">
                Apply Now
            </button>
        </div>
    </div>
</div>
