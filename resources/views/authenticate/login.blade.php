@extends('authenticate.layout')

@section('content')
<div class="container-fluid vh-100 d-flex justify-content-center">
    <div class="row align-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-12 logo"></div>
                <div class="col-12">
                    <p class="text-center" style="font-size: 40px;">Book Management</p>
                </div>
            </div>
        </div>
        <div class="col-12 p-3">
            <div class="row justify-content-center">
                <div class="col-11 col-lg-6">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="row g-2">
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" />
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="link-primary text-light">Forgot Password?</a>
                                @endif
                            </div>
                            <div class="col-12 d-grid pt-2">
                                <button class="btn btn-success" type="submit">Sign In</button>
                            </div>
                            <div class="col-12 d-grid pt-2">
                                <a class="btn btn-dark text-decoration-none" href="{{ route('register') }}">Don't have an Account?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 fixed-bottom d-none d-lg-block" style="font-size: 13px;">
            <p class="text-center">&copy; {{ date('Y') }} Book Management | All Rights Reserved</p>
        </div>
    </div>
</div>
@endsection
