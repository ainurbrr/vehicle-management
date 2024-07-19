@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Booking</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-9" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-10">
        <a href="/bookings/create" class="btn btn-primary mb-2">Add New Booking</a>
        <a href="/exports" class="btn btn-success float-end"><span data-feather="file-text"></span>
            Export to excel</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Vehicle</th>
                    <th>Driver</th>
                    <th>Approver 1</th>
                    <th>Approver 2</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->vehicle->license_plate }}</td>
                        <td>{{ $booking->driver->name }}</td>
                        <td>{{ $booking->approverLevel1->name }}</td>
                        <td>{{ $booking->approverLevel2->name }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>{{ $booking->start_date}}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>{{--<a href="/bookings/{{ $booking->id }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
                            <a href="/bookings/{{ $booking->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/bookings/{{ $booking->id }}" method="post" class="d-inline">
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