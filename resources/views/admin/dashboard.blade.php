@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="mx-auto max-w-7xl px-6 py-10">

    {{-- Page Heading --}}
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
            Administration
        </p>

        <h1 class="mt-2 text-3xl font-bold text-gray-900">
            Dashboard
        </h1>

        <p class="mt-2 text-gray-600">
            Welcome to the Health Care Website Administration Panel.
        </p>
    </div>


    {{-- Statistics --}}
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

        {{-- Total Doctors --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Total Doctors
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $totalDoctors }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">
                    👨‍⚕️
                </div>

            </div>
        </div>


        {{-- Active Doctors --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Active Doctors
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $activeDoctors }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">
                    ✓
                </div>

            </div>
        </div>


        {{-- Departments --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Departments
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $totalDepartments }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">
                    🏥
                </div>

            </div>
        </div>


        {{-- Services --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Services
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $totalServices }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">
                    🩺
                </div>

            </div>
        </div>


        {{-- Total Users --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Total Users
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $totalUsers }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">
                    👥
                </div>

            </div>
        </div>


        {{-- Administrators --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Administrators
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $totalAdmins }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">
                    🔐
                </div>

            </div>
        </div>

    </div>


    {{-- Recent Information --}}
    <div class="mt-10 grid gap-8 lg:grid-cols-2">


        {{-- Recent Doctors --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-5">

                <div>
                    <h2 class="font-bold text-gray-900">
                        Recent Doctors
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Recently added doctors
                    </p>
                </div>

                <a
                    href="{{ route('admin.doctors.index') }}"
                    class="text-sm font-semibold text-green-600 hover:text-green-700"
                >
                    View All
                </a>

            </div>


            <div class="divide-y divide-gray-100">

                @forelse ($recentDoctors as $doctor)

                    <div class="flex items-center justify-between px-6 py-4">

                        <div class="flex items-center gap-4">

                            {{-- Doctor Photo --}}
                            @if ($doctor->photo)

                                <img
                                    src="{{ asset('storage/' . $doctor->photo) }}"
                                    alt="{{ $doctor->full_name }}"
                                    class="h-12 w-12 rounded-full object-cover"
                                >

                            @else

                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-100 text-green-600">
                                    👨‍⚕️
                                </div>

                            @endif


                            <div>

                                <p class="font-semibold text-gray-900">
                                    {{ $doctor->full_name }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    {{ $doctor->specialization }}
                                </p>

                                <p class="text-xs text-gray-400">
                                    {{ $doctor->department?->name ?? 'No Department' }}
                                </p>

                            </div>

                        </div>


                        <a
                            href="{{ route('admin.doctors.show', $doctor) }}"
                            class="text-sm font-medium text-green-600 hover:text-green-700"
                        >
                            View
                        </a>

                    </div>

                @empty

                    <div class="px-6 py-10 text-center text-sm text-gray-500">
                        No doctors found.
                    </div>

                @endforelse

            </div>

        </div>


        {{-- Recent Users --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-5">

                <div>
                    <h2 class="font-bold text-gray-900">
                        Recent Users
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Recently registered users
                    </p>
                </div>

                <a
                    href="{{ route('admin.users.index') }}"
                    class="text-sm font-semibold text-green-600 hover:text-green-700"
                >
                    View All
                </a>

            </div>


            <div class="divide-y divide-gray-100">

                @forelse ($recentUsers as $user)

                    <div class="flex items-center justify-between px-6 py-4">

                        <div class="flex items-center gap-4">

                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-green-100 font-bold text-green-700">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>


                            <div>

                                <p class="font-semibold text-gray-900">
                                    {{ $user->name }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    {{ $user->email }}
                                </p>

                            </div>

                        </div>


                        <div class="text-right">

                            @if ($user->is_admin)

                                <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                    Admin
                                </span>

                            @else

                                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                    User
                                </span>

                            @endif

                            <p class="mt-1 text-xs text-gray-400">
                                {{ $user->created_at->format('M d, Y') }}
                            </p>

                        </div>

                    </div>

                @empty

                    <div class="px-6 py-10 text-center text-sm text-gray-500">
                        No users found.
                    </div>

                @endforelse

            </div>

        </div>

    </div>


    {{-- Quick Actions --}}
    <div class="mt-10 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <h2 class="font-bold text-gray-900">
            Quick Actions
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            Common administrative tasks
        </p>


        <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

            <a
                href="{{ route('admin.doctors.create') }}"
                class="rounded-xl bg-green-600 px-5 py-4 text-center font-semibold text-white transition hover:bg-green-700"
            >
                + Add Doctor
            </a>


            <a
                href="{{ route('admin.doctors.index') }}"
                class="rounded-xl border border-green-600 px-5 py-4 text-center font-semibold text-green-600 transition hover:bg-green-50"
            >
                Manage Doctors
            </a>


            <a
                href="{{ route('admin.users.index') }}"
                class="rounded-xl border border-gray-300 px-5 py-4 text-center font-semibold text-gray-700 transition hover:bg-gray-50"
            >
                Manage Users
            </a>


            <a
                href="{{ route('home') }}"
                class="rounded-xl border border-gray-300 px-5 py-4 text-center font-semibold text-gray-700 transition hover:bg-gray-50"
            >
                View Website
            </a>

        </div>

    </div>

</div>

@endsection