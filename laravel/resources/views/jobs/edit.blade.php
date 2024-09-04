<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>
    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Job Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title" autocomplete="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Ex. Senior Laravel Developer" :minlength=3
                                    value="{{ old('title') ?? $job->title }}" required>
                            </div>
                            @if ($errors->has('title'))
                                <p class="text-red-500 font-bold text-xs">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="salary" id="salary" autocomplete="salary"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="$50,000 - $100,000 /year" value="{{ old('salary') ?? $job->salary }}"
                                    required>
                            </div>
                            @if ($errors->has('salary'))
                                <p class="text-red-500 font-bold text-xs">{{ $errors->first('salary') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($errors->has('message'))
                    <p class="text-red-500 font-bold text-xs">{{ $errors->first('message') }}</p>
                @endif
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div>
                <x-button role="button" type="submit" form="delete-form" href="/jobs/{{ $job->id }}"
                    class="text-red-500 hover:text-red-700">
                    Delete
                </x-button>
            </div>
            <div class="flex items-center gap-x-6">

                <a href="/jobs/{{ $job->id }}" type="button"
                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update Job Listing
                </button>
            </div>
        </div>
    </form>

    <form action="/jobs/{{ $job->id }}" method="post" hidden id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
