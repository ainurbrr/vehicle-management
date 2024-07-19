@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Completed Bookings Chart</h1>
</div>
<div class="col-lg-10">
    {!! $chart->container() !!}
</div>

<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

@endsection