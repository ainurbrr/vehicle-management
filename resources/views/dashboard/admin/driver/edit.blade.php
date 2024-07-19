@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Driver</h1>
</div>
<div class="col-lg-8">
    <form action="/drivers/{{ $driver->id }}" method="post" class="mb-5">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                name="name" required autofocus value="{{ old('name', $driver->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                name="phone" required autofocus value="{{ old('phone', $driver->phone) }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="available">Available</option>
                <option value="in_use">In Use</option>
                <option value="on_leave">On Leave</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Driver</button>
    </form>
</div>
@endsection