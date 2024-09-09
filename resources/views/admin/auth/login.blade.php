@extends('admin.auth.layouts.app')
@section('title', 'Log In | Webhuts.in')
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
            <h4 class="mt-0">Sign In</h4>
            <p class="text-muted mb-4">Enter your email address and password to access account.</p>

            <!-- form -->
            <form method="POST" action="{{ route('login') }}">
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
                <div class="mb-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Forgot your
                                password?</small></a>
                    @endif
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" id="password" placeholder="Enter your password"
                        name="password">
                    @error('password')
                        <span role="alert" class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                </div>
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
        @if (Route::has('register'))
            <footer class="footer footer-alt">
                <p class="text-muted">Don't have an account?
                    <a href="{{ route('register') }}" class="text-muted ms-1">
                        <b>Sign Up</b>
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
