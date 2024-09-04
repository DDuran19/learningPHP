<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <h1>
        <div class="space-y-4">

            @foreach($jobs as $job)
            <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl hover:border-gray-500">
                <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                    <div class="text-xs font-bold text-blue-500">{{ $job->employer->name }}</div>
                    <div>
                        <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </h1>
</x-layout>