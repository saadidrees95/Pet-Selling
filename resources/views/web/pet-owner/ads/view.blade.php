@extends('web.layouts.app')

@section('content')
   {{-- Service Detail 1 Starts --}}
      <section class="single-ser-1">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="pic">
                       {{-- {{dd($ad->pets->image)}} --}}
                     @if ($ad->pets && $ad->pets->image)
                        <img src="{{ asset('storage/' . $ad->pets->image->image_path) }}" alt="Ad Image">
                     @else
                        <img src="assets/image/user-placeholder.png">
                     @endif
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="desc">
                     <h4 class="title">{{ $ad->title ?? '' }}</h4>
                     <div class="pet-name">
                        <p>Pet Name <strong>{{ $ad->pet_name ?? '' }}</strong></p>
                     </div>
                     <table>
                        <tr>
                           <td>Service</td>
                           <td><strong>{{ $ad->service->title ?? ''  }}</strong></td>
                        </tr>
                        <tr>
                           <td>Days Required</td>
                           <td><strong>{{ $ad->duration ?? ''  }}{{__(' Days')}}</strong></td>
                        </tr>
                        <tr>
                           <td>Date Required:</td>
                           <td><strong>{{ $ad->req_date ?? ''  }}</strong></td>
                        </tr>
                        {{-- <tr>
                           <td>Days Required:</td>
                           <td><strong>{{ $ad->duration ?? ''  }} {{__(' Days')}}</strong></td>
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
                           <td><strong>{{ $ad->pets->medication->medication ?? ''  }}</strong></td>
                        </tr>
                        <tr>
                           <td>Location</td>
                           <td><strong>{{ $ad->user->address->street ?? '' }}, {{$ad->user->address->post_code ?? '' }},  {{$ad->user->address->city ?? '' }}</strong></td>
                        </tr>
                     </table>
                     <div class="add-details">
                        <h6>Additional Details</h6>
                        <p>{{ $ad->about ?? ''  }}</p>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
   {{-- Service Detail 1 Ends --}}
@endsection