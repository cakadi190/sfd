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

    #error-floating {
        position: relative;
        padding: 1rem;
    }

    #error-floating .error-wrapper {
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,.85);
        display: flex;
        position: absolute;
        justify-content: center;
        align-items: center;
        color: white;
        z-index: 900;
        top:0;
        left: 0;
        border-radius: .5rem;
        padding: 2rem;
    }
</style>
@endsection

@section('content')
<div id="error-floating">

    <div class="error-wrapper">
        <div class="d-md-flex text-center text-md-left">
            <i class="fa-solid fa-exclamation-triangle fa-3x"></i>
            <div class="ml-md-3 mt-3 ml-0 ml-mt-0">
                <h3>Sorry, Under Construction!</h3>
                <p>For now, this feature currently unavailable during maintenance and improvement feature</p>
            </div>
        </div>
    </div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">Session Management</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="https://www.smartfunding.sg">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Session Management</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="user-edit">

        <div class="mb-3 card card-body">
            <p>If you have been login into another device, you can use button below to logout.</p>

            <!-- Button trigger modal -->
            <div>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    <span>Logout from any device(s)</span>
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm logout to any devices</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>Enter the password to continue.</p>

                        <form action="{{ route('sessions.logout') }}" method="POST">
                            @csrf

                            <div class="form-group password-wrapper w-100">
                                <div class="form-wrapper w-100">
                                    <input id="password" type="password" placeholder="Enter your password" class="form-control w-100 @error('password') is-invalid @enderror" name="password"@if (old('password')) value="{{ old('password') }}"@endif autocomplete="new-password" />
                                    <span class="password-floating"><i class="fa-solid fa-fw fa-eye"></i></span>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-danger">Logout Now!</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($datas as $data)
            <div class="col-md-6 mb-3">
                <div class="card card-body">
                    <div class="d-flex">
                        <div class="icon"><i class="fa-solid fa-3x fa-desktop{!! session()->getId() == $data->id ? ' text-success': '' !!}"></i></div>
                        <div class="content ml-3">
                            <h4>{{ Sessions::browser_name($data->user_agent) }}</h4>
                            <p class="m-0">{{ $data->ip_address }}{!! session()->getId() == $data->id ? ', <span class="text-success">This is you</span>': ', <span class="text-muted">Last Login ' . \Carbon\Carbon::parse($data->last_activity)->format('j F Y H:i:s') . '</span>' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
