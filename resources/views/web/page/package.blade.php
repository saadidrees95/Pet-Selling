@extends('web.layouts.app')

@section('content')   
<style>

 form input[type="submit"].buy_package {

      display: block;
      text-align: center;
      margin: 20px auto;
      padding: 20px 50px;
      border-radius: 0px 20px;
      background: #62C5D3;
      color: #fff;
      /* with: 100%; */

   }
   .package-1 .package-box-0 {
      border-radius: 0px 0px 0px 80px;
      /* background: #3F3F3F; */
      padding: 100px 50px;
      text-align: center;
      background:transparent;
      background-image: url('{{ asset('assets/image/abt-2.png') }}');
      background-repeat: no-repeat;
      background-size: cover;
      opacity: 0.9;
   }
   .package-1 .package-box-1 {
      border-radius: 0px 0px 0px 80px;
      /* background: #3F3F3F; */
      padding: 100px 50px;
      text-align: center;
      background:transparent;
      background-image: url('{{ asset('assets/image/abt-2.png') }}');
      background-repeat: no-repeat;
      background-size: cover;
      opacity: 0.9;
   }
   .package-1 .package-box-2 {
      border-radius: 0px 0px 0px 80px;
      /* background: #3F3F3F; */
      padding: 100px 50px;
      text-align: center;
      background:transparent;
      background-image: url('{{ asset('assets/image/abt-2.png') }}');
      background-repeat: no-repeat;
      background-size: cover;
      opacity: 0.9;
   }

</style>
   {{-- Package Starts --}}
<section class="package-1">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="desc">
               <h2>Pet Lodger Packages</h2>
               <p>The more credits you buy the better discounts are achieved</p>
               <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
            </div>
         </div>
         @foreach ($packages as $package)
         <div class="col-md-4">
            <form method="POST" action="{{ route('buyPackage') }}">
               @csrf
               <div class="main package-box-{{$loop->index}}">
                  <div class="title">
                     <h3>{{ $package->name ?? ''}}</h3>
                     <input type="hidden" name="package" value="{{ $package->name ?? ''}}" required>
                     <input type="hidden" name="package_id" value="{{ $package->id ?? ''}}">
                  </div>
                  <div class="price">
                     <h4>£{{ $package->price ?? ''}}</h4>
                     <input type="hidden" name="price" value="{{ $package->price ?? ''}}" required>
                  </div>
                  <div class="credit">
                     {{ $package->credits ?? ''}} credit
                     <input type="hidden" name="credit" value="{{ $package->credits ?? ''}}" required> 
                  </div>
                  <div class="get">
                     <input type="submit" class="buy_package" value="{{ __('Get Now') }}">
                  </div>
               </div>
            </form>
         </div>
         @endforeach
      </div>
   </div>
</section>
{{-- Package Ends --}}

@endsection