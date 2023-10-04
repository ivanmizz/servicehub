<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $departmentList = Department::all();
        $serviceList = Service::with('department')->paginate(10);  

        return view('admin.service', compact('departmentList', 'serviceList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'department_id' => 'required|exists:departments,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);



        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->department_id = $request->department_id;
       

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('service_images', 'public'); // Store the image in the public disk's staff_images directory
            $service->image = $imagePath;
        }


        $service->save();

        return redirect()->back()->with('success', 'Service created successfully.');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('admin.service', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $departmentList = Department::all();
        return view('admin.service', compact('service', 'departmentList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $service = Service::find($id);
        
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'department_id' => 'required|exists:departments,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Optional: delete the old image if it exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
        
            $imagePath = $request->file('image')->store('service_images', 'public');
            $service->image = $imagePath;
        }

       
        $service->update($validatedData);

        return redirect()->route('service.index')->with('success', 'Service details edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        
        $service->delete();


        return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
    }
}
