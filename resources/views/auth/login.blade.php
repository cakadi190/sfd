@extends('layouts.app')

@section('title', 'Login | ' . config('app.name'))

@section('header')
<style>
#mainhead {
    display: flex;
    justify-content: center;
    margin-bottom: 1rem;
}

#mainhead img {
    height: 40px;
}

.password-wrapper,
.password-wrapper .form-wrapper {
    position: relative;
}

.password-wrapper #password {
    padding-right: 3.5rem;
}

.password-wrapper .password-floating {
    display: flex;
    justify-content: center;
    align-content: center;
    position: absolute;
    top: .35rem;
    right: .25rem;
    background: white;
    border-left: 1px solid #ced4da;
    padding: 0.35rem 0.5rem .35rem .75rem;
    cursor: pointer;
    color: var(--gray);
    transition: all .2s;
}

.password-wrapper .password-floating:hover {
    color: var(--gray-dark);
}

.footer {
    text-align: center;
    margin-top: 1.25rem;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row min-vh-100 align-items-center justify-content-center justify-content-center">
        <div class="col-lg-5 col-md-6">
            <header id="mainhead">
                <div class="text-center">
                    <a href="https://smartfunding.sg"><img src="{{ asset('images/logo/logo_sf_black.png') }}" alt="{{ config('app.name') }}" class="mb-3" /></a>
                </div>
            </header>

            <section class="card shadow">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">Authentication</h3>
                        <button class="btn btn-info text-white"><i class="fa-solid fa-bug"></i></button>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group password-wrapper">
                            <label for="password">Password</label>
                            <div class="form-wrapper">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your account password" name="password" required autocomplete="current-password" />
                                <span class="password-floating"><i class="fa-solid fa-fw fa-eye"></i></span>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">Remember me</label>
                            </div>
                        </div>

                        <div class="form-group row flex-column-reverse flex-lg-row no-gutters mb-0 align-items-center">
                            @if (Route::has('password.request'))
                            <div class="col-xl-9 col-lg-8 text-center text-md-left">
                                <a class="text-success" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            @endif
                            <div class="col-xl-3 col-lg-4 mb-2 mb-lg-0">
                                <button type="submit" class="btn btn-primary btn-block">Log-In<i class="fa-solid fa-sign-in-alt ml-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center bg-white">
                    <p class="m-0">Are you new member here? Let's <a class="text-success" href="{{ route('register') }}">start now</a>!</p>
                </div>
            </section>

            <footer class="footer" id="mainfooter">
                <span>Copyright {{ date('Y') }}, <a class="text-success" href="{{ url('/') }}">{{ config('app.name') }}</a>. All rights reserved.</span>
            </footer>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script></script>
@endsection
