@extends('layouts.app')

@section('title', 'Medical Services')

@section('content')

<section class="bg-gray-50">

    <div class="mx-auto max-w-7xl px-6 py-20">

        <div class="mx-auto max-w-3xl text-center">

            <span class="text-sm font-semibold uppercase
                         tracking-wider text-green-600">
                Healthcare Services
            </span>

            <h1 class="mt-3 text-4xl font-bold text-gray-900">
                Our Medical Services
            </h1>

            <p class="mt-4 text-gray-600">
                Explore our healthcare services and medical
                specialties designed to support your health.
            </p>

        </div>

        <!-- Filters -->
        <div class="mb-10 rounded-3xl bg-white p-6 shadow-sm">

            <form
                method="GET"
                action="{{ route('services.index') }}"
                class="grid grid-cols-1 gap-4 md:grid-cols-4"
            >

                <!-- Search -->
                <div class="md:col-span-2">

                    <label
                        for="search"
                        class="label"
                    >
                        <span class="label-text font-semibold">
                            Search Services
                        </span>
                    </label>

                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Search medical services..."
                        class="input input-bordered w-full"
                    >

                </div>


                <!-- Department -->
                <div>

                    <label
                        for="department"
                        class="label"
                    >
                        <span class="label-text font-semibold">
                            Department
                        </span>
                    </label>

                    <select
                        id="department"
                        name="department"
                        class="select select-bordered w-full"
                    >

                        <option value="">
                            All Departments
                        </option>

                        @foreach($departments as $item)

                            <option
                                value="{{ $item->id }}"
                                @selected($department == $item->id)
                            >
                                {{ $item->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Buttons -->
                <div class="flex items-end gap-2">

                    <button
                        type="submit"
                        class="btn btn-success flex-1"
                    >
                        Search
                    </button>

                    <a
                        href="{{ route('services.index') }}"
                        class="btn btn-outline"
                    >
                        Clear
                    </a>

                </div>

            </form>

        </div>


        <div class="mt-12 grid grid-cols-1 gap-6
                    sm:grid-cols-2 lg:grid-cols-4">

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


        <div class="mt-12">
            {{ $services->links() }}
        </div>

    </div>

</section>

@endsection