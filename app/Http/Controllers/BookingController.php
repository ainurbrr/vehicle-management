<?php

namespace App\Http\Controllers;

use App\Exports\BookingsExport;
use App\Models\Booking;
use App\Models\Approval;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Driver;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view(
            'dashboard.admin.booking.index',
            [
                'bookings' => $bookings
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.booking.create', [
            'users' => User::where('role', 'approver')->get(),
            'vehicles' => Vehicle::where('status', 'available')->get(),
            'drivers' => Driver::where('status', 'available')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'approver_level_1' => 'required',
            'approver_level_2' => 'required',
            'status' => 'required|in:pending,approved_level_1,rejected,completed,on_duty',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->user()->id,
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'approver_level_1' => $request->approver_level_1,
            'approver_level_2' => $request->approver_level_2,
            'status' => $request->status,
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
        ]);

        Approval::create([
            'booking_id'=> $booking->id,
            'approver_id'=>$request->approver_level_1,
            'level'=>1,
            'status'=>'pending',
        ]);

        return redirect('/bookings')->with('success', 'Succesfully create new Booking!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('dashboard.admin.booking.edit', [
            'users' => User::where('role', 'approver')->get(),
            'vehicles' => Vehicle::where('status', 'available')->get(),
            'drivers' => Driver::where('status', 'available')->get(),
            'booking'=> $booking
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $rules =[
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'approver_level_1' => 'required',
            'approver_level_2' => 'required',
            'status' => 'required|in:pending,approved_level_1,rejected,completed,on_duty',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
        $validatedData = $request->validate($rules);

        Booking::where('id', $booking->id)->update($validatedData);

        return redirect('/bookings')->with('success', 'Succesfully update Booking!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        Booking::destroy($booking->id);
        return redirect('/bookings')->with('success', 'Success delete post!');
    }

    // public function export_excel()
	// {
	// 	return Excel::download(new BookingsExport, 'bookings.xlsx');
	// }
}
