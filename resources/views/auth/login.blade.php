@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4">
                <h2 class="primary-header text-center">Login</h2>
                <form action="{{ route('login') }}" method="POST" class="login-form">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-check mb-5">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-standard">Login</button>
                </form>
                <div class="col-12 mt-3 auth-text-secondary text-center">
                    <p>Don't have an account? <a class="auth-text-primary" href="{{ route('register') }}">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
