<!doctype html>
{{-- lang --}}
<html class="no-js" lang="">

<head>
    <meta charset="UTF-8">
    {{-- title --}}
    @if (url()->current() == 'https://petlodger.co.uk' || url()->current() == 'https://petlodger.co.uk/home')

    <title>Best Pet, Dog, and Cat House Sitting Services in the UK – Pet Lodger</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#fff">
        <meta name="description"
            content="Pet Lodger provides the best professional house sitting, pet sitting, dog sitting, and cat sitting services in the UK at pet's own house and carer's house. Visit us now.">
    @elseif(url()->current() == 'https://petlodger.co.uk/services/drop_and_visit')

    <title>Find house sitters and pet sitters at own house in the UK – Pet Lodger</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#fff">
        <meta name="description"
            content="Pet Lodger offers the best house sitting services in the UK and pet sitters at own house. Find house and pet sitters in the UK to take care of your pets.">
    
        @elseif(url()->current() == 'https://petlodger.co.uk/services/house-sitting')

        <title>Professional house and pet sitters at carer house in the UK – Pet Lodger</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#fff">
        <meta name="description"
            content="Find the best house sitting services in the UK and pet sitters at carer house by Pet Lodger. Our house and pet sitters in the UK take care of your pets and home well.">
        <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;"> Probdone </a>
    @else
        <!-- Debug message -->
        <title>Petlodger</title>
    @endif





    {{-- meta name --}}


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    {{-- meta property --}}
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    {{-- links starts --}}
    <link rel="apple-touch-icon" href="{{ asset('assets/png/icon.png') }}">
    {{-- stylesheet --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    {{-- manifest --}}
    <link rel="manifest" href="{{ asset('assets/site.webmanifest') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    use App\Models\Credit;
    ?>
    {{-- Push Responsive Menu --}}
    <pushmenu>
        <a id="hamburg" href="#">
            <div class="nav-cross">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <div id="menuoverlay"></div>
        <nav class="nav1">
            <div class="container">
                <div class="row">
                    <formobile>
                        <div class="push-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/image/site_logo.png') }}">
                            </a>
                        </div>
                    </formobile>
                    <ul class="menu">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a>Services</a></li>
                        <li><a href="{{ route('drop-and-visit') }}">At Own House</a></li>
                        <li><a href="{{ route('house-sitting') }}">At Carer House</a></li>
                            
                        </li>
                        <li><a href="{{ route('faqs') }}">FAQ's</a></li>
                        <li><a href="{{ route('ad.lists') }}">Ad Listing</a></li>
                        <li><a href="#">Find Sitter</a>
                            <ul>
                                <li><a href="#">Find a Pet Sitter</a></li>
                                <li><a href="#">Find a House Sitter</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('contact') }}">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </pushmenu>
    {{-- Header --}}
    <header class="site_header">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('assets/image/site_logo.png') }}">
                        </a>
                    </div>
                </div>
                <div class="col-md-10">
                    @if (Auth::check())
                        {{-- top bar --}}
                        <div class="top-head row">
                            <div class="col-md-2 main">
                                <div class="icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="desc">
                                    @if (Auth::user()->role_id === 1)
                                        <span>{{ Auth::user()->full_name }}</span>
                                        {{-- <span>Super Admin</span> --}}
                                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        {{-- <a href="{{route('super.admin.dashboard')}}">Dashboard</a> --}}
                                    @elseif(Auth::user()->role_id === 2)
                                        <span>{{ Auth::user()->full_name }}</span>
                                        {{-- <span>Sub Admin</span> --}}
                                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        {{-- <a href="{{route('sub.admin.dashboard')}}">Dashboard</a> --}}
                                    @elseif(Auth::user()->role_id === 3)
                                        <span>{{ Auth::user()->full_name }}</span>
                                        {{-- <span>Admin</span> --}}
                                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        {{-- <a href="{{route('admin.dashboard')}}">Dashboard</a> --}}
                                    @elseif(Auth::user()->role_id === 4)
                                        <span>{{ Auth::user()->full_name }}</span>
                                        {{-- <span>User</span> --}}
                                        <a href="{{ route('profile') }}">Dashboard</a>
                                    @elseif(Auth::user()->role_id === 5)
                                        <span>{{ Auth::user()->full_name }}</span>
                                        {{-- <span>Sitter</span> --}}
                                        <a href="{{ route('sitter.profile') }}">Dashboard</a>
                                    @endif
                                </div>
                            </div>
                            <!--<div class="col-md-3 main">-->
                            <!--    <div class="icon">-->
                            <!--        <i class="fas fa-phone-alt"></i>-->
                            <!--    </div>-->
                            <!--    <div class="desc">-->
                            <!--        <span>Quick Contact</span>-->
                            <!--        <a href="tel:000-000-0000">000-000-0000</a>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-md-3 main">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="desc">
                                    <span>Email Us </span>
                                    <a href="mailto:info@petlodger.co.uk">info@petlodger.co.uk</a>
                                </div>
                            </div>
                            <div class="col-md-2 social">

                                <?php
                                $credits = Credit::where('user_id', Auth::id())->get();
                                $firstCredit = $credits->first(); // Get the first item in the collection
                                $creditBalance = $firstCredit ? $firstCredit->balance : null;
                                ?>
                                <div class="desc">
                                    Credit balance: {{ $creditBalance }}
                                </div>
                                <ul>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-2 top-btns">
                                <li class="dropbtn dropdown top-button-3"><a
                                        href="{{ route('logout') }}">{{ __('Sign Out') }}</a></li>
                            </div>
                        </div>
                        {{-- top bar end --}}
                    @elseif(!Auth::check())
                        {{-- top bar start --}}
                        <div class="top-head row">
                            <!--<div class="col-md-3 main">-->
                            <!--    <div class="icon">-->
                            <!--        <i class="fas fa-phone-alt"></i>-->
                            <!--    </div>-->
                            <!--    <div class="desc">-->
                            <!--        <span>Quick Contact</span>-->
                            <!--        <a href="tel:000-000-0000">000-000-0000</a>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-md-3 main">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="desc">
                                    <span>Email Us </span>
                                    <a href="mailto:info@petlodger.co.uk">info@petlodger.co.uk</a>
                                </div>
                            </div>
                            <div class="col-md-2 social">
                                <ul>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 top-btns">
                                <li class="dropbtn dropdown top-button-1"><a
                                        href="{{ route('pre-signup') }}">{{ __('Sign Up') }}</a></li>
                                <li class="dropbtn dropdown top-button-2"><a
                                        href="{{ route('login') }}">{{ __('Sign In') }}</a></li>
                            </div>
                        </div>
                        {{-- top bar end --}}
                    @endif
                    {{-- Main Menu Start --}}
                    <div class="bottom-head row">
                        <div class="col-md-12 p-0">
                            <ul class="menu ">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li class="dropbtn dropdown"><a href="{{ route('services') }}">Services</a>
                                    <ul class="dropdown-content">
                                        <!--<li><a href="{{ route('day-cation') }}">Daycation</a></li>-->
                                        <!--<li><a href="{{ route('cat-cation') }}">Catcation</a></li>-->
                                        <!--<li><a href="{{ route('stay-cation') }}">Staycation </a></li>-->
                                        <li><a href="{{ route('drop-and-visit') }}">At Own House</a></li>
                                        <li><a href="{{ route('house-sitting') }}">At Carer House</a></li>
                                        <!--<li><a href="{{ route('dog-cation') }}">Dogcation</a></li>-->
                                    </ul>
                                </li>
                                <li><a href="{{ route('ad.lists') }}">Job Search</a></li>
                                <li><a href="{{ route('package.lists') }}">Package</a></li>
                                <li><a href="{{ route('contact') }}">Contact us</a></li>
                                <li><a href="{{ route('faqs') }}">FAQs</a></li>
                            </ul>
                            {{-- <div class="quote">
                              @if (Auth::check())
                                 <li class="dropbtn dropdown"><a href="{{ route('logout') }}">{{ __('Sign Out') }}</a></li>
                              @else
                                 <a href="{{ route('login') }}">{{ __('Sign In') }}</a>
                              @endif
                           </div> --}}
                            <div class="quote">
                                <li class="dropbtn dropdown"><a
                                        href="{{ route('ad.create') }}">{{ __('POST AN AD') }}</a></li>
                            </div>
                        </div>
                    </div>
                    {{-- Main Menu Ends --}}
                </div>
            </div>
        </div>
    </header>
    {{-- Content --}}
    @yield('content')
    @yield('scripts')
    {{-- Footer --}}
    <footer class="site_footer">
        <div class="container">
            <div class="top-footer">
                <div class="row">
                    <div class="col-md-6 main">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="desc">
                            <span>Email Us </span>
                            <a href="mailto:info@petlodger.co.uk">info@petlodger.co.uk</a>
                        </div>
                    </div>
                    <div class="col-md-6 main">
                        <!--<div class="icon">-->
                        <!--    <i class="fas fa-map-marker-alt"></i>-->
                        <!--</div>-->
                        <!--<div class="desc">-->
                        <!--    <span>Location: </span>-->
                        <!--    <p>Abc street, 123 street xyz avenue, city, USA.</p>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="footer-middle">
                <div class="row">
                    <div class="col-md-3">
                        <h3>About us</h3>
                        <div class="desc">
                            <p>
                                We are a safe haven for your little companions. Our service is simple--we provide you
                                with the best pet sitters in town. 
                            </p>
                        </div>
                        <ul class="social">
                            <li>Follow Us On</li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                            <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Links</h3>
                                <ul class="menu">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    {{-- <li><a href="{{ route('services') }}">Services</a> --}}
                                    <li><a href="{{ route('ad.lists') }}">Ad Listing</a></li>
                                    <li><a href="{{ route('pet-sitter') }}">Find a Pet Sitter</a></li>
                                    <li><a href="{{ route('house-sitter') }}">Find a House SIt</a></li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3>Support</h3>
                                <ul class="menu">
                                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                                    <li><a href="{{ route('terms.conditions') }}">Terms & Conditions</a></li>
                                    <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('register') }}">Register as Buyer</a></li>
                                    <li><a href="{{ route('sitter.register') }}">Register as Seller</a></li>
                                    <li><a href="{{ route('ad.create') }}">Post Ad</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3>Newsletter</h3>
                        <div class="desc">
                            <p>
                                Our newsletter helps you stay up-to-date with the latest drift.
                            </p>
                            <p>
                                Subscribe to receive the best pet tips and tricks from our experts.
                            </p>
                            <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                        </div>
                        <form id="subscribeForm" action="{{ route('subscribeNow') }}" method="POST">
                            @method('POST')
                            @csrf
                            <input type="email" name="email" placeholder="Enter your email address" required>
                            <input type="submit" value="Subscribe">
                            {{-- <button type="submit">Subscribe</button> --}}
                        </form>
                        <div id="subscribeMessage" style="color:#FFF"></div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            Copyright © 2024 <strong>Pet Lodger</strong>. Design & Developed by 
                            <a href="https://www.codogma.ae/" target="_blank"> CODOGMA</a>
                            <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- Scripts --}}
    <!-- <script src="js/vendor/modernizr-3.12.0.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>
    <script src="{{ asset('assets/js/jquery.js') }} "></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }} "></script>
    {{-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/library.js') }}"></script>
    <script src="https://gateway.sumup.com/gateway/ecom/card/v2/sdk.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#subscribeForm').submit(function(event) {
                event.preventDefault();

                // Get the form data
                var formData = $(this).serialize();

                // Make the Ajax request
                $.ajax({
                    type: 'POST',
                    url: '{{ route('subscribeNow') }}',
                    _token: '{{ csrf_token() }}', // Include CSRF token
                    data: formData,
                    success: function(response) {
                        // Display success message
                        $('#subscribeMessage').text(response.message);
                    },
                    error: function(error) {
                        // Display error message
                        $('#subscribeMessage').text(error.responseJSON.message);
                    }
                });
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
