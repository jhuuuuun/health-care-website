@extends('layouts.admin')

@section('title', 'Edit Department')

@section('content')

<div class="mx-auto max-w-4xl px-6 py-10">

    {{-- Header --}}
    <div class="mb-8">

        <a
            href="{{ route('admin.departments.index') }}"
            class="text-sm font-medium text-green-600 hover:text-green-700"
        >
            ← Back to Departments
        </a>

        <h1 class="mt-4 text-3xl font-bold text-gray-900">
            Edit Department
        </h1>

        <p class="mt-2 text-gray-600">
            Update the department information below.
        </p>

    </div>


    {{-- Validation Errors --}}
    @if ($errors->any())

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4">

            <p class="font-semibold text-red-700">
                Please correct the following errors:
            </p>

            <ul class="mt-2 list-inside list-disc text-sm text-red-600">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Form --}}
    <form
        method="POST"
        action="{{ route('admin.departments.update', $department) }}"
        class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm sm:p-8"
    >

        @csrf

        @method('PUT')


        {{-- Department Name --}}
        <div class="mb-6">

            <label
                for="name"
                class="mb-2 block text-sm font-semibold text-gray-700"
            >
                Department Name
                <span class="text-red-500">*</span>
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $department->name) }}"
                placeholder="e.g. Cardiology"
                class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                required
            >

            @error('name')

                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>


        {{-- Description --}}
        <div class="mb-6">

            <label
                for="description"
                class="mb-2 block text-sm font-semibold text-gray-700"
            >
                Description
            </label>

            <textarea
                id="description"
                name="description"
                rows="5"
                placeholder="Enter department description..."
                class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
            >{{ old('description', $department->description) }}</textarea>

            @error('description')

                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>


        {{-- Status --}}
        <div class="mb-8">

            <label class="flex cursor-pointer items-center gap-3">

                <input
                    type="checkbox"
                    name="status"
                    value="1"
                    {{ old('status', $department->status) ? 'checked' : '' }}
                    class="h-5 w-5 rounded border-gray-300 text-green-600 focus:ring-green-500"
                >

                <span>

                    <span class="block text-sm font-semibold text-gray-700">
                        Active Department
                    </span>

                    <span class="block text-sm text-gray-500">
                        Allow this department to be used in the system.
                    </span>

                </span>

            </label>

        </div>


        {{-- Buttons --}}
        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

            <a
                href="{{ route('admin.departments.index') }}"
                class="rounded-xl border border-gray-300 px-5 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-50"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white hover:bg-green-700"
            >
                Update Department
            </button>

        </div>

    </form>

</div>

@endsection