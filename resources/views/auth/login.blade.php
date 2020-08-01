@extends('layouts.app')
@section('title') Form Login @endsection
@section('content')
<div class="card-authentication2 mx-auto my-5">
    <div class="card-group">
        <div class="card mb-0">
            <div class="bg-signin2"></div>
            <div class="card-img-overlay rounded-left my-5">
                <h2 class="text-white">Lorem</h2>
                <h1 class="text-white">Ipsum Dolor</h1>
                <p class="card-text text-white pt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div>
        </div>

        <div class="card mb-0 ">
            <div class="card-body">
                <div class="card-content p-3">
                    <div class="text-center">
                        <img src="template/assets/images/logo-icon.png" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Sign In</div>
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
                                <div class="icheck-material-primary">
                                    <input class="form-check-input" type="checkbox" name="remember" id="user-checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="user-checkbox">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Sign In</button>
                    </form>
                    <div class="text-center pt-3">
                        <hr>
                        <p class="text-dark">Do not have an account? <a href="{{route('register')}}"> Sign Up here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
