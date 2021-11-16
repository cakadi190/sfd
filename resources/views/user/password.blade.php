@extends('layouts.app')

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
<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">Change Password</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="https://www.smartfunding.sg">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('edit-user') }}">User Edit</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="user-edit" class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-white">
                    <nav>
                        <div class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
                            <a href="{{ route('edit-user') }}" class="nav-link">Edit Profile</a>
                            @if(!Auth::user()->email_verified_at) <a href="{{ route('edit-user') }}#nav-verify" class="nav-link"><div class="text-danger"><span class="mr-2">Verify Account</span><i class="fa-solid fa-exclamation-triangle"></i></div></a> @endif
                            <a href="{{ route('change-password') }}" class="nav-link active">Change Password</a>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <form action="{{ route('change-password.process') }}" method="POST" id="edit-user">
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
                        @else
                        <div class="alert alert-info">
                            <h5>Information</h5>
                            <p class="m-0">Enter your password below to change your password now.</p>
                        </div>
                        @endif

                        <div class="form-group m-0 p-0">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}" />
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

                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-save mr-2"></i>Save & Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
