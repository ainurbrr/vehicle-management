@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Approvals</h1>
</div>
@if (session()->has('success'))
    <div class="alert alert-success col-lg-9" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="table-responsive col-lg-10">
    <a href="{{ route('approvals.index', ['filter' => 'need-approval']) }}" class="btn btn-primary mb-2" disabled>Need Approvals</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Booking ID</th>
                <th>Approver</th>
                <th>Level</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvals as $approval)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $approval->booking_id }}</td>
                    <td>{{ $approval->approver->name }}</td>
                    <td>{{ $approval->level }}</td>
                    <td>{{ $approval->status }}</td>
                    <td>
                        <a href="/approvals/{{ $approval->id }}/approval" class="badge bg-warning"><span
                                data-feather="edit"></span></a>
                        <form action="/approvals/{{ $approval->id }}" method="post" class="d-inline">
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