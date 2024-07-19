@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-4">
        <div class="col-lg-8">
            <a href="/approvals" class="btn btn-primary"><span data-feather="arrow-left"></span> Back to approval</a>
            <form action="/bookings/{{ $approval_id }}/approve" method="post" class="d-inline">
                @csrf
                <button class="btn btn-success"><span data-feather="edit"></span>
                    Approve</button>
            </form>
            <a href="/bookings/{{ $approval_id }}/reject" class="btn btn-danger"><span data-feather="edit"></span>
                Reject</a>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>

                            <th>Booking ID</th>
                            <th>Approver</th>
                            <th>Level</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                                <td>{{ $approval->booking_id }}</td>
                                <td>{{ $approval->approver->name }}</td>
                                <td>{{ $approval->level }}</td>
                                <td>{{ $approval->status }}</td>
                            </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection