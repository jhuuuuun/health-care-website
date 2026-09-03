@extends('layouts.admin')

@section('title', 'Doctor Details')

@section('content')

<div class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <div
        class="relative bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/hospital-bg.jpg') }}');"
    >

        <div class="absolute inset-0 bg-green-800/80"></div>

        <div class="relative mx-auto max-w-7xl px-6 py-16 text-white">

            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                <div>
                    <p class="text-sm font-semibold uppercase tracking-wider text-green-200">
                        Administration
                    </p>

                    <h1 class="mt-2 text-3xl font-bold md:text-4xl">
                        Doctor Details
                    </h1>

                    <p class="mt-2 text-green-100">
                        View complete doctor information.
                    </p>
                </div>

                <a
                    href="{{ route('admin.doctors.index') }}"
                    class="btn btn-outline border-white text-white hover:bg-white hover:text-green-700"
                >
                    ← Back to Doctors
                </a>

            </div>

        </div>
    </div>


    {{-- Doctor Information --}}
    <div class="mx-auto max-w-5xl px-6 py-12">

        <div class="rounded-3xl bg-white p-6 shadow-sm md:p-10">

            <div class="grid grid-cols-1 gap-10 md:grid-cols-3">

                {{-- Photo --}}
                <div class="md:col-span-1">

                    @if($doctor->photo)

                        <img
                            src="{{ asset('storage/' . $doctor->photo) }}"
                            alt="{{ $doctor->full_name }}"
                            class="h-80 w-full rounded-2xl object-cover shadow-sm"
                        >

                    @else

                        <div class="flex h-80 w-full items-center justify-center rounded-2xl bg-green-100">

                            <svg
                                class="h-24 w-24 text-green-600"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
                                />
                            </svg>

                        </div>

                    @endif

                </div>


                {{-- Information --}}
                <div class="md:col-span-2">

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                        <div>

                            <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
                                {{ $doctor->specialization }}
                            </p>

                            <h2 class="mt-2 text-3xl font-bold text-gray-900">
                                Dr. {{ $doctor->full_name }}
                            </h2>

                        </div>

                        @if($doctor->status)

                            <span class="badge badge-success badge-lg">
                                Active
                            </span>

                        @else

                            <span class="badge badge-error badge-lg">
                                Inactive
                            </span>

                        @endif

                    </div>


                    {{-- Details --}}
                    <div class="mt-8 space-y-6">

                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Department
                            </p>

                            <p class="mt-1 text-lg text-gray-900">
                                {{ $doctor->department->name }}
                            </p>
                        </div>


                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Credentials
                            </p>

                            <p class="mt-1 text-lg text-gray-900">
                                {{ $doctor->credentials ?: 'Not provided' }}
                            </p>
                        </div>


                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Schedule
                            </p>

                            <p class="mt-1 text-lg text-gray-900">
                                {{ $doctor->schedule ?: 'Not provided' }}
                            </p>
                        </div>


                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Biography
                            </p>

                            <p class="mt-2 leading-7 text-gray-600">
                                {{ $doctor->biography ?: 'No biography provided.' }}
                            </p>
                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="mt-10 flex flex-wrap gap-3">

                        <a
                            href="{{ route('admin.doctors.edit', $doctor) }}"
                            class="btn btn-success"
                        >
                            Edit Doctor
                        </a>


                        <form
                            action="{{ route('admin.doctors.destroy', $doctor) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this doctor?');"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-error"
                            >
                                Delete Doctor
                            </button>

                        </form>


                        <a
                            href="{{ route('admin.doctors.index') }}"
                            class="btn btn-outline"
                        >
                            Back
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection