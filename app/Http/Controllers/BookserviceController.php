<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Department;

class BookserviceController extends Controller
{
    //
    public function bookservice(Request $request)
    {
        // If a department is selected, filter by it, otherwise get all services.
        if ($request->has('department') && !empty($request->department)) {
            $serviceList = Service::where('department_id', $request->department)->with('department')->get();
        } else {
            $serviceList = Service::with('department')->get();
        }

        $departmentList = Department::all();

        return view('user.bookservice', compact('serviceList', 'departmentList'));
    }

    public function create(Service $service)
    { // This view will have the form to confirm the booking
        return view('bookservice.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $booking = new Booking();
        $booking->user_id = auth()->id();
        $booking->service_id = $service->id;
        $booking->message = $request->message;
        $booking->status = 'Pending'; // or any default status you want
        $booking->booked_for = now(); // or get a date from a form input
        $booking->save();

        // After saving the booking...
        session()->flash('success', 'Booking was successful!');
        return redirect()->route('user.bookservice')->with('success', 'Service booked successfully.');
    }



}