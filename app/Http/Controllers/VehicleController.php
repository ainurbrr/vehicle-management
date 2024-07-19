<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view(
            'dashboard.admin.vehicle.index',
            [
                'vehicles' => $vehicles,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|string|unique:vehicles',
            'type' => 'required|in:passenger,cargo',
            'fuel_consumption' => 'required|numeric',
            'service_schedule' => 'nullable|date',
            'last_service_date' => 'nullable|date',
            'is_rented' => 'required|boolean',
            'rental_company' => 'required_if:is_rented,1|nullable|string',
        ]);

        Vehicle::create([
            'license_plate' => $request->license_plate,
            'type' => $request->type,
            'status' => 'available',
            'fuel_consumption' => $request->fuel_consumption,
            'service_schedule' => $request->service_schedule,
            'last_service_date' => $request->last_service_date,
            'is_rented' => $request->is_rented,
            'rental_company' => $request->is_rented ? $request->rental_company : null,
        ]);

        return redirect('/vehicles')->with('success', 'Succesfully create new Vehicle!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view(
            'dashboard.admin.vehicle.edit',
            [
                'vehicle' => $vehicle,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'license_plate' => 'required|string|unique:vehicles,license_plate,' . $vehicle->id,
            'type' => 'required|in:passenger,cargo',
            'fuel_consumption' => 'required|numeric',
            'service_schedule' => 'nullable|date',
            'last_service_date' => 'nullable|date',
            'is_rented' => 'required|boolean',
            'rental_company' => 'required_if:is_rented,1|nullable|string',
        ]);

        $vehicle = Vehicle::findOrFail($vehicle->id);
        $vehicle->update([
            'license_plate' => $request->license_plate,
            'type' => $request->type,
            'fuel_consumption' => $request->fuel_consumption,
            'service_schedule' => $request->service_schedule,
            'last_service_date' => $request->last_service_date,
            'is_rented' => $request->is_rented,
            'rental_company' => $request->is_rented ? $request->rental_company : null,
        ]);

        
        return redirect('/vehicles')->with('success', 'Succesfully update vehicle!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle = Vehicle::findOrFail($vehicle->id);
        $vehicle->delete();
        return redirect('/vehicles')->with('success', 'Success delete Vehicle!');
    }
}
