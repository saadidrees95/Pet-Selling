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
         <div class="row">
            <div class="col-md-6">
               <div class="pic">
                  <img src="{{asset('assets/image/serr-1.png')}}" alt="">
               </div>
            </div>
            <div class="col-md-6">
               <div class="desc">
                  <h4>Daycation</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="pic">
                  <img src="{{asset('assets/image/serr-2.png')}}" alt="">
               </div>
            </div>
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
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="pic">
                  <img src="{{asset('assets/image/serr-3.png')}}" alt="">
               </div>
            </div>
            <div class="col-md-6">
               <div class="desc">
                  <h4>Dogcation</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="pic">
                  <img src="{{asset('assets/image/serr-4.png')}}" alt="">
               </div>
            </div>
            <div class="col-md-6">
               <div class="desc">
                  <h4>Drop and Visit</h4>
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
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="pic">
                  <img src="{{asset('assets/image/serr-5.png')}}" alt="">
               </div>
            </div>
            <div class="col-md-6">
               <div class="desc">
                  <h4>House Sitting</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="pic">
                  <img src="{{asset('assets/image/serr-6.png')}}" alt="">
               </div>
            </div>
            <div class="col-md-6">
               <div class="desc">
                  <h4>Staycation</h4>
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
         </div>
      </div>
   </section>
   {{-- Services Ends --}}
@endsection