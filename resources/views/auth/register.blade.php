@extends('layouts.app')
@section('title') Form Register @endsection
@section('content')
<div class="card-authentication2 mx-auto my-3">
    <div class="card-group">
        <div class="card mb-0">
            <div class="bg-signup2"></div>
            <div class="card-img-overlay rounded-left my-5">
                <h2 class="text-white">Lorem</h2>
                <h1 class="text-white">Ipsum Dolor</h1>
                <p class="card-text text-white pt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div>
        </div>

        <div class="card mb-0">
            <div class="card-body">
                <div class="card-content p-3">
                    <div class="text-center">
                        <img src="template/assets/images/logo-icon.png" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Sign Up</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div class="position-relative has-icon-left">
                                <label for="name" class="sr-only">Nama</label>
                                <input type="text" id="name" placeholder="Nama Lengkap" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="position-relative has-icon-left">
                                <label for="email" class="sr-only">Email</label>
                                <input type="text" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div class="form-control-position">
                                    <i class="icon-envelope-open"></i>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="position-relative has-icon-left">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="position-relative has-icon-left">
                                <label for="password_confirmation" class="sr-only">Retry Password</label>
                                <input type="password" id="password_confirmation" class="form-control" placeholder="Retry Password" name="password_confirmation" required autocomplete="new-password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Sign Up</button>
                    </form>
                    <div class="text-center pt-3">
                        <hr>
                        <p class="text-dark">Already have an account? <a href="{{route('login')}}"> Sign In here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
