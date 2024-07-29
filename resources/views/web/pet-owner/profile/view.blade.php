@extends('web.layouts.app')

@section('content')
      <!-- ================================ Seller Profile Signup Starts ================================  -->
      <section class="sprofile-sgnup bprofile-sgnup">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#adds">My Ads</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#responses">Picked By</a>
                     </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">

                     {{-- {{ dd($user) }}  --}}
                     <!-- Profile -->
                     <div id="profile" class="container tab-pane active">
                        <br>
                     {{-- Flash Message --}}
                     @if (session('success'))
                        <div class="alert alert-success">
                           {{ session('success') }}
                        </div>
                        @elseif (session('error'))
                          <div class="alert alert-danger">
                           {{ session('error') }}
                        </div>
                     @endif
                        <div class="main">
                           <div class="row">
                              <div class="col-md-7">
                                 <div class="desc">
                                    <h2>User Profile</h2>
                                    {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.   </p> --}}
                                 </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="more">
                                   <a href="{{ route('profile.edit', ['id' => $user->id]) }}">Edit Profile</a>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="more">
                                   <a href="{{ route('pet-owner.profile.delete', $user->id) }}">Delete Profile</a>
                                 </div>
                              </div>
                              <form>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="pic">
                                          {{-- user profile pic --}}
                                          @if ($user && $user->userImage)
                                             <img src="{{ asset('storage/' . $user->userImage->image_path) }}" alt="Ad Image">
                                          @else
                                             <img src="assets/image/user-placeholder.png">
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <label>Full Name</label>
                                      <input type="text" value="{{ $user->full_name ?? '' }}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                       <label>Email</label>
                                       <input type="email" value="{{$user->email ?? '' }}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                       <label>Contact Number</label>
                                       <input type="tel" value="{{$user->mobile ?? '' }}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                       <label>National Insuarance Number</label>
                                       <input type="text" value="{{$user->insurance_number ?? '' }}" disabled>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-12">
                                       <div class="relative">
                                          <label>Location</label>
                                            <textarea id="address" cols="30" rows="1">{{$user->address->street ?? '' }}, {{$user->address->post_code  ?? '' }}, {{$user->address->city ?? '' }} , {{ $user->address->country ?? '' }}</textarea>

                                          <div class="icon">
                                             <img src="assets/image/map-marker.png" alt="">
                                          </div>
                                       </div>
                                       <label>About You</label>
                                        <textarea id="about" cols="30" rows="4" disabled>{{$user->about ?? '' }}</textarea>
                                    </div>
                                 </div>
                              </form>
                               {{-- row-8 --}}
                              <div class="col-md-12">
                                 <div class="relative">
                                       <form method="POST" action="{{route('owner.doc-upload')}}" enctype="multipart/form-data">
                                       @method('Post')
                                       @csrf
                                          <div class="upload upload-btn-wrapper">
                                             <label>Upload Document</label>
                                             <button class="btn">
                                                <img src="{{ asset('assets/image/upload-icon.png') }}"
                                                   alt="Upload Icon"> Upload
                                             </button>
                                             <input type="file" name="document"  class="@error('document') is-invalid @enderror" accept="image/*" required>
                                             <p style="font-size:14px" >The document size must not exceed 50MB.</p>
                                             @error('document')
                                                   <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                   </span>
                                             @enderror
                                          </div>
                                       <input type="submit" class="upload-btn" value="Submit">
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- My Adds -->
                     {{-- {{ dd($ads) }}  --}}
                     <div id="adds" class="container tab-pane fade">
                        <br>
                        <div class="main">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="desc">
                                    <h2>Posted Job</h2>
                                    {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p> --}}
                                 </div>
                              </div>
                           </div>

                           {{-- loop --}}
                           @if($ads)
                              @foreach ($ads->ads as $ad)
                                 <!-- Pet Box -->
                                 <div class="row box">
                                    <div class="col-md-2">
                                       <div class="pet-img">

                                       {{-- {{dd($ad->pets->image)}} --}}
                                          @if ($ad->pets && $ad->pets->image)
                                             <img src="{{ asset('storage/' . $ad->pets->image->image_path ?? '') }}" alt="Ad Image">
                                          @else
                                             <img src="assets/image/user-placeholder.png">
                                          @endif

                                       </div>
                                    </div>
                                    <div class="col-md-10">
                                       <div class="row align-items-end">
                                          <div class="col-md-12">
                                             <div class="persondetails">
                                                <h4></h4>
                                                <p>{{$user->full_name ?? ''}}</p>
                                             </div>
                                          </div>
                                          <div class="col-md-9">
                                             <div class="pet-details">
                                                <h5>{{$ad->title ?? ''}}</h5>
                                                <p>Pet Name: <strong>{{ $ad->pets->name ?? ''}}</strong></p>
                                                <ul>
                                                   <li>Published:</li>
                                                   <li><strong>{{ $ad->created_at->format('d-m-y | H:i') ?? ''}}</strong></li>
                                                </ul>
                                                <ul>
                                                   <li>Location:</li>
                                                   <li><strong>{{ $ad->user->address->street ?? ''}}</strong> </li>
                                                </ul>
                                                   <ul>
                                                   <li>Ad ID: </li>
                                                   <li><strong>{{ $ad->ref ?? ''}}</strong> </li>
                                                </ul>
                                                <ul>
                                                   @if ($ad->active === 1)
                                                      <li>Status:</li>
                                                      <li><strong>Active</strong></li>
                                                   @else
                                                      <li>Status:</li>
                                                      <li><strong>Expired</strong></li>
                                                   @endif
                                                </ul>
                                                 <ul>
                                                   <li>Ad Response: </li>
                                                   <li><strong>{{ $ad->responses[0]['responses_count'] ?? '0'}}</strong> </li>
                                                </ul>
                                             </div>
                                          </div>
                                           <div class="col-md-3">
                                          <div class="more">
                                                @if ($ad->active === 1)
                                                   <a href="{{ route('my-ad.show', ['id' => $ad->id]) }}">View Details</a>
                                                   <a href="{{ route('ad.edit', ['id' => $ad->id]) }}" class="edit-btn">Edit Details</a>
                                                @else
                                                   <form method="POST" action="{{route('adRepublish', ['id' => $ad->id])}}">
                                                      @method('POST')
                                                      @csrf
                                                         {{-- <input type="hidden" name="ad_id" value="{{$ad->id}}"> --}}
                                                     <button type="submit" class="republish-btn">Republish Ad</button>
                                                   </form>
                                                @endif
                                          </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Pet Box -->
                              @endforeach
                           @else
                              <p>Sorry! you have no ad.</p>
                           @endif
                        </div>
                     </div>

                     <!-- Picked by -->
                     {{-- {{ dd($responses) }}  --}}
                     <div id="responses" class="container tab-pane fade">
                        <br>
                        <div class="main">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="desc">
                                    <h2>Picked  By</h2>
                                    {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p> --}}
                                 </div>
                              </div>
                           </div>

                         {{-- Check if there are responses --}}
                           @if($responses->responses->count() > 0)
                           <!-- Loop through responses -->
                           @foreach ($responses->responses as $response)
                                 <!-- Pet Box -->
                                 <div class="row box">
                                    <div class="col-md-2">
                                       <div class="sitter-img">

                                       @if ($response->sitter && $response->sitter->user->userImage)
                                          <img src="{{ asset('storage/' . $response->sitter->user->userImage->image_path) }}" alt="Ad Image">
                                       @else
                                          <img src="assets/image/user-placeholder.png">
                                       @endif

                                       </div>
                                    </div>
                                    <div class="col-md-10">
                                       <div class="row align-items-end">
                                          <div class="col-md-12">
                                             <div class="persondetails">
                                                  <h4>{{ $response->sitter->user->full_name ?? ''}}</h4>
                                                   <p>{{ $response->sitter->user->email ?? ''}}</p>
                                             </div>
                                          </div>
                                          <div class="col-md-9">
                                             <div class="pet-details">
                                                <h5>{{ $response->ads->title ?? ''}}</h5>
                                                <p>Pet Name: <strong>{{ $response->ads->pets->name ?? ''}}</strong></p>
                                                <ul>
                                                   <li>Applied:</li>
                                                   <li><strong>{{ $response->created_at->format('d-m-y | H:i')?? '' }}</strong></li>
                                                </ul>
                                                <ul>
                                                   <li>Location:</li>
                                                   <li><strong>{{$response->sitter->user->address->street ?? ''}} </strong></li>
                                                </ul>
                                                <ul>
                                                   <li>Status:</li>
                                                   <li><strong>{{ $response->sitter->availability === 1 ? 'Available' : 'Not Available' ?? ''}}</strong></li>
                                                </ul>
                                                 <ul>
                                                   <li>Ad ID: </li>
                                                   <li><strong>{{ $response->ads->ref ?? ''}}</strong></li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                          <div class="more">
                                             <a href="{{ route('sitter.about.show', ['id' => $response->sitter->id]) }}">View Profile</a>
                                          </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Pet Box -->
                              @endforeach
                           @else
                              <p>You have no picking yet!</p>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
      <!-- ================================  Seller Profile Signup  Ends ================================  -->
 @endsection
