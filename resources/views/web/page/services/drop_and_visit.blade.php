@extends('web.layouts.app')

@section('content')
   {{-- Services Banner Starts --}}
   <section class="abt-banner" style="background-image: url({{asset('assets/image/services-banner.png')}});">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="headline">
                  <h1>At Own House </h1>
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- Services Banner Ends --}}

   {{-- Services Starts --}}
   <section class="about-1 services-1">
      <div class="container">
         {{-- Drop & Visit Services --}}
         <div class="row">
            <div class="col-md-6">
               <div class="desc">
                  <h4>Best Pet Sitting Services in United Kingdom – Pet Lodger</h4>
                    <p>We are a pet-sitting service that helps UK pet owners find trustworthy pet sitters. Our pet sitter ensures that your pet stays happy and your house stays secure. Our service is transparent—we connect you with the top sitters in the UK. Our pet sitters take care of your pets and homes. We offer a safe service supported by our customer support team. We are focused on pet sitting, including dog sitting, cat sitting, and all other pets. We provide the best services in the United Kingdom with top-notch security and support. </p>
                    <p>Your pets feel safest and happiest in their own home, where everything is familiar to them. Any vet will tell you the same.<a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a> Even the fanciest boarding places can't compare to the comfort of their own space and can be costly. With a pet sitter from Pet Lodger, your pets get loving care at home, less than you might think. Having a sitter is the best choice if you're leaving your pets. Having someone in the house keeps your pets company, ensures security, and can handle emergencies like storms or other pet issues. Plus, you can reach out to your sitter anytime for updates on your pets or to remind them of any tasks, which gives you a real peace of mind.</p>
                    <!--<ul>-->
                  <!--   <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem </li>-->
                  <!--   <li>accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab ill</li>-->
                  <!--   <li> inventore veritatis et quasi architecto beatae vitae dicta sunt </li>-->
                  <!--   <li>explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit</li>-->
                  <!--   <li> aut fugit, sed quia consequuntur magni dolores eos qui ratione </li>-->
                  <!--   <li>voluptatem sequi nesciunt. Neque porro quisquam est.</li>-->
                  <!--</ul>-->
               </div>
            </div>
             <div class="col-md-6">
               <div class="pic">
                  <img src="{{asset('assets/image/serr-4.png')}}" alt="">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="desc">
                   <p>Joining is free, and you can easily find best sitter to care for your pets, house, and garden. Our amazing, ID-verified sitters and genuine reviews build trust between us. Join us, place your ad, and connect with sitters—it's simple, safe, and fast. Our messaging system is secure, and our tools make everything easy. Booking a sitter lets you plan confidently, knowing your pets are safe at home, where they're happiest. Boarding facilities can't beat the comfort of home, and they're pricey. A house sitter offers, loving care for your pets in their own environment. When you're away, get your pets a sitter—you will be satisfied with our service. Join our amazing community now.</p>
                   <p>With plenty of trustworthy pet sitters available and accommodating customer service, this is your go-to place for pet-sitting services <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>in the UK. Our service helps you save loads of money, and the pets are much happier. Our service is super easy to use, and our unmatched customer support is something we're proud of. At Pet Lodger, you'll find a warm, welcoming atmosphere that shines through in our sitters. You can browse all our listings for free. Our support team is always quick and friendly, and the results speak for themselves. Just check out our reviews to see how much other individuals love us! Take a look at our services and start dreaming about your next adventure. And when you're ready, jump right in - it's easier than you think.</p>
                  
               </div>
            </div>
        </div>
      </div>
   </section>
   {{-- Services Ends --}}
@endsection