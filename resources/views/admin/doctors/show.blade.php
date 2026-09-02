@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div
    class="relative bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('images/hospital-bg.jpg') }}');"
>

    {{-- Green Overlay --}}
    <div class="absolute inset-0 bg-green-800/75"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-16 text-center text-white">

        <p class="text-green-100 text-sm font-semibold uppercase tracking-wider">
            Our Medical Team
        </p>

        <h1 class="mt-3 text-4xl md:text-5xl font-bold">
            Doctor Profile
        </h1>

    </div>

</div>


{{-- Doctor Profile --}}
<section class="bg-gray-50">

    <div class="max-w-6xl mx-auto px-6 py-16">

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <div class="grid grid-cols-1 lg:grid-cols-3">

                {{-- Doctor Photo --}}
                <div class="bg-green-50">

                    @if($doctor->photo)

                        <img
                            src="{{ asset('storage/' . $doctor->photo) }}"
                            alt="{{ $doctor->full_name }}"
                            class="w-full h-full min-h-[400px] object-cover"
                        >

                    @else

                        <div class="min-h-[400px] flex items-center justify-center">

                            <div class="text-center">

                                <div
                                    class="w-32 h-32 mx-auto rounded-full
                                           bg-green-100 flex items-center
                                           justify-center"
                                >

                                    <svg
                                        class="w-16 h-16 text-green-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M5.121 17.804A9 9 0 1118.879 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                        />

                                    </svg>

                                </div>

                                <p class="mt-4 text-green-600 font-medium">
                                    Doctor Photo
                                </p>

                            </div>

                        </div>

                    @endif

                </div>


                {{-- Doctor Information --}}
                <div class="lg:col-span-2 p-8 lg:p-12">

                    {{-- Specialization --}}
                    <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
                        {{ $doctor->specialization }}
                    </p>


                    {{-- Name --}}
                    <h2 class="mt-3 text-3xl md:text-4xl font-bold text-gray-900">
                        Dr. {{ $doctor->full_name }}
                    </h2>


                    {{-- Department --}}
                    @if($doctor->department)

                        <div class="mt-4 flex items-center gap-2 text-gray-600">

                            <svg
                                class="w-5 h-5 text-green-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 7h2m-2 4h2m4-4h2m-2 4h2M9 21v-4h6v4"
                                />

                            </svg>

                            <span>
                                {{ $doctor->department->name }}
                            </span>

                        </div>

                    @endif


                    {{-- Credentials --}}
                    @if($doctor->credentials)

                        <div class="mt-6">

                            <h3 class="text-lg font-semibold text-gray-900">
                                Credentials
                            </h3>

                            <p class="mt-2 text-gray-600">
                                {{ $doctor->credentials }}
                            </p>

                        </div>

                    @endif


                    {{-- Biography --}}
                    @if($doctor->biography)

                        <div class="mt-8">

                            <h3 class="text-lg font-semibold text-gray-900">
                                About the Doctor
                            </h3>

                            <p class="mt-3 leading-7 text-gray-600">
                                {{ $doctor->biography }}
                            </p>

                        </div>

                    @endif


                    {{-- Schedule --}}
                    @if($doctor->schedule)

                        <div class="mt-8">

                            <h3 class="text-lg font-semibold text-gray-900">
                                Consultation Schedule
                            </h3>

                            <div class="mt-3 p-4 rounded-xl bg-green-50 border border-green-100">

                                <p class="text-green-800">
                                    {{ $doctor->schedule }}
                                </p>

                            </div>

                        </div>

                    @endif


                    {{-- Buttons --}}
                    <div class="mt-10 flex flex-col sm:flex-row gap-4">

                        <a
                            href="{{ route('appointments.create') }}"
                            class="inline-flex items-center justify-center
                                   px-6 py-3 rounded-lg
                                   bg-green-700 text-white font-semibold
                                   hover:bg-green-800
                                   transition"
                        >
                            Book an Appointment
                        </a>


                        <a
                            href="{{ route('doctors.index') }}"
                            class="inline-flex items-center justify-center
                                   px-6 py-3 rounded-lg
                                   border border-green-700
                                   text-green-700 font-semibold
                                   hover:bg-green-50
                                   transition"
                        >
                            ← Back to Doctors
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection