@extends('layouts.login')
@section('title') Form Login @endsection
@section('content')
<div class="card-authentication2 mx-auto my-5">
    <div class="card-body" style="margin-top: 99px;">
        <div class="p-3" style="margin-left: 400px; margin-right:400px;">
            <div class="text-center">
                <img src="images/logo.gif" style="width: 80px;" alt="logo icon">
            </div>
            <div class="card-title text-uppercase text-center py-3"><b>Sign In</b></div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="position-relative has-icon-left">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="email" autofocus value="{{ old('email') }}">
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="position-relative has-icon-left">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-row mr-0 ml-0">
                    <div class="form-group col-6">
                        <div class="icheck-material-primary" style="margin-left: 15px;">
                            <input class="form-check-input" type="checkbox" name="remember" id="user-checkbox" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="user-checkbox">
                                Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Sign In</button>
            </form>
        </div>
    </div>
</div>

@endsection
