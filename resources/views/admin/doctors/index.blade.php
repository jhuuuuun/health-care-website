@extends('layouts.admin')

@section('title', 'Manage Doctors')

@section('content')

<section class="min-h-screen bg-gray-50">

    <div class="max-w-7xl mx-auto px-6 py-12">


        {{-- PAGE HEADER --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-8">

            <div>

                <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
                    Administration
                </p>

                <h1 class="mt-2 text-3xl font-bold text-gray-900">
                    Manage Doctors
                </h1>

                <p class="mt-2 text-gray-600">
                    Manage hospital doctors and medical specialists.
                </p>

            </div>


            <a
                href="{{ route('admin.doctors.create') }}"
                class="btn btn-success"
            >
                + Add Doctor
            </a>

        </div>


        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))

            <div class="alert alert-success mb-6">

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- ERROR MESSAGE --}}
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


        {{-- SEARCH / FILTER --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">

            <form
                method="GET"
                action="{{ route('admin.doctors.index') }}"
                class="grid grid-cols-1 gap-4 md:grid-cols-4"
            >

                {{-- Search --}}
                <div class="md:col-span-2">

                    <label
                        for="search"
                        class="label"
                    >

                        <span class="label-text font-semibold">
                            Search Doctors
                        </span>

                    </label>

                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Search name or specialization..."
                        class="input input-bordered w-full"
                    >

                </div>


                {{-- Department --}}
                <div>

                    <label
                        for="department"
                        class="label"
                    >

                        <span class="label-text font-semibold">
                            Department
                        </span>

                    </label>

                    <select
                        id="department"
                        name="department"
                        class="select select-bordered w-full"
                    >

                        <option value="">
                            All Departments
                        </option>

                        @foreach($departments as $item)

                            <option
                                value="{{ $item->id }}"
                                @selected($department == $item->id)
                            >
                                {{ $item->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Buttons --}}
                <div class="flex items-end gap-2">

                    <button
                        type="submit"
                        class="btn btn-success flex-1"
                    >
                        Search
                    </button>

                    <a
                        href="{{ route('admin.doctors.index') }}"
                        class="btn btn-outline"
                    >
                        Clear
                    </a>

                </div>

            </form>

        </div>


        {{-- DOCTORS TABLE --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="table">

                    <thead>

                        <tr>

                            <th>Doctor</th>

                            <th>Department</th>

                            <th>Specialization</th>

                            <th>Status</th>

                            <th class="text-right">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($doctors as $doctor)

                            <tr>

                                {{-- Doctor --}}
                                <td>

                                    <div class="flex items-center gap-4">

                                        {{-- Photo --}}
                                        <div class="avatar">

                                            <div class="w-14 h-14 rounded-full">

                                                @if($doctor->photo)

                                                    <img
                                                        src="{{ asset('storage/' . $doctor->photo) }}"
                                                        alt="{{ $doctor->full_name }}"
                                                    >

                                                @else

                                                    <div class="w-full h-full bg-green-100 flex items-center justify-center">

                                                        <span class="text-green-700 font-bold text-lg">
                                                            {{ strtoupper(substr($doctor->fname, 0, 1)) }}
                                                        </span>

                                                    </div>

                                                @endif

                                            </div>

                                        </div>


                                        {{-- Name --}}
                                        <div>

                                            <div class="font-bold text-gray-900">

                                                {{ $doctor->full_name }}

                                            </div>

                                            <div class="text-sm text-gray-500">

                                                {{ $doctor->credentials }}

                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- Department --}}
                                <td>

                                    @if($doctor->department)

                                        {{ $doctor->department->name }}

                                    @else

                                        <span class="text-gray-400">
                                            No Department
                                        </span>

                                    @endif

                                </td>


                                {{-- Specialization --}}
                                <td>

                                    {{ $doctor->specialization }}

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($doctor->status)

                                        <span class="badge badge-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge badge-error">
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td>

                                    <div class="flex justify-end gap-2">

                                        <a
                                            href="{{ route('admin.doctors.show', $doctor) }}"
                                            class="btn btn-sm btn-info"
                                        >
                                            View
                                        </a>

                                        <a
                                            href="{{ route('admin.doctors.edit', $doctor) }}"
                                            class="btn btn-sm btn-success"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.doctors.destroy', $doctor) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this doctor?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-error"
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
                                    class="text-center py-12"
                                >

                                    <div class="text-gray-500">

                                        <p class="text-lg font-semibold">
                                            No doctors found.
                                        </p>

                                        <p class="text-sm mt-1">
                                            Try another search or add a new doctor.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if($doctors->hasPages())

                <div class="p-6 border-t border-gray-100">

                    {{ $doctors->links() }}

                </div>

            @endif

        </div>

    </div>

</section>

@endsection