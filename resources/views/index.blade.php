<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <script src="{{asset('js/style.js')}}" type="application/javascript" defer></script>
  <title>SMARTFUNDING Direct</title>
</head>

<body>
  @include('layouts.landing_page.header')


  <main>

    <!--================================= SECTION HEADER "GET FAST & EASY LOAN" ===================================================-->
    <div class="jumbotron jumbotron-fluid height-med-jumbotron bg-hero" id="hero">
      <div class="container d-flex flex-column">
        <h2 class="font-type-secondary width-container-mini-px align-self-center cl-secondary text-center font-size-header mt-4">Get Fast & Easy Loan.</h2>
        <p class="text-center cl-secondary font-type-tertiary font-size-subtitle width-container-mini-px align-self-center font-line-height-mini-px mt-4">Whether it's
          furnishing your newly purchased home, saving up for a new car, or planning a surprise vacation for your spouse
          to the stunning Santorini. In just three steps, you can apply for a quick loan today.</p>
        <a href="/register" class="btn btn-med align-self-center font-type-primary cl-secondary mt-2 bg-cl-tertiary font-size-septenary">Get Loans</a>
      </div>
    </div>

    <!--================================== SECTION CARD "ABOUT SMARTFUNDING DIRECT" ==============================================-->
    <!--Box Card for Mobile-->
    <div id="box-card-mobile">
      <div class="d-flex flex-column justify-content-around pt-2">
        <h3 class="cl-tertiary align-self-center font-size-tertiary font-type-secondary">About</h3>
        <div class="d-flex flex-row justify-content-center">
          <h3 class="cl-quaternary font-size-tertiary">Smart</h3>
          <div class="d-flex flex-column justify-content-around pt-mini">
            <h3 class="cl-tertiary font-size-tertiary font-type-secondary">Funding</h3>
            <div class="border-bottom-mini"></div>
          </div>
          <h3 class="ml-2 cl-quaternary font-size-tertiary">Direct</h3>
        </div>
      </div>
      <div class="container mt-3 width-text-card">
        <p class="text-center font-size-septenary font-type-quaternary">The on-going pandemic has made it challenging for
          everyone, not just businesses. Launched in 2021, we envision to alleviate the financial burden for people
          affected through our fast, reliable, and flexible microloans solutions.</p>
      </div>
    </div>
    <!--Box Card for Tablet-->
    <div id="box-card-tablet">
      <div class="d-flex flex-row justify-content-around pt-4">
        <div class="d-flex flex-row font-type-primary">
          <h3 class="cl-tertiary font-size-tertiary font-type-secodary">About</h3>
          <div class="d-flex flex-row justify-content-around">
            <div class="d-flex flex-column justify-content-start">
              <div class="d-flex flex-row justify-content-start">
                <h3 class="ml-2 cl-quaternary font-size-tertiary font-type-tertiary">Smart</h3>
                <h3 class="cl-tertiary font-size-tertiary font-type-tertiary">Funding</h3>
              </div>
              <div class="border-bottom-full-px-custom align-self-center">
              </div>
            </div>
            <h3 class="ml-2 cl-quaternary font-size-tertiary font-type-tertiary">Direct</h3>
          </div>
        </div>
      </div>
      <div class="container mt-3 width-text-card align-self-center pb-2">
        <p class="align-self-center text-center font-size-septenary font-type-tertiary pl-7 pr-7">The on-going pandemic has made it challenging for
          everyone, not just businesses. Launched in 2021, we envision to alleviate the financial burden for people
          affected through our fast, reliable, and flexible microloans solutions.</p>
      </div>
    </div>
    <!--Box Card for Desktop-->
    <div id="box-card-desktop">
      <div class="d-flex flex-column justify-content-around">
        <div class="d-flex flex-row justify-content-around pt-4">
          <div class="d-flex flex-row font-type-primary">
            <h3 class="cl-tertiary font-size-tertiary font-type-secodary">About</h3>
            <div class="d-flex flex-column justify-content-center">
              <div class="d-flex flex-row justify-content-start">
                <h3 class="ml-2 cl-quaternary font-size-tertiary font-type-tertiary">Smart</h3>
                <h3 class="ml-2 cl-tertiary font-size-tertiary font-type-tertiary">Funding</h3>
                <h3 class="ml-2 cl-quaternary font-size-tertiary font-type-tertiary">Direct</h3>
              </div>
              <div class="ml-3 border-bottom-full-px"></div>
            </div>
          </div>
        </div>
        <div class="container mt-3 width-container-mini-px align-self-center pb-2">
          <p class="align-self-center text-center font-size-septenary font-type-tertiary">The on-going pandemic has made it challenging for
            everyone, not just businesses. Launched in 2021, we envision to alleviate the financial burden for people
            affected through our fast, reliable, and flexible microloans solutions.</p>
        </div>
      </div>
    </div>

    <!--Menu Bar-->
    <div id="menu-bar">
      <ul id="container-menu">
        <li class="align-self-end mt-4">
          <img src="{{ asset('assets/close_nav_mobile.svg') }}" alt="close" class="image-fluid" id="close-mobile">
        </li>
        <li class="align-self-center mt-50px">
          <a href="/" class="cl-white-mobile font-type-secondary font-size-navigation menu-item">Home</a>
        </li>
        <li class="align-self-center mt-4">
          <a href="/about" class="cl-white-mobile font-type-secondary font-size-navigation menu-item">About Us</a>
        </li>
        <li class="align-self-center mt-4">
          <a href="/register" class="cl-white-mobile font-type-secondary font-size-navigation menu-item">Apply Loan</a>
        </li>
        <li class="align-self-center mt-4">
          <a href="//app.sf-direct.tri-niche.com/" class="cl-white-mobile font-type-secondary font-size-navigation menu-item">Pay Now</a>
        </li>
      </ul>
    </div>

    <!--================================= SECTION "HOW TO GET FUNDING IN 3 SIMPLE STEPS" ===========================================-->
    <!--Mobile Section 3-->
    <div class="d-flex flex-column justify-content-around bg-cl-primary" id="section3-mobile">
      <h3 class="cl-quinary font-type-primary font-size-tertiary width-container-inter1-px text-center align-self-center">
        How To Get Funding in 3 Simple Steps</h3>
      <div class="border-bottom-half-px align-self-center"></div>
      <div class="d-flex flex-column justify-content-around mt-5">
        <img src="{{asset('assets/number_count_1.png')}}" alt="1"
          class="image-fluid number-count-img-mobile align-self-center">
        <img src="{{asset('assets/Search_engine _Isometric.svg')}}" alt="image"
          class="image-fluid custom-img align-self-center">
        <h3 class="align-self-center mt-3 font-type-primary cl-senary font-size-quaternary">Submit Application</h3>
        <h4
          class="align-self-center font-type-tertiary font-line-height-mini-px font-size-septenary cl-septenary width-container-super-mini-px text-center">
          Apply for our financing solution and submit the necessary details.</h4>
      </div>
      <div class="d-flex flex-column justify-content-around mt-5">
        <img src="{{asset('assets/number_count_2.png')}}" alt="1"
          class="image-fluid number-count-img-mobile align-self-center">
        <img src="{{asset('assets/Checklist_Isometric.svg')}}" alt="image"
          class="image-fluid custom-img align-self-center">
        <h3 class="align-self-center mt-3 font-type-primary cl-senary font-size-quaternary">Review Application</h3>
        <h4
          class="align-self-center font-type-tertiary font-size-septenary cl-septenary font-line-height-mini-px width-container-super-mini-px text-center">
          Upon submission, your application will be reviewed by our credit and risk team</h4>
      </div>
      <img src="{{asset('assets/Polygon_6.svg')}}" alt="Polygon" class="image-fluid image-float">
      <div class="d-flex flex-column justify-content-around mt-5">
        <img src="{{asset('assets/number_count_3.png')}}" alt="1"
          class="image-fluid number-count-img-mobile align-self-center">
        <img src="{{asset('assets/Money_transfer _Isometric.svg')}}" alt="image"
          class="image-fluid custom-img align-self-center">
        <h3 class="align-self-center font-type-primary mt-3 cl-senary font-size-quaternary">Receive Money</h3>
        <h4
          class="align-self-center font-type-tertiary font-line-height-mini-px font-size-septenary cl-septenary width-container-super-mini-px text-center">
          If funding is successful, the funds will be disbursed to you within two days.</h4>
      </div>
      <a href="/register" class="btn btn-med font-type-primary align-self-center cl-secondary mt-5 mb-50px bg-cl-tertiary font-size-septenary">Get Loans</a>
    </div>
    
    <!--Desktop Section 3-->
    <div class="bg-cl-primary d-flex flex-column justify-content-around" id="section3-desktop">
      <div class="d-flex flex-column justify-content-start align-self-center pt-20px">
        <h3
          class="cl-quinary font-type-primary font-line-height-super-big font-size-secondary width-container-inter1-px text-center align-self-center"
          id="section3-header">How To Get Funding in 3 Simple Steps</h3>
          <div class="border-bottom-quarter-px align-self-center"></div>
      </div>
      <div class="container d-flex flex-row justify-content-around mt-5" id="section3-main">
        <div class="container d-flex flex-column .pos-relative">
          <img src="{{asset('assets/Polygon_6.svg')}}" alt="LOGO" class="img-fluid float-img-desktop-left-1">
          <img src="{{asset('assets/number_count_1.png')}}" alt="1"
            class="image-fluid number-count-img align-self-center">
          <img src="{{asset('assets/Search_engine _Isometric.svg')}}" alt="image"
            class="image-fluid custom-img align-self-center">
          <h3 class="align-self-center font-type-primary font-size-tertiary cl-senary mt-3">Submit Application</h3>
          <h4
            class="pl-2 pr2 align-self-center font-type-tertiary font-line-height-med cl-septenary font-size-septenary width-container-mini-inter1-px text-center">
            Apply for our financing solution and submit the necessary details.</h4>
        </div>
        <div class="container d-flex flex-column">
          <img src="{{asset('assets/number_count_2.png')}}" alt="1"
            class="image-fluid number-count-img align-self-center">
          <img src="{{asset('assets/Checklist_Isometric.svg')}}" alt="image"
            class="image-fluid custom-img align-self-center">
          <h3 class="align-self-center font-type-primary cl-senary font-size-tertiary mt-3">Review Application</h3>
          <h4
            class="pl-2 pr-2 align-self-center font-type-tertiary font-line-height-med cl-septenary font-size-septenary width-container-super-mini-px text-center">
            Upon submission, your application will be reviewed by our credit and risk team.</h4>
        </div>
        <div class="container d-flex flex-column">
          <img src="{{asset('assets/number_count_3.png')}}" alt="1"
            class="image-fluid number-count-img align-self-center">
          <img src="{{asset('assets/Money_transfer _Isometric.svg')}}" alt="image"
            class="image-fluid custom-img align-self-center">
          <h3 class="align-self-center font-type-primary cl-senary font-size-tertiary mt-3">Receive Money</h3>
          <h4
            class=" pl-2 pr-2 align-self-center font-type-tertiary cl-septenary font-line-height-med font-size-septenary width-container-super-mini-px text-center">
            If funding is successful, the funds will be disbursed to you within two days.</h4>
        </div>
      </div>
      <div class="d-flex flex-column justify-content-around">
        <a href="/register"
          class="btn btn-med mb-70px align-self-center font-type-primary font-size-septenary cl-secondary mt-70px bg-cl-tertiary">Get Loans</a>
        <img src="{{asset('assets/Polygon_5.svg')}}" alt="LOGO" class="img-fluid float-img-desktop-right-1">
      </div>
    </div>

    <!--========================== SECTION "PERSONAL MICROLOANS" ================================================-->
    <!--Mobile Section 4-->
    <div class="container d-flex flex-column justify-content-around mt-5 mb-5" id="section4-mobile">
      <h3 class="align-self-center font-type-primary font-size-secondary cl-quinary">Personal Microloans</h3>
      <div class="border-bottom-half-px align-self-center"></div>
      <h4 class="font-type-primary font-size-tertiary mt-4 align-self-center cl-quinary">Term Financing</h4>
      <h5 class="font-type-tertiary cl-senary font-size-quaternary width-container-inter2-px text-center align-self-center">
        Grow with Term Financing for your business</h5>
      <div class="align-self-center">
        <div class="d-flex flex-row justify-content-start">
          <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
            class="img-fluid img-bullet align-self-center">
          <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary">Financing between
            <strong>SGD20,000</strong> to <strong>SGD500K</strong></p>
        </div>
        <div class="d-flex flex-row justify-content-start">
          <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
            class="img-fluid img-bullet align-self-center">
          <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary">Interest rates as low as 0.5%
            to 1.25% per month¹</p>
        </div>
        <div class="d-flex flex-row justify-content-start">
          <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
            class="img-fluid img-bullet align-self-center">
          <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary">No collateral is required</p>
        </div>
        <div class="d-flex flex-row justify-content-start">
          <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
            class="img-fluid img-bullet align-self-center">
          <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary">No lock-in period</p>
        </div>
      </div>
      <a href="/register" class="btn btn-med font-size-septenary font-type-primary mt-50px cl-secondary bg-cl-tertiary align-self-center">Apply Now</a>
    </div>
    <!--Desktop Section 4-->
    <div id="section4-desktop">
      <div class="d-flex flex-row justify-content-center mt-120px mb-120px">
        <img src="{{asset('assets/Group_3301.svg')}}" alt="Image" class="image-fluid img-med">
        <div class="ml-5">
          <h3 class="font-type-primary font-size-secondary cl-quinary">Personal Microloans</h3>
          <div class="border-bottom-quarter-px"></div>
          <h4 class="font-type-primary cl-quinary font-size-tertiary mt-4">Term Financing</h4>
          <p class="lead font-type-tertiary cl-senary font-size-quaternary mt-3">Grow with Term Financing for your business
          </p>
          <div class="d-flex flex-column justify-content-start">
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pt-3 pl-2">
              <p class="align-self-center pt-1 big-screen pl-2 font-type-tertiary font-size-septenary">Financing between
                <strong>SGD20,000</strong> to <strong>SGD500K</strong></p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pt-3 pl-2">
              <p class="align-self-center pt-1 big-screen font-type-tertiary font-size-septenary pl-2">Interest rates as low as
                0.5% to 1.25% per month¹</p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pt-3 pl-2">
              <p class="align-self-center pt-1 big-screen font-type-tertiary font-size-septenary pl-2">No collateral is required
              </p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pt-3 pl-2">
              <p class="align-self-center pt-1 big-screen font-type-tertiary font-size-septenary pl-2">No lock-in period</p>
            </div>
            <a href="/register" class="btn btn-med font-type-primary bg-cl-tertiary cl-secondary ml-2 mt-3">Apply
              Now</a>
          </div>
        </div>
      </div>
    </div>
    
    <!--Tablet Section 4-->
    <div id="section4-tablet">
      <div class="d-flex flex-column justify-content-around mt-90px mb-90px ml-5">
        <h3 class="font-type-primary font-size-secondary cl-quinary align-self-center">Personal Microloans</h3>
        <div class="border-bottom-quarter align-self-center"></div>
        <div class="d-flex flex-row justify-content-around mt-5 pl-25px">
          <div class="d-flex flex-column justify-content-start pr-5">
            <h4 class="font-type-primary cl-quinary font-size-tertiary mt-3">Term Financing</h4>
            <p class="lead font-type-tertiary width-container-mini-inter1-px cl-senary font-size-quaternary mt-10px">Grow with Term Financing for your business
            </p>
            <div class="d-flex flex-column justify-content-center width-container-inter2-px">
              <div class="d-flex flex-row justify-content-start">
                <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                  class="img-fluid img-sm align-self-center">
                <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary">Financing between
                  <strong>SGD20,000</strong> to <strong>SGD500K</strong></p>
              </div>
              <div class="d-flex flex-row justify-content-start">
                <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                  class="img-fluid img-sm align-self-center">
                <p class="align-self-center pt-3 font-type-tertiary font-size-septenary pl-2">Interest rates as low as
                  0.5% to 1.25% per month¹</p>
              </div>
              <div class="d-flex flex-row justify-content-start">
                <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                  class="img-fluid img-sm align-self-center">
                <p class="align-self-center pt-3 font-type-tertiary font-size-septenary pl-2">No collateral is required
                </p>
              </div>
              <div class="d-flex flex-row justify-content-start">
                <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                  class="img-fluid img-sm align-self-center">
                <p class="align-self-center pt-3 font-type-tertiary font-size-septenary pl-2">No lock-in period</p>
              </div>
              <a href="/register" class="btn btn-med font-type-primary font-size-septenary bg-cl-tertiary cl-secondary ml-2 mt-25px">Apply
                Now</a>
            </div>
          </div>
            <img src="{{ asset('../assets/Group_3301.svg') }}" alt="image" class="image-fluid img-unique">
        </div>
      </div>
    </div>
  </main>

  @include('layouts.landing_page.footer')

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="//code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>



</html>
