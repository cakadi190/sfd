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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/fontawesome-v6/css/all.min.css') }}" rel="stylesheet" />

    <!-- Header -->
    @yield('header')
</head>
<body>
    <div id="app"@auth class="d-flex flex-column justify-content-between min-vh-100"@else class="py-md-5 py-0"@endauth>
        <header id="masthead">
            @guest
            <nav class="navbar navbar-expand d-md-none d-lg-inline d-none fixed-top">
                <div class="container">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a href="javascript:void()" class="nav-link dropdown-toggle" role="button" id="ChangeLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-language"></i><span class="ml-2 d-md-none d-lg-inline d-sm-none">Change Language</span></a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ChangeLang">
                                    <a href="javascript:void()" class="dropdown-item">English</a>
                                    <a href="javascript:void()" class="dropdown-item">Bahasa Melayu</a>
                                </div>
                            </li>
                            <li class="nav-item"><a href="javascript:void()" class="nav-link"><i class="fa-solid fa-moon"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            @else
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand navbar-dark bg-primary navbar-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo/logo_sf_white.png') }}" alt="{{ config('app.name') }}" height="30px" class="d-md-inline d-sm-none d-none" />
                        <img src="{{ asset('images/logo/transparent-smart-funding.png') }}" alt="{{ config('app.name') }}" height="40px" class="d-sm-none" />
                    </a>

                    <div class="collapse navbar-collapse" id="navbarControl">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a href="javascript:void()" class="nav-link"><i class="fa-solid fa-moon"></i></a></li>
                            <li class="nav-item dropdown">
                                <a href="javascript:void()" class="nav-link dropdown-toggle" role="button" id="ChangeLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-language"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ChangeLang">
                                    <a href="javascript:void()" class="dropdown-item">English</a>
                                    <a href="javascript:void()" class="dropdown-item">Bahasa Melayu</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown userinfo">
                                <a id="dropdownLogout" class="nav-link dropdown-toggle" href="javascript:void()" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa-user fa-solid"></i>
                                    <span class="d-md-none d-lg-inline d-none ml-2">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLogout">
                                    <a class="dropdown-item" href="javascript:void()"><i class="fa-solid fa-user mr-2"></i>My Account</a>
                                    <a class="dropdown-item" href="javascript:void()"><i class="fa-solid fa-key mr-2"></i>Change Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-sign-out-alt mr-2"></i>Logout</a>
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
            <nav class="navbar navbar-expand-md navbar-light navbar-bottom">
                <div class="container">
                    <a class="navbar-brand d-md-none" href="{{ route('home') }}">Administration Panel</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenus" aria-controls="navbarMenus" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarMenus">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void()" id="collectionReport" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <span><i class="fa-solid fa-money-bill-alt mr-2"></i>Loan</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="collectionReport">
                                    <h6 class="dropdown-header">Collection Report</h6>
                                    <a class="dropdown-item" href="javascript:void()">See All Data</a>
                                    <a class="dropdown-item" href="javascript:void()">Add Data</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Overdue Installment</h6>
                                    <a class="dropdown-item" href="javascript:void()">See All Data</a>
                                    <a class="dropdown-item" href="javascript:void()">Add Data</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void()" id="collectionReport" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <span><i class="fa-solid fa-user mr-2"></i>User Management</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="collectionReport">
                                    <h6 class="dropdown-header">User Data</h6>
                                    <a class="dropdown-item" href="javascript:void()">See All Data</a>
                                    <a class="dropdown-item" href="javascript:void()">Add Data</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">User Session Login</h6>
                                    <a class="dropdown-item" href="javascript:void()">See All Data</a>
                                    <a class="dropdown-item" href="javascript:void()">Add Data</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void()" id="collectionReport" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <span><i class="fa-solid fa-cash-register mr-2"></i>Applicant(s)</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="collectionReport">
                                    <h6 class="dropdown-header">Borrower List</h6>
                                    <a class="dropdown-item" href="javascript:void()">All Data</a>
                                    <a class="dropdown-item" href="javascript:void()">Add Data</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Late Changes</h6>
                                    <a class="dropdown-item" href="javascript:void()">All Data</a>
                                    <a class="dropdown-item" href="javascript:void()">Add Data</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void()" id="collectionReport" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <span><i class="fa-solid fa-cog mr-2"></i>Settings</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="collectionReport">
                                    <a class="dropdown-item" href="javascript:void()">User Data Roles</a>
                                    <a class="dropdown-item" href="javascript:void()">Language Settings</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @endguest
        </header>

        <main id="content-wrapper"@auth class="py-3"@endauth>
            @yield('content')
        </main>

        @if(!Route::is('login') && !Route::is('password.*'))
        <footer class="border-top footer py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class="m-0">Copyright {{ date('Y') }}, <a class="text-success" href="{{ url('/') }}">{{ config('app.name') }}</a>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        @endif
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Footer -->
    @yield('footer')
</body>
</html>
