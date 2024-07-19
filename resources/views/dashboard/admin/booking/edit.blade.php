@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit booking</h1>
</div>
<div class="col-lg-8">
    <form action="/bookings/{{ $booking->id }}" method="post" class="mb-5">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="vehicle_id" class="form-label">vehicle</label>
            <select class="form-select" name="vehicle_id">
                @foreach ($vehicles as $vehicle)
                    @if (old('vehicle_id', $booking->vehicle_id) == $vehicle->id)
                        <option value="{{ $vehicle->id }}" selected>{{ $vehicle->license_plate }}</option>
                    @else
                        <option value="{{ $vehicle->id }}">{{ $vehicle->license_plate }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="driver_id" class="form-label">driver</label>
            <select class="form-select" name="driver_id">
                @foreach ($drivers as $driver)
                    @if (old('driver_id', $booking->driver_id) == $driver->id)
                        <option value="{{ $driver->id }}" selected>{{ $driver->name }}</option>
                    @else
                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">       
            <label for="approver_level_1" class="form-label">Approver 1</label>
            <select class="form-select" name="approver_level_1">
                @foreach ($users as $user)
                    @if (old('aprover_level_1', $booking->approver_level_1) == $user->id)
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="approver_level_2" class="form-label">Approver 2</label>
            <select class="form-select" name="approver_level_2">
                @foreach ($users as $user)
                    @if (old('approver_level_2', $booking->approver_level_2) == $user->id)
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status">
                <option value="pending">pending</option>
                <option value="approved_level_1">approved_level_1</option>
                <option value="on_duty">on_duty</option>
                <option value="completed">completed</option>
                <option value="rejected">rejected</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror"
                id="start_date" name="start_date" autofocus value="{{ old('start_date', $booking->start_date) }}">
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror"
                id="end_date" name="end_date" autofocus value="{{ old('end_date', $booking->end_date) }}">
            @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Create Booking</button>
    </form>
</div>
@endsection