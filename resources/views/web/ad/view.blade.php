@extends('web.layouts.app')

@section('content')

<style>

 form input[type="submit"].buy-ad {

      display: block;
      text-align: center;
      margin: 20px auto;
      padding: 20px 160px;
      border-radius: 0px 20px;
      background: #62C5D3;
      color: #fff;
      with: 100%;

   }

</style>
   {{-- Service Detail 1 Starts --}}
      <section class="single-ser-1">
         <div class="container">
            {{-- Flash Message --}}
            @if (session('error'))
               <div class="alert alert-danger">
                  {{ session('error') }}
               </div>
            @endif
            <div class="row">
               <div class="col-md-6">
                  <div class="pic">
                     @if($ad)
                     {{-- {{dd($ad->pets->image)}} --}}
                     @if ($ad->pets->image && $ad->pets->image->image_path)
                        <img src="{{ asset('storage/' . $ad->pets->image->image_path) }}" alt="Ad Image">
                     @else
                        <img src="assets/image/user-placeholder.png">
                     @endif
                     @else
                     <img src="assets/image/user-placeholder.png">
                     @endif
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="desc">
                      <div class="pet-name">
                        <p>Pet Name <strong>{{$ad->pets->name ?? '' }}</strong></p>
                           <h4 class="title">{{ $ad->title ?? '' }}</h4>
                     </div>
                     <table>
                        <tr>
                           <td>Service </td>
                           <td><strong>{{$ad->service->title ?? '' }}</strong></td>
                        </tr>
                        <tr>
                           <td>Days Required </td>
                           <td><strong>{{ $ad->duration ?? '' }}{{__(' Days')}}</strong></td>
                        </tr>
                        <tr>
                           <td>Date Required</td>
                           <td><strong>{{ $ad->req_date ?? '' }}</strong></td>
                        </tr>
                        {{-- <tr>
                           <td>Days Required:</td>
                           <td><strong>{{ $ad->duration ?? '' }} {{__(' Days')}}</strong></td>
                        </tr> --}}
                         <tr>
                           <td>Species </td>
                           <td><strong>{{ $ad->pets->type->species ?? '' }}</strong></td>
                        </tr>
                         <tr>
                           <td>Breed</td>
                           <td><strong>{{ $ad->pets->breed ?? 'N/A' }}</strong></td>
                        </tr>
                         <tr>
                           <td>Age</td>
                           <td><strong>{{ $ad->pets->age->age ?? '' }}</strong></td>
                        </tr>
                         <tr>
                           <td>Size</td>
                           <td><strong>{{ $ad->pets->size->size ?? '' }}</strong></td>
                        </tr>
                         <tr>
                           <td>Behavior</td>
                           <td><strong>{{ $ad->pets->behavior ?? ''  }}</strong></td>
                        </tr>
                        <tr>
                           <td>Medication:</td>
                           <td><strong>{{ $ad->pets->medication->medication ?? ''}}</strong></td>
                        </tr>
                           <tr>
                           <td>Location </td>
                           <td><strong>{{ $ad->user->address->street ?? ''}}, {{$ad->user->address->post_code ?? ''}},  {{$ad->user->address->city ?? ''}}</strong></td>
                        </tr>
                        {{-- <tr>
                           <td>Additional Service </td>
                           <td><strong>{{ $ad->additional_service }}</strong></td>
                        </tr> --}}
                          <tr>
                           <td>Ad Response</td>
                           <td><strong>{{ $ad->responses[0]['responses_count'] ?? '0' }}</strong></td>
                        </tr>
                      
                     </table>
                     <div class="add-details">
                        <h6>Additional Details</h6>
                        <p>{{ $ad->about ?? '' }}</p>
                     </div>
                     <div class="oreder-details">
                      
                           <table>
                              <tr>
                                 <td>Owner Name:</td>
                                 <td><strong>*************</strong></td>
                              </tr>
                              <tr>
                                 <td>Email:</td>
                                 <td><strong>*************</strong></td>
                              </tr>
                              <tr>
                                 <td>Contact No:</td>
                                 <td><strong>*************</strong></td>
                              </tr>
                           </table>

                     </div>
                     
                     {{-- redirect logic --}}
                     @if(Auth::check())
                        {{-- Step-2 check user role --}}
                        @if(Auth::user()->role_id === 5)
                           <form method="POST" class="content-area" action="{{ route('ad.apply') }}">
                                 @csrf
                                 <div class="show">
                                    {{-- <a href="{{ url('/sitter/ad-listing/apply/' . $ad->id) }}">Show Contact Detail</a> --}}
                                    <input type="hidden" name="ad_id" value="{{ $ad->id ?? 'N/A' }}" required>
                                    {{-- <input type="hidden" name="ref" value="{{ $ad->ref }}" required> --}}
                                    <input class="buy-ad" type="submit" value="{{ __('Show Contact Detail') }}">
                                 </div>
                           </form>
                        @else
                           <div class="show">
                                 <a href="{{ route('sitter.register.form') }}">Show Contact Detail</a>
                                 <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                           </div>
                        @endif
                     @endif
                     <p class="text-right note">10 credits per lead</p>
                     <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
   {{-- Service Detail 1 Ends --}}
@endsection