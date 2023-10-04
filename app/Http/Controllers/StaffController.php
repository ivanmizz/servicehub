<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\staff;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    //displaying all the staff in a table
    public function index()
    {
        $departmentList = Department::all();
        $staffList = Staff::with('department')->paginate(10);
        return view('admin.staff', compact('departmentList', 'staffList'));
    }


    public function create()
    {


    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'department' => 'required|exists:departments,id',
            'profession' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $staff = new staff;
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->profession = $request->profession;
        $staff->department()->associate($request->department);
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('staff_images', 'public');
            $staff->image = $imagePath;
        }
        $staff->save();

        return redirect()->back()->with('success', 'Staff member added successfully.');
    }


    public function destroy($id)
    {
        $staff = Staff::find($id);

        if (!$staff) {
            return redirect()->back()->with('error', 'Staff member not found.');
        }

        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff member removed successfully.');
    }

    public function edit($id)
    {
        $staff = Staff::find($id);
        $departmentList = Department::all();
        return view('admin.staff', compact('staff', 'departmentList'));
    }




    public function update(Request $request, $id)
    {

        $staff = Staff::find($id);
        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'department_id' => 'required|exists:departments,id',
            'profession' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

       
        $staff->update($validatedData);

        return redirect()->route('staff.index')->with('success', 'Employee details edited successfully.');
    }


}