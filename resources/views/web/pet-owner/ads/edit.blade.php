@extends('web.layouts.app')

@section('content')
    {{-- Ad Posting Start --}}
    <section class="signup-1">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-6 left">
                    <div class="pic">
                        <img src="{{ asset('assets/image/signup-img.png') }}">
                    </div>
                </div>
                <div class="col-md-6 right">
                    <h2>Please fill this form</h2>
                    {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p> --}}
                    <form method="POST" id="adcreation" action="{{ route('ad.update') }}" enctype="multipart/form-data">
                     @method('POST')   
                     @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Title</label>
                                <input class="form-control form-control-solid" type="hidden" name="ad_id"
                                                value="{{ $ad->id ?? '' }}" required/>
                                <input class="form-control form-control-solid" type="hidden" name="pet_id"
                                                value="{{ $ad->pet_id ?? '' }}" required/>
                                <input type="text" name="title" class="@error('title') is-invalid @enderror" value="{{$ad->title ?? ''}}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Pet Name</label>
                                <input type="text" name="pet_name" class="@error('pet_name') is-invalid @enderror" value="{{$ad->pets->name ?? ''}}" required>
                                 @error('pet_name')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Pet Type</label>
                                <select name="species" id="selectpet" required>
                                    @foreach ($pet_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->species }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Street Address</label>
                                <input type="text" name="street" class="@error('street') is-invalid @enderror" value="{{$ad->user->address->street ?? ''}}" required>
                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label>Postcode</label>
                                <input type="text" name="post_code" class="@error('post_code') is-invalid @enderror" value="{{$ad->user->address->post_code ?? ''}}" required>
                                @error('post_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label>City</label>
                                <input type="text" name="city" class="@error('city') is-invalid @enderror" value="{{$ad->user->address->city ?? ''}}" required>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Date</label>
                                <input type="date" name="date" class="@error('date') is-invalid @enderror" value="{{$ad->req_date ?? ''}}" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required> 
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label>Duration</label>
                                <input type="number" name="duration" class="@error('duration') is-invalid @enderror"  min="1" max="100"  value="{{$ad->duration ?? ''}}" required>
                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label>Service</label>
                                <select name="service" id="service" required>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Pet Age</label>
                                <select name="pet_age" id="pet-age" required>
                                    @foreach ($pet_ages as $pet_age)
                                        <option value="{{ $pet_age->id }}">{{ $pet_age->age }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Pet Size</label>
                                <select name="pet_size" id="service-required" required>
                                    @foreach ($pet_sizes as $pet_size)
                                        <option value="{{ $pet_size->id }}">{{ $pet_size->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Breed</label>
                                <input type="text" name="breed" class="@error('breed') is-invalid @enderror" value="{{$ad->pets->breed ?? ''}}" required>
                                @error('breed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Behavior</label>
                                <input type="text" name="behavior" class="@error('behavior') is-invalid @enderror" value="{{$ad->pets->behavior ?? ''}}" required>
                                @error('behavior')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Medication</label>
                                <select name="medication" id="medication" required>
                                    @foreach ($pet_medications as $pet_medication)
                                        <option value="{{ $pet_medication->id }}">{{ $pet_medication->medication }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 upload upload-btn-wrapper">
                                <label>Upload Pet Photo</label>
                                <button class="btn"> <img src="{{ asset('assets/image/upload-icon.png') }}"
                                        alt=""> Upload </button>
                                <input type="file" name="image" class="@error('image') is-invalid @enderror" value="{{$ad->title ?? ''}}" accept="image/*" >
                                <p style="font-size:14px" >The image size must not exceed 50MB.</p>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Additional Details</label>
                                <textarea rows="1" cols="50" name="about"
                                    class="@error('about') is-invalid @enderror"id="adcreation" required>{{$ad->about ?? ''}}</textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- Ad Posting end --}}
@endsection
