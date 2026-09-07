@extends('layouts.admin')

@section('title', 'Services')

@section('content')

<div class="mx-auto max-w-7xl px-6 py-10">

    {{-- Header --}}
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                Services
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Manage hospital services and departments.
            </p>
        </div>

        <a
            href="{{ route('admin.services.create') }}"
            class="rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-green-700"
        >
            + Add Service
        </a>

    </div>


    {{-- Success Message --}}
    @if (session('success'))

        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error Message --}}
    @if (session('error'))

        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ session('error') }}
        </div>

    @endif


    {{-- Services Table --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="border-b border-gray-200 bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Service
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Department
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Schedule
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right font-semibold text-gray-700">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse ($services as $service)

                        <tr class="hover:bg-gray-50">

                            {{-- Service --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-4">

                                    {{-- Image --}}
                                    <div class="h-12 w-12 shrink-0 overflow-hidden rounded-lg bg-green-50">

                                        @if ($service->image)

                                            <img
    src="{{ asset('storage/' . $service->image) }}"
    alt="{{ $service->name }}"
    class="h-48 w-full object-cover"
>

                                        @else

                                            <div class="flex h-full w-full items-center justify-center text-green-600">

                                                <svg
                                                    class="h-6 w-6"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
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


                                    <div>

                                        <p class="font-semibold text-gray-900">
                                            {{ $service->name }}
                                        </p>

                                        <p class="text-xs text-gray-500">
                                            /{{ $service->slug }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- Department --}}
                            <td class="px-6 py-4 text-gray-600">

                                {{ $service->department->name ?? 'No Department' }}

                            </td>


                            {{-- Schedule --}}
                            <td class="px-6 py-4 text-gray-600">

                                {{ $service->schedule ?: 'Not specified' }}

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-4">

                                @if ($service->status)

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                        Inactive
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.services.show', $service) }}"
                                        class="rounded-lg border border-gray-200 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50"
                                    >
                                        View
                                    </a>


                                    <a
                                        href="{{ route('admin.services.edit', $service) }}"
                                        class="rounded-lg bg-green-50 px-3 py-2 text-xs font-medium text-green-700 hover:bg-green-100"
                                    >
                                        Edit
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
                                            class="rounded-lg bg-red-50 px-3 py-2 text-xs font-medium text-red-600 hover:bg-red-100"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-12 text-center"
                            >

                                <p class="text-gray-500">
                                    No services found.
                                </p>

                                <a
                                    href="{{ route('admin.services.create') }}"
                                    class="mt-3 inline-block text-sm font-semibold text-green-600 hover:text-green-700"
                                >
                                    Add your first service
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if ($services->hasPages())

            <div class="border-t border-gray-200 px-6 py-4">

                {{ $services->links() }}

            </div>

        @endif

    </div>

</div>

@endsection