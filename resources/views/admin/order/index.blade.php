@extends('admin.layouts.app')
@section('title', 'Order List')
@section('css')
    <style>

    </style>
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Order</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Order DateTime</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($records as $key => $record)
                                    <tr>
                                        <td>{{ $key + 1 }} </td>
                                        <td>{{ $record->visitor->name }}</td>
                                        <td class="table-user">
                                            <img src="{{ $record->banner ? asset('public/uploads/product/' . $record->product->banner) : asset('public/images/placeholder.png') }}"
                                                alt="{{ $record->product_name }}" class="me-2 rounded-circle" />
                                            {{ $record->product_name }}
                                        </td>
                                        <td>{{ $record->quantity }}</td>
                                        <td>{{ $record->product_price }}</td>
                                        <td>{{ $record->quantity * $record->product_price }}</td>
                                        <td>{{ $record->created_at }}</td>

                                        <td class="table-action">
                                            <a href="{{ route('order-details', $record->slug) }}" class="action-icon"> <i
                                                    class="mdi mdi-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
