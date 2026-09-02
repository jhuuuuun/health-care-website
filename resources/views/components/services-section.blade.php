@props([
    'services' => collect(),
])

<section class="bg-gray-50">

    <div class="max-w-7xl mx-auto px-6 py-20 lg:py-24">

        <!-- Heading -->
        <div class="max-w-3xl mx-auto text-center">

            <span class="text-sm font-semibold uppercase
                         tracking-wider text-green-600">
                Our Services
            </span>

            <h2 class="mt-3 text-3xl md:text-4xl
                       font-bold text-gray-900">
                Quality Healthcare Services
            </h2>

            <p class="mt-4 text-gray-600">
                Explore our range of medical services designed
                to support your health and well-being.
            </p>

        </div>


        <!-- Services Grid -->
        <div class="mt-12 grid grid-cols-1
                    sm:grid-cols-2
                    lg:grid-cols-4
                    gap-6">

            @forelse($services as $service)

                <x-service-card
                    :name="$service->name"
                    :description="$service->description"
                    :department="$service->department->name"
                    :slug="$service->slug"
                    icon="🏥"
                />

            @empty

                <div class="col-span-full py-12 text-center">

                    <p class="text-gray-500">
                        No medical services are currently available.
                    </p>

                </div>

            @endforelse

        </div>


        <!-- Button -->
        <div class="mt-12 text-center">

            <a
                href="{{ route('services.index') }}"
                class="btn btn-success btn-lg"
            >
                View All Services
            </a>

        </div>

    </div>

</section>