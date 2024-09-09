@php
    $title = isset($record) ? 'Update Category' : 'Add Category';
    $action = isset($record) ? 'Update' : 'Add';
    $subTitle = 'Create new category.';
    if (isset($record)) {
        $subTitle = 'Update category details.';
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
                            <li class="breadcrumb-item"><a href="{{ route('category-index') }}">Category</a></li>
                            <li class="breadcrumb-item active">{{ $action }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Categoty</h4>
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
                                    action="{{ isset($record) ? route('category-update', $record->slug) : route('category-store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($record))
                                        @method('PUT')
                                    @endif
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" id="title" class="form-control" name="name"
                                            value="{{ old('name', isset($record) ? $record->name : '') }}">
                                        @error('name')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                            <label for="status1" class="form-label">Status</label>
                                            {{ Form::select('status', ['1' => 'Active', '2' => 'Inactive'], $record->status_id, ['class' => 'form-select', 'id' => 'status1', 'placeholder' => 'Select Status...']) }}
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
