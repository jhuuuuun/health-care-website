<section class="bg-gray-50">

    <div class="max-w-7xl mx-auto px-6 py-20 lg:py-24">

        <!-- Heading -->
        <div class="max-w-3xl mx-auto text-center">

            <span class="text-sm font-semibold uppercase
                         tracking-wider text-green-600">
                Our Services
            </span>

            <h2 class="mt-3 text-3xl md:text-4xl
                       font-bold text-gray-900">
                Quality Healthcare Services
            </h2>

            <p class="mt-4 text-gray-600">
                Explore our range of medical services designed
                to support your health and well-being.
            </p>

        </div>


        <!-- Services Grid -->
        <div class="mt-12 grid grid-cols-1
                    sm:grid-cols-2
                    lg:grid-cols-4
                    gap-6">

            <x-service-card
                name="Cardiology"
                description="Comprehensive care for heart and cardiovascular conditions."
                department="Specialty Care"
                icon="🫀"
            />

            <x-service-card
                name="Emergency Care"
                description="Prompt medical attention for urgent and emergency conditions."
                department="Emergency"
                icon="🚑"
            />

            <x-service-card
                name="Laboratory"
                description="Reliable laboratory testing to support accurate diagnosis."
                department="Diagnostics"
                icon="🔬"
            />

            <x-service-card
                name="Radiology"
                description="Diagnostic imaging services to help physicians evaluate patient conditions."
                department="Diagnostics"
                icon="🩻"
            />

            <x-service-card
                name="Pediatrics"
                description="Healthcare services focused on the health and well-being of children."
                department="Medical Specialty"
                icon="👶"
            />

            <x-service-card
                name="Pharmacy"
                description="Convenient access to prescribed medicines and pharmaceutical services."
                department="Patient Services"
                icon="💊"
            />

        </div>


        <!-- Button -->
        <div class="mt-12 text-center">

            <a
                href="{{ route('services.index') }}"
                class="btn btn-success btn-lg"
            >
                View All Services
            </a>

        </div>

    </div>

</section>