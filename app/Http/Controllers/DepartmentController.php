<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all departments from the database
        $departmentList = Department::all();

        // Return a view to display the list of departments
        return view('admin.department', compact('departmentList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:departments|max:255', 
        ]);

        $department = new department;
        $department->name=$request->name;
        $department->save();

        return redirect()->back()->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Return a view to display the details of a specific department
        return view('admin.department');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        // Return a view to edit the details of a specific department
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:departments|max:255', // Ensure name is unique
        ]);

        // Update the department record
        $department->update([
            'name' => $request->input('name'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Department edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        // Delete the department
        $department->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Department deleted successfully.');
    }
}
