@extends('layouts.app')

@section('content')
<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">User Edit</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Edit</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="user-edit" class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="mb-0 h5">Profile Photo</h3>
                </div>
                <div class="card-body">
                    <img src="{{ Gravatar::src(Auth::user()->email, 200) }}" class="img-fluid d-block mx-auto mb-3" />

                    <p>You can change your profile photo using Gravatar. <a href="//wordpress.com/log-in?redirect_to=https%3A%2F%2Fpublic-api.wordpress.com%2Foauth2%2Fauthorize%3Fclient_id%3D1854%26response_type%3Dcode%26blog_id%3D0%26state%3D8c8a14e2beddf65a9f25d8b1271df5342785e224c6ffda35ebc48f81d008f218%26redirect_uri%3Dhttps%253A%252F%252Fen.gravatar.com%252Fconnect%252F%253Faction%253Drequest_access_token">Click here</a> to go there to change your profile photo.</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-white">
                    <nav>
                        <div class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="true">Edit Profile</a>
                            @if(!Auth::user()->email_verified_at) <a class="nav-link" id="nav-verify-tab" data-toggle="tab" href="#nav-verify" role="tab" aria-controls="nav-verify" aria-selected="false"><div class="text-danger"><span class="mr-2">Verify Account</span><i class="fa-solid fa-exclamation-triangle"></i></div></a> @endif
                            <a href="{{ route('change-password') }}" class="nav-link">Change Password</a>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">
                            <form action="{{ route('edit-user.process') }}" method="POST" id="edit-user">
                                @csrf

                                @if(session('error'))
                                <div class="alert alert-danger">
                                    <h3 class="h5">Sorry, We've an issue(s).</h3>
                                    {!! session('error') !!}
                                </div>
                                @elseif(session('success'))
                                <div class="alert alert-success">
                                    <h3 class="h5">Success!</h3>
                                    {!! session('success') !!}
                                </div>
                                @elseif(count($errors))
                                <div class="alert alert-danger">
                                    <h3 class="h5">Sorry, we've an issues here.</h3>
                                    <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $index => $error)
                                        <li><i class="fa-solid fa-arrow-right mr-2"></i>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="form-group m-0 p-0">
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}" />
                                </div>

                                <div class="form-group">
                                    <label for="fullname" class="mb-1">Full Name</label>
                                    <input type="text"@if (old('fullname')) value="{{ old('fullname') }}"@else value="{{ Auth::user()->fullname }}"@endif id="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Enter your full name" name="fullname" />

                                    @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nric" class="mb-1">NRIC</label>
                                    <input type="text"@if (old('nric')) value="{{ old('nric') }}"@else value="{{ Auth::user()->nric }}"@endif id="nric" class="form-control @error('nric') is-invalid @enderror" placeholder="Enter your NRIC" name="nric" />

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
                                        <option value="north"@if(old('state') == 'north' OR Auth::user()->state == 'nort') selected @endif>North Region</option>
                                        <option value="north-east"@if(old('state') == 'north-east' OR Auth::user()->state == 'north-east') selected @endif>North East Region</option>
                                        <option value="central"@if(old('state') == 'central' OR Auth::user()->state == 'central') selected @endif>Central Region</option>
                                        <option value="east"@if(old('state') == 'east' OR Auth::user()->state == 'east') selected @endif>East Region</option>
                                        <option value="west"@if(old('state') == 'west' OR Auth::user()->state == 'west') selected @endif>West Region</option>
                                    </select>

                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="mb-1">Phone Number</label>
                                    <input type="text"@if (old('phone')) value="{{ old('phone') }}"@else value="{{ Auth::user()->phone }}"@endif id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter your Phone Number" name="phone" />

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="mb-1">E-Mail</label>
                                    <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your E-Mail" name="email"@if (old('email')) value="{{ old('email') }}"@else value="{{ Auth::user()->email }}"@endif />

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button class="btn btn-success" type="submit"><i class="fa-solid fa-save mr-2"></i>Save & Update</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nav-social" role="tabpanel" aria-labelledby="nav-social-tab">
                            Social Page
                        </div>

                        @if(!Auth::user()->email_verified_at)
                        <!-- Verify -->
                        <div class="tab-pane fade" id="nav-verify" role="tabpanel" aria-labelledby="nav-verify-tab">
                            <h3 class="h5">Verify Your Email Address</h3>

                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">A fresh verification link has been sent to your email address.</div>
                            @endif

                            <p>Your account hasn't been verified. Before process the loan please to verify your account first on link below,</p>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="bg-white border-0 p-0">click here to request another</button>.
                            </form>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
