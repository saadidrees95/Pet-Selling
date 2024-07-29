@extends('web.layouts.app')

@section('content')
    <!-- ================================ Seller Profile Signup Starts ================================ -->
    <section class="sprofile-sgnup bprofile-sgnup">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        {{-- {{ dd($user) }} --}}
                        <!-- Profile -->
                        <div id="profile" class="container tab-pane active">
                            <br>
                            <div class="main">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="desc">
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
                                            <h2>User Profile</h2>
                                            {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="more">
                                            <a href="{{ route('profile') }}">Back</a>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT') <!-- Method Spoofing for PUT request -->
                                        <div class="row">
                                          {{-- row-1 --}}
                                            <div class="col-md-12">
                                                <div class="pic">
                                                    {{-- Profile Pic --}}
                                                    @if ($user && $user->userImage)
                                                        <img src="{{ asset('storage/' . $user->userImage->image_path) }}"
                                                            alt="User Profile Image">
                                                    @else
                                                        <img src="{{ asset('assets/image/user-placeholder.png') }}"
                                                            alt="User Profile Placeholder">
                                                    @endif
                                                </div>
                                            </div>
                                             {{-- row-2 --}}
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                                <input type="text" name="full_name" class="@error('full_name') is-invalid @enderror" value="{{ $user->full_name ?? '' }}" required>
                                                 @error('full_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Email</label>
                                                <input type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ $user->email ?? '' }}" disabled>
                                                 @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                             {{-- row-3 --}}
                                            <div class="col-md-6">
                                                <label>Contact Number</label>
                                                <input type="tel" name="mobile" class="@error('mobile') is-invalid @enderror" value="{{ $user->mobile ?? '' }}" required>
                                                 @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>National Insurance No.</label>
                                                <input type="text" name="insurance_number" class="@error('insurance_number') is-invalid @enderror" 
                                                    value="{{ $user->insurance_number ?? '' }}" >
                                                     @error('insurance_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                             </div>
                                             {{-- row-4 --}}
                                             <div class="col-md-6">
                                                <label>City</label>
                                                <input type="text" name="city" class="@error('city') is-invalid @enderror" value="{{ $user->address->city ?? '' }}" required>
                                                 @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                             </div>
                                             <div class="col-md-6">
                                                <label>Post Code</label>
                                                <input type="text" name="post_code" class="@error('post_code') is-invalid @enderror" 
                                                    value="{{ $user->address->post_code ?? '' }}" >
                                                     @error('post_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                             </div>
                                             {{-- row-5 --}}
                                             <div class="col-md-6">
                                                <label>Street</label>
                                                <input type="text" name="street" class="@error('street') is-invalid @enderror" value="{{ $user->address->street ?? '' }}" required>
                                                 @error('street')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                             </div>
                                             {{-- row-6 --}}
                                             <div class="col-md-6"></div>
                                             <div class="col-md-12">
                                             {{-- row-7 --}}
                                             <label>About You</label>
                                             <textarea id="about" name="about" class="@error('about') is-invalid @enderror" cols="30"
                                                   rows="3" >{{ $user->about ?? ''}}</textarea>
                                                    @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                             {{-- row-8 --}}    
                                             <div class="upload upload-btn-wrapper">
                                                   <label>Upload Profile Picture</label>
                                                   <button class="btn">
                                                      <img src="{{ asset('assets/image/upload-icon.png') }}"
                                                         alt="Upload Icon"> Upload
                                                   </button>
                                                   <input type="file" name="image" class="@error('image') is-invalid @enderror" accept="image/*" >
                                                   <p style="font-size:14px" >The image size must not exceed 50MB.</p>
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                             </div>
                                             {{-- submit button --}}
                                             <input type="submit" class="upload-btn" value="Update">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================  Seller Profile Signup  Ends ================================ -->
@endsection
