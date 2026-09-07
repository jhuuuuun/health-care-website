@extends('layouts.admin')

@section('title', $department->name)

@section('content')

<div class="mx-auto max-w-6xl px-6 py-10">

    {{-- Back Link --}}
    <div class="mb-6">

        <a
            href="{{ route('admin.departments.index') }}"
            class="text-sm font-medium text-green-600 hover:text-green-700"
        >
            ← Back to Departments
        </a>

    </div>


    {{-- Department Header --}}
    <div class="mb-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

        <div>

            <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
                Department
            </p>

            <h1 class="mt-2 text-3xl font-bold text-gray-900">
                {{ $department->name }}
            </h1>

            <p class="mt-2 text-gray-600">
                Department information and assigned doctors.
            </p>

        </div>


        <div class="flex gap-3">

            <a
                href="{{ route('admin.departments.edit', $department) }}"
                class="rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white hover:bg-green-700"
            >
                Edit Department
            </a>

        </div>

    </div>


    {{-- Department Information --}}
    <div class="grid gap-6 lg:grid-cols-3">

        {{-- Name --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <p class="text-sm font-medium text-gray-500">
                Department Name
            </p>

            <p class="mt-2 text-xl font-bold text-gray-900">
                {{ $department->name }}
            </p>

        </div>


        {{-- Doctors Count --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <p class="text-sm font-medium text-gray-500">
                Doctors
            </p>

            <p class="mt-2 text-xl font-bold text-green-600">
                {{ $department->doctors->count() }}
            </p>

        </div>


        {{-- Status --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <p class="text-sm font-medium text-gray-500">
                Status
            </p>

            <div class="mt-2">

                @if ($department->status)

                    <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">
                        Active
                    </span>

                @else

                    <span class="rounded-full bg-gray-100 px-3 py-1 text-sm font-semibold text-gray-600">
                        Inactive
                    </span>

                @endif

            </div>

        </div>

    </div>


    {{-- Description --}}
    <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <h2 class="font-bold text-gray-900">
            Description
        </h2>

        <div class="mt-3 text-gray-600">

            @if ($department->description)

                <p class="whitespace-pre-line">
                    {{ $department->description }}
                </p>

            @else

                <p class="italic text-gray-400">
                    No description available.
                </p>

            @endif

        </div>

    </div>


    {{-- Doctors --}}
    <div class="mt-8 overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        <div class="border-b border-gray-200 px-6 py-5">

            <h2 class="font-bold text-gray-900">
                Doctors in {{ $department->name }}
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Doctors currently assigned to this department.
            </p>

        </div>


        <div class="divide-y divide-gray-100">

            @forelse ($department->doctors as $doctor)

                <div class="flex items-center justify-between px-6 py-5">

                    {{-- Doctor Information --}}
                    <div class="flex items-center gap-4">

                        @if ($doctor->photo)

                            <img
                                src="{{ asset('storage/' . $doctor->photo) }}"
                                alt="{{ $doctor->full_name }}"
                                class="h-14 w-14 rounded-full object-cover"
                            >

                        @else

                            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-green-100 text-green-600">
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

                            @if ($doctor->status)

                                <span class="mt-1 inline-block rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-700">
                                    Active
                                </span>

                            @else

                                <span class="mt-1 inline-block rounded-full bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-600">
                                    Inactive
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- View Doctor --}}
                    <a
                        href="{{ route('admin.doctors.show', $doctor) }}"
                        class="rounded-lg px-4 py-2 text-sm font-medium text-green-600 hover:bg-green-50"
                    >
                        View
                    </a>

                </div>

            @empty

                <div class="px-6 py-12 text-center">

                    <p class="font-medium text-gray-700">
                        No doctors assigned.
                    </p>

                    <p class="mt-1 text-sm text-gray-500">
                        There are currently no doctors in this department.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection