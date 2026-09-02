<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create([
            'name' => 'Cardiology',
            'slug' => 'cardiology',
            'description' => 'Medical care focused on heart and cardiovascular health.',
            'status' => true,
        ]);

        Department::create([
            'name' => 'Emergency Department',
            'slug' => 'emergency-department',
            'description' => 'Urgent medical care for emergency conditions.',
            'status' => true,
        ]);

        Department::create([
            'name' => 'Laboratory',
            'slug' => 'laboratory',
            'description' => 'Diagnostic laboratory testing services.',
            'status' => true,
        ]);

        Department::create([
            'name' => 'Radiology',
            'slug' => 'radiology',
            'description' => 'Diagnostic imaging services for patient care.',
            'status' => true,
        ]);
    }
}