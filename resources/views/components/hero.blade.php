<section class="relative overflow-hidden bg-gradient-to-br from-green-50 via-white to-green-100">

    <div class="max-w-7xl mx-auto px-6 py-20 lg:py-28">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- Left Content -->
            <div>

                <span class="badge badge-success badge-outline mb-5">
                    Trusted Healthcare
                </span>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">

                    Compassionate Care.
                    <span class="text-green-600">
                        Trusted Healthcare.
                    </span>
                    Better Lives.

                </h1>

                <p class="mt-6 text-lg text-gray-600 leading-relaxed max-w-xl">

                    Quality healthcare delivered with compassion,
                    professionalism, and a commitment to every patient's
                    well-being.

                </p>

                <div class="mt-8 flex flex-col sm:flex-row gap-4">

                    <a
                        href="{{ route('appointments.create') }}"
                        class="btn btn-success btn-lg"
                    >
                        Book an Appointment
                    </a>

                    <a
                        href="{{ route('services.index') }}"
                        class="btn btn-outline btn-success btn-lg"
                    >
                        Explore Our Services
                    </a>

                </div>

                <div class="mt-8 flex items-center gap-3 text-gray-600">

                    <div class="w-10 h-10 rounded-full bg-green-100
                                flex items-center justify-center">
                        🛡
                    </div>

                    <div>

                        <p class="font-semibold text-gray-900">
                            Patient-Centered Care
                        </p>

                        <p class="text-sm">
                            Your health is our priority.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Right Image -->
            <div class="relative">

                <div class="absolute -top-6 -right-6
                            w-32 h-32
                            bg-green-200
                            rounded-full
                            opacity-50
                            blur-2xl">
                </div>

                <div class="absolute -bottom-6 -left-6
                            w-40 h-40
                            bg-green-300
                            rounded-full
                            opacity-40
                            blur-3xl">
                </div>

                <div class="relative">

                    <img
                        src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d"
                        alt="Healthcare professional providing patient care"
                        class="w-full h-[500px] object-cover rounded-3xl shadow-2xl"
                        loading="eager"
                    >

                </div>

            </div>

        </div>

    </div>

</section>