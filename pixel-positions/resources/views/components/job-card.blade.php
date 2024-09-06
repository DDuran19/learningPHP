<x-panel class="flex-col text-center">
    <div class="self-start text-sm">Laracasts</div>
    <div class="py-8 font-bold">
        <h3 class="group-hover:text-blue-600 transition-colors duration-300 text-xl font-bold">Video Producer</h3>
        <p class="text-sm mt-4">Full Time - From $60,000</p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div class="space-x-2">
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

        <x-employer-logo :width="42" />
    </div>
</x-panel>
