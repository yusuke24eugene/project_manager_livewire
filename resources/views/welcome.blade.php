<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Manager</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex min-h-screen flex-col">
    <header class="w-full ltext-sm my-6">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4 px-6">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>

                    <a
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="cursor-pointer">Logout</button>
                        </form>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <section class="relative bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18]">
        <div class="absolute inset-0 bg-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <div class="max-w-7xl mx-auto px-6 sm:px-8 py-32 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl font-bold leading-tight text-white sm:text-6xl">
                    Take Control of Your Projects
                </h1>
                <p class="mt-6 text-xl text-white opacity-90">
                    Manage tasks, set deadlines, track progress, and collaborate with your team. Simplify your workflow
                    today.
                </p>
                <div class="mt-8">
                    <a href="{{ route('register') }}"
                        class="bg-yellow-500 text-gray-800 font-semibold py-3 px-6 rounded-md hover:bg-yellow-600 transition duration-300">
                        Get Started
                    </a>
                    <a href="{{ route('dashboard') }}"
                        class="ml-4 text-white font-semibold py-3 px-6 rounded-md border border-white hover:bg-white hover:text-gray-800 transition duration-300">
                        Explore Features
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-[#1b1b18] dark:bg-[#333333] text-[#EDEDEC] py-6 mt-10">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 flex flex-col lg:flex-row items-center justify-between">
            <!-- Footer Content Left (Company Info or Social Links) -->
            <div class="text-center lg:text-left">
                <h3 class="text-2xl font-bold mb-3 text-yellow-500">Company Name</h3>
                <p class="text-sm opacity-80">
                    Your one-stop solution for managing projects, teams, and tasks. Start collaborating today.
                </p>
                <div class="mt-4 flex justify-center lg:justify-start gap-6">
                    <!-- Social Icons or Links -->
                    <a href="#" class="text-white hover:text-yellow-500 transition duration-300">Facebook</a>
                    <a href="#" class="text-white hover:text-yellow-500 transition duration-300">Twitter</a>
                    <a href="#" class="text-white hover:text-yellow-500 transition duration-300">Instagram</a>
                </div>
            </div>

            <!-- Footer Content Right (Links) -->
            <div class="mt-8 lg:mt-0 text-center lg:text-right">
                <ul>
                    <li><a href="#about" class="block text-sm hover:text-yellow-500 transition duration-300">About</a>
                    </li>
                    <li><a href="#services"
                            class="block text-sm hover:text-yellow-500 transition duration-300">Services</a></li>
                    <li><a href="#contact"
                            class="block text-sm hover:text-yellow-500 transition duration-300">Contact</a></li>
                    <li><a href="#privacy" class="block text-sm hover:text-yellow-500 transition duration-300">Privacy
                            Policy</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-6 border-t border-[#3E3E3A] pt-4 text-sm opacity-80">
            <p>&copy; 2025 Company Name. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
