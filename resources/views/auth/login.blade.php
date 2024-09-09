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
                        <!-- Login Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap  pr-lg-50">
                                <h2>Sign In</h2>
                                <form method="POST" action="{{ route('front-login-post') }}">
                                    @csrf
                                    <div class="single-input-item">
                                        <input type="email" placeholder="Email or Username" name="email" />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Enter your Password" name="password" />
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                    <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                                </div>
                                            </div>
                                            {{-- <a href="#" class="forget-pwd">Forget Password?</a> --}}
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button type="submit" class="sqr-btn">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->
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
