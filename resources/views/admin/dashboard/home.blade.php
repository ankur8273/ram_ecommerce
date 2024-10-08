@extends('admin.layouts.app')
@section('title', 'Webhuts - Main Dashboard')
@section('css')
    <style>

    </style>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <!-- Apex Charts js -->
    <script src="{{ asset('public/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Dashboard App js -->
    <script src="{{ asset('public/assets/js/pages/demo.dashboard.js') }}"></script>

    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
