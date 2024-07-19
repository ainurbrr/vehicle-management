@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Driver</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-9" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-10">
        <a href="/drivers/create" class="btn btn-primary mb-2">Add New Driver</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $driver->name }}</td>
                        <td>{{ $driver->phone }}</td>
                        <td>{{ $driver->status }}</td>
                        <td>
                            <a href="/drivers/{{ $driver->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/drivers/{{ $driver->id }}" method="post" class="d-inline">
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