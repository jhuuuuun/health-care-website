<div class="bg-white rounded-2xl shadow-sm
            border border-gray-100 overflow-hidden
            hover:shadow-xl transition duration-300">

    {{-- Doctor Photo --}}
    <div class="bg-green-50">

        @if($doctor->photo)

            <img
                src="{{ asset('storage/' . $doctor->photo) }}"
                alt="{{ $doctor->full_name }}"
                class="w-full h-72 object-cover"
            >

        @else

            <div class="w-full h-72 flex items-center justify-center">

                <div class="text-center">

                    <div
                        class="w-24 h-24 mx-auto rounded-full
                               bg-green-100 flex items-center
                               justify-center"
                    >

                        <svg
                            class="w-12 h-12 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M5.121 17.804A9 9 0 1118.879 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                            />

                        </svg>

                    </div>

                    <p class="mt-3 text-sm text-green-600">
                        Doctor Photo
                    </p>

                </div>

            </div>

        @endif

    </div>


    {{-- Doctor Information --}}
    <div class="p-6">

        {{-- Specialization --}}
        <p class="text-sm font-semibold text-green-600">
            {{ $doctor->specialization }}
        </p>


        {{-- Doctor Name --}}
        <h2 class="mt-2 text-xl font-bold text-gray-900">
            Dr. {{ $doctor->full_name }}
        </h2>


        {{-- Department --}}
        @if($doctor->department)

            <p class="mt-2 text-sm text-gray-500">
                {{ $doctor->department->name }}
            </p>

        @endif


        {{-- Credentials --}}
        @if($doctor->credentials)

            <p class="mt-3 text-sm text-gray-600">
                {{ $doctor->credentials }}
            </p>

        @endif


        {{-- View Profile --}}
        <div class="mt-6">

            <a
                href="{{ route('doctors.show', $doctor->slug) }}"
                class="inline-flex items-center
                       text-green-700 font-semibold
                       hover:text-green-900"
            >

                View Profile

                <svg
                    class="w-4 h-4 ml-2"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                    />

                </svg>

            </a>

        </div>

    </div>

</div>