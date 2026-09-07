@extends('layouts.admin')

@section('title', 'Departments')

@section('content')

<div class="mx-auto max-w-7xl px-6 py-10">

    {{-- Header --}}
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
                Administration
            </p>

            <h1 class="mt-2 text-3xl font-bold text-gray-900">
                Departments
            </h1>

            <p class="mt-2 text-gray-600">
                Manage hospital departments and their information.
            </p>
        </div>


        <a
            href="{{ route('admin.departments.create') }}"
            class="rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-green-700"
        >
            + Add Department
        </a>

    </div>


    {{-- Success Message --}}
    @if (session('success'))

        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error Message --}}
    @if (session('error'))

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-medium text-red-700">
            {{ session('error') }}
        </div>

    @endif


    {{-- Department Table --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Department
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Doctors
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse ($departments as $department)

                        <tr class="hover:bg-gray-50">

                            {{-- Department --}}
                            <td class="px-6 py-4">

                                <div>
                                    <p class="font-semibold text-gray-900">
                                        {{ $department->name }}
                                    </p>

                                    @if ($department->description)

                                        <p class="mt-1 max-w-md text-sm text-gray-500">
                                            {{ Str::limit($department->description, 80) }}
                                        </p>

                                    @endif
                                </div>

                            </td>


                            {{-- Doctors --}}
                            <td class="px-6 py-4">

                                <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                    {{ $department->doctors_count }}
                                    {{ $department->doctors_count === 1 ? 'Doctor' : 'Doctors' }}
                                </span>

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-4">

                                @if ($department->status)

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
                                        href="{{ route('admin.departments.show', $department) }}"
                                        class="rounded-lg px-3 py-2 text-sm font-medium text-green-600 hover:bg-green-50"
                                    >
                                        View
                                    </a>


                                    <a
                                        href="{{ route('admin.departments.edit', $department) }}"
                                        class="rounded-lg px-3 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.departments.destroy', $department) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this department?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50"
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
                                colspan="4"
                                class="px-6 py-12 text-center text-sm text-gray-500"
                            >
                                No departments found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if ($departments->hasPages())

            <div class="border-t border-gray-200 px-6 py-4">
                {{ $departments->links() }}
            </div>

        @endif

    </div>

</div>

@endsection