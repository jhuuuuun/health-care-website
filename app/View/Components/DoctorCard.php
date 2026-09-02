<?php

namespace App\View\Components;

use App\Models\Doctor;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DoctorCard extends Component
{
    public function __construct(
        public Doctor $doctor
    ) {
        //
    }

    public function render(): View|Closure
    {
        return view('components.doctor-card');
    }
}