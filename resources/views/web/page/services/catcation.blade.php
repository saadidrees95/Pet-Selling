@extends('web.layouts.app')

@section('content')
   {{-- Services Banner Starts --}}
   <section class="abt-banner" style="background-image: url({{asset('assets/image/services-banner.png')}});">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="headline">
                  <h1>Our Services</h1>
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- Services Banner Ends --}}

   {{-- Services Starts --}}
   <section class="about-1 services-1">
      <div class="container">
         {{-- Catcation Service --}}
         <div class="row">
            <div class="col-md-6">
               <div class="desc">
                  <h4>Catcation</h4>
                  <ul>
                     <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem </li>
                     <li>accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab ill</li>
                     <li> inventore veritatis et quasi architecto beatae vitae dicta sunt </li>
                     <li>explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit</li>
                     <li> aut fugit, sed quia consequuntur magni dolores eos qui ratione </li>
                     <li>voluptatem sequi nesciunt. Neque porro quisquam est.</li>
                  </ul>
               </div>
            </div>
            <div class="col-md-6">
               <div class="pic">
                  <img src="{{asset('assets/image/serr-2.png')}}" alt="">
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- Services Ends --}}
@endsection