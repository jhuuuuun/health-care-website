@extends('layouts.admin')

@section('title', 'Users')

@section('content')

<div class="mx-auto max-w-7xl px-6 py-10">

    {{-- Header --}}
    <div class="mb-8">

        <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
            User Management
        </p>

        <h1 class="mt-2 text-3xl font-bold text-gray-900">
            Users
        </h1>

        <p class="mt-2 text-gray-500">
            Manage registered users and administrator access.
        </p>

    </div>


    {{-- Success Message --}}
    @if (session('success'))

        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">
            {{ session('success') }}
        </div>

    @endif


    @if (session('error'))

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-medium text-red-700">
            {{ session('error') }}
        </div>

    @endif


    {{-- Users Table --}}
    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-100">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Name
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Email
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Role
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Registered
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse ($users as $user)

                        <tr class="hover:bg-gray-50">

                            {{-- Name --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="flex items-center gap-2">

                                    <span class="font-semibold text-gray-900">
                                        {{ $user->name }}
                                    </span>

                                    @if (auth()->id() === $user->id)

                                        <span class="rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-700">
                                            You
                                        </span>

                                    @endif

                                </div>

                            </td>


                            {{-- Email --}}
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">

                                {{ $user->email }}

                            </td>


                            {{-- Role --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                @if ($user->is_admin)

                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Administrator
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                        User
                                    </span>

                                @endif

                            </td>


                            {{-- Date --}}
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm text-gray-500">

                                {{ $user->created_at->format('M d, Y') }}

                            </td>

                            <td class="whitespace-nowrap px-6 py-4 text-right">

                                <form
                                    method="POST"
                                    action="{{ route('admin.users.toggle-admin', $user) }}"
                                    onsubmit="return confirm('Are you sure you want to change this user role?')"
                                >

                                    @csrf
                                    @method('PATCH')

                                    @if ($user->is_admin)

                                        <button
                                            type="submit"
                                            class="text-sm font-semibold text-red-600 hover:text-red-800"
                                        >
                                            Remove Admin
                                        </button>

                                    @else

                                        <button
                                            type="submit"
                                            class="text-sm font-semibold text-green-600 hover:text-green-800"
                                        >
                                            Make Admin
                                        </button>

                                    @endif

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="px-6 py-12 text-center text-gray-500"
                            >
                                No users found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if ($users->hasPages())

            <div class="border-t border-gray-100 px-6 py-4">

                {{ $users->links() }}

            </div>

        @endif

    </div>

</div>

@endsection