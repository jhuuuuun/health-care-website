<div class="navbar bg-white shadow-sm sticky top-0 z-50">

    <div class="navbar-start">
        <div class="dropdown lg:hidden">

    <div
        tabindex="0"
        role="button"
        class="btn btn-ghost btn-circle"
        aria-label="Open navigation menu"
    >
        ☰
    </div>

    <ul
        tabindex="0"
        class="menu menu-sm dropdown-content
               bg-base-100 rounded-box z-50 mt-3
               w-64 p-4 shadow-lg"
    >

        <li>
           <a
                href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'active' : '' }}"
            >
                Home
            </a>
        </li>

        <li>
            <a
                href="{{ route('about') }}"
                class="{{ request()->routeIs('about') ? 'active' : '' }}"
            >
                About Us
            </a>
        </li>

        <li>
            <a
                href="{{ route('services.index') }}"
                class="{{ request()->routeIs('services.*') ? 'active' : '' }}"
            >
                Services
            </a>
        </li>

        <li>
            <a href="{{ route('packages.index') }}">
                Packages & Promos
            </a>
        </li>

        <li>
            <a href="{{ route('news.index') }}">
                News & Updates
            </a>
        </li>

        <li>
            <a href="{{ route('doctors.index') }}">
                Doctors
            </a>
        </li>

        <li>
            <a href="{{ route('contact') }}">
                Contact Us
            </a>
        </li>

    </ul>

</div>

        <a
            href="{{ route('home') }}"
            class="flex items-center gap-3"
        >

            <div class="w-11 h-11 rounded-xl bg-green-600
                        text-white flex items-center justify-center
                        font-bold text-xl">
                H
            </div>

            <div class="hidden sm:block">

                <div class="font-bold text-green-800 text-lg">
                    Health Care
                </div>

                <div class="text-xs text-gray-500">
                    Trusted Healthcare
                </div>

            </div>

        </a>

    </div>


    <div class="navbar-center hidden lg:flex">

        <ul class="menu menu-horizontal px-1 gap-1">

            <li>
                <a href="{{ route('home') }}">
                    Home
                </a>
            </li>

            <li>
                <a href="{{ route('about') }}">
                    About Us
                </a>
            </li>

            <li>
                <a href="{{ route('services.index') }}">
                    Services
                </a>
            </li>

            <li>
                <a href="{{ route('packages.index') }}">
                    Packages & Promos
                </a>
            </li>

            <li>
                <a href="{{ route('news.index') }}">
                    News & Updates
                </a>
            </li>

            <li>
                <a href="{{ route('doctors.index') }}">
                    Doctors
                </a>
            </li>

            <li>
                <a href="{{ route('contact') }}">
                    Contact Us
                </a>
            </li>

        </ul>

    </div>


    <div class="navbar-end gap-2">

        <a
            href="{{ route('appointments.create') }}"
            class="btn btn-success hidden sm:flex"
        >
            Book an Appointment
        </a>

        <a
            href="tel:[Emergency Hotline]"
            class="btn btn-error"
        >
            Emergency
        </a>

    </div>

</div>