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
<<<<<<< HEAD
=======
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
>>>>>>> refs/remotes/origin/main

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

<<<<<<< HEAD
  <footer class="footer">
    <div id="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img src="{{ asset('images/logo/sfd-wh.svg') }}" class="mb-3" alt="SmartFunding Direct" height="40px" />

            <h3 class="text-info h5">License</h3>
            <p>
              <span>SmartFunding Pte. Ltd.</span><br />
              <span>Regulated by Monetary Authority of Singapore (MAS). License no: CMS-100637-1 Capital Market Services (Dealing in Secirities)</span>
            </p>
          </div>
          <div class="col-md-4">
            <div class="widget">
              <h3 class="h5 text-info">Get in touch</h3>
              <p>Endokemi kaning. Bepir detregt. Vabel sovöpör. Milingar. Bigt seryrat. </p>
            </div>
            <div class="widget my-3">
              <h3 class="h5 text-info">Address</h3>
              <p>71, Ayer Rajah Crescent,<br />#06-06, Singapore <br />139951.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget">
              <h3 class="h5 text-info">Hotline</h3>
              <p>+60 9111 3111</p>
            </div>
            <div class="widget my-3">
              <h3 class="h5 text-info">Email</h3>
              <p>hi@smartfunding.sg</p>
            </div>

            <div class="widget">
              <div class="nav social-media">
                <li class="nav-item"><a href="" class="nav-link fb"><i class="fa-brands fa-facebook"></i></a></li>
                <li class="nav-item"><a href="" class="nav-link tw"><i class="fa-brands fa-twitter"></i></a></li>
                <li class="nav-item"><a href="" class="nav-link in"><i class="fa-brands fa-linkedin"></i></a></li>
                <li class="nav-item"><a href="" class="nav-link ig"><i class="fa-brands fa-instagram"></i></a></li>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="footer-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 text-center text-md-left"><span>&copy; {{ date('Y') }} All Right Reserved <a href="{{ url('/') }}" class="text-success">SmartFunding Pte. Ltd.</a></span></div>
          <div class="col-md-6">
            <div class="nav justify-content-md-end">
              <li class="nav-item"><a href="{{ url('/') }}" class="nav-link text-success">Privacy Policy</a></li>
              <li class="nav-item"><a href="{{ url('/') }}" class="nav-link text-success">Terms of Use</a></li>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
=======
  @include('layouts.landing_page.footer')
>>>>>>> refs/remotes/origin/main

  <script src="{{ asset('js/home.js') }}"></script>
  @yield('footer')
</body>
</html>
