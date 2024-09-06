<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl"> Let's Find You A Great Job</h1>
            <form action="" class="mt-6">
                <input type="search" placeholder="Web Developer ..."
                    class="rounded-xl bg-white/5 border border-white/10 focus:bg-white/15 focus:outline-white/25   px-5 py-4 w-full max-w-xl transition-colors duration-300" />
            </form>

        </section>

        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">

                <x-job-card />
                <x-job-card />
                <x-job-card />
            </div>
        </section>
        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="space-x-2 mt-1">
                <x-tag href="#">laravel</x-tag>
                <x-tag href="#">laravel</x-tag>
                <x-tag href="#">laravel</x-tag>
                <x-tag href="#">laravel</x-tag>
                <x-tag href="#">laravel</x-tag>
                <x-tag href="#">laravel</x-tag>
                <x-tag href="#">laravel</x-tag>
                <x-tag href="#">laravel</x-tag>
            </div>
        </section>
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-6 space-y-6">

                <x-job-card-wide />
                <x-job-card-wide />
                <x-job-card-wide />
            </div>
        </section>
    </div>
</x-layout>
