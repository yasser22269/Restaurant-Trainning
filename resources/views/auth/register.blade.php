@extends('layout.app')

@section('content')
<div id="app" class="app app-full-height app-without-header">
    <!-- BEGIN register -->
    <div class="register">
        <!-- BEGIN register-content -->
        <div class="register-content">
            <form action="{{ route('register') }}" method="POST" name="register_form">
                @csrf
                <h1 class="text-center">Sign Up</h1>
                <p class="text-white text-opacity-50 text-center">One Admin ID is all you need to access all the Admin services.</p>
                <div class="mb-3">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror form-control-lg bg-white bg-opacity-5" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg bg-white bg-opacity-5" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="username@address.com" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-lg bg-white bg-opacity-5" name="password" required autocomplete="new-password"/>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                    <input id="password-confirm" type="password" class="form-control form-control-lg bg-white bg-opacity-5" name="password_confirmation" required autocomplete="new-password"/>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100">Sign Up</button>
                </div>
                <div class="text-white text-opacity-50 text-center">
                    Already have an Admin ID? <a href="{{ route('login') }}">Sign In</a>
                </div>
            </form>
        </div>
        <!-- END register-content -->
    </div>
    <!-- END register -->
</div>
@endsection
