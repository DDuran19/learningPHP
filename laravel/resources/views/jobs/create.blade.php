<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a couple of details.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">
                            Job Title
                        </x-form-label>
                        <div class="mt-2">
                            <x-form-input id="title" name="title" placeholder="Ex. Senior Laravel Developer"
                                :minlength=3 required value="{{ old('title') ?? isset($job) ? $job->title : '' }}" />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">
                            Salary
                        </x-form-label>
                        <div class="mt-2">
                            <x-form-input id="salary" name="salary" placeholder="$50,000 - $100,000 /year" required
                                value="{{ old('salary') ?? isset($job) ? $job->salary : '' }}" />
                            <x-form-error name="salary" />
                        </div>
                    </x-form-field>
                </div>

                @if ($errors->has('message'))
                    <p class="text-red-500 font-bold text-xs">{{ $errors->first('message') }}</p>
                @endif
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button> Submit Job </x-form-button>
        </div>
    </form>
</x-layout>
