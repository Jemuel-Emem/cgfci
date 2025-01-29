<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AlpineJS for interactivity -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="antialiased">

<div x-data="{ open: false, policyOpen: false }">
    <div class="w-full mx-auto bg-white flex-shrink-0">
        <div class="relative flex flex-col w-full p-5 mx-auto bg-blue-500 md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between lg:justify-start">
                <a class="tracking-tight text-black uppercase focus:outline-none focus:ring lg:text-2xl flex items-center gap-4" href="/">
                    <img src="{{ asset('images/Screenshot 2025-01-09 185647.png') }}" alt="Violation Photo" class="w-16 h-16 border rounded-full">
                    <div id="logo" class="flex flex-col">
                        <h1 class="text-white text-lg font-bold">DAMAYAN PROGRAM</h1>
                        <p class="text-yellow-500 text-sm">Green Pastures Funeral Chapels Inc.</p>
                    </div>
                </a>
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">
                <a href="{{ route('register') }}" class="px-2 py-2 text-sm text-white lg:px-6 md:px-3 hover:text-cyan-600">Register</a>
                <a href="{{ route('login') }}" class="px-2 py-2 text-sm text-white lg:px-6 md:px-3 hover:text-cyan-600">Login</a>
            </nav>
        </div>
    </div>

    <div class="p-10 rounded-lg shadow-sm text-blue-500">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">CPFCI Life Plan</h1>
                <p class="text-xl md:text-2xl mb-6">
                    <span class="text-yellow-300 font-semibold">Alaga Ang Pamilya</span>
                </p>
                <p class="text-lg leading-relaxed">
                    A trusted companion for securing your family's future and ensuring peace of mind.
                    Join us in creating a worry-free tomorrow, because your family deserves the best care.
                </p>
                <a href="{{ route('register') }}" class="inline-block mt-6 px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-lg shadow-md">
                    Apply Now
                </a>

                <button @click="policyOpen = !policyOpen" class="w-32 inline-block mt-6 px-6 py-3 bg-blue-500 text-center hover:bg-blue-600 text-white font-medium rounded-lg shadow-md">
                    Policy
                </button>
            </div>
            <div class="md:w-1/2">
                <img src="{{ asset('images/fam.jpg') }}" alt="Family Care" class="rounded-lg shadow-lg">
            </div>
        </div>
    </div>


    <div x-show="policyOpen" class="container mx-auto p-6" x-cloak>

        <header class="text-center mb-8">
            <h1 class="text-4xl font-bold text-blue-900">DAMAYAN PROGRAM POLICY</h1>
            <p class="text-lg text-gray-600 mt-2">Your support in times of need</p>
        </header>


        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-semibold text-blue-800 mb-4">Qualifications</h2>
            <ul class="list-disc list-inside space-y-2">
                <li>Must pay the amount of <span class="font-bold">FIVE HUNDRED PESOS (Php 500.00)</span> as a lifetime fee.</li>
                <li>One-time payment only. Non-refundable.</li>
                <li>Full pledge members must contribute <span class="font-bold">TEN PESOS (Php 10.00)</span> for every deceased member.</li>
            </ul>
        </section>


        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-semibold text-blue-800 mb-4">Coverage</h2>
            <ul class="list-disc list-inside space-y-2">
                <li>Husband, Wife, and Dependent Children.</li>
                <li>Another membership for children who have their own family.</li>
            </ul>
        </section>


        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-semibold text-blue-800 mb-4">Effective Date</h2>
            <p>Six (6) months upon enrollment (Contestability Period).</p>
        </section>


        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-semibold text-blue-800 mb-4">Benefits</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="text-xl font-semibold text-blue-700">GPFCI Services</h3>
                    <ul class="list-disc list-inside pl-5 mt-2">
                        <li>Casket and complete setup with lights, stand, curtain, carpet, flowers, and tarpaulin.</li>
                        <li>Funeral Hearse.</li>
                        <li>10 days embalming.</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-blue-700">Burial Assistance</h3>
                    <p>The GPFCI will give a Burial Assistance amounting to <span class="font-bold">FIVE THOUSAND PESOS (Php 5000.00)</span> to the principal member only.</p>
                </div>
            </div>
        </section>


        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-semibold text-blue-800 mb-4">Requirements for Death Claim</h2>
            <ul class="list-disc list-inside space-y-2">
                <li>Death Certificate.</li>
                <li>Official GPFCI Damayan Membership Card.</li>
                <li>Valid ID of Claimant:
                    <ul class="list-disc list-inside pl-5">
                        <li>Driver's License.</li>
                        <li>Any valid Government Identification Card.</li>
                        <li>Marriage Contract.</li>
                    </ul>
                </li>
            </ul>
        </section>


        <section class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-blue-800 mb-4">Penalties</h2>
            <ul class="list-disc list-inside space-y-2">
                <li>1st Offense: Fine of <span class="font-bold">ONE HUNDRED PESOS (Php 100.00)</span> if no payment within 3 consecutive contributions.</li>
                <li>2nd Offense: Fine of <span class="font-bold">FIVE HUNDRED PESOS (Php 500.00)</span> if no payment for another 3 consecutive contributions.</li>
                <li>3rd Offense: Termination of membership if no payment for another 3 consecutive contributions.</li>
            </ul>
        </section>
            </div>
        </section>
    </div>
</div>

</body>
</html>
