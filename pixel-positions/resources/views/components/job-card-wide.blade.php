<x-panel class="flex-row gap-x-6 ">

    <div>
        <x-employer-logo />
    </div>

    <div class="flex-1 flex flex-col">

        <div class="self-start text-sm text-gray-400">Laracasts</div>
        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-600 transition-colors duration-300 ">
            Video Producer</h3>
        <p class="text-sm text-gray-400 mt-auto">Full Time - From $60,000</p>
    </div>
    <div class="flex flex-col justify-between items-center ">
        <div class="self-start ml-auto space-x-2">
            <x-tag variant="small" href="#">Remote</x-tag>
            <x-tag variant="small" href="#">22h</x-tag>
        </div>
        <div class="space-x-2 ml-auto">
            @php
                $tags = [
                    ['href' => 'https://laravel.com', 'text' => 'laravel'],
                    ['href' => 'https://laracasts.com', 'text' => 'laracasts'],
                    ['href' => 'https://laravel-news.com', 'text' => 'laravel news'],
                ];
            @endphp
            @foreach ($tags as $tag)
                <x-tag variant="small" :href="$tag['href']">
                    {{ $tag['text'] }}
                </x-tag>
            @endforeach
        </div>

    </div>
</x-panel>
