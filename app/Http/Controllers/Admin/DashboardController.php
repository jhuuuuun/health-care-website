<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $totalDoctors = Doctor::count();

        $activeDoctors = Doctor::where('status', true)->count();

        $totalDepartments = Department::count();

        $totalServices = Service::count();

        $totalUsers = User::count();

        $totalAdmins = User::where('is_admin', true)->count();


        // Recent Doctors
        $recentDoctors = Doctor::with('department')
            ->latest()
            ->take(5)
            ->get();


        // Recent Users
        $recentUsers = User::latest()
            ->take(5)
            ->get();


        return view('admin.dashboard', compact(
            'totalDoctors',
            'activeDoctors',
            'totalDepartments',
            'totalServices',
            'totalUsers',
            'totalAdmins',
            'recentDoctors',
            'recentUsers'
        ));
    }
}