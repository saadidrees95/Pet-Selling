@extends('web.layouts.app')

@section('content')
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
   {{-- Landing Banner Ends  --}}
   
   {{-- Banner Start --}}
   <section class="abt-banner" >
     <div class="not-found">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="desc">
              <h1>House Sitter Lists</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, nostrum quisquam. Quaerat omnis voluptatum a enim aliquam sequi, at, totam placeat, tempora praesentium alias labore quo quibusdam excepturi. Enim, consequuntur.</p>
            </div>
          </div>
        </div>
      </div>
     </div>
     <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
   </section>
   {{-- Banner Ends --}}
@endsection   