@extends('layouts.app')

@section('title', 'Register | ' . config('app.name'))

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

    .password-wrapper #password.is-invalid,
    .password-wrapper #password.is-valid {
        background-position: right calc(.375em + 3rem) center;
        padding-right: 5rem !important;
    }

    .password-wrapper .password-floating {
        display: flex;
        justify-content: center;
        align-content: center;
        position: absolute;
        top: .35rem;
        right: .25rem;
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
    <div class="row min-vh-100 py-5 align-items-center justify-content-center justify-content-center">
        <div class="col-md-8">
            <header id="mainhead">
                <div class="text-center">
                    <a href="https://smartfunding.sg"><img src="{{ asset('images/logo/logo_sf_black.png') }}" alt="{{ config('app.name') }}" class="mb-3" /></a>
                </div>
            </header>

            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="text-center">
                            <h3>Register</h3>
                            <p>Register first to apply your first loan. Do you have an account? Login <a href="{{ route('login') }}">here</a>.</p>
                        </div>

                        <hr />

                        @if(session('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <h3 class="h5">Sorry, We've an issue(s).</h3>
                                {!! session('error') !!}
                            </div>
                        </div>
                        @elseif($errors->any())
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <h3>Sorry, we've an issues here.</h3>
                                <ul class="list-unstyled m-0">
                                @foreach ($errors->all() as $index => $error)
                                    <li><i class="fa-solid fa-arrow-right mr-2"></i>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullname" class="mb-1">Full Name</label>
                                    <input type="text"@if (old('fullname')) value="{{ old('fullname') }}"@endif id="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Enter your full name" name="fullname" />

                                    @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nric" class="mb-1">NRIC</label>
                                    <input type="text"@if (old('nric')) value="{{ old('nric') }}"@endif id="nric" class="form-control @error('nric') is-invalid @enderror" placeholder="Enter your NRIC" name="nric" />

                                    @error('nric')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="state" class="mb-1">State</label>
                                    <select name="state" class="form-control @error('state')is-invalid @enderror" id="state">
                                        <option disabled @if(!old('state'))selected @endif>Select One</option>
                                        <option value="north"@if(old('state') == 'north') selected @endif>North Region</option>
                                        <option value="north-east"@if(old('state') == 'north-east') selected @endif>North East Region</option>
                                        <option value="central"@if(old('state') == 'central') selected @endif>Central Region</option>
                                        <option value="east"@if(old('state') == 'east') selected @endif>East Region</option>
                                        <option value="west"@if(old('state') == 'west') selected @endif>West Region</option>
                                    </select>

                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="mb-1">Phone Number</label>
                                    <input type="text"@if (old('phone')) value="{{ old('phone') }}"@endif id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter your Phone Number" name="phone" />

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="mb-1">E-Mail</label>
                                    <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your E-Mail" name="email"@if (old('email')) value="{{ old('email') }}"@endif />

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group password-wrapper">
                                    <label for="password">Password</label>
                                    <div class="form-wrapper">
                                        <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password"@if (old('password')) value="{{ old('password') }}"@endif autocomplete="new-password" />
                                        <span class="password-floating"><i class="fa-solid fa-fw fa-eye"></i></span>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! RecaptchaV3::field('register') !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" name="agreement" id="agreement" {{ old('agreement') ? 'checked' : '' }} />
                                                <label class="custom-control-label" for="agreement">I agree with <a href="javascript:void()">Terms and Conditions</a>.</label>

                                                @error('agreement')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-primary" type="submit">Register</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p>Use social media login button bellow to make your login faster.</p>

                                <div class="btn-socials-list">
                                    <a href="{{ route('social-login', 'facebook') }}" class="btn btn-block btn-facebook"><i class="fa-brands fa-fw mr-2 fa-facebook"></i>Facebook</a>
                                    <a href="{{ route('social-login', 'google') }}" class="btn btn-block btn-google-plus"><i class="fa-brands fa-fw mr-2 fa-google"></i>Google</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <footer class="footer" id="mainfooter">
                <span>Copyright {{ date('Y') }}, <a class="text-success" href="{{ url('/') }}">{{ config('app.name') }}</a>. All rights reserved.</span>
            </footer>
        </div>
    </div>
</div>
@endsection

@section('footer')
{!! RecaptchaV3::initJs() !!}
@endsection
