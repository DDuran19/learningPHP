<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <form method="POST" action="/login">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Register a new account</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a couple of details.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">
                            Email
                        </x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" id="email" name="email" :minlength=3 required
                                value="{{ old('email') ?? isset($job) ? $job->email : '' }}" />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">
                            Password
                        </x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" id="password" name="password" :minlength=3 required
                                value="{{ old('password') ?? isset($job) ? $job->password : '' }}" />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                </div>

                @if ($errors->has('message'))
                    <p class="text-red-500 font-bold text-xs">{{ $errors->first('message') }}</p>
                @endif
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            {{-- <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button> --}}
            <x-button href="/"> Cancel </x-button>
            <x-form-button> Login </x-form-button>
        </div>
    </form>
</x-layout>
