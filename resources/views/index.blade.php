<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
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
        <a href="/register" class="btn btn-hero align-self-center font-type-secondary cl-secondary mt-4 bg-cl-tertiary font-size-septenary">Get Loans</a>
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
            <h3 class="cl-quaternary font-size-tertiary font-type-secondary">Funding</h3>
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
          <div class="d-flex flex-column justify-content-start">
            <h3 class="ml-2 cl-quaternary font-size-tertiary font-type-tertiary">SmartFunding</h3>
            <div class="border-bottom-full align-self-center"></div>
          </div>
          <h3 class="ml-2 cl-quaternary font-size-tertiary font-type-tertiary">Direct</h3>
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
            <div>
              <h3 class="ml-2 cl-quaternary font-size-tertiary font-type-tertiary">SmartFunding Direct</h3>
              <div class="ml-2 border-bottom-full-px"></div>
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

    <!--================================= SECTION "HOW TO GET FUNDING IN 3 SIMPLE STEPS" ===========================================-->
    <!--Mobile Section 3-->
    <div class="d-flex flex-column justify-content-around bg-cl-primary" id="section3-mobile">
      <h3 class="cl-quinary font-type-primary font-size-tertiary width-container-inter1-px text-center align-self-center">
        How To Get Funding in 3 Simple Steps</h3>
      <div class="border-bottom-half-px align-self-center"></div>
      <div class="d-flex flex-column justify-content-around mt-5">
        <img src="{{asset('assets/number_count_1.png')}}" alt="1"
          class="image-fluid number-count-img align-self-center">
        <img src="{{asset('assets/Search_engine _Isometric.svg')}}" alt="image"
          class="image-fluid custom-img align-self-center">
        <h3 class="align-self-center mt-3 font-type-secondary cl-senary font-size-quaternary">Submit Application</h3>
        <h4
          class="align-self-center font-type-tertiary font-line-height-mini-px font-size-septenary cl-septenary font-size-small width-container-super-mini-px text-center">
          Apply for our financing solution and submit the necessary details.</h4>
      </div>
      <div class="d-flex flex-column justify-content-around mt-5">
        <img src="{{asset('assets/number_count_2.png')}}" alt="1"
          class="image-fluid number-count-img align-self-center">
        <img src="{{asset('assets/Checklist_Isometric.svg')}}" alt="image"
          class="image-fluid custom-img align-self-center">
        <h3 class="align-self-center mt-3 font-type-secondary cl-senary font-size-quaternary">Review Application</h3>
        <h4
          class="align-self-center font-type-tertiary font-size-septenary cl-septenary font-size-small width-container-super-mini-px text-center">
          Upon submission, your application will be reviewed by our credit and risk team</h4>
      </div>
      <img src="{{asset('assets/Polygon_6.svg')}}" alt="Polygon" class="image-fluid image-float">
      <div class="d-flex flex-column justify-content-around mt-5">
        <img src="{{asset('assets/number_count_3.png')}}" alt="1"
          class="image-fluid number-count-img align-self-center">
        <img src="{{asset('assets/Money_transfer _Isometric.svg')}}" alt="image"
          class="image-fluid custom-img align-self-center">
        <h3 class="align-self-center font-type-secondary mt-3 cl-senary font-size-quaternary">Receive Money</h3>
        <h4
          class="align-self-center font-type-tertiary font-size-septenary cl-septenary font-size-small width-container-super-mini-px text-center">
          If funding is successful, the funds will be disbursed to you within two days.</h4>
      </div>
      <a href="/register" class="btn btn-hero font-type-secondary align-self-center cl-secondary mt-5 mb-50px bg-cl-tertiary font-size-septenary">Get Loans</a>
    </div>

    <!--Desktop Section 3-->
    <div class="bg-cl-primary d-flex flex-column justify-content-around" id="section3-desktop">
      <img src="{{asset('assets/Polygon_6.svg')}}" alt="LOGO" class="img-fluid float-img-desktop-left-1">
      <div class="d-flex flex-column justify-content-start align-self-center">
        <h3
          class="cl-quinary font-type-primary font-line-height-super-big font-size-secondary width-container-inter1-px text-center align-self-center"
          id="section3-header">How To Get Funding in 3 Simple Steps</h3>
          <div class="border-bottom-quarter-px align-self-center"></div>
      </div>
      <div class="container d-flex flex-row justify-content-around mt-5" id="section3-main">
        <div class="container d-flex flex-column">
          <img src="{{asset('assets/number_count_1.png')}}" alt="1"
            class="image-fluid number-count-img align-self-center">
          <img src="{{asset('assets/Search_engine _Isometric.svg')}}" alt="image"
            class="image-fluid custom-img align-self-center">
          <h3 class="align-self-center font-type-primary font-size-tertiary cl-senary mt-3">Submit Application</h3>
          <h4
            class=" pl-2 pr2 align-self-center font-type-tertiary font-line-height-med cl-septenary font-size-septenary width-container-mini-inter1-px text-center">
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
          class="btn btn-hero mb-70px align-self-center font-type-secondary cl-secondary mt-70px bg-cl-tertiary">Get Loans</a>
        <img src="{{asset('assets/Polygon_5.svg')}}" alt="LOGO" class="img-fluid float-img-desktop-right-1">
      </div>
    </div>

    <!--========================== SECTION "PERSONAL MICROLOANS" ================================================-->
    <!--Mobile Section 4-->
    <div class="container d-flex flex-column justify-content-around mt-5" id="section4-mobile">
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
      <a href="/register" class="btn btn-hero font-size-septenary font-type-secondary mt-25px cl-secondary bg-cl-tertiary align-self-center">Apply Now</a>
    </div>
    <!--Desktop Section 4-->
    <div id="section4-desktop">
      <div class="d-flex flex-row justify-content-center mt-50px">
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
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center big-screen pl-2 font-type-tertiary font-size-septenary">Financing between
                <strong>SGD20,000</strong> to <strong>SGD500K</strong></p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center big-screen font-type-tertiary font-size-septenary pl-2">Interest rates as low as
                0.5% to 1.25% per month¹</p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center big-screen font-type-tertiary font-size-septenary pl-2">No collateral is required
              </p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon"
                class="img-fluid img-sm align-self-center pl-2">
              <p class="align-self-center big-screen font-type-tertiary font-size-septenary pl-2">No lock-in period</p>
            </div>
            <a href="/register" class="btn btn-hero btn-med font-type-secondary bg-cl-tertiary cl-secondary ml-2 mt-3">Apply
              Now</a>
          </div>
        </div>
      </div>
    </div>
    <!--Tablet Section 4-->
    <div id="section4-tablet">
      <div class="d-flex flex-column justify-content-around mt-90px">
        <h3 class="font-type-primary font-size-secondary cl-quinary align-self-center">Personal Microloans</h3>
        <div class="border-bottom-quarter align-self-center"></div>
        <div class="d-flex flex-row justify-content-around mt-5">
          <div class="d-flex flex-column justify-content-around ml-3 pr-5">
            <h4 class="font-type-primary cl-quinary font-size-tertiary mt-5">Term Financing</h4>
            <p class="lead font-type-tertiary cl-senary font-size-quaternary mt-10px">Grow with Term Financing for your business
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
            <a href="/register" class="btn btn-hero btn-med font-type-secondary bg-cl-tertiary cl-secondary ml-2 mt-25px">Apply
              Now</a>
          </div>
          <img src="{{asset('assets/Group_3301.svg')}}" alt="Image" class="image-fluid img-med">
        </div>
      </div>
    </div>

    <!--=================== SECTION "WHY CHOOSE TERM FINANCING FROM SMARTFUNDING DIRECT" ===================================================-->
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
          class="mr-4 ml-4 width-container-mini-px font-type-tertiary font-size-septenary font-line-height-med align-self-center text-center">
          We will disclose the costs and fees involved upfront, with no hidden fees for you to worry about.</p>

        <img src="{{asset('assets/review_3.svg')}}" alt="image"
          class="image-fluid img-mini-mobile align-self-center mt-5">
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Easy and Seamless
        </h4>
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Application</h4>
        <p
          class="mr-4 ml-4 width-container-inter1-px font-type-tertiary font-size-septenary font-line-height-med align-self-center text-center">
          Our online application saves you the hassle of leaving the comfort of home or work.</p>

        <img src="{{asset('assets/review_2.svg')}}" alt="image"
          class="image-fluid img-mini-mobile align-self-center mt-5">
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">costs-Effective &
        </h4>
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Flexible Repayment
        </h4>
        <p
          class="mr-4 ml-4 width-container-super-mini-px font-type-tertiary font-size-septenary font-line-height-med align-self-center text-center">
          Enjoy low-interest rates and flexible repayment tenures of up to 12 months, with multiple repayment options.
        </p>

        <img src="{{asset('assets/review_4.svg')}}" alt="image"
          class="image-fluid img-mini-mobile align-self-center mt-5">
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">No Collateral</h4>
        <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Financing</h4>
        <p
          class="mr-4 ml-4 width-container-super-mini-px font-type-tertiary font-size-septenary font-line-height-med align-self-center text-center">
          We focus on your business potential and want to help you grow.
        </p>
        <a href="/register"
          class="btn btn-hero font-size-septenary bg-cl-tertiary font-type-secondary cl-secondary mb-25px mt-25px align-self-center">Apply Now</a>
      </div>
    </div>

    <!--Desktop Section 5-->
    <div id="section5-desktop">
      <div class="d-flex flex-column justify-content-evenly pos-relative pb-5" id="section5-bigscreen">
        <img src="{{asset('assets/Polygon_6.svg')}}" alt="LOGO" class="img-fluid float-img-desktop-left-2"
          id="img-hide">
        <div class="d-flex flex-column justify-content-start ml-5 pt-3">
          <h3 class="font-type-primary font-size-secondary cl-quinary">Why Choose Term Financing</h3>
          <div class="d-flex flex-row justify-content-start">
            <h3 class="font-type-primary font-size-secondary cl-quinary">from</h3>
            <div>
              <h3 class="ml-2 font-type-primary font-size-secondary cl-quaternary">SmartFunding</h3>
              <div class="border-bottom-full-bold pl-2"></div>
            </div>
            <h3 class="ml-2 font-type-primary font-size-secondary cl-quaternary">Direct</h3>
          </div>
        </div>
        <div class="d-flex flex-row justify-content-beetwen mt-5 ml-5">
          <img src="{{asset('assets/review_1.svg')}}" alt="image" class="image-fluid img-mini">
          <div class="d-flex flex-column justify-content-center ml-2 pt-4">
            <h4 class="font-type-secondary font-size-tertiary cl-quinary">Full Transparency</h4>
            <p class="width-container-super-mini-px font-type-tertiary font-size-septenary font-line-height-med">We will disclose the costs and fees
              involved upfront, with no hidden fees for you to worry about.</p>
          </div>
          <img src="{{asset('assets/review_2.svg')}}" alt="image" class="image-fluid img-mini ml-5">
          <div class="d-flex flex-column justify-content-center ml-2 mt-5 pt-3">
            <div class="d-flex flex-column justify-content-start">
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">Costs-Effective &</h4>
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">Flexible Repayment</h4>
            </div>
            <p class="width-container-super-mini-px font-type-tertiary font-size-septenary">Enjoy low-interest rates and
              flexible repayment tenures of up to 12 months, with multiple repayment options.</p>
          </div>
        </div>
        <div class="d-flex flex-row justify-content-beetwen mt-5 ml-5">
          <img src="{{asset('assets/review_3.svg')}}" alt="image" class="image-fluid img-mini">
          <div class="d-flex flex-column justify-content-center ml-2 pt-6">
            <div class="d-flex flex-column justify-content-start">
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">Easy and Seamless</h4>
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">Application</h4>
            </div>
            <p class="width-container-super-mini-px font-type-tertiary font-size-septenary">Our online application saves you the hassle of leaving the comfort of home or work.</p>
          </div>
          <img src="{{asset('assets/review_4.svg')}}" alt="image" class="image-fluid img-mini ml-5">
          <div class="d-flex flex-column justify-content-center ml-2 pt-5">
            <div class="d-flex flex-column justify-content-start">
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">No Collateral</h4>
              <h4 class="font-type-secondary font-size-tertiary cl-quinary">Financing</h4>
            </div>
            <p class="width-container-super-mini-px font-type-tertiary font-size-septenary">We focus on your business potential and want to help you grow.</p>
          </div>
        </div>
        <a href="/register" class="btn btn-hero btn-med font-type-secondary cl-secondary bg-cl-tertiary ml-5 mt-5">Apply now</a>
        <img src="{{asset('assets/Group.svg')}}" alt="LOGO" class="img-fluid float-img-desktop-right-2" id="img-hide">
      </div>
    </div>

    <!--Tablet Section 5-->
    <div id="section5-tablet">
      <div class="d-flex flex-column justify-content-around mt-90px mb-5" id="tablet-bg">
        <h3 class="font-type-primary font-size-secondary cl-quinary align-self-center">Why Choose Term Financing from
        </h3>
        <h3 class="ml-2 font-type-primary font-size-secondary cl-quaternary align-self-center">SmartFunding Direct</h3>
        <div class="border-bottom-quarter align-self-center"></div>
        <div class="d-flex flex-row justify-content-around mt-5">
          <div class="d-flex flex-column justify-content-start">
            <img src="{{asset('assets/review_1.svg')}}" alt="image" class="image-fluid img-mini align-self-center">
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Full
              Transparency</h4>
            <p class="width-container-mini-inter1-px font-type-tertiary font-size-quaternary align-self-center text-center">We
              will disclose the costs and fees involved upfront, with no hidden fees for you to worry about.</p>
          </div>
          <div class="d-flex flex-column justify-content-start">
            <img src="{{asset('assets/review_3.svg')}}" alt="image" class="image-fluid img-mini align-self-center">
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Easy and
              Seamless</h4>
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Application</h4>
            <p class="width-container-mini-inter1-px font-type-tertiary font-size-quaternary align-self-center text-center">Our online application saves you the hassle of leaving the comfort of home or work.</p>
          </div>
        </div>
        <div class="d-flex flex-row justify-content-around mt-5">
          <div class="d-flex flex-column justify-content-start">
            <img src="{{asset('assets/review_2.svg')}}" alt="image" class="image-fluid img-mini align-self-center">
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">costs-Effective
              &</h4>
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Flexible
              Repayment</h4>
            <p class="width-container-mini-inter1-px font-type-tertiary font-size-quaternary align-self-center text-center">Enjoy
              low-interest rates and flexible repayment tenures of up to 12 months, with multiple repayment options.</p>
          </div>
          <div class="d-flex flex-column justify-content-start">
            <img src="{{asset('assets/review_4.svg')}}" alt="image" class="image-fluid img-mini align-self-center">
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">No Collateral
            </h4>
            <h4 class="font-type-secondary font-size-tertiary cl-quinary align-self-center text-center">Financing</h4>
            <p class="width-container-mini-inter1-px font-type-tertiary font-size-quaternary align-self-center text-center">We focus on your business potential and want to help you grow.</p>
          </div>
        </div>
        <a href="/register"
          class="btn btn-hero cl-secondary bg-cl-tertiary ml-5 mt-5 font-type-secondary align-self-center">Apply now</a>
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
