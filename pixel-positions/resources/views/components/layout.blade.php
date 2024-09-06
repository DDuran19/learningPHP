<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" />
    <title>Pixel Positions</title>
</head>

<body class="bg-black text-white font-hanken-grotesk">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10 max-w-[986px] mx-auto">
            <div>
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Pixel Positions logo"></img>
                </a>
            </div>
            <div class="space-x-6 font-bold">
                @php
                    $links = [
                        ['href' => '/jobs', 'text' => 'Jobs'],
                        ['href' => '/careers', 'text' => 'Careers'],
                        ['href' => '/salaries', 'text' => 'Salaries'],
                        ['href' => '/companies', 'text' => 'Companies'],
                    ];
                @endphp

                @foreach ($links as $link)
                    <a href="{{ $link['href'] }}">{{ $link['text'] }}</a>
                @endforeach
            </div>
            <div>Post a Job</div>
        </nav>
        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>

</body>

</html>
