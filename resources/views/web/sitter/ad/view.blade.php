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
               @if (session('success'))
                  <div class="alert alert-success">
                     {{ session('success') }}
                  </div>
               @endif
            <div class="row">
               <div class="col-md-6">
                  <div class="pic">
                     {{-- {{dd($ad->pets->image)}} --}}
                     @if ($ad->pets->image && $ad->pets->image->image_path)
                        <img src="{{ asset('storage/' . $ad->pets->image->image_path ?? '') }}" alt="Ad Image">
                     @else
                        <img src="assets/image/user-placeholder.png">
                     @endif
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="desc">
                     <h4 class="title">{{ $ad->title ?? ''}}</h4>
                     <div class="pet-name">
                        <p>Pet Name: <strong>{{$ad->pets->name ?? ''}}</strong></p>
                     </div>
                     <table>
                        <tr>
                           <td>Service</td>
                           <td><strong>{{$ad->service->title ?? ''}}</strong></td>
                        </tr>
                        <tr>
                           <td>Days Required</td>
                           <td><strong>{{ $ad->duration ?? ''}}{{__(' Days')}}</strong></td>
                        </tr>
                       
                        <tr>
                           <td>Date Required</td>
                           <td><strong>{{ $ad->req_date ?? ''}}</strong></td>
                        </tr>
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
                           <td><strong>{{ $ad->pets->behavior ?? ''}}</strong></td>
                        </tr>
                        <tr>
                           <td>Medication:</td>
                           <td><strong>{{ $ad->pets->medication->medication ?? ''}}</strong></td>
                        </tr>
                        {{-- <tr>
                           <td>Additional Service:</td>
                           <td><strong>{{ $data->additional_service }}</strong></td>
                        </tr> --}}
                         <tr>
                           <td>Location</td>
                           <td><strong>{{ $ad->user->address->street ?? ''}}, {{$ad->user->address->post_code ?? ''}},  {{$ad->user->address->city ?? ''}}</strong></td>
                        </tr>
                     </table>
                     <div class="add-details">
                        <h6>Additional Details</h6>
                        <p>{{ $ad->about ?? ''}}</p>
                     </div>
                     <div class="oreder-details">
                      
                           <table>
                              <tr>
                                 <td>Owner Name:</td>
                                 <td><strong>{{$ad->user->full_name ?? ''}}</strong></td>
                              </tr>
                              <tr>
                                 <td>Email:</td>
                                 <td><strong>{{$ad->user->email ?? ''}}</strong></td>
                              </tr>
                              <tr>
                                 <td>Contact No:</td>
                                 <td><strong>{{$ad->user->mobile ?? ''}}</strong></td>
                              </tr>
                           </table>
                       
                     </div>  
                        <div class="show">
                          {{-- route($para1 , $para2) this function accept two para route and id and we need to sue comma for seprate para, if mistakenly we use ' . ' so it will create error "string to array conversion" --}}
                           
                           <a href="{{ route('pet-owner.about.show', ['id' => $ad->user->id]) }}">Show Pet Owner Profile</a>
                        </div>
                     <p class="text-right note">You have already applied for this job!</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
   {{-- Service Detail 1 Ends --}}
@endsection