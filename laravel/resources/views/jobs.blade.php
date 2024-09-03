<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <h1>
        @foreach($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="hover:underline">
                    <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year
                </a>
            </li>
        @endforeach
    </h1>
</x-layout>