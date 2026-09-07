@extends('layouts.app')

@section('title', 'Create Account')

@section('content')

<div class="min-h-[calc(100vh-80px)] bg-gray-50">

```
<div class="mx-auto flex min-h-[calc(100vh-80px)] max-w-7xl items-center justify-center px-6 py-12">

    <div class="grid w-full max-w-5xl overflow-hidden rounded-3xl bg-white shadow-xl md:grid-cols-2">

        {{-- Left Side --}}
        <div
            class="relative hidden min-h-[600px] bg-cover bg-center md:block"
            style="background-image: url('{{ asset('images/hospital-bg.jpg') }}');"
        >

            {{-- Green Overlay --}}
            <div class="absolute inset-0 bg-green-800/75"></div>

            <div class="relative z-10 flex h-full flex-col justify-center px-10 text-white">

                {{-- Hospital Icon --}}
                <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-white/20">

                    <svg
                        class="h-9 w-9"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6v12M6 12h12"
                        />
                    </svg>

                </div>

                <h1 class="text-4xl font-bold">
                    Health Care
                </h1>

                <p class="mt-2 text-lg text-green-100">
                    Medical Center
                </p>

                <p class="mt-6 max-w-md leading-relaxed text-green-50">
                    Create your account to access the Health Care
                    administration system and manage healthcare services.
                </p>

                <div class="mt-8 space-y-4">

                    <div class="flex items-center gap-3 text-sm text-green-100">

                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/20">
                            ✓
                        </div>

                        <span>
                            Secure Account Access
                        </span>

                    </div>

                    <div class="flex items-center gap-3 text-sm text-green-100">

                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/20">
                            ✓
                        </div>

                        <span>
                            Healthcare Administration
                        </span>

                    </div>

                    <div class="flex items-center gap-3 text-sm text-green-100">

                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/20">
                            ✓
                        </div>

                        <span>
                            Professional Medical Management
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- Registration Form --}}
        <div class="flex items-center justify-center p-8 sm:p-12">

            <div class="w-full max-w-md">

                {{-- Mobile Logo --}}
                <div class="mb-8 text-center md:hidden">

                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-green-600 text-white">

                        <svg
                            class="h-8 w-8"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 6v12M6 12h12"
                            />
                        </svg>

                    </div>

                    <h1 class="mt-3 text-2xl font-bold text-green-700">
                        Health Care
                    </h1>

                </div>


                {{-- Heading --}}
                <div class="mb-7">

                    <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
                        Administration
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-gray-900">
                        Create Account
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Register a new account to access the system.
                    </p>

                </div>


                {{-- Validation Errors --}}
                @if ($errors->any())

                    <div class="mb-5 rounded-xl bg-red-50 p-4 text-sm text-red-700">

                        <p class="font-semibold">
                            Please check the information below.
                        </p>

                        <ul class="mt-1 list-disc pl-5">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- Registration Form --}}
                <form method="POST" action="{{ route('register') }}">

                    @csrf


                    {{-- Name --}}
                    <div>

                        <label
                            for="name"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Full Name
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-green-500 focus:ring-2 focus:ring-green-200"
                        >

                        @error('name')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Email --}}
                    <div class="mt-5">

                        <label
                            for="email"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Email Address
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="Enter your email address"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-green-500 focus:ring-2 focus:ring-green-200"
                        >

                        @error('email')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Password --}}
                    <div class="mt-5">

                        <label
                            for="password"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Create a password"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-green-500 focus:ring-2 focus:ring-green-200"
                        >

                        @error('password')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Confirm Password --}}
                    <div class="mt-5">

                        <label
                            for="password_confirmation"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Confirm Password
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-green-500 focus:ring-2 focus:ring-green-200"
                        >

                    </div>


                    {{-- Register Button --}}
                    <button
                        type="submit"
                        class="mt-7 w-full rounded-xl bg-green-600 px-5 py-3.5 font-semibold text-white shadow-sm transition hover:bg-green-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                    >
                        Create Account
                    </button>

                </form>


                {{-- Login Link --}}
                <div class="mt-6 text-center">

                    <p class="text-sm text-gray-500">

                        Already have an account?

                        <a
                            href="{{ route('login') }}"
                            class="font-semibold text-green-600 hover:text-green-700"
                        >
                            Sign In
                        </a>

                    </p>

                </div>


                {{-- Back to Website --}}
                <div class="mt-3 text-center">

                    <a
                        href="{{ route('home') }}"
                        class="text-sm text-gray-500 hover:text-green-600"
                    >
                        ← Back to Website
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>
```

</div>

@endsection
