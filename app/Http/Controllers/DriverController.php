<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();
        return view(
            'dashboard.admin.driver.index',
            [
                'drivers' => $drivers,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.driver.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'status' => 'required|in:available,on_leave,in_use',
            
        ]);

        Driver::create($validatedData);

        return redirect('/drivers')->with('success', 'Succesfully create new Driver!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return view('dashboard.admin.driver.edit', [
            'driver' => $driver
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'status' => 'required|in:available,on_leave,in_use',
            
        ];

        $validatedData = $request->validate($rules);

        Driver::where('id', $driver->id)
            ->update($validatedData);
        return redirect('/drivers')->with('success', 'Succesfully update Driver!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver = Driver::findOrFail($driver->id);
        $driver->delete();
        return redirect('/drivers')->with('success', 'Success delete driver!');
    }
}
