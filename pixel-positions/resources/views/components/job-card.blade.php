@props(['job'])
<x-panel class="flex-col text-center">
    <div class="self-start text-sm">{{ htmlspecialchars($job->employer->name) }}</div>
    <div class="py-8 font-bold">
        <h3 class="group-hover:text-blue-600 transition-colors duration-300 text-xl font-bold">{{ htmlspecialchars($job->title) }}</h3>
        <p class="text-sm mt-4">{{ htmlspecialchars($job->location) }} - {{ htmlspecialchars($job->salary) }} </p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div class="space-x-2">
            @foreach ($job->tags as $tag)
                <x-tag variant="small" :$tag />
            @endforeach
        </div>

        <x-employer-logo :width="42" />
    </div>
</x-panel>
