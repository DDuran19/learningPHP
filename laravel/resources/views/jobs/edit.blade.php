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
                <x-form-field>
                        <x-form-label for="title">
                            Job Title
                        </x-form-label>
                        <div class="mt-2">
                            <x-form-input 
                                id="title" 
                                name="title" 
                                placeholder="Ex. Senior Laravel Developer" 
                                :minlength=3
                                required
                                value="{{ old('title') ?? isset($job) ? $job->title  : '' }}" 
                            />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">
                            Salary
                        </x-form-label>
                        <div class="mt-2">
                            <x-form-input 
                                id="salary" 
                                name="salary" 
                                placeholder="$50,000 - $100,000 /year" 
                                required
                                value="{{ old('salary') ?? isset($job) ? $job->salary  : '' }}" 
                            />
                            <x-form-error name="salary" />
                        </div>
                    </x-form-field>
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
