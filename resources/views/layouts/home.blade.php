<!DOCTYPE html>
<html<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Description -->
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="We are a Licensed Regional Financing Platform · Grow Your Investment With Returns Of Up To 24% · Scale Your Business With Flexible Financing Solutions." />

    <title>
        @if (View::hasSection('title'))
            @yield('title')
        @else
            @if (!empty($title))
            {!! strip_tags($title) !!}
            @else
            {{ config('app.name') }}
            @endif
        @endif
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/fontawesome-v6/css/all.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />

    <!-- Header -->
    @yield('header')

    <style>
      .footer #footer-top {
        background: #003366;
        color: white;
        padding: 2rem 0;
      }

      .footer #footer-bottom {
        background: #002E5C;
        color: white;
        padding: 1rem 0;
      }

      .social-media .nav-link {
        background: white;
        border-radius: 50px;
        width: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: .5rem;
        height: 2.5rem;
      }
    </style>

</head>
<body>

  <header id="masthead">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('images/logo/sfd-bl.svg') }}" alt="{{ config('app.name') }}" height="45px" class="d-md-inline d-sm-none d-none" />
          <img src="{{ asset('images/logo/transparent-smart-funding.png') }}" alt="{{ config('app.name') }}" height="40px" class="d-sm-none" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{ url('/register') }}" class="btn btn-primary">Apply Loan</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main id="content-main">
    @yield('content')
  </main>

  @include('layouts.landing_page.footer')

  <script src="{{ asset('js/home.js') }}"></script>
  @yield('footer')
</body>
</html>
