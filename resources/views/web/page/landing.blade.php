<!doctype html>
{{-- lang --}}
<html class="no-js" lang="">
   <head>
      <meta charset="UTF-8">
      {{-- title --}}
      <title>{{ $pageTitle ?? '' }}</title>
      {{-- meta name --}}
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="theme-color" content="#fff">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
      {{-- meta property --}}
      <meta property="og:title" content="">
      <meta property="og:type" content="">
      <meta property="og:url" content="">
      <meta property="og:image" content="">
      {{-- links starts --}}
      <link rel="apple-touch-icon" href="{{asset('assets/png/icon.png')}}">
      {{-- stylesheet --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"/>
      <link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}"/>
      <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}"/>
      <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/pagination.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/checkout.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
      {{-- manifest --}}
      <link rel="manifest" href="{{asset('assets/site.webmanifest')}}">
   </head>
   <body>
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
                        <a href="{{route('home')}}">
                           <img src="{{asset('assets/image/site_logo.png')}}" >
                        </a>
                     </div>
                  </formobile>
                  <ul class="menu">
                     <li><a href="{{route('home')}}">Home</a></li>
                     <li><a href="{{route('about')}}">About Us</a></li>
                     <li><a href="{{route('services')}}">Services</a>
                        <ul>
                           <li><a href="{{route('day-cation')}}">Daycation</a></li>
                           <li><a href="{{route('cat-cation')}}">Catcation</a></li>
                           <li><a href="{{route('stay-cation')}}">Staycation </a></li>
                           <li><a href="{{route('drop-and-visit')}}">Drop n Visit</a></li>
                           <li><a href="{{route('house-sitting')}}">House Sitting</a></li>
                           <li><a href="{{route('dog-cation')}}">Dogcation</a></li>
                           <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                        </ul>
                     </li>
                     <li><a href="{{route('ad.lists')}}">Advertisement Listing</a></li>
                     <li><a href="#">Find Sitter</a>
                     <ul>
                         <li><a href="#">Find a Pet Sitter</a></li>
                          <li><a href="#">Find a House Sitter</a></li>
                     </ul>
                     </li>
                     <li><a href="{{route('contact')}}">Contact us</a></li>
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
                     <a href="{{route('welcome')}}">
                        <img src="{{asset('assets/image/site_logo.png')}}" >
                     </a>
                  </div>
               </div>
               <div class="col-md-10">
                  @if(Auth::check())
                     {{-- top bar --}}
                     <div class="top-head row">
                           <div class="col-md-2 main">
                              <div class="icon">
                                 <i class="fas fa-home"></i>
                              </div>
                              <div class="desc">
                                 @if(Auth::user()->role_id === 1)
                                 <span>Super Admin</span>
                                 <a href="{{route('admin.dashboard')}}">Dashboard</a>
                                 {{-- <a href="{{route('super.admin.dashboard')}}">Dashboard</a> --}}
                                 @elseif(Auth::user()->role_id === 2)
                                 <span>Sub Admin</span>
                                 <a href="{{route('admin.dashboard')}}">Dashboard</a>
                                 {{-- <a href="{{route('sub.admin.dashboard')}}">Dashboard</a> --}}
                                 @elseif(Auth::user()->role_id === 3)
                                 <span>Admin</span>
                                 <a href="{{route('admin.dashboard')}}">Dashboard</a>
                                 {{-- <a href="{{route('admin.dashboard')}}">Dashboard</a> --}}
                                 @elseif(Auth::user()->role_id === 4)
                                 <span>User</span>
                                 <a href="{{route('profile')}}">Dashboard</a>
                                 @elseif(Auth::user()->role_id === 5)
                                 <span>Sitter</span>
                                 <a href="{{route('sitter.profile')}}">Dashboard</a>
                                 @endif
                              </div>
                           </div>
                        <div class="col-md-3 main">
                           <div class="icon">
                              <i class="fas fa-phone-alt"></i>
                           </div>
                           <div class="desc">
                              <span>Quick Contact</span>
                              <a href="tel:000-000-0000">000-000-0000</a>
                           </div>
                        </div>
                        <div class="col-md-3 main">
                           <div class="icon">
                              <i class="fas fa-envelope"></i>
                           </div>
                           <div class="desc">
                              <span>Email Us </span>
                              <a href="mailto:info@petlodger.co.uk">info@petlodger.co.uk</a>
                              <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
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
                        <div class="col-md-2 top-btns">
                           <li class="dropbtn dropdown top-button-3"><a href="{{ route('logout') }}">{{ __('Sign Out') }}</a></li>
                        </div>
                     </div>
                     {{-- top bar end --}}
                  @elseif(!Auth::check()) 
                     {{-- top bar start--}}
                     <div class="top-head row">
                        <div class="col-md-3 main">
                           <div class="icon">
                              <i class="fas fa-phone-alt"></i>
                           </div>
                           <div class="desc">
                              <span>Quick Contact</span>
                              <a href="tel:000-000-0000">000-000-0000</a>
                           </div>
                        </div>
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
                           <li class="dropbtn dropdown top-button-1"><a href="{{ route('pre-signup') }}">{{ __('Sign Up') }}</a></li>
                           <li class="dropbtn dropdown top-button-2"><a href="{{ route('login') }}">{{ __('Sign In') }}</a></li>
                        </div>
                     </div>   
                     {{-- top bar end --}}
                  @endif
                     {{-- Main Menu Start --}}
                     <div class="bottom-head row">
                        <div class="col-md-12 p-0">
                           <ul class="menu ">
                              <li><a href="{{route('home')}}">Home</a></li>
                              <li><a href="{{route('about')}}">About Us</a></li>
                              <li class="dropbtn dropdown"><a href="{{route('services')}}">Services</a>
                                 <ul  class="dropdown-content">
                                 <li><a href="{{route('day-cation')}}">Daycation</a></li>
                                 <li><a href="{{route('cat-cation')}}">Catcation</a></li>
                                 <li><a href="{{route('stay-cation')}}">Staycation </a></li>
                                 <li><a href="{{route('drop-and-visit')}}">Drop n Visit</a></li>
                                 <li><a href="{{route('house-sitting')}}">House Sitting</a></li>
                                 <li><a href="{{route('dog-cation')}}">Dogcation</a></li>
                                 <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                                 </ul>
                              </li>
                           <li><a href="{{route('ad.lists')}}">Job Search</a></li>
                           <li><a href="{{route('package.lists')}}">Package</a></li>
                           <li><a href="{{route('contact')}}">Contact us</a></li>
                           </ul>
                        {{-- <div class="quote">
                              @if(Auth::check())
                                 <li class="dropbtn dropdown"><a href="{{ route('logout') }}">{{ __('Sign Out') }}</a></li>
                              @else
                                 <a href="{{ route('login') }}">{{ __('Sign In') }}</a>
                              @endif
                           </div> --}}
                           <div class="quote">
                              <li class="dropbtn dropdown"><a href="{{route('ad.create')}}">{{ __('POST AN AD') }}</a></li>
                           </div>
                        </div>
                     </div>
                     {{-- Main Menu Ends --}}
               </div>
            </div>
         </div>
      </header>
   {{-- Landing Banner Starts --}}
   <section class="landing-banner" style="background: url(assets/image/landing-banner.png) no-repeat;">
      <div class="container">
         <div class="row">
            <div class="col-md-5">
               <form action="" id="landing-form">
                  <div class="row">
                     <div class="col-md-12">
                        <h4>Reliable care, wagging tails guaranteed!</h4>
                        <p>Our mission is to provide unwavering care, attention, and companionship to all pets entrusted to us. We understand that every pet is unique, with their own needs, preferences, and personalities.</p>
                        <label>Name</label>
                        <input type="text">
                        <label>Email</label>
                        <input type="email">
                        <label>Phone</label>
                        <input type="tel">
                        <input type="submit" value="submit">
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-md-7"></div>
         </div>
      </div>
   </section>
   {{-- Landing Banner Ends --}}
   
   {{-- Landing Section 1 Starts --}}
   <section class="landing-1">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="desc">
                  <h4>welcome to</h4>
                  <h2>Pet lodger</h2>
                  <p>Our team of dedicated pet caregivers is committed to building lasting relationships with both pets and their owners. We believe that every wagging tail, every excited purr, and every trusting glance speaks volumes about the trust our clients place in us.
                  </p>
                  <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
               </div>
               <div class="headline">
                  <h3>Elevating Pet Care Where Your Furry Friends Find Home Comfort.</h3>
               </div>
               <div class="main">
                  <div class="icon">
                     <img src="assets/image/checkmark.png" alt="">
                  </div>
                  <div class="desc-2">
                     <h5>Unleashing Joy</h5>
                     <p>Tailored Walks for Every Pawsitive Energy.</p>
                  </div>
               </div>
               <div class="main">
                  <div class="icon">
                     <img src="assets/image/checkmark.png" alt="">
                  </div>
                  <div class="desc-2">
                     <h5>Caring Beyond Limits</h5>
                     <p>Specialized Attention for Special Pets.</p>
                     <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                  </div>
               </div>
               <div class="main">
                  <div class="icon">
                     <img src="assets/image/checkmark.png" alt="">
                  </div>
                  <div class="desc-2">
                     <h5>Capturing Moments, Delivering Peace:</h5>
                     <p>Updates that Soothe Pet Owners.</p>
                  </div>
               </div>
               <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
            </div>
         </div>
      </div>
   </section>
   {{-- Landing Section 1 Ends --}}

   {{-- Section 2 Starts --}}
   <section class="section_2 landing-ser">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="desc">
                  <h3>Our services</h3>
                  <h2>Services We Offer</h2>
                  <p>From one night to multiple nights. Staying overnight in the client's home to provide continuous care, attention,and security for pets. This includes:</p>
               </div>
            </div>
            <!-- Services Box -->
            <div class="col-md-4">
               <div class="main">
                  <div class="pic">
                     <img src="assets/image/landing-ser-1.png" alt="">
                  </div>
                  <div class="title">
                     <h4>Home Care Services</h4>
                  </div>
                  <div class="desc-2">
                     <p>Collecting mail, watering plants, rotating lights, and other basic home care tasks to give the appearance of an occupied home.</p>
                     <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                  </div>
                  <div class="more">
                     <a href="services.html">Read More</a>
                  </div>
               </div>
            </div>
            <!-- Services Box -->
            <div class="col-md-4">
               <div class="main">
                  <div class="pic">
                     <img src="assets/image/landing-ser-2.png" alt="">
                  </div>
                  <div class="title">
                     <h4>Dog Walking</h4>
                  </div>
                  <div class="desc-2">
                     <p>Regular walks tailored to each dog's energy level and size. Exercise, outdoor exploration, and socialization to keep dogs healthy and happy</p>
                  </div>
                  <div class="more">
                     <a href="#">Read More</a>
                  </div>
               </div>
            </div>
            <!-- Services Box -->
            <div class="col-md-4">
               <div class="main">
                  <div class="pic">
                     <img src="assets/image/landing-ser-3.png" alt="">
                  </div>
                  <div class="title">
                     <h4>Special Needs Care</h4>
                  </div>
                  <div class="desc-2">
                     <p>Catering to pets with special needs, such as senior pets or those with medical conditions, with extra attention and care</p>
                  </div>
                  <div class="more">
                     <a href="#">Read More</a>
                  </div>
               </div>
            </div>
            <!-- Services Box -->
            <div class="col-md-4">
               <div class="main">
                  <div class="pic">
                     <img src="assets/image/landing-ser-4.png" alt="">
                  </div>
                  <div class="title">
                     <h4>Updates and Communication</h4>
                  </div>
                  <div class="desc-2">
                     <p>Providing regular updates to clients about their pets, including photos and videos, to offer peace of mind.</p>
                  </div>
                  <div class="more">
                     <a href="#">Read More</a>
                  </div>
               </div>
            </div>
            <!-- Services Box -->
            <div class="col-md-4">
               <div class="main">
                  <div class="pic">
                     <img src="assets/image/landing-ser-5.png" alt="">
                  </div>
                  <div class="title">
                     <h4>Feeding and Medication</h4>
                  </div>
                  <div class="desc-2">
                     <p>Ensuring pets receive their meals on schedule and any required medications are administered accurately.</p>
                  </div>
                  <div class="more">
                     <a href="#">Read More</a>
                  </div>
               </div>
            </div>
            <!-- Services Box -->
            <div class="col-md-4">
               <div class="main">
                  <div class="pic">
                     <img src="assets/image/landing-ser-6.png" alt="">
                  </div>
                  <div class="title">
                     <h4>Litter Box Cleaning</h4>
                  </div>
                  <div class="desc-2">
                     <p>Regular cleaning and maintenance of litter boxes for cats.</p>
                  </div>
                  <div class="more">
                     <a href="#">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- Section 2 Ends --}}

   {{-- Section 3 Starts --}}
   <section class="section_3" style="background-image: url(assets/image/s3-bg.jpg);">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="desc">
                  <h2>Where pets feel loved and cherished,even when you're away!</h2>
               </div>
               <div class="more">
                  <ul>
                     <li>
                         <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                        <a href="#">Free consultation</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="ab-pic">
         <img src="assets/image/s3-img.png">
      </div>
   </section>
   {{-- Section 3 Ends --}}

   {{-- Section 1 Starts --}}
   <section class="section_1 landing-about">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="desc desc-2">
                  <h3>WHO WE ARE</h3>
                  <h2>We’re here from the beginning to the end</h2>
                  <p>From daily walks to cozy cuddles, from playtime to administering medications, our comprehensive range of services is designed to cater to the diverse needs of pets across the board. Whether it's a boisterous dog, a curious cat, a chirpy parrot, or any other beloved pet, we promise to treat them with the same care and affection as you would yourself.</p>
                  <p>Our mission is clear: to be there when you can't, to ensure your pets are not just cared for, but cherished. With Pet Lodger Reliable Care Pet Sitting, you can rest assured that your pets are in capable, loving hands, receiving the individualized attention they deserve. Let us be the extension of your love and care, and together, we'll continue to create wagging tails and happy memories, guaranteed</p>
                  <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
               </div>
            </div>
            <div class="col-md-6 pic-head">
               <div class="pic pic-1">
                  <img src="assets/image/s1-img-1.jpg">
               </div>
               <div class="pic pic-2">
                  <img src="assets/image/s1-img-2.jpg">
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- Section 1 Ends --}}

   {{-- Section 5 Starts --}}
   <section class="section_5">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="headline">
                  <h2>Testimonials</h2>
               </div>
               <div class="testimonial-slider">
                  <div class="loop">
                     <div class="main">
                        <div class="desc">
                           <p>I was looking for a pet sitter to watch my dog while I was out of town for a week, and I found Petlodger online. I was able to easily search for sitters in my area and read their profiles, which included information about their experience, qualifications, and rates. I ended up booking with a sitter named Maria who had great reviews and seemed like a perfect fit for my dog.</p>
                           <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                        </div>
                        <div class="pic">
                           <img src="assets/image/tb4.png" alt="">
                        </div>
                        <div class="title">
                           <h4>Oliver</h4>
                        </div>
                        <div class="sub-title">
                           <h5>Pet Owner</h5>
                        </div>
                     </div>
                  </div>
                  <div class="loop">
                     <div class="main">
                        <div class="desc">
                           <p>I was so nervous about leaving my cat with a pet sitter for the first time, but Petlodger made the whole process so easy. I was able to easily search for sitters in my area who were available on the dates I needed, and I read through their profiles to find someone who seemed like a good fit for my cat.</p>
                           <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                        </div>
                        <div class="pic">
                           <img src="assets/image/t1.png" alt="">
                        </div>
                        <div class="title">
                           <h4>Emma Wilson</h4>
                        </div>
                        <div class="sub-title">
                           <h5>Pet Owner</h5>
                        </div>
                     </div>
                  </div>
                  <div class="loop">
                     <div class="main">
                        <div class="desc">
                           <p>I was looking for a pet sitter to watch my bearded dragon while I was out of town for a weekend, and I found Petlodger online. I was able to easily search for sitters in my area who were experienced with reptiles, and I read through their profiles to find someone who seemed like a good fit for my bearded dragon.</p>
                        </div>
                        <div class="pic">
                           <img src="assets/image/t2.png" alt="">
                        </div>
                        <div class="title">
                           <h4>Isabella</h4>
                        </div>
                        <div class="sub-title">
                           <h5>Pet Owner</h5>
                        </div>
                     </div>
                  </div>
                  <div class="loop">
                     <div class="main">
                        <div class="desc">
                           <p>Belinda arranged for her colleague to pet and house sit our puppy. I thought the whole experience was very special. They clearly are very experienced with dogs and sticking to routines . Our and house was left immaculate, plants watered and grass cut. We felt totally at ease and enjoyed our 11 day break reading the daily updates we got about our baby boy! Highly recommend Belinda’s Pet and House sitting company . Thanks.</p>
                           <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                        </div>
                        <div class="pic">
                           <img src="assets/image/t3.png" alt="">
                        </div>
                        <div class="title">
                           <h4>Anna Sawford</h4>
                        </div>
                        <div class="sub-title">
                           <h5>Pet Owner</h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- Section 5 Ends --}}
 {{-- Footer --}}
      <footer class="site_footer">
         <div class="container">
            <div class="top-footer">
               <div class="row">
                  <div class="col-md-4 main">
                     <div class="icon">
                        <i class="fas fa-phone-alt"></i>
                     </div>
                     <div class="desc">
                        <span>Phone </span>
                        <a href="tel:(00)-123-456-654">(00)-123-456-654</a>
                     </div>
                  </div>
                  <div class="col-md-4 main">
                     <div class="icon">
                        <i class="fas fa-envelope"></i>
                     </div>
                     <div class="desc">
                        <span>Email Us </span>
                        <a href="mailto:info@petlodger.co.uk">info@petlodger.co.uk</a>
                        <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                     </div>
                  </div>
                  <div class="col-md-4 main">
                     <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                     </div>
                     <div class="desc">
                        <span>Location: </span>
                        <p>Abc street, 123 street xyz avenue, city, USA.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-middle">
               <div class="row">
                  <div class="col-md-3">
                     <h3>About us</h3>
                     <div class="desc">
                        <p>This is dummy copy. It is not meant to be read. It has been placed here solely to demonstrate the look.This is dummy copy. It is not meant to be read. </p>
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
                     </ul>
                  </div>
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-6">
                           <h3>Links</h3>
                           <ul class="menu">
                              <li><a href="{{route('home')}}">Home</a></li>
                              <li><a href="{{route('about')}}">About Us</a></li>
                              <li><a href="{{route('services')}}">Services</a>
                              <li><a href="{{route('ad.lists')}}">Advertisement Listing</a></li>
                              <li><a href="{{route('pet-sitter')}}">Find a Pet Sitter</a></li>
                              <li><a href="{{route('house-sitter')}}">Find a House SIt</a></li>
                              <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                              
                           </ul>
                        </div>
                        <div class="col-md-6">
                           <h3>Support</h3>
                           <ul class="menu">
                              <li><a href="{{route('contact')}}">Contact us</a></li>
                              <li><a href="{{route('terms.conditions')}}">Terms & Conditions</a></li>
                              <li><a href="{{route('privacy.policy')}}">Privacy Policy</a></li>
                              <li><a href="{{route('register')}}">Register</a></li>
                              <li><a href="{{route('sitter.register')}}">Become a Sitter</a></li>
                               <li><a href="{{route('ad.create')}}">Post Ad</a></li>
                               <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <h3>Newsletter</h3>
                     <div class="desc">
                        <p>This is dummy copy. It is not meant to be read. It has been placed here solely to the look.</p>
                     </div>
                     <form action="">
                        <input type="email" placeholder="Enter your email address">
                        <input type="submit" value="Subscribe">
                     </form>
                  </div>
               </div>
            </div>
            <div class="footer-bottom">
               <div class="row">
                  <div class="col-md-12">
                     <p>Copyright © 2023 <strong>Pet Lodger</strong>. Design & Developed by <a href="https://www.codogma.ae/" target="_blank"> CODOGMA</a><a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;"> Probdone </a></p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      {{-- Scripts --}}
      <!-- <script src="js/vendor/modernizr-3.12.0.min.js"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>
      <script src="{{asset('assets/js/jquery.js')}} "></script>
      <script src="{{asset('assets/js/slick.min.js')}}"></script>
      <script src="{{asset('assets/js/main.js')}} "></script>
      <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js/library.js')}}"></script>
   </body>
</html>