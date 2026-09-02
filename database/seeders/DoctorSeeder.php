<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Find Departments
        |--------------------------------------------------------------------------
        */

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


        /*
        |--------------------------------------------------------------------------
        | Create Doctors
        |--------------------------------------------------------------------------
        */

        if ($cardiology) {

            Doctor::updateOrCreate(
                [
                    'slug' => 'dr-maria-clara-santos',
                ],
                [
                    'department_id' => $cardiology->id,
                    'fname' => 'Maria',
                    'mname' => 'Clara',
                    'lname' => 'Santos',
                    'specialization' => 'Cardiologist',
                    'credentials' => 'MD, FPCP',
                    'biography' => 'Dr. Maria Clara Santos provides comprehensive cardiovascular care and preventive health services.',
                    'photo' => null,
                    'schedule' => 'Monday - Friday, 9:00 AM - 4:00 PM',
                    'status' => true,
                ]
            );

        }


        if ($emergency) {

            Doctor::updateOrCreate(
                [
                    'slug' => 'dr-juan-dela-cruz',
                ],
                [
                    'department_id' => $emergency->id,
                    'fname' => 'Juan',
                    'mname' => 'Dela',
                    'lname' => 'Cruz',
                    'specialization' => 'Emergency Medicine Specialist',
                    'credentials' => 'MD, Emergency Medicine',
                    'biography' => 'Dr. Juan Dela Cruz provides urgent and emergency medical care for patients requiring immediate attention.',
                    'photo' => null,
                    'schedule' => 'Monday - Sunday, 8:00 AM - 8:00 PM',
                    'status' => true,
                ]
            );

        }


        if ($laboratory) {

            Doctor::updateOrCreate(
                [
                    'slug' => 'dr-ana-marie-reyes',
                ],
                [
                    'department_id' => $laboratory->id,
                    'fname' => 'Ana',
                    'mname' => 'Marie',
                    'lname' => 'Reyes',
                    'specialization' => 'Laboratory Medicine Specialist',
                    'credentials' => 'MD, Pathology',
                    'biography' => 'Dr. Ana Marie Reyes specializes in laboratory medicine and diagnostic evaluation.',
                    'photo' => null,
                    'schedule' => 'Monday - Friday, 8:00 AM - 3:00 PM',
                    'status' => true,
                ]
            );

        }


        if ($radiology) {

            Doctor::updateOrCreate(
                [
                    'slug' => 'dr-robert-garcia',
                ],
                [
                    'department_id' => $radiology->id,
                    'fname' => 'Robert',
                    'mname' => null,
                    'lname' => 'Garcia',
                    'specialization' => 'Radiologist',
                    'credentials' => 'MD, Radiology',
                    'biography' => 'Dr. Robert Garcia provides diagnostic imaging interpretation and radiology consultation services.',
                    'photo' => null,
                    'schedule' => 'Monday - Friday, 10:00 AM - 5:00 PM',
                    'status' => true,
                ]
            );

        }
    }
}
