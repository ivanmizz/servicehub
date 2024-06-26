<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\staff;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    public function index()
    {

        // Get the bookings of the authenticated user
        $bookings = Booking::with('service', 'staff')->paginate(10);
       
        return view('user.booking', compact('bookings'));
    }

    public function adminView()
    {
        $bookings = Booking::with(['user', 'service', 'staff'])->paginate(10); // Fetching 10 bookings per page.
        $staffList = Staff::all(); 
       // dd($bookings);
        return view('admin.booking', compact('bookings', 'staffList'));
    }


    public function showAllBookings(Request $request)
    {
        
        $staffList = Staff::all();
      
        $status = $request->input('status');
        $bookings = Booking::with('user', 'service', 'staff');

        if ($status) {
            $bookings = $bookings->where('status', $status);
        }

        $bookings = $bookings->paginate(10);

    
        return view('admin.booking', compact('bookings', 'staffList'));
    }



    public function cancel($id)
    {
        $booking = Booking::find($id);

        // Check if the booking exists and belongs to the authenticated user
        if ($booking && $booking->user_id == auth()->id()) {
            // Only allow cancellation if it's not completed
            if ($booking->status !== 'completed') {
                $booking->status = 'cancelled';
                $booking->save();

                return redirect()->route('user.booking')->with('success', 'Booking cancelled successfully.');
            } else {
                return redirect()->route('user.booking')->with('error', 'Booking cannot be cancelled as it is already completed.');
            }
        } else {
            return redirect()->route('user.booking')->with('error', 'Booking not found.');
        }
    }

   

    public function edit(Booking $booking)
    {
        $bookings = Booking::paginate(10);
        $staffList = Staff::paginate(10);
        return view('admin.booking', compact('bookings', 'staffList')); // Compact only 'booking' and 'staffList'
    }


    public function update(Request $request, Booking $booking)
    {     

        $bookings = Booking::all();
        
        
        $validatedData = $request->validate([
            'message' => 'required',
            'status' => 'required',
            'staff_id' => 'required|exists:staff,id',

        ]);

        $booking->update($validatedData);
    
        return redirect()->back()->with('success', 'Booking updated successfully.');
    }
}