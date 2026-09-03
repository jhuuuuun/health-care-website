<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin Dashboard')
        | Health Care Website Development
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-gray-50">

    {{-- Admin Navbar --}}
    <header class="border-b border-gray-200 bg-white">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

            {{-- Logo --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3"
            >

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-600 text-white">

                    <svg
                        class="h-6 w-6"
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

                <div>

                    <p class="font-bold text-gray-900">
                        Health Care
                    </p>

                    <p class="text-xs text-gray-500">
                        Administration
                    </p>

                </div>

            </a>


            {{-- Desktop Navigation --}}
            <nav class="hidden items-center gap-2 md:flex">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="rounded-lg px-4 py-2 text-sm font-medium text-gray-700 hover:bg-green-50 hover:text-green-700"
                >
                    Dashboard
                </a>

                <a
                    href="{{ route('admin.doctors.index') }}"
                    class="rounded-lg px-4 py-2 text-sm font-medium text-gray-700 hover:bg-green-50 hover:text-green-700"
                >
                    Doctors
                </a>

                <a
                    href="{{ route('doctors.index') }}"
                    class="rounded-lg px-4 py-2 text-sm font-medium text-gray-700 hover:bg-green-50 hover:text-green-700"
                >
                    View Website
                </a>

            </nav>

        </div>

    </header>


    {{-- Main Content --}}
    <main>

        @yield('content')

    </main>

</body>

</html>