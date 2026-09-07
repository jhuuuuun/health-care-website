@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')

<div class="min-h-[calc(100vh-80px)] bg-gray-50">

    <div class="mx-auto flex min-h-[calc(100vh-80px)] max-w-7xl items-center justify-center px-6 py-12">

        <div class="grid w-full max-w-5xl overflow-hidden rounded-3xl bg-white shadow-xl md:grid-cols-2">

            {{-- Left Side --}}
            <div
                class="relative hidden min-h-[500px] bg-cover bg-center md:block"
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
                        Your healthcare administration system.
                        Secure access for authorized users.
                    </p>

                    <div class="mt-8 flex items-center gap-3 text-sm text-green-100">

                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/20">
                            ✓
                        </div>

                        <span>
                            Secure Account Recovery
                        </span>

                    </div>

                </div>

            </div>


            {{-- Forgot Password Form --}}
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
                    <div class="mb-8">

                        <p class="text-sm font-semibold uppercase tracking-wider text-green-600">
                            Account Recovery
                        </p>

                        <h2 class="mt-2 text-3xl font-bold text-gray-900">
                            Forgot Password?
                        </h2>

                        <p class="mt-3 leading-relaxed text-gray-500">
                            No problem. Enter your email address and
                            we'll send you a password reset link.
                        </p>

                    </div>


                    {{-- Session Status --}}
                    @if (session('status'))

                        <div class="mb-5 rounded-xl bg-green-50 p-4 text-sm text-green-700">

                            <div class="flex items-start gap-3">

                                <span class="text-lg">
                                    ✓
                                </span>

                                <p>
                                    {{ session('status') }}
                                </p>

                            </div>

                        </div>

                    @endif


                    {{-- Validation Errors --}}
                    @if ($errors->any())

                        <div class="mb-5 rounded-xl bg-red-50 p-4 text-sm text-red-700">

                            <p class="font-semibold">
                                Please check your email address.
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


                    {{-- Form --}}
                    <form
                        method="POST"
                        action="{{ route('password.email') }}"
                    >

                        @csrf


                        {{-- Email --}}
                        <div>

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
                                autofocus
                                autocomplete="email"
                                placeholder="Enter your email address"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-green-500 focus:ring-2 focus:ring-green-200"
                            >

                            @error('email')

                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="mt-7 w-full rounded-xl bg-green-600 px-5 py-3.5 font-semibold text-white shadow-sm transition hover:bg-green-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        >
                            Send Password Reset Link
                        </button>

                    </form>


                    {{-- Back to Login --}}
                    <div class="mt-6 text-center">

                        <a
                            href="{{ route('login') }}"
                            class="text-sm font-medium text-green-600 hover:text-green-700"
                        >
                            ← Back to Login
                        </a>

                    </div>


                    {{-- Back to Website --}}
                    <div class="mt-3 text-center">

                        <a
                            href="{{ route('home') }}"
                            class="text-sm text-gray-500 hover:text-green-600"
                        >
                            Back to Website
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection