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
                           <li><a href="{{route('daycation')}}">Daycation</a></li>
                           <li><a href="{{route('catcation')}}">Catcation</a></li>
                           <li><a href="{{route('staycation')}}">Staycation </a></li>
                           <li><a href="{{route('drop.visit')}}">Drop n Visit</a></li>
                           <li><a href="{{route('housesitting')}}">House Sitting</a></li>
                           <li><a href="{{route('dogcation')}}">Dogcation</a></li>
                        </ul>
                     </li>
                     <li><a href="{{route('petsitter.list')}}">Find a Pet Sitter</a></li>
                     <li><a href="{{route('housesitter.list')}}">Find a House SIt</a></li>
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
                     <div class="col-md-3 social">
                        <ul>
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
                  </div>
                  <div class="bottom-head row">
                     <div class="col-md-12 p-0">
                        <ul class="menu ">
                           <li><a href="{{route('home')}}">Home</a></li>
                           <li><a href="{{route('about')}}">About Us</a></li>
                           <li class="dropbtn dropdown"><a href="{{route('services')}}">Services</a>
                              <ul  class="dropdown-content">
                              <li><a href="{{route('daycation')}}">Daycation</a></li>
                              <li><a href="{{route('catcation')}}">Catcation</a></li>
                              <li><a href="{{route('staycation')}}">Staycation </a></li>
                              <li><a href="{{route('drop.visit')}}">Drop n Visit</a></li>
                              <li><a href="{{route('housesitting')}}">House Sitting</a></li>
                              <li><a href="{{route('dogcation')}}">Dogcation</a></li>
                              </ul>
                           </li>
                           <li><a href="{{route('petsitter.list')}}">Find a Pet Sitter</a></li>
                        <li><a href="{{route('housesitter.list')}}">Find a House SIt</a></li>
                        {{-- <li><a href="{{route('package')}}">Package</a></li> --}}
                        <li><a href="{{route('contact')}}">Contact us</a></li>
                        </ul>
                        <div class="quote">
                           @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                 {{ session('status') }}
                              </div>
                                 <a href="{{route('logout')}}">{{ __('Logout') }}</a>
                           @else
                             <a href="{{route('login')}}">Sign In</a>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
   <!-- ================================ Header Ends ================================  -->
   <!-- ================================ Seller Section Starts ================================  -->
      <section class="abtseller-1">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="pic">
                     <img src="{{asset('assets/image/seller-about.png')}}">
                  </div>
                  <div class="reviews-rating">
                     <h2>Reviews & Rating</h2>`
                     <div class="row">
                        <div class="col-md-4">
                           <h1 class="rate">4.8</h1>
                           <div class="starts">
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                           </div>
                           <div class="count"><p>129 Reviews</p></div>
                        </div>
                        <div class="col-md-8">
                           <div class="progress-head">
                              <ul>
                                 <li>5</li>
                                 <li>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                              <ul>
                                 <li><span>4</span></li>
                                 <li>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                              <ul>
                                 <li>
                                    <span>3</span>
                                 </li>
                                 <li>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                              <ul>
                                 <li><span>2</span></li>
                                 <li>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                              <ul>
                                 <li><span>1</span></li>
                                 <li>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="25%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="reviews-list">
                     <div class="main">
                        <div class="pic">
                           <img src="{{asset('assets/image/user-1.png')}}">
                        </div>
                        <div class="title">
                           <h4>Cecilia</h4>
                           <div class="star">
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                           </div>
                        </div>
                        <div class="content">
                           <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae..</p>
                           <a href="#">Read more</a>
                           <div class="det">
                              <p>Biddenden, United Kingdom · 18 Jul - 29 Jul 2023</p>
                           </div>
                        </div>
                     </div>
                     <div class="main">
                        <div class="pic">
                           <img src="{{asset('assets/image/user-2.png')}}">
                        </div>
                        <div class="title">
                           <h4>Joe</h4>
                           <div class="star">
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                           </div>
                        </div>
                        <div class="content">
                           <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae..</p>
                           <a href="#">Read more</a>
                           <div class="det">
                              <p>Biddenden, United Kingdom · 18 Jul - 29 Jul 2023</p>
                           </div>
                        </div>
                     </div>
                     <div class="main">
                        <div class="pic">
                           <img src="{{asset('assets/image/user-3.png')}}">
                        </div>
                        <div class="title">
                           <h4>Jerry</h4>
                           <div class="star">
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                           </div>
                        </div>
                        <div class="content">
                           <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae..</p>
                           <a href="#">Read more</a>
                           <div class="det">
                              <p>Biddenden, United Kingdom · 18 Jul - 29 Jul 2023</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <nav aria-label="Page navigation example">
                     <ul class="pagination">
                       <li class="page-item">
                         <a class="page-link" href="#" aria-label="Previous">
                           <span aria-hidden="true">&laquo;</span>
                           <span class="sr-only">Previous</span>
                         </a>
                       </li>
                       <li class="page-item"><a class="page-link" href="#">1</a></li>
                       <li class="page-item"><a class="page-link" href="#">2</a></li>
                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                       <li class="page-item">
                         <a class="page-link" href="#" aria-label="Next">
                           <span aria-hidden="true">&raquo;</span>
                           <span class="sr-only">Next</span>
                         </a>
                       </li>
                     </ul>
                   </nav>
               </div>
               <div class="col-md-6">
                  <div class="title">
                     <h4>Melisa Adams</h4>
                  </div>
                  <div class="desc">
                     <p>Fully vaccinated, experienced and trustworthy sitter who loves pets and travel</p>
                  </div>
                  <div class="reviews">
                     <h3>Reviews <span> (129)</span></h3>
                     <div class="starts">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                     </div>
                     <div class="list">
                        <ul>
                           <li> <i class="fa fa-check" aria-hidden="true"></i> Email verified</li>
                           <li> <i class="fa fa-check" aria-hidden="true"></i> Phone verified</li>
                           {{-- <li> <i class="fa fa-check" aria-hidden="true"></i> ID verified</li>
                           <li> <i class="fa fa-check" aria-hidden="true"></i> 25 external references</li> --}}
                        </ul>
                     </div>
                  </div>
                  <div class="about">
                     <h5>About Me</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scel<span id="dots">...</span><span id="more">erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span></p>
                     <button onclick="myFunction()" id="myBtn">Read more</button>
                  </div>
                  <div class="hire">
                     <a href="#rate-seller">Hire Me</a>
                  </div>
                  <div class="rate-seler">
                     <div class="row">
                        <div class="col-md-6">
                           <h2>Rate this saller</h2>
                           <div class="rate">
                              <input type="radio" id="star5" name="rate" value="5" />
                              <label for="star5" title="text">5 stars</label>
                              <input type="radio" id="star4" name="rate" value="4" />
                              <label for="star4" title="text">4 stars</label>
                              <input type="radio" id="star3" name="rate" value="3" />
                              <label for="star3" title="text">3 stars</label>
                              <input type="radio" id="star2" name="rate" value="2" />
                              <label for="star2" title="text">2 stars</label>
                              <input type="radio" id="star1" name="rate" value="1" />
                              <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <small class="text-right">Rating & Reviews are verified</small>
                        </div>

                        <div class="col-md-12">
                           <form id="rate-seller">
                              <div class="row">
                                 <div class="col-md-12">
                                 </div>
                                 <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" placeholder="Jonathan tan">
                                 </div>
                                 <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="email" placeholder="jonathan@gmail.com">
                                 </div>
                                 <div class="col-md-12">
                                    <label>Contact Number</label>
                                    <input type="tel" placeholder="000-1234-465">
                                    <label>Write a Review</label>
                                    <textarea name="" id="" cols="30" rows="1" placeholder="Describe your experiance"></textarea>
                                    <input type="submit" value="Hire Me">
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      {{-- Seller Section Ends --}}



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
                              <li><a href="{{route('ads.listing')}}">Ads Listing</a></li>
                              <li><a href="{{route('petsitter.list')}}">Find a Pet Sitter</a></li>
                              <li><a href="{{route('housesitter.list')}}">Find a House SIt</a></li>

                           </ul>
                        </div>
                        <div class="col-md-6">
                           <h3>Support</h3>
                           <ul class="menu">
                              <li><a href="{{route('contact')}}">Contact us</a></li>
                              <li><a href="{{route('terms.conditions')}}">Terms & Conditions</a></li>
                              <li><a href="{{route('privacy.policy')}}">Privacy Policy</a></li>
                              <li><a href="{{route('register')}}">Register as Buyer</a></li>
                              <li><a href="{{route('register.seller')}}">Register as Seller</a></li>
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
                     <p>Copyright © 2023 <strong>Pet Lodger</strong>. Design & Developed by <a href="https://www.codogma.ae/" target="_blank"> CODOGMA</a></p>
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
