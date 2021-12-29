<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Description -->
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="We are a Licensed Regional Financing Platform · Grow Your Investment With Returns Of Up To 24% · Scale Your Business With Flexible Financing Solutions." />

    <!--Title Web Page-->
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
</head>
<body>
    <!-- Header for Mobile Section -->
    <header class="pt-3 pl-4 pr-4" id="header-mobile">
        <img src="{{ asset("assets/mobile-logo.svg") }}" class="img-fluid float-left img-size-med-mobile" alt="Logo"/>
        <img src="{{ asset("assets/icon_menu_mobile.svg") }}" class="img-fluid float-right img-size-mini-mobile" id="toggler-menu" alt="Ham Menu">
    </header>

    <!-- Header for Tablet & Desktop -->
    <header id="header-main">
        <nav class="navbar bg-cl-primary">
            <img src="{{ asset("assets/mobile-logo.svg") }}" class="img-fluid  img-size-med-main" alt="Logo"/>
        </nav>
    </header>

    <!-- Section 1 Mobile "Get Fast & Easy Loan" -->
    <div class="jumbotron bg-hero pl-3 pr-3 pt-90px hero-style">
        <div class="d-flex flex-column justify-content-around pr-25px pl-25px">
            <h1 class="align-self-center text-center font-type-primary font-size-primary cl-secondary line-height-1">Get Fast & Easy Loan.</h1>
            <h3 class="align-self-center text-center cl-secondary font-type-tertiary font-size-septenary line-height-3 mt-2">Whether it's furnishing your newly purchased home, saving up for a new car, or planning a surprise vacation for your spouse to the stunning Santorini. In just three steps, you can apply for a quick loan today.</h3>
            <a href="/register" class="align-self-center btn btn-med mt-3 font-type-primary cl-secondary bg-cl-tertiary font-size-septenary">Get Loans</a>
        </div>
    </div>  

    <!-- Section Card for Mobile -->
    <div id="card-mobile">
        <div class="d-flex flex-column justify-content-around">
            <h2 class="align-self-center cl-quinary font-size-tertiary font-type-secondary">About</h2>
            <div class="d-flex flex-row justify-content-center">
                <h2 class="cl-quaternary font-size-tertiary font-type-secondary">Smart</h2>
                <div class="d-flex flex-column justify-content-start">
                    <h2 class="align-items-start cl-quinary font-size-tertiary font-type-secondary">Funding</h2>
                    <div class="align-items-start border-bottom-full"></div>
                </div>
                <h2 class="ml-1 cl-quaternary font-size-tertiary font-type-secondary">Direct</h2>
            </div>
            <div class="container mt-3">
                <p class="text-center font-size-septenary font-type-quaternary">
                    The on-going pandemic has made it challenging for everyone, not just businesses. Launched in 2021, we envision to alleviate the financial burden for people affected through our fast, reliable, and flexible microloans solutions.
                </p>
            </div>
        </div>
    </div>

    <!-- Section How To Get Funding -->
    <div id="section-3-mobile">
        <div class="d-flex flex-column justify-content-around bg-cl-primary pt-150px">
            <h2 class="width-container-med cl-quinary font-type-primary font-size-tertiary text-center align-self-center">How To Get Funding in 3 Simple Steps</h2>
            <div class="border-bottom-mini align-self-center"></div>

            <div class="d-flex flex-column justify-content-around mt-5">
                <img src="{{ asset("assets/number_count_1.png") }}" alt="Number" class="img-fluid img-width-mini-mobile align-self-center">
                <img src="{{ asset("assets/Search_engine _isometric.svg") }}" alt="Image 1" class="img-fluid img-with-med-mobile align-self-center">
                <h3 class="align-self-center mt-3 font-type-primary cl-senary font-size-quaternary">Submit Application</h3>
                <p class="align-self-center font-type-tertiary line-height-3 font-size-septenary cl-septenary width-container-mini text-center">Apply for our financing solution and submit the necessary details.</p>
            </div>

            <div class="d-flex flex-column justify-content-around mt-4">
                <img src="{{ asset("assets/number_count_2.png") }}" alt="Number" class="img-fluid img-width-mini-mobile align-self-center">
                <img src="{{ asset("assets/Checklist_Isometric.svg") }}" alt="Image 2" class="img-fluid img-with-med-mobile align-self-center">
                <h3 class="align-self-center mt-3 font-type-primary cl-senary font-size-quaternary">Review Application</h3>
                <p class="align-self-center font-type-tertiary line-height-3 font-size-septnary cl-septenary width-container-mini text-center">Upon submission, your application will be reviewed by our credit and risk team</p>
            </div>

            <div class="d-flex flex-column justify-content-around mt-4">
                <img src="{{ asset("assets/number_count_3.png") }}" alt="Number" class="img-fluid img-width-mini-mobile align-self-center">
                <img src="{{ asset("assets/Money_transfer _Isometric.svg") }}" alt="Image 3" class="img-fluid img-with-med-mobile align-self-center">
                <h3 class="align-self-center mt-3 font-type-primary cl-senary font-size-quaternary">Receive Money</h3>
                <p class="align-self-center font-type-tertiary line-height-3 font-size-septnary cl-septenary width-container-mini text-center">If funding is successful, the funds will be disbursed to you within two days.</p>
            </div>

            <a href="/register" class="align-self-center btn btn-med mt-4 mb-4 font-type-primary cl-secondary bg-cl-tertiary font-size-septenary">Get Loans</a>
        </div>
    </div>

    <!-- Section 4 mobile What to know -->
    <div id="section-4-mobile">
        <div class="d-flex flex-column justify-content-around pt-5">
            <div class="d-flex flex-column justify-content-around width-container-big align-self-center">
                <h3 class="align-self-center text-center font-type-primary font-size-secondary cl-quinary">What to Know When Borrowing From Us</h3>
                <div class="border-bottom-mini align-self-center"></div>
            </div>
            <h4 class="font-type-primary font-size-quaternary mt-4 align-self-center cl-quinary pl-2 pr-2">The Required Documents Would Be :</h4>
            <div class="d-flex flex-row justify-content-start align-self-start ml-5 mt-2">
                <img src="{{ asset("assets/Polygon_small.svg") }}" alt="Bullet Icon" class="img-fluid img-width-super-super-mini-mobile align-self-start">
                <p class="align-self-center pl-2 font-type-tertiary font-size-quaternary cl-tertiary">Front and Back NRIC</p>
            </div>
            <div class="d-flex flex-row justify-content-start align-self-start ml-5 mt-1">
                <img src="{{ asset("assets/Polygon_small.svg") }}" alt="Bullet Icon" class="img-fluid img-width-super-super-mini-mobile align-self-start">
                <p class="align-self-center pl-2 font-type-tertiary font-size-quaternary cl-tertiary">Latest 3 months salary slip / pay slip</p>
            </div>
            <div class="d-flex flex-row justify-content-start align-self-start ml-5 mt-1">
                <img src="{{ asset("assets/Polygon_small.svg") }}" alt="Bullet Icon" class="img-fluid img-width-super-super-mini-mobile align-self-start">
                <p class="align-self-center pl-2 font-type-tertiary font-size-quaternary cl-tertiary">Latest 3 months bank statement</p>
            </div>
            <div class="d-flex flex-row justify-content-start align-self-start ml-5 mt-1">
                <img src="{{ asset("assets/Polygon_small.svg") }}" alt="Bullet Icon" class="img-fluid img-width-super-super-mini-mobile align-self-start">
                <p class="align-self-center pl-2 font-type-tertiary font-size-quaternary cl-tertiary">Utility Bill</p>
            </div>
            <div class="d-flex flex-row justify-content-start align-self-start ml-5 mt-1">
                <img src="{{ asset("assets/Polygon_small.svg") }}" alt="Bullet Icon" class="img-fluid img-width-super-super-mini-mobile align-self-start">
                <p class="align-self-center pl-2 font-type-tertiary font-size-quaternary cl-tertiary">Latest EPF / Tax Declaration Form</p>
            </div>

            <a href="/register" class="align-self-center btn btn-med mt-5 mb-4 font-type-primary cl-secondary bg-cl-tertiary font-size-septenary">Apply Now</a>
        </div>
    </div>

    <!-- Footer Mobile -->
    <div id="footer-mobile">
        <div class="d-flex flex-column justify-content-around bg-cl-secondary">
            <img src="{{ asset("images/logo/sfd-wh.svg") }}" alt="Logo" class="img-fluid img-size-med-mobile align-self-center mt-5">
            <div class="align-self-center mt-5">
                <h4 class="font-type-tertiary font-size-quaternary cl-quaternary text-center">License</h4>
                <p class="cl-secondary font-type-tertiary font-size-septenary text-center width-container-med">Smartfunding Pte. Ltd. Regulated by Monetary Authority of Singapore (MAS). License no: CMS-100637-1 Capital Market Services (Dealing in Securities)</p>
            </div>
            <div class="align-self-center mt-3">
                <h4 class="font-type-tertiary font-size-quaternary cl-quaternary text-center">Get in Touch</h4>
                <p class="cl-secondary font-type-tertiary font-size-septenary text-center width-container-med">Endokemi kaning. Bepir detregt. Vabel sovöpör. Milingar. Bigt seryrat.</p>
            </div>
            <div class="align-self-center mt-3">
                <h4 class="font-type-tertiary font-size-quaternary cl-quaternary text-center">Address</h4>
                <p class="cl-secondary font-type-tertiary font-size-septenary text-center width-container-med">71, Ayer Rajah Crescent, <br class="text-center" />#06-06, Singapore <br class="text-center" />139951.</p>
            </div>
            <div class="align-self-center mt-3">
                <h4 class="font-type-tertiary font-size-quaternary cl-quaternary text-center">Hotline</h4>
                <p class="cl-secondary font-type-tertiary font-size-septenary text-center width-container-med">+60 9111 3111</p>
            </div>
            <div class="align-self-center mt-3">
                <h4 class="font-type-tertiary font-size-quaternary cl-quaternary text-center">E-mail</h4>
                <p class="cl-secondary font-type-tertiary font-size-septenary text-center width-container-med">hi@smartfunding.sg</p>
            </div>
            <div class="align-self-center d-flex flex-row justify-content-around">
                <img src="{{ asset("assets/Facebook.svg") }}" alt="Facebook" class="img-fluid img-icon-mini">
                <img src="{{ asset("assets/Twitter.png") }}" alt="Twitter" class="img-fluid img-icon-mini ml-3">
                <img src="{{ asset("assets/Linkedin.svg") }}" alt="Twitter" class="img-fluid img-icon-mini ml-3">
                <img src="{{ asset("assets/Instagram.svg") }}" alt="Twitter" class="img-fluid img-icon-mini ml-3">
            </div>
            <img src="{{ asset("assets/logo_afg.png") }}" alt="Logo" class="img-fluid img-size-half-med-mobile align-self-center mt-5">

            <div class="d-flex flex-column justify-content-around mt-4 bg-cl-footer-copyright">
                <div class="d-flex flex-row justify-content-around align-self-center mb-3 mt-3">
                    <h5 class="font-type-tertiary font-size-septenary cl-octonary align-self-center">Privacy policy</h5>
                    <h5 class="ml-5 font-type-tertiary font-size-septenary cl-octonary align-self-center">Terms of use</h5>
                </div>
                <h5 class="font-type-tertiary font-size-septenary cl-secondary align-self-center">© 2020 All rights reserved.</h5>
                <h5 class="font-type-tertiary font-size-septenary cl-quaternary align-self-center">Smartfunding Pte. Ltd</h5>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>