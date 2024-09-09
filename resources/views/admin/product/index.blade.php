@extends('admin.layouts.app')
@section('title', 'Product List')
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
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-5">
                                <a href="{{ route('product-create') }}" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add Product</a>
                            </div>
                            <div class="col-sm-7">
                                <div class="text-sm-end">
                                    <button type="button" class="btn btn-light mb-2">Export</button>
                                </div>
                            </div><!-- end col-->
                        </div>
                        <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Discounted Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($records as $key => $record)
                                    <tr>
                                        <td>{{ $key + 1 }} </td>
                                        <td class="table-user">
                                            <img src="{{ $record->banner ? asset('public/uploads/product/' . $record->banner) : asset('public/images/placeholder.png') }}"
                                                alt="{{ $record->name }}" class="me-2 rounded-circle" />
                                            {{ $record->name }}
                                        </td>
                                        <td>{{ $record->category ? $record->category->name : '' }}</td>
                                        <td>{{ $record->price }}</td>
                                        <td>{{ $record->discount_price }}</td>
                                        <td>{{ $record->quantity }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $record->status_id == 1 ? 'bg-success' : 'bg-danger' }}">{{ $record->status_display }}</span>
                                            {{-- <input type="checkbox" id="switch{{ $key }}"
                                                {{ $record->status_id == 1 ? 'checked' : '' }} data-switch="success" />
                                            <label for="switch{{ $key }}"
                                                data-on-label="{{ $record->status_display }}" data-off-label="No"></label> --}}
                                        </td>
                                        <td class="table-action">
                                            <a href="{{ route('product-details', $record->slug) }}" class="action-icon"> <i
                                                    class="mdi mdi-eye"></i></a>
                                            <a href="{{ route('product-edit', $record->slug) }}" class="action-icon"> <i
                                                    class="mdi mdi-square-edit-outline"></i></a>
                                            {{-- <a href="javascript:void(0);" class="action-icon"> <i
                                                    class="mdi mdi-delete"></i></a> --}}
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
