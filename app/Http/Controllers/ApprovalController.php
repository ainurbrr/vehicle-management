<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Driver;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $approver_id = auth()->user()->id;

        $query = Approval::where(function ($query) use ($approver_id) {
            $query->where(function ($subQuery) use ($approver_id) {
                $subQuery->where('approver_id', $approver_id)
                    ->where('level', 1);
            })->orWhere(function ($subQuery) use ($approver_id) {
                $subQuery->where('approver_id', $approver_id)
                    ->where('level', 2);
            });
        });

        if ($request->has('filter') && $request->filter === 'need-approval') {
            $query->where('status', '!=', 'approved');
        }
    
        $approvals = $query->get();

        return view('dashboard.admin.approval.index',[
            'approvals' => $approvals
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Approval $approval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Approval $approval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Approval $approval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Approval $approval)
    {
        //
    }

    public function approval($approval_id){
        $approval= Approval::find($approval_id);
        return view('dashboard.admin.approval.approval',[
            'approval_id' => $approval_id,
            'approval' => $approval
        ]);
    }

    public function approve($approval_id){
        $approval= Approval::find($approval_id);
        $booking = Booking::find($approval->booking_id);
        $vehicle = Vehicle::find($booking->vehicle_id);
        $driver = Driver::find($booking->driver_id);

        if ($approval->level == 1) {
            $booking->status = 'approved_level_1';
        } elseif ($approval->level == 2 && $booking->status == 'approved_level_1') {
            $booking->status = 'on_duty';
        }

        $booking->save();

        $approval->status = 'approved';
        $approval->save();

        if($booking->status == 'approved_level_1'){
            $vehicle->status = 'in_use';
            $vehicle->save();
            $driver->status = 'in_use';
            $driver->save();

            Approval::create([
                'booking_id'=> $booking->id,
                'approver_id'=>$booking->approver_level_2,
                'level'=>2,
                'status'=>'pending',
            ]);
        }

        return redirect('/approvals')->with('success', 'Succesfully approve approvals!');

    }

    public function reject($approval_id){
        $approval= Approval::find($approval_id);
        $booking = Booking::find($approval->booking_id);
        $vehicle = Vehicle::find($booking->vehicle_id);
        $driver = Driver::find($booking->driver_id);

        if ($approval->level == 1 || $approval->level == 2) {
            $booking->status = 'rejected';
        }

        $booking->save();

        $approval->status = 'rejected';
        $approval->save();


        return redirect('/approvals')->with('success', 'Succesfully reject approvals!');
    }
}
