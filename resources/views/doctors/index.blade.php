
@extends('layouts.app')

@section('title', 'Doctors')

@section('content')

@if(session('success'))

    <div class="alert alert-success mb-6">

        <span>
            {{ session('success') }}
        </span>

    </div>

@endif

@if($errors->any())

    <div class="alert alert-error mb-6">

        <div>

            <ul class="list-disc list-inside">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    </div>

@endif

<section class="bg-gray-50">

    {{-- Page Header --}}
    <div
        class="relative bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/hospital-bg.jpg') }}');"
    >

        {{-- Green Overlay --}}
        <div class="absolute inset-0 bg-green-800/50"></div>

        {{-- Content --}}
        <div class="relative max-w-7xl mx-auto px-6 py-20 text-center text-white">

            <p class="text-green-100 text-sm font-semibold uppercase tracking-wider">
                Our Medical Team
            </p>

            <h1 class="mt-3 text-4xl md:text-5xl font-bold">
                Our Doctors
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-green-50">
                Meet our medical professionals committed to providing
                quality and compassionate healthcare.
            </p>

        </div>

    </div>


    {{-- Doctors --}}
    <div class="max-w-7xl mx-auto px-6 py-16">

        <!-- Filters -->
        <div class="mb-10 rounded-3xl bg-white p-6 shadow-sm">

            <form
                method="GET"
                action="{{ route('doctors.index') }}"
                class="grid grid-cols-1 gap-4 md:grid-cols-4"
            >

                <!-- Search -->
                <div class="md:col-span-2">

                    <label
                        for="search"
                        class="label"
                    >
                        <span class="label-text font-semibold">
                            Search Doctors
                        </span>
                    </label>

                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Search doctors..."
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
                        href="{{ route('doctors.index') }}"
                        class="btn btn-outline"
                    >
                        Clear
                    </a>

                </div>

            </form>

        </div>



        @if($doctors->count())

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($doctors as $doctor)

                    <x-doctor-card :doctor="$doctor" />

                @endforeach

            </div>


            {{-- Pagination --}}
            <div class="mt-12">

                {{ $doctors->links() }}

            </div>


        @else

            {{-- No Doctors --}}
            <div class="text-center py-16">

                <h2 class="text-2xl font-bold text-gray-800">
                    No Doctors Available
                </h2>

                <p class="mt-3 text-gray-500">
                    Our doctor information will be available soon.
                </p>

            </div>

        @endif

    </div>

</section>

@endsection