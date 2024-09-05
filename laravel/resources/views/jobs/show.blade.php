<x-layout>
    <x-slot:heading>
        Job: {{ $job->title }}
    </x-slot:heading>
    <a href="/jobs" class="py-6 text-blue-500 hover:underline">Go Back</a>
    <h1>
        <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year
    </h1>
    <strong>Company</strong>: {{ $job->employer->name }}

    @can('edit-job', $job)
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">
                Edit Job
            </x-button>
        </p>
    @endcan
</x-layout>
