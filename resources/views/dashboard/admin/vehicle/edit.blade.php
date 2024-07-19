@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Vehicle</h1>
    </div>
    <div class="col-lg-8">
        <form action="/vehicles/{{ $vehicle->id }}" method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="license_plate" class="form-label">License Plate</label>
                <input type="text" class="form-control @error('license_plate') is-invalid @enderror" id="license_plate"
                    name="license_plate" required autofocus value="{{ old('license_plate', $vehicle->license_plate) }}">
                @error('license_plate')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" name="type" required>
                    @if (old('type', $vehicle->type) == 'passenger')
                        <option value="passenger" selected>Passenger</option>
                        <option value="cargo" >Cargo</option>
                    @else
                    <option value="passenger">Passenger</option>
                        <option value="cargo" selected>Cargo</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="fuel_consumption" class="form-label">Fuel Consumption</label>
                <input type="number" class="form-control @error('fuel_consumption') is-invalid @enderror"
                    id="fuel_consumption" name="fuel_consumption" required autofocus value="{{ old('fuel_consumption', $vehicle->fuel_consumption) }}">
                @error('fuel_consumption')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pool" class="form-label">Pool</label>
                <input type="text" class="form-control @error('pool') is-invalid @enderror" id="pool"
                    name="pool" required autofocus value="{{ old('pool', $vehicle->pool) }}">
                @error('pool')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="service_schedule" class="form-label">Service Schedule</label>
                <input type="date" class="form-control @error('service_schedule') is-invalid @enderror"
                    id="service_schedule" name="service_schedule" required autofocus value="{{ old('service_schedule', $vehicle->service_schedule) }}">
                @error('service_schedule')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_service_date" class="form-label">Last Service Date</label>
                <input type="date" class="form-control @error('last_service_date') is-invalid @enderror"
                    id="last_service_date" name="last_service_date" autofocus value="{{ old('last_service_date', $vehicle->last_service_date) }}">
                @error('last_service_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="is_rented" class="form-label">Is Rented</label>
                <select class="form-select" name="is_rented" required>
                    @if (old('is_rented', $vehicle->is_rented) == '0')
                    <option value="0" selected>No</option>
                    <option value="1" >Yes</option>
                    @else
                    <option value="0" >No</option>
                    <option value="1" selected>Yes</option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="rental_company" class="form-label">Rental Company</label>
                <input type="text" class="form-control @error('rental_company') is-invalid @enderror" id="rental_company"
                    name="rental_company" autofocus value="{{ old('rental_company', $vehicle->rental_company) }}">
                @error('rental_company')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save Vehicle</button>
        </form>
    </div>
@endsection
