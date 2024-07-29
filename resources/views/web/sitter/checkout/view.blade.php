@extends('web.layouts.app')

@section('content')
  <!-- ================================ Header Ends ================================  -->
      <section class="checout-1">
         <div class="container">
            <form method="POST" action="{{route('pay')}}" id="checkoutForm">
               @method('POST')
                  @csrf
                  <div class="row">
                     <div class="col-md-6">
                        <h3>Order Summary</h3>
                        <div class="box">
                           <div class="row">
                              <div class="col-md-5">
                                 <h4>{{$packageDetails['package']}}</h4>
                                 <input type="hidden" name="package" value="{{$packageDetails['package']}}">
                                 <div class="creds">
                                    <p>{{$packageDetails['credit']}}Credits</p>
                                    <input type="hidden" name="credits" value="{{$packageDetails['credit']}}">
                                 </div>
                              </div>
                              <div class="col-md-2"></div>
                              <div class="col-md-5">
                                 <div class="price">
                                    <p class="text-right">£{{$packageDetails['price']}}</p>
                                    <input type="hidden" name="price" value="{{$packageDetails['price']}}">
                                 </div>
                              </div>
                           </div>
                        </div>
                        {{-- <div class="row">
                           <div class="col-md-4">
                              <p> <i> Coupon Code</i></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="coupon_code" id="promocode" placeholder="Promo code here">8
                           </div>
                        </div> --}}
                        <div class="row">
                           <div class="col-md-12">
                              <div style="overflow-y: auto;">
                                 <table style="width: 100%;">
                                    <thead>
                                       <tr>
                                          <td>Subtotal</td>
                                          <td>£ {{$order_summary['subtotal']}} </td>
                                          <input type="hidden" name="subtotal" value="{{$order_summary['subtotal']}}">
                                       </tr>
                                       <tr>
                                          <td>+VAT 10% included</td>
                                          <td>£ {{$order_summary['vat']}} </td>
                                          <input type="hidden" name="vat" value="{{$order_summary['vat']}}">
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>Total</td>
                                          <td>£{{$order_summary['total']}}</td>
                                          <input type="hidden" name="total" value="{{$order_summary['total']}}">
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button type="button" class="pay" onclick="confirmPayment()">Place Order</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="row">
                           <div class="col-md-6">
                              <h3>Billing Info</h3>
                           </div>
                           <div class="col-md-6">
                              <img src="image/card.png" alt="">
                           </div>
                        </div>
                        <div class="row">
                              <div class="col-md-12">
                                 <label>Email Address</label>
                                 <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email ?? ''}}" placeholder="myemail@gmail.com" required>
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-md-12">
                                 <label>Full Name</label>
                                 <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror"value="{{$user->full_name ?? ''}}" placeholder="Jenny" required>
                                 @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-md-12">
                                 <label>Name on card</label>
                                 <input type="text" name="card_name" class="form-control @error('card_name') is-invalid @enderror" value="{{ old('card_name') }}" placeholder="Jenny Yey" required>
                                 <label>Card Number</label>
                                   @error('card_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                 <input type="tel" name="card_number" class="form-control @error('card_number') is-invalid @enderror" value="{{ old('card_number') }}" placeholder="1234 5678 9101 1121" required>
                                 @error('card_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-md-3">
                                 <label>Exp. Month</label>
                                 <input type="tel" name="expiry_month" class="form-control @error('expiry_month') is-invalid @enderror" value="{{ old('expiry_month') }}" placeholder="MM" required>
                              </div>
                              @error('expiry_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              <div class="col-md-3">
                                 <label>Year</label>
                                 <input type="tel" name="expiry_year" class="form-control @error('expiry_year') is-invalid @enderror" value="{{ old('expiry_year') }}" placeholder="YY" required>
                              </div>
                              @error('expiry_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              <div class="col-md-6">
                                 <label>CVV</label>
                                 <input type="tel" name="cvv" class="form-control @error('cvv') is-invalid @enderror" value="{{ old('cvv') }}" placeholder="123" required>
                              </div> 
                              @error('cvv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                     </div>
                  </div>
            </form>
         </div>
      </section>
   <!-- ================================ Footer Starts ================================  -->

  
@endsection

@section('scripts')
    <script>
        function confirmPayment() {
            if (confirm('Are you sure you want to place the order?')) {
                document.getElementById('checkoutForm').submit();
            }
        }
    </script>
@endsection