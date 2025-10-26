@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-heading')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>
@endsection

@section('content')
    <!-- Stats Cards Row -->
    @include('partials.admin-statscard')

    <!-- Charts Row -->
    <div class="row">
        <!-- Area Chart -->
        @include('partials.admin-earningcharts')

        <!-- Pie Chart -->
        @include('partials.admin-revenuechat')
    </div>

    <!-- Projects and Welcome Row -->
    <div class="row">
        <!-- Projects Column -->
        @include('partials.admin-projects')

        <!-- Welcome Column -->
        @include('partials.admin-welcome')
    </div>
@endsection

@push('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endpush