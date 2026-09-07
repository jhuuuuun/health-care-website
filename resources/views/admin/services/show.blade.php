@extends('layouts.admin')

@section('title', 'Service Details')

@section('content')

<div class="mx-auto max-w-5xl px-6 py-10">

    {{-- Header --}}
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                Service Details
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                View complete service information.
            </p>
        </div>

        <div class="flex gap-3">

            <a
                href="{{ route('admin.services.edit', $service) }}"
                class="rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white hover:bg-green-700"
            >
                Edit Service
            </a>

            <a
                href="{{ route('admin.services.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-50"
            >
                Back
            </a>

        </div>

    </div>


    {{-- Service Card --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        {{-- Image --}}
        <div class="bg-green-50">

            @if ($service->image)

                <img
                    src="{{ asset('storage/' . $service->image) }}"
                    alt="{{ $service->name }}"
                    class="h-72 w-full object-cover"
                >

            @else

                <div class="flex h-72 items-center justify-center">

                    <svg
                        class="h-20 w-20 text-green-600"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6v12M6 12h12"
                        />
                    </svg>

                </div>

            @endif

        </div>


        {{-- Information --}}
        <div class="p-6 sm:p-8">

            {{-- Name and Status --}}
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-start">

                <div>

                    <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
                        Hospital Service
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $service->name }}
                    </h2>

                    <p class="mt-2 text-sm text-gray-500">
                        /{{ $service->slug }}
                    </p>

                </div>


                @if ($service->status)

                    <span class="w-fit rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">
                        Active
                    </span>

                @else

                    <span class="w-fit rounded-full bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-600">
                        Inactive
                    </span>

                @endif

            </div>


            {{-- Details --}}
            <div class="mt-8 grid gap-6 border-t border-gray-100 pt-8 sm:grid-cols-2">

                {{-- Department --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Department
                    </p>

                    <p class="mt-2 text-base font-semibold text-gray-900">
                        {{ $service->department->name ?? 'No Department' }}
                    </p>

                </div>


                {{-- Schedule --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Schedule
                    </p>

                    <p class="mt-2 whitespace-pre-line text-base text-gray-700">
                        {{ $service->schedule ?: 'Not specified' }}
                    </p>

                </div>

            </div>


            {{-- Description --}}
            <div class="mt-8 border-t border-gray-100 pt-8">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Description
                </p>

                <p class="mt-3 whitespace-pre-line leading-7 text-gray-700">
                    {{ $service->description }}
                </p>

            </div>


            {{-- Actions --}}
            <div class="mt-8 flex flex-col gap-3 border-t border-gray-100 pt-8 sm:flex-row">

                <a
                    href="{{ route('admin.services.edit', $service) }}"
                    class="rounded-lg bg-green-600 px-5 py-3 text-center text-sm font-semibold text-white hover:bg-green-700"
                >
                    Edit Service
                </a>

                <form
                    method="POST"
                    action="{{ route('admin.services.destroy', $service) }}"
                    onsubmit="return confirm('Are you sure you want to delete this service?');"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="w-full rounded-lg bg-red-50 px-5 py-3 text-sm font-semibold text-red-600 hover:bg-red-100 sm:w-auto"
                    >
                        Delete Service
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection