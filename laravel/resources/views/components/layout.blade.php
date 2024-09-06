<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/js/app.js')
    <title>Home</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <x-nav-link href="/" :active="request()->is('/')" type="button">Home</x-nav-link>
                                <x-nav-link href="/jobs" :active="request()->is('jobs')" type="button">Jobs</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')" type="button">Contact</x-nav-link>

                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        @guest
                            <x-nav-link href="/login" :active="request()->is('login')" type="button">Login</x-nav-link>
                            <x-nav-link href="/register" :active="request()->is('register')" type="button">Register</x-nav-link>
                        @endguest

                        @auth
                            <form action="/logout" method="post" id="logout-form">
                                @csrf
                                <x-form-button>Logout</x-form-button>
                            </form>
                        @endauth
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        @guest
                            <x-nav-link href="/login" :active="request()->is('login')" type="button">Login</x-nav-link>
                            <x-nav-link href="/register" :active="request()->is('register')" type="button">Register</x-nav-link>
                        @endguest
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <x-nav-link href="/" :mobile="true" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/jobs" :mobile="true" :active="request()->is('jobs')">Jobs</x-nav-link>
                    <x-nav-link href="/contact" :mobile="true" :active="request()->is('contact')">Contact</x-nav-link>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                            <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>

                <x-button href="/jobs/create">New Job Listing</x-button>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
