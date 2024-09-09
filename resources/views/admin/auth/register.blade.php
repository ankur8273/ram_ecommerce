@extends('admin.auth.layouts.app')
@section('title', 'Register| Webhuts.in')
@section('css')
    <style>

    </style>
@endsection
@section('content')
    <div class="card-body d-flex flex-column h-100 gap-3">
        <!-- Logo -->
        <div class="auth-brand text-center text-lg-start">
            <a href="" class="logo-dark">
                <span><img src="{{ asset('public/assets/images/logo-dark.png') }}" alt="dark logo" height="22"></span>
            </a>
        </div>

        <div class="my-auto">
            <!-- title-->
            <h4 class="mt-0">Sign Up</h4>
            <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>

            <!-- form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                        autocomplete="name" autofocus placeholder="Enter your name">
                    @error('email')
                        <span role="alert" class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="emailaddress" class="form-label">Email address</label>
                    <input class="form-control" type="email" id="emailaddress" placeholder="Enter your email"
                        name="email" value="{{ old('email') }}">
                    @error('email')
                        <span role="alert" class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" id="password" placeholder="Enter your password"
                        name="password">
                    @error('password')
                        <span role="alert" class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input class="form-control" type="password" id="password_confirmation" placeholder="Enter your password"
                        name="password_confirmation">
                    @error('password')
                        <span role="alert" class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                <div class="d-grid mb-0 text-center">
                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Log In
                    </button>
                </div>
            </form>
            <!-- end form-->
            <!-- social-->
            <div class="text-center mt-5 pt-5"></div>
        </div>

        <!-- Footer-->
        @if (Route::has('login'))
            <footer class="footer footer-alt">
                <p class="text-muted">Already have account?
                    <a href="{{ route('login') }}" class="text-muted ms-1">
                        <b>Sign In</b>
                    </a>
                </p>
            </footer>
        @endif

    </div> <!-- end .card-body -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
