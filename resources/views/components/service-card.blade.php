@props([
    'name',
    'description',
    'department',
    'slug',
    'icon' => '🏥',
])

<div class="group h-full rounded-3xl border border-gray-100
            bg-white p-6 shadow-sm
            transition-all duration-300
            hover:-translate-y-2 hover:shadow-xl">

    <div class="flex items-center justify-between">

        <div class="flex h-14 w-14 items-center justify-center
                    rounded-2xl bg-green-50 text-3xl
                    transition-colors duration-300
                    group-hover:bg-green-600">

            <span>
                {{ $icon }}
            </span>

        </div>

        <span class="text-xs font-semibold uppercase
                     tracking-wider text-green-600">

            {{ $department }}

        </span>

    </div>


    <div class="mt-6">

        <h3 class="text-xl font-bold text-gray-900">

            {{ $name }}

        </h3>

        <p class="mt-3 text-sm leading-6 text-gray-600">

            {{ $description }}

        </p>

    </div>


    <div class="mt-6">

        <a
            href="{{ route('services.show', $slug) }}"
            class="inline-flex items-center gap-2
                   font-semibold text-green-600
                   transition-colors
                   hover:text-green-800"
        >

            View Details

            <span class="transition-transform duration-300
                         group-hover:translate-x-1">
                →
            </span>

        </a>

    </div>

</div>