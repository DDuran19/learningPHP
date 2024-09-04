<x-layout>
    <x-slot:heading>
        Job Listings
        @section('subheading')
            <a href="/jobs/create" class="py-6 hover:color-blue hover:underline font-bold text-xs">Add New Job
                Listing</a>
        @endsection
    </x-slot:heading>
    <h1>
        <div class="space-y-4">

            @foreach ($jobs as $job)
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

        <div class="mt-6">
            {{ $jobs->links() }}
        </div>
    </h1>
</x-layout>
