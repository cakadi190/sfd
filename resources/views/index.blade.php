<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <title>SMARTFUNDING Direct</title>
</head>

<body>
  @include('layouts.landing_page.header')


  <main>
    <div class="jumbotron jumbotron-fluid height-med-jumbotron bg-hero" id="hero">
      <div class="container container-fluid d-flex flex-column">
        <h2 class="font-type-primary cl-secondary text-center font-size-primary">Get Fast & Easy Loan</h2>
        <p class="text-center cl-secondary font-type-secondary font-size-quaternary align-self-center mt-3">Whether it's
          furnishing your newly purchased home, saving up for a new car, or planning a surprise vacation for your spouse
          to the stunning Santorini. In just three steps, you can apply for a quick loan today.</p>
        <a href="/register" class="btn btn-hero align-self-center cl-secondary mt-5 bg-cl-tertiary">Get Loans</a>
      </div>
    </div>


    <!--Box Card for Mobile-->
    <div id="box-card-mobile">
      <div class="d-flex flex-column justify-content-around">
        <h3 class="cl-tertiary align-self-center font-size-secondary">About</h3>
        <div class="d-flex flex-row justify-content-center">
          <h3 class="cl-quaternary font-size-secondary">Smart</h3>
          <div class="d-flex flex-column justify-content-around">
            <h3 class="cl-tertiary font-size-secondary">Funding</h3>
            <div class="border-bottom-mini"></div>
          </div>
          <h3 class="ml-2 cl-quaternary font-size-secondary">Direct</h3>
        </div>
      </div>
      <div class="container mt-3 width-text-card">
        <p class="text-center font-size-septenary font-type-tertiary">The on-going pandemic has made it challenging for
          everyone, not just businesses. Launched in 2021, we envision to alleviate the financial burden for people
          affected through our fast, reliable, and flexible microloans solutions.</p>
      </div>
    </div>
    <!--Box Card for Desktop-->
    <div id="box-card-desktop">
      <div class="d-flex flex-row justify-content-around">
        <div class="d-flex flex-row font-type-primary">
          <h3 class="cl-tertiary font-size-secondary">About</h3>
          <h3 class="ml-2 cl-quaternary border-bottom-full font-size-secondary">SmartFunding Direct</h3>
        </div>
      </div>
      <div class="container mt-3 width-text-card">
        <p class="text-center font-size-quaternary font-type-tertiary">The on-going pandemic has made it challenging for
          everyone, not just businesses. Launched in 2021, we envision to alleviate the financial burden for people
          affected through our fast, reliable, and flexible microloans solutions.</p>
      </div>
    </div>


    <!--Mobile Section 3-->
    <div class="container d-flex flex-column justify-content-around bg-cl-primary" id="section3-mobile">
      <h3 class="cl-quinary font-type-primary font-size-secondary width-small-container text-center align-self-center">
        How To Get Funding in 3 Simple Steps</h3>
      <div class="border-bottom-half align-self-center"></div>
      <div class="d-flex flex-column justify-content-around mt-5">
        <img src="{{asset('assets/number_count_1.png')}}" alt="1"
          class="image-fluid number-count-img align-self-center">
        <img src="{{asset('assets/Search_engine _Isometric.svg')}}" alt="image"
          class="image-fluid custom-img align-self-center">
        <h3 class="align-self-center font-type-secondary cl-senary font-size-tertiary">Submit Application</h3>
        <h4
          class="align-self-center font-type-tertiary font-size-quaternary cl-septenary font-size-small width-medium-container text-center">
          Apply for our financing solution and submit the necessary details.</h4>
      </div>
      <div class="d-flex flex-column justify-content-around mt-5">
        <img src="{{asset('assets/number_count_2.png')}}" alt="1"
          class="image-fluid number-count-img align-self-center">
        <img src="{{asset('assets/Checklist_Isometric.svg')}}" alt="image"
          class="image-fluid custom-img align-self-center">
        <h3 class="align-self-center font-type-secondary cl-senary font-size-tertiary">Review Application</h3>
        <h4
          class="align-self-center font-type-tertiary font-size-quaternary cl-septenary font-size-small width-medium-container text-center">
          Upon submission, your application will be reviewed by our credit and risk team</h4>
      </div>
      <img src="{{asset('assets/Polygon_6.svg')}}" alt="Polygon" class="image-fluid image-float">
      <div class="d-flex flex-column justify-content-around mt-5">
        <img src="{{asset('assets/number_count_3.png')}}" alt="1"
          class="image-fluid number-count-img align-self-center">
        <img src="{{asset('assets/Money_transfer _Isometric.svg')}}" alt="image"
          class="image-fluid custom-img align-self-center">
        <h3 class="align-self-center font-type-secondary cl-senary font-size-tertiary">Receive Money</h3>
        <h4
          class="align-self-center font-type-tertiary font-size-quaternary cl-septenary font-size-small width-medium-container text-center">
          If funding is successful, the funds will be disbursed to you within two days.</h4>
      </div>
    </div>
    <!--Desktop Section 3-->
    <div class="bg-cl-primary d-flex flex-column justify-content-around" id="section3-desktop">
      <img src="{{asset('assets/Polygon_6.svg')}}" alt="LOGO" class="img-fluid float-img-desktop-left-1">
      <div class="d-flex flex-column justify-content-start align-self-center">
        <h3
          class="cl-quinary font-type-primary font-size-secondary border-bottom-full width-header-small text-center align-self-center"
          id="section3-header">How To Get Funding in 3 Simple Steps</h2>
      </div>
      <div class="container d-flex flex-row justify-content-around mt-5" id="section3-main">
        <div class="container d-flex flex-column justify-content-around">
          <img src="{{asset('assets/number_count_1.png')}}" alt="1"
            class="image-fluid number-count-img align-self-center">
          <img src="{{asset('assets/Search_engine _Isometric.svg')}}" alt="image"
            class="image-fluid custom-img align-self-center">
          <h3 class="align-self-center font-type-secondary font-size-tertiary cl-senary font-size-header">Submit
            Application</h3>
          <h4
            class="align-self-center font-type-tertiary cl-septenary font-size-quaternary width-container-small text-center">
            Apply for our financing solution and submit the necessary details.</h4>
        </div>
        <div class="container d-flex flex-column">
          <img src="{{asset('assets/number_count_2.png')}}" alt="1"
            class="image-fluid number-count-img align-self-center">
          <img src="{{asset('assets/Checklist_Isometric.svg')}}" alt="image"
            class="image-fluid custom-img align-self-center">
          <h3 class="align-self-center font-type-secondary cl-senary font-size-tertiary">Review Application</h3>
          <h4
            class="align-self-center font-type-tertiary cl-septenary font-size-quaternary width-container-small text-center">
            Upon submission, your application will be reviewed by our credit and risk team.</h4>
        </div>
        <div class="container d-flex flex-column">
          <img src="{{asset('assets/number_count_3.png')}}" alt="1"
            class="image-fluid number-count-img align-self-center">
          <img src="{{asset('assets/Money_transfer _Isometric.svg')}}" alt="image"
            class="image-fluid custom-img align-self-center">
          <h3 class="align-self-center font-type-secondary cl-senary font-size-tertiary">Receive Money</h3>
          <h4
            class="align-self-center font-type-tertiary cl-septenary font-size-quaternary width-container-small text-center">
            If funding is successful, the funds will be disbursed to you within two days.</h4>
        </div>
      </div>
      <div class="d-flex flex-column justify-content-around">
        <a href="/register"
          class="btn btn-call-to-action mb-5 width-btn align-self-center cl-secondary mt-5 bg-cl-tertiary">Get Loans</a>
        <img src="{{asset('assets/Polygon_5.svg')}}" alt="LOGO" class="img-fluid float-img-desktop-right-1">
      </div>
    </div>

    <!--Mobile Section 4-->
    <div class="container d-flex flex-column justify-content-around mt-5" id="section4-mobile">
      <h3 class="align-self-center font-type-primary font-size-secondary cl-quinary">Personal Microloans</h3>
      <div class="border-bottom-half align-self-center"></div>
      <h4 class="font-type-secondary font-size-tertiary mt-4 align-self-center cl-quinary">Term Financing</h4>
      <h5 class="font-type-tertiary cl-senary font-size-quaternary width-small-container text-center align-self-center">
        Grow with Term Financing for your business</h5>
      <div class="align-self-center">
        <div class="d-flex flex-row justify-content-start">
          <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
            class="img-fluid img-bullet align-self-center">
          <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-quaternary">Financing between
            <strong>SGD20,000</strong> to <strong>SGD500K</strong></p>
        </div>
        <div class="d-flex flex-row justify-content-start">
          <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
            class="img-fluid img-bullet align-self-center">
          <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-quaternary">Interest rates as low as 0.5%
            to 1.25% per month¹</p>
        </div>
        <div class="d-flex flex-row justify-content-start">
          <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
            class="img-fluid img-bullet align-self-center">
          <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-quaternary">No collateral is required</p>
        </div>
        <div class="d-flex flex-row justify-content-start">
          <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
            class="img-fluid img-bullet align-self-center">
          <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-quaternary">No lock-in period</p>
        </div>
      </div>
      <a href="/register" class="btn btn-call-to-action cl-secondary bg-cl-tertiary align-self-center">Apply Now</a>
    </div>
    <!--Desktop Section 4-->
    <div id="section4-desktop">
      <div class="mt-5 d-flex flex-row justify-content-center">
        <img src="{{asset('assets/Group_3301.svg')}}" alt="Image" class="image-fluid img-med">
        <div class="ml-5">
          <h3 class="font-type-primary font-size-secondary cl-quinary">Personal Microloans</h3>
          <div class="border-bottom-quarter"></div>
          <h4 class="font-type-secondary cl-quinary font-size-tertiary mt-5">Term Financing</h4>
          <p class="lead font-type-tertiary cl-senary font-size-quaternary">Grow with Term Financing for your business
          </p>
          <div class="d-flex flex-column justify-content-around">
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary">Financing between
                <strong>SGD20,000</strong> to <strong>SGD500K</strong></p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center pt-3 font-type-tertiary font-size-septenary pl-2">Interest rates as low as
                0.5% to 1.25% per month¹</p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center pt-3 font-type-tertiary font-size-septenary pl-2">No collateral is required
              </p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center pt-3 font-type-tertiary font-size-septenary pl-2">No lock-in period</p>
            </div>
            <a href="/register" class="btn btn-call-to-action btn-med bg-cl-tertiary cl-secondary ml-2 mt-3">Apply
              Now</a>
          </div>
        </div>
      </div>
    </div>
    <!--Tablet Section 4-->
    <div id="section4-tablet">
      <div class="d-flex flex-column justify-content-around mt-5">
        <h3 class="font-type-primary font-size-secondary cl-quinary align-self-center">Personal Microloans</h3>
        <div class="border-bottom-quarter align-self-center"></div>
        <div class="d-flex flex-row justify-content-around mt-5">
          <div class="d-flex flex-column justify-content-around">
            <h4 class="font-type-secondary cl-quinary font-size-tertiary mt-5">Term Financing</h4>
            <p class="lead font-type-tertiary cl-senary font-size-quaternary">Grow with Term Financing for your business
            </p>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary">Financing between
                <strong>SGD20,000</strong> to <strong>SGD500K</strong></p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center pt-3 font-type-tertiary font-size-septenary pl-2">Interest rates as low as
                0.5% to 1.25% per month¹</p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center pt-3 font-type-tertiary font-size-septenary pl-2">No collateral is required
              </p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center pt-3 font-type-tertiary font-size-septenary pl-2">No lock-in period</p>
            </div>
            <a href="/register" class="btn btn-call-to-action btn-med bg-cl-tertiary cl-secondary ml-2 mt-3">Apply
              Now</a>
          </div>
          <img src="{{asset('assets/Group_3301.svg')}}" alt="Image" class="image-fluid img-med">
        </div>
      </div>
    </div>

    <!--Mobile Section 5-->
    <div id="section5-mobile">
      <div class="d-flex flex-column justify-content-center">
        <h3 class="font-type-primary font-size-secondary cl-quinary align-self-center">Why Choose Term</h3>
        <h3 class="font-type-primary font-size-secondary cl-quinary align-self-center">Financing from</h3>
        <h3 class="font-type-primary font-size-secondary cl-quaternary align-self-center">SmartFunding Direct</h3>
        <div class="border-bottom-half align-self-center"></div>
      </div>
      <div class="d-flex flex-column justify-content-around mt-5 mb-5">
        <img src="{{asset('assets/review_1.svg')}}" alt="image" class="image-fluid img-mini-mobile align-self-center">
        <h4 class="mt-20 font-type-secondary font-size-tertiary cl-quinary align-self-center">Full Transparency</h4>
        <p
          class="mr-4 ml-4 width-container-small font-type-tertiary font-size-quaternary align-self-center text-center">
          We will disclose the costs and fees involved upfront, with no hidden fees for you to worry about.</p>

        <img src="{{asset('assets/review_3.svg')}}" alt="image"
          class="image-fluid img-mini-mobile align-self-center mt-5">
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Easy and Seamless
        </h4>
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Application</h4>
        <p
          class="mr-4 ml-4 width-container-small font-type-tertiary font-size-quaternary align-self-center text-center">
          We will disclose the costs and fees involved upfront, with no hidden fees for you to worry about.</p>

        <img src="{{asset('assets/review_2.svg')}}" alt="image"
          class="image-fluid img-mini-mobile align-self-center mt-5">
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">costs-Effective &
        </h4>
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Flexible Repayment
        </h4>
        <p
          class="mr-4 ml-4 width-container-small font-type-tertiary font-size-quaternary align-self-center text-center">
          Enjoy low-interest rates and flexible repayment tenures of up to 12 months, with multiple repayment options.
        </p>

        <img src="{{asset('assets/review_4.svg')}}" alt="image"
          class="image-fluid img-mini-mobile align-self-center mt-5">
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">No Collateral</h4>
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Financing</h4>
        <p
          class="mr-4 ml-4 width-container-small font-type-tertiary font-size-quaternary align-self-center text-center">
          Enjoy low-interest rates and flexible repayment tenures of up to 12 months, with multiple repayment options.
        </p>
        <a href="/register"
          class="btn btn-call-to-action btn-med bg-cl-tertiary cl-secondary ml-2 mt-3 align-self-center">Apply Now</a>
      </div>
    </div>
    <!--Desktop Section 5-->
    <div id="section5-desktop">
      <div class="d-flex flex-column justify-content-around pos-relative pb-5">
        <img src="{{asset('assets/Polygon_6.svg')}}" alt="LOGO" class="img-fluid float-img-desktop-left-2"
          id="img-hide">
        <div class="d-flex flex-column justify-content-start ml-5">
          <h3 class="font-type-primary font-size-secondary cl-quinary">Why choose Term Financing</h3>
          <div class="d-flex flex-row justify-content-start">
            <h3 class="font-type-primary font-size-secondary cl-quinary">from</h3>
            <h3 class="ml-2 font-type-primary font-size-secondary cl-quaternary">SmartFunding Direct</h3>
          </div>
        </div>
        <div class="d-flex flex-row justify-content-beetwen ml-5">
          <img src="{{asset('assets/review_1.svg')}}" alt="image" class="image-fluid img-mini">
          <div class="d-flex flex-column justify-content-center mt-5">
            <h4 class="font-type-secondary font-size-tertiary cl-quinary">Full Transparency</h4>
            <p class="width-container-small font-type-tertiary font-size-quaternary">We will disclose the costs and fees
              involved upfront, with no hidden fees for you to worry about.</p>
          </div>
          <img src="{{asset('assets/review_2.svg')}}" alt="image" class="image-fluid img-mini">
          <div class="d-flex flex-column justify-content-center mt-5">
            <div class="d-flex flex-column justify-content-start">
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">costs-Effective &</h4>
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">Flexible Repayment</h4>
            </div>
            <p class="width-container-small font-type-tertiary font-size-quaternary">Enjoy low-interest rates and
              flexible repayment tenures of up to 12 months, with multiple repayment options.</p>
          </div>
        </div>
        <div class="d-flex flex-row justify-content-beetwen ml-5">
          <img src="{{asset('assets/review_3.svg')}}" alt="image" class="image-fluid img-mini">
          <div class="d-flex flex-column justify-content-center mt-5">
            <div class="d-flex flex-column justify-content-start">
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">Easy and Seamless</h4>
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">Application</h4>
            </div>
            <p class="width-container-small font-type-tertiary font-size-quaternary">We will disclose the costs and fees
              involved upfront, with no hidden fees for you to worry about.</p>
          </div>
          <img src="{{asset('assets/review_4.svg')}}" alt="image" class="image-fluid img-mini">
          <div class="d-flex flex-column justify-content-center mt-5">
            <div class="d-flex flex-column justify-content-start">
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">No Collateral</h4>
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">Financing</h4>
            </div>
            <p class="width-container-small font-type-tertiary font-size-quaternary">Enjoy low-interest rates and
              flexible repayment tenures of up to 12 months, with multiple repayment options.</p>
          </div>
        </div>
        <a href="/register" class="btn btn-call-to-action cl-secondary bg-cl-tertiary ml-5 mt-5 width-btn">Apply now</a>
        <img src="{{asset('assets/Group.svg')}}" alt="LOGO" class="img-fluid float-img-desktop-right-2" id="img-hide">
      </div>
    </div>
    <!--Tablet Section 5-->
    <div id="section5-tablet">
      <div class="d-flex flex-column justify-content-around mt-5 mb-5" id="tablet-bg">
        <h3 class="font-type-primary font-size-secondary cl-quinary align-self-center">Why choose Term Financing from
        </h3>
        <h3 class="ml-2 font-type-primary font-size-secondary cl-quaternary align-self-center">SmartFunding Direct</h3>
        <div class="border-bottom-quarter align-self-center"></div>
        <div class="d-flex flex-row justify-content-around mt-5">
          <div class="d-flex flex-column justify-content-start">
            <img src="{{asset('assets/review_1.svg')}}" alt="image" class="image-fluid img-mini align-self-center">
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Full
              Transparency</h4>
            <p class="width-container-small font-type-tertiary font-size-quaternary align-self-center text-center">We
              will disclose the costs and fees involved upfront, with no hidden fees for you to worry about.</p>
          </div>
          <div class="d-flex flex-column justify-content-start">
            <img src="{{asset('assets/review_3.svg')}}" alt="image" class="image-fluid img-mini align-self-center">
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Easy and
              Seamless</h4>
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Application</h4>
            <p class="width-container-small font-type-tertiary font-size-quaternary align-self-center text-center">We
              will disclose the costs and fees involved upfront, with no hidden fees for you to worry about.</p>
          </div>
        </div>
        <div class="d-flex flex-row justify-content-around mt-5">
          <div class="d-flex flex-column justify-content-start">
            <img src="{{asset('assets/review_2.svg')}}" alt="image" class="image-fluid img-mini align-self-center">
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">costs-Effective
              &</h4>
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Flexible
              Repayment</h4>
            <p class="width-container-small font-type-tertiary font-size-quaternary align-self-center text-center">Enjoy
              low-interest rates and flexible repayment tenures of up to 12 months, with multiple repayment options.</p>
          </div>
          <div class="d-flex flex-column justify-content-start">
            <img src="{{asset('assets/review_4.svg')}}" alt="image" class="image-fluid img-mini align-self-center">
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">No Collateral
            </h4>
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Financing</h4>
            <p class="width-container-small font-type-tertiary font-size-quaternary align-self-center text-center">Enjoy
              low-interest rates and flexible repayment tenures of up to 12 months, with multiple repayment options.</p>
          </div>
        </div>
        <a href="/register"
          class="btn btn-call-to-action cl-secondary bg-cl-tertiary ml-5 mt-5 width-btn align-self-center">Apply now</a>
      </div>
    </div>
  </main>

  @include('layouts.landing_page.footer')

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="{{asset('js/style.js')}}"></script>
</body>

</html>
