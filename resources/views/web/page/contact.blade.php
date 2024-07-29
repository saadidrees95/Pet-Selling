@extends('web.layouts.app')

@section('content')
   {{-- Banner Start --}}
   <section class="abt-banner" style="background-image: url(assets/image/cta-banner.png);">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="headline">
                  <h1>Contact US</h1>
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- Banner Ends --}}

   {{-- Contact Starts --}}
   <section class="contact">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="desc">
                  <h2>Get in Touch</h2>
               </div>
                                {{-- Flash Message --}}
                     @if (session('success'))
                        <div class="alert alert-success">
                           {{ session('success') }}
                        </div>
                        @elseif (session('error'))
                          <div class="alert alert-danger">
                           {{ session('error') }}
                        </div>
                     @endif
               <!--<form action="" id="contact" method="POST" action="{{route('contact.submit')}}">-->
               <!--   @method('POST')-->
               <!--   @csrf-->
               <!--   <div class="row">-->
               <!--      <div class="col-md-12">-->
               <!--         <input type="text" name="name" placeholder="Name *" required>-->
               <!--         <input type="email" name="email" placeholder="Email" required>-->
               <!--         <input type="tel" name="mobile" placeholder="Phone number *" required>-->
               <!--         <select name="howFindUs" id="find" required>-->
               <!--            <option value="Option-1">How did you find us?</option>-->
               <!--            <option value="Option-2">How did you find us?</option>-->
               <!--            <option value="Option-3">How did you find us?</option>-->
               <!--            <option value="Option-4">How did you find us?</option>-->
               <!--            <option value="Option-5">How did you find us?</option>-->
               <!--         </select>-->
               <!--         <input type="submit" value="submit">-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</form>-->
               <div class="row">
                  <!--<div class="col-md-4">-->
                  <!--   <div class="main">-->
                  <!--      <div class="icon">-->
                  <!--         <img src="assets/image/phone-icon.png">-->
                  <!--      </div>-->
                  <!--      <div class="inner-desc">-->
                  <!--         <h4>Phone</h4>-->
                  <!--         <a href="tel:03 5432 1234">03 5432 1234</a>-->
                  <!--      </div>-->
                  <!--   </div>-->
                  <!--</div>-->
                  <!--<div class="col-md-4">-->
                  <!--   <div class="main">-->
                  <!--      <div class="icon">-->
                  <!--         <img src="assets/image/fax-icon.png">-->
                  <!--      </div>-->
                  <!--      <div class="inner-desc">-->
                  <!--         <h4>FAX</h4>-->
                  <!--         <a href="#">03 5432 1234</a>-->
                  <!--      </div>-->
                  <!--   </div>-->
                  <!--</div>-->
                  <div class="col-md-4">
                     <div class="main">
                        <div class="icon">
                           <img src="assets/image/email-icon.png">
                        </div>
                        <div class="inner-desc">
                           <h4>EMAIL</h4>
                           <a href="mailto:info@petlodger.co.uk">info@petlodger.co.uk</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9581874.19203155!2d-15.000813138693676!3d54.10344657823548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2s!4v1712184380966!5m2!1sen!2s" width="100%" height="650px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         </div>
      </div>
   </section>
   {{-- Contact 1 Ends --}}
@endsection