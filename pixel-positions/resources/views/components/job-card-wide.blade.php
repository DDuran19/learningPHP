@props(['job'])

<x-panel class="flex-row gap-x-6 ">

    <div>
        <x-employer-logo />
    </div>

    <div class="flex-1 flex flex-col">

        <div class="self-start text-sm text-gray-400">{{ htmlspecialchars($job->employer->name) }}</div>
        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-600 transition-colors duration-300 ">
        {{ htmlspecialchars($job->title) }}</h3>
        <p class="text-sm text-gray-400 mt-auto">{{ htmlspecialchars($job->location) }} - {{ htmlspecialchars($job->salary) }} </p>
    </div>
    <div class="flex flex-col justify-between items-center ">
        <div class="self-start ml-auto space-x-2">
            .
        </div>
        <div class="space-x-2 ml-auto">
            @foreach ($job->tags as $tag)
                <x-tag variant="small" :$tag/>
            @endforeach
        </div>

    </div>
</x-panel>
