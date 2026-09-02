<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    /**
     * Show the create doctor form.
     */
    public function create()
    {
        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.doctors.create', compact('departments'));
    }


    /**
     * Store a new doctor.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'fname' => [
                'required',
                'string',
                'max:100'
            ],

            'mname' => [
                'nullable',
                'string',
                'max:100'
            ],

            'lname' => [
                'required',
                'string',
                'max:100'
            ],

            'department_id' => [
                'required',
                'exists:departments,id'
            ],

            'specialization' => [
                'required',
                'string',
                'max:150'
            ],

            'credentials' => [
                'nullable',
                'string',
                'max:255'
            ],

            'biography' => [
                'nullable',
                'string'
            ],

            'schedule' => [
                'nullable',
                'string'
            ],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'status' => [
                'nullable',
                'boolean'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Generate Full Name
        |--------------------------------------------------------------------------
        */

        $fullName = trim(
            $request->fname . ' ' .
            ($request->mname
                ? $request->mname . ' '
                : '') .
            $request->lname
        );


        /*
        |--------------------------------------------------------------------------
        | Generate Unique Slug
        |--------------------------------------------------------------------------
        */

        $originalSlug = Str::slug($fullName);

        $slug = $originalSlug;

        $count = 1;

        while (Doctor::where('slug', $slug)->exists()) {

            $slug = $originalSlug . '-' . $count;

            $count++;
        }


        /*
        |--------------------------------------------------------------------------
        | Upload Doctor Photo
        |--------------------------------------------------------------------------
        */

        $photoPath = null;

        if ($request->hasFile('photo')) {

            $photoPath = $request->file('photo')
                ->store('doctors', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Save Doctor
        |--------------------------------------------------------------------------
        */

        Doctor::create([

            'department_id' => $request->department_id,

            'fname' => $request->fname,

            'mname' => $request->mname,

            'lname' => $request->lname,

            'slug' => $slug,

            'specialization' => $request->specialization,

            'credentials' => $request->credentials,

            'biography' => $request->biography,

            'photo' => $photoPath,

            'schedule' => $request->schedule,

            'status' => $request->boolean('status'),

        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.doctors.index')
            ->with(
                'success',
                'Doctor added successfully.'
            );
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $department = $request->input('department');


        $doctors = Doctor::with('department')

            ->when($search, function ($query) use ($search) {

                $query->where(function ($query) use ($search) {

                    $query->where('fname', 'like', '%' . $search . '%')
                        ->orWhere('mname', 'like', '%' . $search . '%')
                        ->orWhere('lname', 'like', '%' . $search . '%')
                        ->orWhere('specialization', 'like', '%' . $search . '%');

                });

            })

            ->when($department, function ($query) use ($department) {

                $query->where('department_id', $department);

            })

            ->latest()
            ->paginate(10)
            ->withQueryString();


        $departments = Department::orderBy('name')
            ->get();


        return view(
            'admin.doctors.index',
            compact(
                'doctors',
                'departments',
                'search',
                'department'
            )
        );
    }

    public function edit(Doctor $doctor)
    {
        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.doctors.edit',
            compact('doctor', 'departments')
        );
    }

    public function update(Request $request, Doctor $doctor)
    {
        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'fname' => [
                'required',
                'string',
                'max:100'
            ],

            'mname' => [
                'nullable',
                'string',
                'max:100'
            ],

            'lname' => [
                'required',
                'string',
                'max:100'
            ],

            'department_id' => [
                'required',
                'exists:departments,id'
            ],

            'specialization' => [
                'required',
                'string',
                'max:150'
            ],

            'credentials' => [
                'nullable',
                'string',
                'max:255'
            ],

            'biography' => [
                'nullable',
                'string'
            ],

            'schedule' => [
                'nullable',
                'string'
            ],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'status' => [
                'nullable',
                'boolean'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Generate Full Name
        |--------------------------------------------------------------------------
        */

        $fullName = trim(
            $request->fname . ' ' .
            ($request->mname
                ? $request->mname . ' '
                : '') .
            $request->lname
        );


        /*
        |--------------------------------------------------------------------------
        | Generate Unique Slug
        |--------------------------------------------------------------------------
        */

        $originalSlug = Str::slug($fullName);

        $slug = $originalSlug;

        $count = 1;

        while (
            Doctor::where('slug', $slug)
                ->where('id', '!=', $doctor->id)
                ->exists()
        ) {

            $slug = $originalSlug . '-' . $count;

            $count++;
        }


        /*
        |--------------------------------------------------------------------------
        | Keep Existing Photo
        |--------------------------------------------------------------------------
        */

        $photoPath = $doctor->photo;


        /*
        |--------------------------------------------------------------------------
        | Replace Photo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('photo')) {

            // Delete old photo
            if ($doctor->photo) {

                Storage::disk('public')
                    ->delete($doctor->photo);
            }


            // Store new photo
            $photoPath = $request->file('photo')
                ->store('doctors', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Update Doctor
        |--------------------------------------------------------------------------
        */

        $doctor->update([

            'department_id' => $request->department_id,

            'fname' => $request->fname,

            'mname' => $request->mname,

            'lname' => $request->lname,

            'slug' => $slug,

            'specialization' => $request->specialization,

            'credentials' => $request->credentials,

            'biography' => $request->biography,

            'photo' => $photoPath,

            'schedule' => $request->schedule,

            'status' => $request->boolean('status'),

        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.doctors.index')
            ->with(
                'success',
                'Doctor updated successfully.'
            );
    }

    public function destroy(Doctor $doctor)
    {
        if ($doctor->photo) {
            Storage::disk('public')->delete($doctor->photo);
        }

        $doctor->delete();

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Doctor deleted successfully.');
    }
}