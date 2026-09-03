<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDoctors = Doctor::count();

        $activeDoctors = Doctor::where('status', true)->count();

        $totalDepartments = Department::count();

        $totalServices = Service::count();

        return view('admin.dashboard', compact(
            'totalDoctors',
            'activeDoctors',
            'totalDepartments',
            'totalServices'
        ));
    }
}