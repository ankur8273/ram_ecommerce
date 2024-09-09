@extends('layouts.app')
@section('title', 'Webhuts - Main Dashboard')
@section('css')
    <style>

    </style>
@endsection
@section('content')

    <!-- page main wrapper start -->
    <main class="pt-50">
        <!-- login register wrapper start -->
        <div class="login-register-wrapper pt-100 pb-100 pt-sm-58 pb-sm-58">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row d-flex justify-content-center">
                        <!-- Register Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap mt-md-100 mt-sm-58">
                                <h2>Singup Form</h2>
                                <form action="{{ route('front-register-post') }}" method="post">
                                    @csrf
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Full Name" name="name"
                                            value="{{ old('name') }}" />
                                        @error('name')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="single-input-item">
                                        <input type="email" placeholder="Enter your Email" name="email"
                                            value="{{ old('email') }}" />
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="single-input-item">
                                        <input type="number" placeholder="Enter your phone number" name="number"
                                            value="{{ old('number') }}" />
                                        @error('number')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" placeholder="Enter your Password" name="password" />
                                                @error('password')
                                                    <span class="text-danger" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" name="password_confirmation"
                                                    placeholder="Repeat your Password" />
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="single-input-item">
                                        <div class="login-reg-form-meta">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                                    <label class="custom-control-label" for="subnewsletter">Subscribe Our
                                                        Newsletter</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="single-input-item">
                                        <button type="submit" class="sqr-btn">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Register Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>
    <!-- page main wrapper end -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
