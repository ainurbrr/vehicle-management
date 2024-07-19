@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Vehicle</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-11" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-11">
        <a href="/vehicles/create" class="btn btn-primary mb-2">Add New Vehicle</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>License Plate</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Fuel Consumption</th>
                    <th>Pool</th>
                    <th>Service Schedule</th>
                    <th>Last Service Date</th>
                    <th>Is Rented</th>
                    <th>Rental Company</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $vehicle->license_plate }}</td>
                        <td>{{ $vehicle->type }}</td>
                        <td>{{ $vehicle->status }}</td>
                        <td>{{ $vehicle->fuel_consumption }}</td>
                        <td>{{ $vehicle->pool }}</td>
                        <td>{{ $vehicle->service_schedule }}</td>
                        <td>{{ $vehicle->last_service_date }}</td>
                        <td>{{ $vehicle->is_rented ? 'Yes' : 'No' }}</td>
                        <td>{{ $vehicle->rental_company }}</td>
                        <td>{{-- <a href="/vehicles/{{ $vehicle->id }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
                            <a href="/vehicles/{{ $vehicle->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/vehicles/{{ $vehicle->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure to delete data?')"><span
                                        data-feather="trash-2"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection