<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $cardiology = Department::where(
            'slug',
            'cardiology'
        )->first();

        $emergency = Department::where(
            'slug',
            'emergency-department'
        )->first();

        $laboratory = Department::where(
            'slug',
            'laboratory'
        )->first();

        $radiology = Department::where(
            'slug',
            'radiology'
        )->first();


        Service::create([
            'department_id' => $cardiology->id,
            'name' => 'Cardiology Consultation',
            'slug' => 'cardiology-consultation',
            'description' => 'Professional consultation and evaluation for cardiovascular conditions.',
            'schedule' => 'Monday - Friday, 8:00 AM - 5:00 PM',
            'status' => true,
        ]);

        Service::create([
            'department_id' => $emergency->id,
            'name' => 'Emergency Care',
            'slug' => 'emergency-care',
            'description' => 'Immediate medical attention for urgent and emergency conditions.',
            'schedule' => '24 Hours',
            'status' => true,
        ]);

        Service::create([
            'department_id' => $laboratory->id,
            'name' => 'Laboratory Testing',
            'slug' => 'laboratory-testing',
            'description' => 'Diagnostic laboratory services supporting accurate medical evaluation.',
            'schedule' => 'Monday - Sunday, 6:00 AM - 8:00 PM',
            'status' => true,
        ]);

        Service::create([
            'department_id' => $radiology->id,
            'name' => 'Diagnostic Radiology',
            'slug' => 'diagnostic-radiology',
            'description' => 'Diagnostic imaging services supporting patient diagnosis and treatment.',
            'schedule' => 'Monday - Saturday, 8:00 AM - 6:00 PM',
            'status' => true,
        ]);
    }
}