@extends('layouts.app')

@section('title', $service->name)

@section('content')

<section class="bg-gray-50">

    <div class="mx-auto max-w-7xl px-6 py-16 lg:py-24">

        <!-- Breadcrumb -->
        <div class="mb-8">

            <div class="breadcrumbs text-sm">

                <ul>

                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('services.index') }}">
                            Services
                        </a>
                    </li>

                    <li>
                        {{ $service->name }}
                    </li>

                </ul>

            </div>

        </div>


        <!-- Main Content -->
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">

            <!-- Main Information -->
            <div class="lg:col-span-2">

                <div class="rounded-3xl bg-white p-8 shadow-sm">

                    <div class="flex h-16 w-16 items-center
                                justify-center rounded-2xl
                                bg-green-50 text-4xl">

                        🏥

                    </div>


                    <span class="mt-6 inline-block
                                 rounded-full bg-green-100
                                 px-4 py-2 text-sm
                                 font-semibold text-green-700">

                        {{ $service->department->name }}

                    </span>


                    <h1 class="mt-5 text-3xl font-bold
                               text-gray-900 md:text-4xl">

                        {{ $service->name }}

                    </h1>


                    <p class="mt-6 text-lg leading-8
                              text-gray-600">

                        {{ $service->description }}

                    </p>


                    <div class="my-8 border-t border-gray-100"></div>


                    <h2 class="text-2xl font-bold text-gray-900">

                        Service Information

                    </h2>


                    <div class="mt-6">

                        <div class="flex items-start gap-4">

                            <div class="flex h-10 w-10 shrink-0
                                        items-center justify-center
                                        rounded-xl bg-green-50">

                                🕐

                            </div>

                            <div>

                                <h3 class="font-semibold
                                           text-gray-900">

                                    Schedule

                                </h3>

                                <p class="mt-1 text-gray-600">

                                    {{ $service->schedule ?? 'Please contact the hospital for schedule information.' }}

                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="mt-6">

                        <div class="flex items-start gap-4">

                            <div class="flex h-10 w-10 shrink-0
                                        items-center justify-center
                                        rounded-xl bg-green-50">

                                🏥

                            </div>

                            <div>

                                <h3 class="font-semibold
                                           text-gray-900">

                                    Department

                                </h3>

                                <p class="mt-1 text-gray-600">

                                    {{ $service->department->name }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Sidebar -->
            <div>

                <div class="rounded-3xl bg-green-700 p-8 text-white
                            shadow-lg">

                    <h2 class="text-2xl font-bold">

                        Need This Service?

                    </h2>

                    <p class="mt-3 leading-7 text-green-50">

                        Schedule an appointment with our
                        healthcare team today.

                    </p>


                    <a
                        href="{{ route('appointments.create') }}"
                        class="btn mt-6 w-full border-0
                               bg-white text-green-700
                               hover:bg-green-50"
                    >

                        Book an Appointment

                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="btn btn-outline mt-3 w-full
                               border-white text-white
                               hover:bg-white hover:text-green-700"
                    >

                        Contact Us

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection