@extends('layouts.admin')

@section('title', 'Add Doctor')

@section('content')

<section class="bg-gray-50 min-h-screen">

    <div class="max-w-4xl mx-auto px-6 py-12">

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">

            {{-- Header --}}
            <div class="px-6 py-6 border-b border-gray-100">

                <h1 class="text-2xl font-bold text-gray-900">
                    Add New Doctor
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Add a doctor to the medical team.
                </p>

            </div>


            {{-- Form --}}
            <form
                action="{{ route('admin.doctors.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-6 space-y-6"
            >

                @csrf

                @if(session('success'))

                    <div class="alert alert-success mb-6">

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>

                @endif

                @if($errors->any())

                    <div class="alert alert-error mb-6">

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
                        class="mt-2 w-full rounded-lg p-2 border border-gray-300
                               focus:border-green-600 focus:ring-green-600 focus:outline-none focus:ring-1"
                        placeholder="Enter first name"
                    >

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
                        class="mt-2 w-full rounded-lg p-2 border border-gray-300
                               focus:border-green-600 focus:ring-green-600 focus:outline-none focus:ring-1"
                        placeholder="Enter middle name"
                    >

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
                        class="mt-2 w-full rounded-lg p-2 border border-gray-300
                               focus:border-green-600 focus:ring-green-600 focus:outline-none focus:ring-1"
                        placeholder="Enter last name"
                    >

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
                        class="mt-2 w-full rounded-lg p-2 border border-gray-300
                               focus:border-green-600 focus:ring-green-600 focus:outline-none focus:ring-1"
                    >

                        <option value="">
                            Select Department
                        </option>

                        @foreach($departments as $department)

                            <option value="{{ $department->id }}">
                                {{ $department->name }}
                            </option>

                        @endforeach

                    </select>

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
                        class="mt-2 w-full rounded-lg p-2 border border-gray-300
                               focus:border-green-600 focus:ring-green-600 focus:outline-none focus:ring-1"
                        placeholder="e.g. Cardiologist"
                    >

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
                        class="mt-2 w-full rounded-lg p-2 border border-gray-300
                               focus:border-green-600 focus:ring-green-600 focus:outline-none focus:ring-1"
                        placeholder="e.g. MD, FPCP"
                    >

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
                        class="mt-2 w-full rounded-lg p-2 border border-gray-300
                               focus:border-green-600 focus:ring-green-600 focus:outline-none focus:ring-1"
                        placeholder="Enter doctor's biography"
                    ></textarea>

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
                        class="mt-2 w-full rounded-lg p-2 border border-gray-300
                               focus:border-green-600 focus:ring-green-600 focus:outline-none focus:ring-1"
                        placeholder="Monday - Friday, 9:00 AM - 4:00 PM"
                    ></textarea>

                </div>


                {{-- Doctor Photo --}}
                <div>

                    <label
                        for="photo"
                        class="block text-sm font-semibold text-gray-700"
                    >
                        Doctor Photo
                    </label>

                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/jpeg,image/png,image/webp"
                        class="mt-2 block w-full text-sm text-gray-600 border p-2 rounded-lg"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        JPG, PNG, or WebP. Maximum file size: 2 MB.
                    </p>

                </div>


                {{-- Status --}}
                <div class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        id="status"
                        name="status"
                        value="1"
                        checked
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
                        class="px-6 py-3 rounded-lg
                               bg-green-700 text-white font-semibold
                               hover:bg-green-800 transition"
                    >
                        Save Doctor
                    </button>

                    <a
                        href="{{ route('admin.doctors.index') }}"
                        class="px-6 py-3 rounded-lg
                               border border-gray-300
                               text-gray-700 font-semibold
                               hover:bg-gray-50 transition"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection