@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <div
        class="relative bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/hospital-bg.jpg') }}');"
    >

        <div class="absolute inset-0 bg-green-800/80"></div>

        <div class="relative mx-auto max-w-7xl px-6 py-16 text-white">

            <p class="text-sm font-semibold uppercase tracking-wider text-green-200">
                Administration
            </p>

            <h1 class="mt-2 text-3xl font-bold md:text-4xl">
                Admin Dashboard
            </h1>

            <p class="mt-2 text-green-100">
                Manage your healthcare website from one place.
            </p>

        </div>

    </div>


    {{-- Dashboard --}}
    <div class="mx-auto max-w-7xl px-6 py-12">

        {{-- Statistics --}}
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">


            {{-- Total Doctors --}}
            <div class="rounded-3xl bg-white p-6 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Total Doctors
                        </p>

                        <p class="mt-2 text-4xl font-bold text-gray-900">
                            {{ $totalDoctors }}
                        </p>
                    </div>

                    <div class="rounded-2xl bg-green-100 p-4">

                        <svg
                            class="h-8 w-8 text-green-600"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>

                    </div>

                </div>

                <a
                    href="{{ route('admin.doctors.index') }}"
                    class="mt-5 inline-block text-sm font-semibold text-green-600 hover:text-green-700"
                >
                    Manage Doctors →
                </a>

            </div>


            {{-- Active Doctors --}}
            <div class="rounded-3xl bg-white p-6 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Active Doctors
                        </p>

                        <p class="mt-2 text-4xl font-bold text-gray-900">
                            {{ $activeDoctors }}
                        </p>

                    </div>

                    <div class="rounded-2xl bg-green-100 p-4">

                        <svg
                            class="h-8 w-8 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                    </div>

                </div>

                <p class="mt-5 text-sm text-gray-500">
                    Currently available doctors
                </p>

            </div>


            {{-- Departments --}}
            <div class="rounded-3xl bg-white p-6 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Departments
                        </p>

                        <p class="mt-2 text-4xl font-bold text-gray-900">
                            {{ $totalDepartments }}
                        </p>

                    </div>

                    <div class="rounded-2xl bg-green-100 p-4">

                        <svg
                            class="h-8 w-8 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 21h18M5 21V9h14v12M8 9V5h8v4M9 13h2m2 0h2m-6 4h2m2 0h2"
                            />
                        </svg>

                    </div>

                </div>

                <p class="mt-5 text-sm text-gray-500">
                    Medical departments
                </p>

            </div>


            {{-- Services --}}
            <div class="rounded-3xl bg-white p-6 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Services
                        </p>

                        <p class="mt-2 text-4xl font-bold text-gray-900">
                            {{ $totalServices }}
                        </p>

                    </div>

                    <div class="rounded-2xl bg-green-100 p-4">

                        <svg
                            class="h-8 w-8 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 6v12M6 12h12"
                            />
                        </svg>

                    </div>

                </div>

                <p class="mt-5 text-sm text-gray-500">
                    Available healthcare services
                </p>

            </div>

        </div>


        {{-- Quick Actions --}}
        <div class="mt-10 rounded-3xl bg-white p-6 shadow-sm md:p-8">

            <div class="mb-6">

                <h2 class="text-2xl font-bold text-gray-900">
                    Quick Actions
                </h2>

                <p class="mt-1 text-gray-500">
                    Common administrative tasks.
                </p>

            </div>


            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                <a
                    href="{{ route('admin.doctors.create') }}"
                    class="rounded-2xl border border-gray-200 p-5 transition hover:border-green-500 hover:bg-green-50"
                >

                    <h3 class="font-bold text-gray-900">
                        Add Doctor
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Create a new doctor profile.
                    </p>

                </a>


                <a
                    href="{{ route('admin.doctors.index') }}"
                    class="rounded-2xl border border-gray-200 p-5 transition hover:border-green-500 hover:bg-green-50"
                >

                    <h3 class="font-bold text-gray-900">
                        Manage Doctors
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        View, edit, and delete doctors.
                    </p>

                </a>


                <a
                    href="{{ route('doctors.index') }}"
                    class="rounded-2xl border border-gray-200 p-5 transition hover:border-green-500 hover:bg-green-50"
                >

                    <h3 class="font-bold text-gray-900">
                        View Website
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Open the public doctor directory.
                    </p>

                </a>

            </div>

        </div>

    </div>

</div>

@endsection