<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Description -->
  <meta property="og:url" content="{{ Request::url() }}" />
  <meta property="og:title" content="{{ config('app.name') }}" />
  <meta property="og:description"
    content="We are a Licensed Regional Financing Platform · Grow Your Investment With Returns Of Up To 24% · Scale Your Business With Flexible Financing Solutions." />
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
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('vendor/fontawesome-v6/css/all.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/specific.css') }}">

  <!-- Header -->
  @yield('header')

  <style>
    .user-profile {
      height: 50px;
    }

    @media screen and (max-width: 768px) {
      .user-profile {
        height: 30px;
      }
    }

    .selected{
      color: black !important;
    }

  </style>
</head>

<body>
  <div id="app" @auth class="d-flex flex-column justify-content-between min-vh-100" @endauth>
    <header id="masthead">
      @guest
      <nav class="navbar navbar-expand d-md-none d-lg-inline d-none fixed-top">
        <div class="container">
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a href="javascript:void()" class="nav-link dropdown-toggle" role="button" id="ChangeLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-fw fa-language"></i><span class="ml-2 d-md-none d-lg-inline d-sm-none">Change Language</span></a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ChangeLang">
                  <a href="javascript:void()" class="dropdown-item">English</a>
                  <a href="javascript:void()" class="dropdown-item">Bahasa Melayu</a>
                </div>
              </li>
              <li class="nav-item"><a href="javascript:void()" class="nav-link"><i class="fa-solid fa-fw fa-moon"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
      @else
      <!-- Top Navbar -->
      <nav class="navbar navbar-expand navbar-dark bg-primary navbar-top">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo/logo_sf_white.png') }}" alt="{{ config('app.name') }}" height="30px"
              class="d-md-inline d-sm-none d-none" />
            <img src="{{ asset('images/logo/transparent-smart-funding.png') }}" alt="{{ config('app.name') }}"
              height="40px" class="d-sm-none" />
          </a>

          <div class="collapse navbar-collapse" id="navbarControl">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto align-items-center">
              <li class="nav-item"><a href="javascript:void()" class="nav-link"><i
                    class="fa-solid fa-fw fa-moon"></i></a></li>
              <li class="nav-item dropdown">
                <a href="javascript:void()" class="nav-link dropdown-toggle" role="button" id="ChangeLang"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    class="fa-solid fa-fw fa-language"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ChangeLang">
                  <a href="javascript:void()" class="dropdown-item">English</a>
                  <a href="javascript:void()" class="dropdown-item">Bahasa Melayu</a>
                </div>
              </li>
              <li class="nav-item dropdown userinfo">
                <a id="dropdownLogout" class="nav-link dropdown-toggle" href="javascript:void()" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <div class="d-flex">
                    <img src="{{ Gravatar::src(Auth::user()->email, 200) }}" class="user-profile" />
                    <div class="d-md-none d-lg-inline d-none ml-2">
                      <div>{{ Auth::user()->fullname }}</div>
                      @role('admin')
                      <small class="badge badge-primary">Administrator</small>
                      @elserole('employee')
                      <small class="badge badge-success">Employee</small>
                      @else
                      <small class="badge badge-info">Borrower</small>
                      @endrole
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLogout">
                  <a class="dropdown-item" href="{{ route('edit-user') }}"><i class="fa-solid fa-fw fa-user mr-2"></i>My Account</a>
                  <a class="dropdown-item" href="{{ route('change-password') }}"><i class="fa-solid fa-fw fa-key mr-2"></i>Change Password</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-fw fa-sign-out-alt mr-2"></i>Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Bottom Navbar -->
      <nav class="navbar navbar-expand-md navbar-light navbar-bottom d-md-none">
        <div class="container">
          <a class="navbar-brand d-md-none" href="{{ route('dashboard.home') }}">Administration Panel</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenus"
            aria-controls="navbarMenus" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarMenus">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a href="{{ route('dashboard.home') }}" class="nav-link {{ (Route::is("dashboard.home")) ? "selected" : "" }}"><i class="fa-solid fa-fw fa-tachometer mr-2"></i><span>Dashboard</span></a></li>
              <li class="nav-item"><a href="{{ route('applicant.index') }}" class="nav-link {{ (Route::is("applicant.index")) ? "selected" : "" }}"><i class="fa-solid fa-fw fa-box mr-2"></i><span>Applicant List</span></a></li>
              <li class="nav-item"><a href="{{ route('borrower.index') }}" class="nav-link {{ (Route::is("borrower.index")) ? "selected" : "" }}"><i class="fa-solid fa-fw fa-list mr-2"></i><span>Borrower Lists</span></a></li>
              <li class="nav-item"><a href="{{ route('collection.index') }}" class="nav-link {{ (Route::is("collection.index")) ? "selected" : "" }}"><i class="fa-solid fa-fw fa-coins mr-2"></i><span>Collection Report</span></a></li>
              <li class="nav-item"><a href="{{ route('overdue-installment.index') }}" class="nav-link {{ (Route::is("overdue-installment.index")) ? "selected" : "" }}"><i class="fa-solid fa-fw fa-coins mr-2"></i><span>Overdue Installment</span></a></li>
              <li class="nav-item"><a href="{{ route('user-role.index') }}" class="nav-link {{ (Route::is("user-role.index")) ? "selected" : "" }}"><i class="fa-solid fa-fw fa-user mr-2"></i><span>User Role</span></a></li>
              <li class="nav-item"><a href="{{ route('sales.index') }}" class="nav-link {{ (Route::is("sales.index")) ? "selected" : "" }}"><i class="fa-solid fa-fw fa-bullhorn mr-2"></i><span>Sales Dashboard</span></a></li>
              <li class="nav-item"><a href="{{ route('late-changes.index') }}" class="nav-link {{ (Route::is("late-changes.index")) ? "selected" : "" }}"><i class="fa-solid fa-fw fa-bullhorn mr-2"></i><span>Late Charges</span></a></li>
            </ul>
          </div>
        </div>
      </nav>
      @endguest
    </header>

    <main id="content-wrapper" @auth class="py-3 container mt-3" @endauth>
      @auth
      <div class="row">
        <div class="col-md-3 d-none d-md-none d-lg-inline">
          <h3>Navigation</h3>

          <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('dashboard.home') }}" class="nav-link {{ (Route::is("dashboard.home")) ? "ml-2" : "" }}"><i class="fa-solid fa-fw fa-tachometer mr-2"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a href="{{ route('applicant.index') }}" class="nav-link {{ (Route::is("applicant.index")) ? "ml-2" : "" }}"><i class="fa-solid fa-fw fa-box mr-2"></i><span>Applicant List</span></a></li>
            <li class="nav-item"><a href="{{ route('borrower.index') }}" class="nav-link {{ (Route::is("borrower.index")) ? "ml-2" : "" }}"><i class="fa-solid fa-fw fa-list mr-2"></i><span>Borrower List</span></a></li>
            <li class="nav-item"><a href="{{ route('collection.index') }}" class="nav-link {{ (Route::is("collection.index")) ? "ml-2" : "" }}"><i class="fa-solid fa-fw fa-coins mr-2"></i><span>Collection Report</span></a></li>
            <li class="nav-item"><a href="{{ route('overdue-installment.index') }}" class="nav-link {{ (Route::is("overdue-installment.index")) ? "ml-2" : "" }}"><i class="fa-solid fa-fw fa-coins mr-2"></i><span>Overdue Installment</span></a></li>
            <li class="nav-item"><a href="{{ route('user-role.index') }}" class="nav-link {{ (Route::is("user-role.index")) ? "ml-2" : "" }}"><i class="fa-solid fa-fw fa-user mr-2"></i><span>User Role</span></a></li>
            <li class="nav-item"><a href="{{ route('sales.index') }}" class="nav-link {{ (Route::is("sales.index")) ? "ml-2" : "" }}"><i class="fa-solid fa-fw fa-bullhorn mr-2"></i><span>Sales Dashboard</span></a></li>
            <li class="nav-item"><a href="{{ route('late-changes.index') }}" class="nav-link {{ (Route::is("late-changes.index")) ? "ml-2" : "" }}"><i class="fa-solid fa-fw fa-bullhorn mr-2"></i><span>Late Charges</span></a></li>
          </ul>
        </div>
        <div class="col-md-9">
          @endauth

          @yield('content')

          @auth
        </div>
      </div>
      @endauth
    </main>

    @auth
    <footer class="border-top footer py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <p class="m-0">Copyright {{ date('Y') }}, <a class="text-success"
                href="{{ url('/') }}">{{ config('app.name') }}</a>. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    @endauth
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

  <!--Modal-->
  @yield('modal')
  <!-- Footer -->
  @yield('footer')
  @stack('js')
</body>

</html>
