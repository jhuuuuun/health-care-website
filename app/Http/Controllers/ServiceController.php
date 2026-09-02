<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Department;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $department = $request->input('department');

        $services = Service::with('department')
            ->where('status', true)

            ->when($search, function ($query) use ($search) {

                $query->where(function ($query) use ($search) {

                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('description', 'like', "%{$search}%");

                });

            })

            ->when($department, function ($query) use ($department) {

                $query->where('department_id', $department);

            })

            ->latest()

            ->paginate(12)

            ->withQueryString();

        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();

        return view('services.index', compact(
            'services',
            'departments',
            'search',
            'department'
        ));
    }


    public function show($slug)
    {
        $service = Service::with('department')
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        return view('services.show', compact('service'));
    }
}