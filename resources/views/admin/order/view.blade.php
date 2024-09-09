@extends('admin.layouts.app')
@section('title', 'Product Details')
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
                            <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Product Details</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xxl-8 col-lg-6">
                <!-- project card -->
                <div class="card d-block">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="mt-0">{{ $record->name }}</h3>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="ri-more-fill"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="{{ route('product-edit', $record->slug) }}" class="dropdown-item"><i
                                            class="mdi mdi-pencil me-1"></i>Edit</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-delete me-1"></i>Delete</a>
                                </div>
                            </div>
                            <!-- project title-->
                        </div>
                        <div class="badge text-bg-secondary mb-3">{{ $record->category ? $record->category->name : '' }}
                        </div>

                        <h5>Product Details:</h5>

                        <p class="text-muted mb-2">
                            {{ $record->description }}
                        </p>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <h5>Price</h5>
                                    <p>{{ $record->price }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <h5>Discounted Price</h5>
                                    <p>{{ $record->discount_price }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <h5>Quantity</h5>
                                    <p>{{ $record->quantity }}</p>
                                </div>
                            </div>
                        </div>

                        <div id="tooltip-container">
                            <h5>Product Images:</h5>
                            @foreach ($record->images as $image)
                                <a href="{{ $image->name ? asset('public/uploads/product-image/' . $image->name) : asset('public/images/placeholder.png') }}"
                                    data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="{{ $record->name }}" class="d-inline-block" target="_blank">
                                    <img src="{{ $image->name ? asset('public/uploads/product-image/' . $image->name) : asset('public/images/placeholder.png') }}"
                                        alt="{{ $image->name }}" class="rounded-circle img-thumbnail avatar-sm" />
                                </a>
                            @endforeach

                        </div>

                    </div> <!-- end card-body-->

                </div> <!-- end card-->
            </div> <!-- end col -->

            <div class="col-xl-4">
                <div class="mb-3 mt-3 mt-xl-0">

                    <div class="card">
                        <div class="card-body">
                            <label for="projectname" class="mb-0">Upload Product Images</label>
                            <p class="text-muted font-14">Recommended size 800x400 (px).</p>

                            <form method="POST" action="{{ route('upload-product-image', $record->slug) }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="photo" class="form-label">Banner Image</label>
                                    <input type="file" id="photo" class="form-control" name="photo[]" multiple>
                                    @error('photo')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">
                                    Upload
                                </button>
                            </form>
                        </div>
                    </div>


                    {{-- <form action="https://coderthemes.com/" method="post" class="dropzone" id=""
                        data-plugin="dropzone" data-previews-container="#file-previews"
                        data-upload-preview-template="#uploadPreviewTemplate">
                        <div class="fallback">
                            <input name="file" type="file" />
                        </div>

                        <div class="dz-message needsclick">
                            <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                            <h4>Drop files here or click to upload.</h4>
                        </div>
                    </form>

                    <!-- Preview -->
                    <div class="dropzone-previews mt-3" id="file-previews"></div>

                    <!-- file preview template -->
                    <div class="d-none" id="uploadPreviewTemplate">
                        <div class="card mt-1 mb-0 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light"
                                            alt="">
                                    </div>
                                    <div class="col ps-0">
                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                        <p class="mb-0" data-dz-size></p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="#" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                            <i class="ri-close-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end file preview template --> --}}
                </div>
            </div> <!-- end col-->

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
