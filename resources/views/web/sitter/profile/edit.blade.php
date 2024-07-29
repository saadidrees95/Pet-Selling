@extends('web.layouts.app')

@section('content')


    {{-- Seller Profile Signup Starts --}}
    <section class="sprofile-sgnup">
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
                        <!-- Profile -->
                        <div id="profile" class="container tab-pane active">
                            <br>
                            <div class="main">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="desc">
                                            <h2>Sitter Profile</h2>
                                            {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem. </p> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="more">
                                            <!--<a href="{{ route('profile.edit', ['id' => $user->id]) }}">Back</a>-->
                                            <a href="{{ route('sitter.profile') }}">Back</a>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('sitter.profile.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!-- Method Spoofing for PUT request -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="pic">
                                                    {{-- Profile Pic --}}
                                                    @if ($user && $user->userImage)
                                                        <img src="{{ asset('storage/' . $user->userImage->image_path ?? '') }}"
                                                            alt="Sitter Profile Image">
                                                    @else
                                                        <img src="{{ asset('assets/image/user-placeholder.png') }}"
                                                            alt="Sitter Profile Placeholder">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                                <input type="text" name="full_name"
                                                    class="@error('full_name') is-invalid @enderror"
                                                    value="{{ $user->full_name ?? '' }}" required>
                                                @error('full_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Email</label>
                                                <input type="email" name="email"
                                                    class="@error('email') is-invalid @enderror"
                                                    value="{{ $user->email ?? '' }}" disabled>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Contact Number</label>
                                                <input type="tel" name="mobile"
                                                    class="@error('mobile') is-invalid @enderror"
                                                    value="{{ $user->mobile ?? '' }}" required>
                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>National Insurance No.</label>
                                                <input type="text" name="insurance_number"
                                                    class="@error('insurance_number') is-invalid @enderror"
                                                    value="{{ $user->insurance_number ?? '' }}" >
                                                @error('insurance_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>City</label>
                                                <input type="text" name="city"
                                                    class="@error('city') is-invalid @enderror"
                                                    value="{{ $user->address->city ?? '' }}" required>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <label>Species for Pet Sitting</label>
                                                <select name="species" id="pet_type" required>
                                                    @foreach ($pet_type as $type)
                                                        <option value="{{ $type->id }}">{{ $type->species ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <label>Species for Pet Sitting</label>
                                                <select name="species" id="pet_type" required>
                                                    @foreach ($pet_type as $type)
                                                        <option value="{{ $type->id }}" {{ $type->id == $user->sitter->pet_type_id ? 'selected' : '' }}>
                                                            {{ $type->species ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Post Code</label>
                                                <input type="text" name="post_code"
                                                    class="@error('post_code') is-invalid @enderror"
                                                    value="{{ $user->address->post_code ?? '' }}" required>
                                                @error('post_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <label>Year of Experience</label>
                                                <select name="experience" id="experience" required>
                                                    @foreach ($sitter_experiences as $sitter_experience)
                                                        <option value="{{ $sitter_experience->id ?? '' }}">
                                                            {{ $sitter_experience->experience ?? '' }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <label>Year of Experience</label>
                                                <select name="experience" id="experience" required>
                                                    @foreach ($sitter_experiences as $sitter_experience)
                                                        <option value="{{ $sitter_experience->id }}" {{ $user->sitter->sitter_experience_id == $sitter_experience->id ? 'selected' : '' }}>
                                                            {{ $sitter_experience->experience ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Street</label>
                                                <input type="text" name="street"
                                                    class="@error('street') is-invalid @enderror"
                                                    value="{{ $user->address->street ?? '' }}" required>
                                                @error('street')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label>Other Species </label>
                                                <input type="text" name="other_species"
                                                    class="@error('other_species') is-invalid @enderror"
                                                    value="{{ $user->sitter->other_species ?? '' }}" min="1" max="100" required>
                                                @error('other_species')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- <div class="col-md-3">
                                                <label>Availability </label>
                                                <select name="availability" id="availability" required>
                                                    <option value="{{ 1 }}">{{ 'Available' }}</option>
                                                    <option value="{{ 0 }}">{{ 'Not Available' }}</option>
                                                </select>
                                            </div> --}}
                                            <div class="col-md-3">
                                                <label>Availability</label>
                                                <select name="availability" id="availability" required>
                                                    <option value="1" {{ $user->sitter->availability == 1 ? 'selected' : '' }}>Available</option>
                                                    <option value="0" {{ $user->sitter->availability == 0 ? 'selected' : '' }}>Not Available</option>
                                                </select>
                                            </div>

                                            {{-- <div class="col-md-6">
                                                <label>Select type of Sit</label>
                                                <div id="checklist" required>
                                                    <input checked="" name="sit_type" value="House Sitter"
                                                        type="radio" id="01">
                                                    <label for="01">House Sitter</label>
                                                    <input value="Pet Sitter" name="sit_type" type="radio"
                                                        id="02">
                                                    <label for="02">Pet Sitter</label>
                                                    <input value="Combine" name="sit_type" type="radio"
                                                        id="03">
                                                    <label for="03">Combine</label>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <label>Select type of Sit</label>
                                                <div id="checklist" required>
                                                    <input {{ $user->sitter->sit_type === 'House Sitter' ? 'checked' : '' }} name="sit_type" value="House Sitter" type="radio" id="01">
                                                    <label for="01">House Sitter</label>

                                                    <input {{ $user->sitter->sit_type === 'Pet Sitter' ? 'checked' : '' }} name="sit_type" value="Pet Sitter" type="radio" id="02">
                                                    <label for="02">Pet Sitter</label>

                                                    <input {{ $user->sitter->sit_type === 'Combine' ? 'checked' : '' }} name="sit_type" value="Combine" type="radio" id="03">
                                                    <label for="03">Combine</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div class="col-md-12">
                                                <label>About You</label>
                                                <textarea name="about" id="about" class="@error('about') is-invalid @enderror" cols="30" rows="4"
                                                    >{{ $user->about ?? '' }}</textarea>
                                                @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label>Notes</label>
                                                <textarea name="notes" id="notes" class="@error('notes') is-invalid @enderror" cols="30" rows="4"
                                                    >{{ $user->notes ?? '' }}</textarea>
                                                @error('notes')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="upload upload-btn-wrapper">
                                                    <label>Upload Profile Photo</label>
                                                    <button class="btn"> <img
                                                            src="{{ asset('assets/image/upload-icon.png') }}"
                                                            alt=""> Upload </button>
                                                    <input type="file" name="image"
                                                        class="@error('image') is-invalid @enderror" accept="image/*"
                                                        >
                                                        <p style="font-size:14px" >The image size must not exceed 50MB.</p>
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
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
        </div>
    </section>
    <!-- ================================  Seller Profile Signup  Ends ================================  -->
    {{-- Seller Profile Signup  Ends --}}
@endsection
