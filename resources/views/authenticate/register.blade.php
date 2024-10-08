@extends('authenticate.layout')

@section('content')
<div class="container-fluid vh-100 d-flex justify-content-center">
    <div class="row align-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-12 logo"></div>
                <div class="col-12">
                    <p class="text-center" style="font-size: 35px;">Sign Up</p>
                </div>
            </div>
        </div>
        <div class="col-12 p-3">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6" id="signUpBox">
                    <form id="register-form" method="POST" action="{{ route('register.submit') }}">
                        @csrf
                        <div class="row g-2">
                            <div class="col-12">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                                <div id="name-error" class="text-danger"></div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                                <div id="email-error" class="text-danger"></div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" />
                                <div id="password-error" class="text-danger"></div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" />
                                <div id="password_confirmation-error" class="text-danger"></div>
                            </div>
                            <div class="col-12 d-grid pt-2">
                                <button class="btn btn-success" type="submit">Sign Up</button>
                            </div>
                            <div class="col-12 d-grid pt-2">
                                <a class="btn btn-dark text-decoration-none" href="{{ route('login') }}">Already have an account? Sign In</a>
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
<meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token Meta Tag -->
<script src="{{ asset('js/register.js') }}"></script> <!-- Ensure the path is correct -->
@endsection
