@extends('web.layouts.app')

@section('content')
   {{-- Services Banner Starts --}}
   <section class="abt-banner" style="background-image: url({{asset('assets/image/services-banner.png')}});">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="headline">
                  <h1>At Carer's House</h1>
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
                  <h4>Find a Best House and Pet Sitters in UK – Pets Lodger</h4>
                  <p>A pet sitter plays a crucial role in ensuring the well-being and happiness of your pets by attending to their needs, maintaining their routines, and showering them with love and attention. Many people are concerned about the safety and security of their houses when they are away. But they also want their pets to be in loving care. Rather than dropping off your pets at a relative's, we now offer the service of pet sitting at the Carer's house in Lancashire.</p>
                  <p>Our pet sitters come from various walks of life. Our pet-sitting agreement helps sort out care details for pets and the house and sorts out any confusion that might occur. You can talk out the details with our pet sitter beforehand.</p>
                  <p>Finding a pet sitter in Lancashire is super easy. Brits love their pets, so there are always folks needing trustworthy sitters. At Pet Lodger, we offer a safe and fun platform for pet<a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a> sitting at the Carer's home in Lancashire. Our website is user-friendly to use for both owners and sitters. Pet sitting is great for pets because they get to stay in a pet-friendly environment with love and attention.</p>
               
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
                <div class="desc">
                    <p>Pet Lodger is an amazing place for pet sitting. We help thousands of pet owners find great sits. Join our amazing community and get alerts for new sitters and sitting opportunities as soon as they're posted. Our messaging system is safe and secure. Pet Lodger is open and friendly, and you can view opportunities without joining.</p>
                    <p>Find caring pet, dog, and house sitters ready to care for your home, pets, and garden. Pets get loving care at Carer's home in Lancashire. This service will be available in other parts of the UK soon. Our Sitters are reliable and ID-verified. At Pet Lodger, for pet owners joining and placing a pet advertisement is free! You can stay safe with our secure in-house messaging. Pet Lodger is the UK's most trusted pet-sitting site, offering top-notch security, support, and service.</p>
                    <p>Signing up is free, and find a best sitter services to look after your pets, house, and garden is a breeze. Our fantastic sitters, who are<a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a> verified and have received genuine reviews, help build trust in our service. Join us, post your ad, and connect with sitters—it's easy, safe, and quick. Booking a sitter lets you plan confidently, knowing your pets are happy and safe. You can also contact your sitter any time and see your pets on camera. A pet sitter provides loving care for your pets in a pet-friendly environment. When you're away, choosing a pet sitter ensures peace of mind. Join our wonderful community today!</p>
                    
                </div>
            </div>
         </div>
         <!--<div class="row">-->
         <!--   <div class="col-md-6">-->
         <!--      <div class="pic">-->
         <!--         <img src="{{asset('assets/image/serr-2.png')}}" alt="">-->
         <!--      </div>-->
         <!--   </div>-->
         <!--   <div class="col-md-6">-->
         <!--      <div class="desc">-->
         <!--         <h4>Catcation</h4>-->
         <!--         <ul>-->
         <!--            <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem </li>-->
         <!--            <li>accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab ill</li>-->
         <!--            <li> inventore veritatis et quasi architecto beatae vitae dicta sunt </li>-->
         <!--            <li>explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit</li>-->
         <!--            <li> aut fugit, sed quia consequuntur magni dolores eos qui ratione </li>-->
         <!--            <li>voluptatem sequi nesciunt. Neque porro quisquam est.</li>-->
         <!--         </ul>-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
         <!--<div class="row">-->
         <!--   <div class="col-md-6">-->
         <!--      <div class="pic">-->
         <!--         <img src="{{asset('assets/image/serr-3.png')}}" alt="">-->
         <!--      </div>-->
         <!--   </div>-->
         <!--   <div class="col-md-6">-->
         <!--      <div class="desc">-->
         <!--         <h4>Dogcation</h4>-->
         <!--         <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
         <!--<div class="row">-->
         <!--   <div class="col-md-6">-->
         <!--      <div class="pic">-->
         <!--         <img src="{{asset('assets/image/serr-4.png')}}" alt="">-->
         <!--      </div>-->
         <!--   </div>-->
         <!--   <div class="col-md-6">-->
         <!--      <div class="desc">-->
         <!--         <h4>Drop and Visit</h4>-->
         <!--         <ul>-->
         <!--            <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem </li>-->
         <!--            <li>accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab ill</li>-->
         <!--            <li> inventore veritatis et quasi architecto beatae vitae dicta sunt </li>-->
         <!--            <li>explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit</li>-->
         <!--            <li> aut fugit, sed quia consequuntur magni dolores eos qui ratione </li>-->
         <!--            <li>voluptatem sequi nesciunt. Neque porro quisquam est.</li>-->
         <!--         </ul>-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
         <!--<div class="row">-->
         <!--   <div class="col-md-6">-->
         <!--      <div class="pic">-->
         <!--         <img src="{{asset('assets/image/serr-5.png')}}" alt="">-->
         <!--      </div>-->
         <!--   </div>-->
         <!--   <div class="col-md-6">-->
         <!--      <div class="desc">-->
         <!--         <h4>House Sitting</h4>-->
         <!--         <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
         <!--<div class="row">-->
         <!--   <div class="col-md-6">-->
         <!--      <div class="pic">-->
         <!--         <img src="{{asset('assets/image/serr-6.png')}}" alt="">-->
         <!--      </div>-->
         <!--   </div>-->
         <!--   <div class="col-md-6">-->
         <!--      <div class="desc">-->
         <!--         <h4>Staycation</h4>-->
         <!--         <ul>-->
         <!--            <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem </li>-->
         <!--            <li>accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab ill</li>-->
         <!--            <li> inventore veritatis et quasi architecto beatae vitae dicta sunt </li>-->
         <!--            <li>explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit</li>-->
         <!--            <li> aut fugit, sed quia consequuntur magni dolores eos qui ratione </li>-->
         <!--            <li>voluptatem sequi nesciunt. Neque porro quisquam est.</li>-->
         <!--         </ul>-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
      </div>
   </section>
   {{-- Services Ends --}}
@endsection