<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_about_us.css')}}">
    <title>About Us -- SmartFunding Direct</title>
  </head>
  <body>
    @include('layouts.landing_page.header')

    <main>
        <div class="jumbotron jumbotron-fluid height-med-jumbotron bg-hero" id="hero-about">
            <div class="container container-fluid d-flex flex-column">
                <h2 class="font-type-primary cl-secondary text-center font-size-primary">About Us</h2>
                <p class="text-center cl-secondary font-type-secondary font-size-septenary width-container-inter1-px align-self-center mt-3">At Smart Funding Direct, we aim to make alternative finance solutions through microloans more accessible to individuals.</p>
                <p class="text-center cl-secondary font-type-secondary font-size-septenary width-container-inter1-px align-self-center mt-3" id="container-tablet">Our goal is to help individuals affected by the on-going pandemic through a transparent alternative financing platform. </p>
            </div>
        </div>

        <!--Mobile Section 1-->
        <div id="about-section1-mobile">
            <div class="d-flex flex-column justify-content-around mt-70px bg-section-1">
                <h3 class="align-self-center font-type-primary font-size-secondary">Who We Are</h3>
                <div class="border-bottom-half align-self-center"></div>
                <div class="pl-100px align-self-start ">
                    <p class="cl-senary font-type-tertiary font-size-quaternary font-line-height-med font-line-height-med width-container-inter3-px align-self-center mt-25px">SmartFunding Direct is ASEAN's largest digital financing platform for alternative financing through microloans</p>
                    <p class="cl-senary font-type-tertiary font-size-quaternary font-line-height-med font-line-height-med width-container-inter3-px align-self-center mt-25px">The SmartFunding Direct platform provides individuals with a fully integrated and user-friendly platform to apply for microloans quickly</p>
                    <p class="cl-senary font-type-tertiary font-size-quaternary font-line-height-med font-line-height-med width-container-inter3-px align-self-center mt-25px">The result? An easy, dependable digital lending platform that benefits the community</p>
                    <a href="/register" class="btn btn-hero font-type-secondary font-size-septenary cl-secondary bg-cl-tertiary align-self-left mt-25px mb-25px">Apply Now</a>
                </div>
            </div>
        </div>
        <!--Tablet Section 1-->
        <div id="about-section1-tablet">
            <div class="d-flex flex-column justify-content-around pt-5">
                <h3 class="font-type-primary font-size-secondary ml-5">Who We Are</h3>
                <div class="border-bottom-quarter-px ml-5"></div>
                <div class="d-flex flex-row justify-content-between">
                    <div class="pl-5 align-self-center">
                        <p class="cl-senary font-type-secondary font-size-quaternary width-container-medium-px font-line-height-big align-self-center mt-5">SmartFunding Direct is ASEAN's largest digital financing platform for alternative financing through microloans</p>
                        <p class="cl-senary font-type-secondary font-size-quaternary width-container-medium-px font-line-height-big align-self-center mt-2">The SmartFunding Direct platform provides individuals with a fully integrated and user-friendly platform to apply for microloans quickly</p>
                        <p class="cl-senary font-type-secondary font-size-quaternary width-container-medium-px font-line-height-big align-self-center mt-2">The result? An easy, dependable digital lending platform that benefits the community</p>
                        <a href="/register" class="btn btn-hero font-type-secondary font-size-septenary cl-secondary bg-cl-tertiary align-self-left mt-25px mb-25px">Apply Now</a>
                    </div>
                    <img src="{{asset('assets/Frame_1000002212.svg')}}" alt="Image" class="image-fluid img-small align-self-center">
                </div>
            </div>
        </div>
        <!--Desktop Section 1-->
        <div id="about-section1-desktop">
            <div class="d-flex flex-row justify-content-around mt-5">
                <div class="d-flex flex-column justify-content-start">
                    <div class="pl-5">
                        <h3 class="font-type-primary font-size-secondary">Who We Are</h3>
                        <div class="border-bottom-quarter"></div>
                    </div>
                    <div class="pl-5 align-self-center">
                        <p class="cl-senary font-type-secondary font-size-quaternary width-medium-container font-line-height-big align-self-center mt-5" id="content-big-screen">SmartFunding Direct is ASEAN's largest digital financing platform for alternative financing through microloans</p>
                        <p class="cl-senary font-type-secondary font-size-quaternary width-medium-container align-self-center mt-2" id="content-special-desktop">The SmartFunding Direct platform provides individuals with a fully integrated and user-friendly platform to apply for microloans quickly</p>
                        <p class="cl-senary font-type-secondary font-size-quaternary width-medium-container font-line-height-big align-self-center mt-2" id="content-big-screen">The result? An easy, dependable digital lending platform that benefits the community</p>
                        <a href="/register" class="btn btn-hero font-type-secondary font-size-septenary cl-secondary bg-cl-tertiary font-line-height-big align-self-left mt-25px mb-25px">Apply Now</a>
                    </div>
                    <img src="{{ asset('assets/Polygon_6_about.svg') }}" alt="Image" class="image-fluid img-custom-px">
                </div>
                <img src="{{asset('assets/Frame_1000002212_desktop.svg')}}" alt="Image" class="image-fluid img-med align-self-center">
            </div>
        </div>

        <!--Smartphone, Tablet, Desktop Section 2-->
        <div class="d-flex flex-column justify-content-center bg-cl-primary pt-3 pb-3 mt-5" id="tablet-section2">
            <div class=" container d-flex flex-column justify-content-around custom-card align-self-center" id="responsive-desktop">
                <div class="d-flex flex-column justify-content-around mt-25px align-self-center">
                    <img src="{{asset('assets/Full_transparency.svg')}}" alt="Img" class="image-fluid custom-img align-items-center">
                    <h3 class="font-type-primary font-size-secondary cl-quinary align-items-center text-center mt-10px">Our Mission</h3>
                    <p class="align-self-center cl-senary font-type-secondary font-size-septenary align-items-center width-container-inter2-px font-line-height-med text-center responsive-text mt-10px mb-50px" id="content-special-desktop">As a catalyst for community microloans, our mission is to empower individuals in ASEAN affected by the on-going pandemic with fast, reliable, and flexible microloans solutions </p>
                </div>
                <img src="{{asset('assets/Line_12.svg')}}" alt="Divider" class="image-fluid divider-mini align-self-center mt-3" id="rotate-img">
                <div class="d-flex flex-column justify-content-around mt-25px align-self-center">
                    <img src="{{asset('assets/Cost_effective.svg')}}" alt="Img" class="image-fluid custom-img align-self-center">
                    <h3 class="font-type-primary font-size-secondary cl-quinary align-self-center text-center mt-10px">Our Vision</h3>
                    <p class="align-self-center cl-senary font-type-secondary font-size-septenary align-self-center width-container-inter2-px font-line-height-med text-center responsive-text mt-10px mb-50px" id="content-special-desktop">Providing alternative financing  opportnuities to improve their standards of living and where they can contribute productively towards the overall development of the country</p>
                </div>
            </div>
        </div>

        <!--Smartphone Section 3-->
        <div id="about-section3-mobile"> 
            <div class="d-flex flex-column justify-content-around pt-5 bg-section-3 mt-25px">
                <h3 class="font-type-primary font-size-secondary cl-quinary align-self-center text-center">Core Values</h3>
                <div class="width-medium-container align-self-center mt-10px">
                    <div class="d-flex flex-row justify-content-start">
                        <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-center pl-2">
                        <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center">Ethical Financing Practices</p>
                    </div>
                    <div class="d-flex flex-row justify-content-start">
                        <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-center pl-2">
                        <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center">Transparent Financing</p>
                    </div>
                    <div class="d-flex flex-row justify-content-start">
                        <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-center pl-2">
                        <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center">Financial Accountability</p>
                    </div>
                    <div class="d-flex flex-row justify-content-start">
                        <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-center pl-2">
                        <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center">Business Inclusivity</p>
                    </div>
                </div>
                <a href="/register" class="btn btn-hero font-type-secondary font-size-septenary mt-25px cl-secondary bg-cl-tertiary align-self-center">Apply Now</a>
            </div>
        </div>

        <!--Tablet Section 3-->
        <div id="about-section3-tablet">
            <div class="d-flex flex-row justify-content-between mt-5">
                <div class="d-flex flex-column justify-content-around ml-5">
                    <h3 class="font-type-primary font-size-secondary cl-quinary align-self-left">Core Values</h3>
                    <div class="width-medium-container-tablet align-self-center">
                        <div class="d-flex flex-row justify-content-start">
                            <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-center pl-2">
                            <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center">Ethical Financing Practices</p>
                        </div>
                        <div class="d-flex flex-row justify-content-start">
                            <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-center pl-2">
                            <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center">Transparent Financing</p>
                        </div>
                        <div class="d-flex flex-row justify-content-start">
                            <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-center pl-2">
                            <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center">Financial Accountability</p>
                        </div>
                        <div class="d-flex flex-row justify-content-start">
                            <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-center pl-2">
                            <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center">Business Inclusivity</p>
                        </div>
                    </div>
                    <a href="/register" class="btn btn-hero font-type-secondary font-size-septenary mt-3 cl-secondary bg-cl-tertiary align-self-start">Apply Now</a>
                </div>
                <img src="{{asset('assets/Group_1000002221_clear.svg')}}" alt="Image" class="image-fluid img-small-special mt-50px">
            </div>
        </div>

        <!--Desktop Section 3-->
        <div id="about-section3-desktop">
            <div class="d-flex flex-row justify-content-around mt-50px pl-70px">
                <img src="{{asset('assets/about_section_3_desktop.svg')}}" alt="Image" class="image-fluid img-med align-self-center">
                <div class="width-medium-container align-self-center">
                    <h3 class="font-type-primary font-size-secondary cl-quinary align-self-start">Core Values</h3>
                    <div class="d-flex flex-row justify-content-start mt-25px">
                        <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-end pl-2">
                        <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center pb-2">Ethical Financing Practices</p>
                    </div>
                    <div class="d-flex flex-row justify-content-start">
                        <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-end pl-2">
                        <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center pb-2">Transparent Financing</p>
                    </div>
                    <div class="d-flex flex-row justify-content-start">
                        <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-end pl-2">
                        <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center pb-2">Financial Accountability</p>
                    </div>
                    <div class="d-flex flex-row justify-content-start">
                        <img src="{{asset('assets/Polygon_small.svg')}}" alt="bullet icon" class="img-fluid img-sm align-self-end pl-2">
                        <p class="align-self-center pt-3 pl-2 font-type-tertiary font-size-septenary align-self-center pb-2">Business Inclusivity</p>
                    </div>
                    <a href="/register" class="btn btn-hero cl-secondary bg-cl-tertiary align-self-start mt-3 ml-1 mb-25px">Apply Now</a>
                </div>
            </div>
        </div>

        <!--Mobile Section 4-->
        <div id="about-section4-mobile">
            <div class="d-flex flex-column justify-content-around bg-cl-primary mt-5">
                <div class="d-flex flex-row justify-content-start align-self-center">
                    <h3 class="cl-quaternary font-type-primary font-size-secondary align-self-center mt-5">Smart</h3>
                    <h3 class="cl-septenary font-type-primary font-size-secondary align-self-center mt-5">Funding</h3>
                    <h3 class="cl-quaternary font-type-primary font-size-secondary align-self-center mt-5 ml-2">Direct</h3>
                </div>
                <h3 class="cl-septenary font-type-primary font-size-secondary align-self-center">Backed by</h3>
                <div class="border-bottom-half mt-3 align-self-center"></div>
                <img src="{{asset('assets/backed_by_1.svg')}}" alt="Image" class="image-fluid custom-img mt-5 align-self-center">
                <img src="{{asset('assets/backed_by_2.svg')}}" alt="Image" class="image-fluid custom-img mt-5 align-self-center">
                <img src="{{asset('assets/backed_by_2.svg')}}" alt="Image" class="image-fluid custom-img mt-3 align-self-center mb-5">
            </div>
        </div>

        <!--Desktop & Tablet Section 4-->
        <div id="about-section4-desktop">
            <div class="d-flex flex-column justify-content-around bg-cl-primary mt-5 pb-5">
                <div class="d-flex flex-row justify-content-center">
                    <div class="d-flex flex-row justify-content-start align-self-center">
                        <h3 class="cl-quaternary font-type-primary font-size-secondary align-self-center mt-5">Smart</h3>
                        <h3 class="cl-quinary font-type-primary font-size-secondary align-self-center mt-5">Funding</h3>
                        <h3 class="cl-quaternary font-type-primary font-size-secondary align-self-center mt-5 ml-2">Direct</h3>
                    </div>
                    <h3 class="cl-septenary font-type-primary font-size-secondary align-self-center mt-5 ml-3">Backed by</h3>
                </div>
                <div class="border-bottom-half-px mt-2 align-self-center"></div>
                <div class="d-flex flex-row justify-content-center mt-5">
                    <img src="{{asset('assets/backed_by_1.svg')}}" alt="Image" class="image-fluid img-mini-mobile align-self-center mr-4 ml-2">
                    <img src="{{asset('assets/backed_by_2.svg')}}" alt="Image" class="image-fluid img-mini-mobile align-self-center mr-4 ml-2">
                    <img src="{{asset('assets/backed_by_2.svg')}}" alt="Image" class="image-fluid img-mini-mobile align-self-center mr-4 ml-2">
                </div>
            </div>
        </div>
    </main>

    @include('layouts.landing_page.footer')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>