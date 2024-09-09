@extends('admin.auth.layouts.app')
@section('title', 'Recover Password | Webhuts.in')
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
            <h4 class="mt-0">Reset Password</h4>
            <p class="text-muted mb-4">Enter your email address to recover your password.</p>

            <!-- form -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
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
                <div class="d-grid mb-0 text-center">
                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Send Password Reset Link
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
                <p class="text-muted">Back to
                    <a href="{{ route('login') }}" class="text-muted ms-1">
                        <b>Login</b>
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
