@php
    $title = isset($record) ? 'Update Product' : 'Add Product';
    $action = isset($record) ? 'Update' : 'Add';
    $subTitle = 'Create new product.';
    if (isset($record)) {
        $subTitle = 'Update product details.';
    }
@endphp
@extends('admin.layouts.app')
@section('title', $title)
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
                            <li class="breadcrumb-item"><a href="{{ route('product-index') }}">Product</a></li>
                            <li class="breadcrumb-item active">{{ $action }}</li>
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
                        <h4 class="header-title">{{ $title }} </h4>
                        <p class="text-muted font-14">
                            {{ $subTitle }}
                        </p>

                        <div class="row">
                            <div class="col-lg-6">
                                <form method="POST"
                                    action="{{ isset($record) ? route('product-update', $record->slug) : route('product-store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($record))
                                        @method('PUT')
                                    @endif

                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        {{ Form::select('category', $categories, isset($record) ? $record->category_id : null, ['class' => 'form-select', 'id' => 'category', 'placeholder' => 'Select Category...']) }}
                                        @error('category')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Name</label>
                                        <input type="text" id="title" class="form-control" name="name"
                                            value="{{ old('name', isset($record) ? $record->name : '') }}">
                                        @error('name')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" id="quantity" class="form-control" name="quantity"
                                            value="{{ old('quantity', isset($record) ? $record->quantity : '') }}">
                                        @error('quantity')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="number" id="price" class="form-control" name="price"
                                                    value="{{ old('price', isset($record) ? $record->price : '') }}">
                                                @error('price')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="discount_price" class="form-label">Discounted Price</label>
                                                <input type="number" id="discount_price" class="form-control"
                                                    name="discount_price"
                                                    value="{{ old('discount_price', isset($record) ? $record->discount_price : '') }}">
                                                @error('discount_price')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" rows="5" name="description">{{ old('description', isset($record) ? $record->description : '') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="photo" class="form-label">Banner Image</label>
                                        <input type="file" id="photo" class="form-control" name="photo">
                                        @error('photo')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    @if (isset($record))
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            {{ Form::select('status', ['1' => 'Active', '2' => 'Inactive'], $record->status_id, ['class' => 'form-select', 'id' => 'status', 'placeholder' => 'Select Status...']) }}
                                            @error('status')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-success">
                                        {{ isset($record) ? 'Update' : 'Save' }}
                                    </button>
                                    <button type="reset" class="btn btn-danger">Clear</button>
                                </form>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

    </div> <!-- container -->
@endsection
@section('js')

    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
