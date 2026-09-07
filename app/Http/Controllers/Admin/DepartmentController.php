<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display all departments.
     */
    public function index()
    {
        $departments = Department::withCount('doctors')
            ->latest()
            ->paginate(10);

        return view('admin.departments.index', compact('departments'));
    }


    /**
     * Show the form for creating a department.
     */
    public function create()
    {
        return view('admin.departments.create');
    }


    /**
     * Store a new department.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:departments,name'],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $validated['status'] = $request->boolean('status');

        Department::create($validated);

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Department added successfully.');
    }


    /**
     * Display a department.
     */
    public function show(Department $department)
    {
        $department->load('doctors');

        return view('admin.departments.show', compact('department'));
    }


    /**
     * Show the form for editing a department.
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }


    /**
     * Update a department.
     */
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:departments,name,' . $department->id,
            ],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $validated['status'] = $request->boolean('status');

        $department->update($validated);

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Department updated successfully.');
    }


    /**
     * Delete a department.
     */
    public function destroy(Department $department)
    {
        if ($department->doctors()->exists()) {
            return redirect()
                ->route('admin.departments.index')
                ->with('error', 'Cannot delete a department that has doctors assigned to it.');
        }

        $department->delete();

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}