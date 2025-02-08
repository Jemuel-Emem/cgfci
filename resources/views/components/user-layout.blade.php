<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CGFCI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script> --}}
    <style>
        /* Add this to your CSS file */
.header-animation {
    transition: all 0.3s ease-in-out;
}

.header-scrolled {
    background-color: rgba(255, 255, 255, 0.9);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
}

/* Add this to your CSS file */
.button-animation {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.button-animation:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Add this to your CSS file */
.fade-in {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
/* Add this to your CSS file */
.image-animation {
    animation: zoomIn 1s ease-in-out;
}

@keyframes zoomIn {
    from {
        transform: scale(0.9);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.typing-effect {
    overflow: hidden;
    white-space: nowrap;
    margin: 0 auto;
    letter-spacing: .15em;
    animation: typing 3.5s steps(40, end);
}

@keyframes typing {
    from { width: 0 }
    to { width: 100% }
}

.fade-in-text {
    animation: fadeInText 2s ease-in-out;
}

@keyframes fadeInText {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.logo-animation {
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-30px);
    }
    60% {
        transform: translateY(-15px);
    }
}

.pulse-effect {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

.flip-effect {
    transition: transform 0.6s;
    transform-style: preserve-3d;
}

.flip-effect:hover {
    transform: rotateY(180deg);
}

.hero-background {
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
}

@keyframes gradientBG {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.card-flip {
    perspective: 1000px;
}

.card-flip-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.6s;
    transform-style: preserve-3d;
}

.card-flip:hover .card-flip-inner {
    transform: rotateY(180deg);
}

.card-flip-front, .card-flip-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
}

.card-flip-back {
    transform: rotateY(180deg);
}
    </style>

    <script>
        // Add this to your JavaScript file
window.addEventListener('scroll', function() {
    const header = document.querySelector('.header-animation');
    if (window.scrollY > 50) {
        header.classList.add('header-scrolled');
    } else {
        header.classList.remove('header-scrolled');
    }
});
    </script>
    <style>
        [x-cloak] {
            display: none;
        }

        #logo {
            font-family: "Anton", sans-serif;
            font-weight: 600;
            font-size: 30px;
            font-style: normal;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @wireUiScripts
</head>

<body class="font-sans antialiased min-h-screen flex flex-col bg-no-repeat">
    @livewireScripts
    <x-dialog />
    <x-notifications position="top-left" />


        <!-- Navbar -->
        <div class="w-full mx-auto bg-white flex-shrink-0">
            <div x-data="{ open: false }" class="relative flex flex-col w-full p-5 mx-auto bg-blue-500 md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
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
                    <a href="{{ route('user-dashboard') }}" class="px-2 py-2 text-sm text-white lg:px-6 md:px-3 hover:text-cyan-600 lg:ml-auto">Dashboard</a>
                    {{-- <a href="" class="px-2 py-2 text-sm text-white lg:px-6 md:px-3 hover:text-cyan-600">Apply Plan</a> --}}
                    {{-- <a href="{{ route('user-payplan') }}" class="px-2 py-2 text-sm text-white lg:px-6 md:px-3 hover:text-cyan-600">Membership Fee</a> --}}
                    <a href="{{ route('user-monthlypayment') }}" class="px-2 py-2 text-sm text-white lg:px-6 md:px-3 hover:text-cyan-600">Monthly Payment</a>


                    <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                        <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                            <div>
                                <span class="text-white font-bold"> {{ Auth::user()->name }}</span>
                                <x-dropdown>
                                    <x-dropdown.item label="My Account" class="" href="{{ route('myaccount') }}" />
                                    <x-dropdown.item label="Logout" class="" href="{{ route('logout') }}" />
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Slot -->
        <div class="flex-grow">
            <main class="">
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-blue-500 text-white text-center py-6">
            <div class="container mx-auto">
                <p class="text-sm">&copy; {{ now()->year }} Green Pastures Funeral Chapels Inc. | All Rights Reserved.</p>
                <p class="text-sm">Follow us on:</p>
                <div class="flex justify-center space-x-4 mt-2">
                    <a href="#" class="text-white hover:text-yellow-500"><i class="ri-facebook-circle-line text-2xl"></i></a>
                    <a href="#" class="text-white hover:text-yellow-500"><i class="ri-instagram-line text-2xl"></i></a>
                    <a href="#" class="text-white hover:text-yellow-500"><i class="ri-twitter-line text-2xl"></i></a>
                </div>
            </div>
        </footer>

</body>

</html>
