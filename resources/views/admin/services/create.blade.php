@extends('layouts.admin')

@section('title', 'Add Service')

@section('content')

<div class="mx-auto max-w-4xl px-6 py-10">

    {{-- Header --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-900">
            Add Service
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Add a new hospital service.
        </p>

    </div>


    {{-- Validation Errors --}}
    @if ($errors->any())

        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">

            <p class="font-semibold text-red-700">
                Please fix the following errors:
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
        action="{{ route('admin.services.store') }}"
        enctype="multipart/form-data"
        class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm"
    >

        @csrf


        {{-- Department --}}
        <div class="mb-6">

            <label
                for="department_id"
                class="mb-2 block text-sm font-semibold text-gray-700"
            >
                Department
            </label>

            <select
                id="department_id"
                name="department_id"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-100"
                required
            >

                <option value="">
                    Select Department
                </option>

                @foreach ($departments as $department)

                    <option
                        value="{{ $department->id }}"
                        {{ old('department_id') == $department->id ? 'selected' : '' }}
                    >
                        {{ $department->name }}
                    </option>

                @endforeach

            </select>

            @error('department_id')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>


        {{-- Service Name --}}
        <div class="mb-6">

            <label
                for="name"
                class="mb-2 block text-sm font-semibold text-gray-700"
            >
                Service Name
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Example: Emergency Care"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-100"
                required
            >

            @error('name')

                <p class="mt-1 text-sm text-red-600">
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
                placeholder="Describe this hospital service..."
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-100"
                required
            >{{ old('description') }}</textarea>

            @error('description')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>


        {{-- Image --}}
        <div class="mb-6">

            <label
                for="image"
                class="mb-2 block text-sm font-semibold text-gray-700"
            >
                Service Image
            </label>

            <input
                type="file"
                id="image"
                name="image"
                accept=".jpg,.jpeg,.png,.webp"
                class="block w-full rounded-lg border border-gray-300 bg-white text-sm text-gray-600 file:mr-4 file:border-0 file:bg-green-50 file:px-4 file:py-3 file:text-sm file:font-semibold file:text-green-700 hover:file:bg-green-100"
            >

            <p class="mt-1 text-xs text-gray-500">
                JPG, JPEG, PNG or WEBP. Maximum size: 2MB.
            </p>

            @error('image')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>


        {{-- Schedule --}}
        <div class="mb-6">

            <label
                for="schedule"
                class="mb-2 block text-sm font-semibold text-gray-700"
            >
                Schedule
            </label>

            <textarea
                id="schedule"
                name="schedule"
                rows="3"
                placeholder="Example: Monday - Friday, 8:00 AM - 5:00 PM"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-100"
            >{{ old('schedule') }}</textarea>

            @error('schedule')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>


        {{-- Status --}}
        <div class="mb-8">

            <label class="flex items-center gap-3">

                <input
                    type="checkbox"
                    name="status"
                    value="1"
                    {{ old('status', true) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500"
                >

                <span class="text-sm font-medium text-gray-700">
                    Active Service
                </span>

            </label>

        </div>


        {{-- Buttons --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">

            <a
                href="{{ route('admin.services.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-50"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-green-700"
            >
                Save Service
            </button>

        </div>

    </form>

</div>

@endsection