@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-gray-50">

    <div class="max-w-4xl mx-auto px-6 py-12">

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">

            {{-- Header --}}
            <div class="px-6 py-6 border-b border-gray-100">

                <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
                    Administration
                </p>

                <h1 class="mt-2 text-2xl font-bold text-gray-900">
                    Edit Doctor
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Update doctor information.
                </p>

            </div>


            {{-- Validation Errors --}}
            @if($errors->any())

                <div class="mx-6 mt-6 alert alert-error">

                    <div>

                        <ul class="list-disc list-inside">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            @endif


            {{-- Form --}}
            <form
                action="{{ route('admin.doctors.update', $doctor) }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-6 space-y-6"
            >

                @csrf

                @method('PUT')


                {{-- First Name --}}
                <div>

                    <label
                        for="fname"
                        class="block text-sm font-semibold text-gray-700"
                    >
                        First Name
                    </label>

                    <input
                        type="text"
                        id="fname"
                        name="fname"
                        value="{{ old('fname', $doctor->fname) }}"
                        class="mt-2 w-full rounded-lg border-gray-300
                               focus:border-green-600 focus:ring-green-600 border p-2 focus:outline-none focus:ring-1"
                    >

                    @error('fname')

                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Middle Name --}}
                <div>

                    <label
                        for="mname"
                        class="block text-sm font-semibold text-gray-700"
                    >
                        Middle Name
                    </label>

                    <input
                        type="text"
                        id="mname"
                        name="mname"
                        value="{{ old('mname', $doctor->mname) }}"
                        class="mt-2 w-full rounded-lg border-gray-300
                               focus:border-green-600 focus:ring-green-600 border p-2 focus:outline-none focus:ring-1"
                    >

                    @error('mname')

                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Last Name --}}
                <div>

                    <label
                        for="lname"
                        class="block text-sm font-semibold text-gray-700"
                    >
                        Last Name
                    </label>

                    <input
                        type="text"
                        id="lname"
                        name="lname"
                        value="{{ old('lname', $doctor->lname) }}"
                        class="mt-2 w-full rounded-lg border-gray-300
                               focus:border-green-600 focus:ring-green-600 border p-2 focus:outline-none focus:ring-1"
                    >

                    @error('lname')

                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Department --}}
                <div>

                    <label
                        for="department_id"
                        class="block text-sm font-semibold text-gray-700"
                    >
                        Department
                    </label>

                    <select
                        id="department_id"
                        name="department_id"
                        class="mt-2 w-full rounded-lg border-gray-300
                               focus:border-green-600 focus:ring-green-600 border p-2 focus:outline-none focus:ring-1"
                    >

                        <option value="">
                            Select Department
                        </option>

                        @foreach($departments as $department)

                            <option
                                value="{{ $department->id }}"
                                @selected(
                                    old(
                                        'department_id',
                                        $doctor->department_id
                                    ) == $department->id
                                )
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


                {{-- Specialization --}}
                <div>

                    <label
                        for="specialization"
                        class="block text-sm font-semibold text-gray-700"
                    >
                        Specialization
                    </label>

                    <input
                        type="text"
                        id="specialization"
                        name="specialization"
                        value="{{ old('specialization', $doctor->specialization) }}"
                        class="mt-2 w-full rounded-lg border-gray-300
                               focus:border-green-600 focus:ring-green-600 border p-2 focus:outline-none focus:ring-1"
                    >

                    @error('specialization')

                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Credentials --}}
                <div>

                    <label
                        for="credentials"
                        class="block text-sm font-semibold text-gray-700"
                    >
                        Credentials
                    </label>

                    <input
                        type="text"
                        id="credentials"
                        name="credentials"
                        value="{{ old('credentials', $doctor->credentials) }}"
                        class="mt-2 w-full rounded-lg border-gray-300
                               focus:border-green-600 focus:ring-green-600 border p-2 focus:outline-none focus:ring-1"
                    >

                    @error('credentials')

                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Biography --}}
                <div>

                    <label
                        for="biography"
                        class="block text-sm font-semibold text-gray-700"
                    >
                        Biography
                    </label>

                    <textarea
                        id="biography"
                        name="biography"
                        rows="5"
                        class="mt-2 w-full rounded-lg border-gray-300
                               focus:border-green-600 focus:ring-green-600 border p-2 focus:outline-none focus:ring-1"
                    >{{ old('biography', $doctor->biography) }}</textarea>

                    @error('biography')

                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Schedule --}}
                <div>

                    <label
                        for="schedule"
                        class="block text-sm font-semibold text-gray-700"
                    >
                        Consultation Schedule
                    </label>

                    <textarea
                        id="schedule"
                        name="schedule"
                        rows="3"
                        class="mt-2 w-full rounded-lg border-gray-300
                               focus:border-green-600 focus:ring-green-600 border p-2 focus:outline-none focus:ring-1"
                    >{{ old('schedule', $doctor->schedule) }}</textarea>

                    @error('schedule')

                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Current Photo --}}
                @if($doctor->photo)

                    <div>

                        <p class="block text-sm font-semibold text-gray-700 mb-3">
                            Current Photo
                        </p>

                        <img
                            src="{{ asset('storage/' . $doctor->photo) }}"
                            alt="{{ $doctor->full_name }}"
                            class="w-32 h-32 object-cover rounded-xl border border-gray-200"
                        >

                    </div>

                @endif


                {{-- New Photo --}}
                <div>

                    <label
                        for="photo"
                        class="block text-sm font-semibold text-gray-700"
                    >
                        Replace Photo
                    </label>

                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/jpeg,image/png,image/webp"
                        class="mt-2 block w-full text-sm text-gray-600 border rounded-lg p-2"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        Leave empty if you want to keep the current photo.
                    </p>

                    @error('photo')

                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Status --}}
                <div class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        id="status"
                        name="status"
                        value="1"
                        @checked(old('status', $doctor->status))
                        class="rounded border-gray-300 text-green-600
                               focus:ring-green-600"
                    >

                    <label
                        for="status"
                        class="text-sm font-medium text-gray-700"
                    >
                        Active Doctor
                    </label>

                </div>


                {{-- Buttons --}}
                <div class="flex gap-4 pt-4">

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Update Doctor
                    </button>

                    <a
                        href="{{ route('admin.doctors.index') }}"
                        class="btn btn-outline"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection