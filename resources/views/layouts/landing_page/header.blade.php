<header id="responsive-header-desktop">
  <nav class="navbar navbar-light bg-cl-primary navbar-expand-md" id="responsive-nav">
    <a class="navbar-brand" href="/index">
      <img class="img-fluid ml-5 logo-size mt-1 mb-1" id="logo" src="{{ asset('images/logo/sfd-bl.svg') }}" height="50px" alt="logo-brand" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mr-5" id="icon-ham"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active align-self-center">
          <a class="nav-link cl-primary font-type-secondary font-size-septenary cl-white-mobile active-now"
            href="/">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active align-self-center">
          <a class="nav-link cl-primary font-type-secondary font-size-septenary cl-white-mobile" href="/about">About
            Us</a>
        </li>
        <li class="nav-item align-self-center">
          <a href="/register" class="nav-link pt-2 pb-2 pr-4 pl-4 btn-nav bg-cl-secondary cl-secondary font-type-secondary font-size-septenary align-items-center" id="btn-responsive-mobile">Apply Loan</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<header id="responsive-header-mobile">
  <nav class="d-flex flex-row justify-content-between container-header p-2">
    <img class="img-fluid ml-5 logo-size mt-1 mb-1" id="logo" src="{{ asset('assets/mobile-logo.svg') }}" height="50px" alt="logo-brand" />
    <img src="{{ asset('assets/icon_menu_mobile.svg') }}" alt="Menu" class="img-fluid ham-mobile mr-5 mt-1 mb-1" id="toggler-menu">
  </nav>
</header>
