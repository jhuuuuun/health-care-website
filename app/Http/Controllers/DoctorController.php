<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of doctors.
     */
    public function index(Request $request)
    {
        // Get search value from URL
        $search = $request->input('search');

        // Get department value from URL
        $department = $request->input('department');

        /*
        |--------------------------------------------------------------------------
        | Doctors Query
        |--------------------------------------------------------------------------
        */

        $doctors = Doctor::with('department')
            ->where('status', true)

            // Search by doctor name or specialization
            ->when($search, function ($query) use ($search) {

                $query->where(function ($query) use ($search) {

                    $query->where('fname', 'like', '%' . $search . '%')
                        ->orWhere('mname', 'like', '%' . $search . '%')
                        ->orWhere('lname', 'like', '%' . $search . '%')
                        ->orWhere('specialization', 'like', '%' . $search . '%');

                });

            })

            // Filter by department
            ->when($department, function ($query) use ($department) {

                $query->where('department_id', $department);

            })

            ->latest()
            ->paginate(12)

            // Keep search and department in pagination links
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Departments
        |--------------------------------------------------------------------------
        */

        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view('doctors.index', compact(
            'doctors',
            'departments',
            'search',
            'department'
        ));
    }


    /**
     * Display a single doctor.
     */
    public function show($slug)
    {
        $doctor = Doctor::with('department')
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        return view('doctors.show', compact('doctor'));
    }
}