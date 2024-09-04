<x-layout>
    <x-slot:heading>
        Job #{{ $job['id'] }}
    </x-slot:heading>
    <a href="/jobs" class="py-6 text-blue-500 hover:underline">Go Back</a>
    <h1>
        <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year
    </h1>

    <p class="mt-6">
        <x-button>
            Edit Job
        </x-button>
    </p>
</x-layout>
