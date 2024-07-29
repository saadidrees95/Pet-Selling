@extends('admin.layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        Ads | Edit
                    </h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200">
                    </div>
                    <!--end::Separator-->
                </div>
                <!--end::Details-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="container">
            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Ad Posting Details <i class="mr-2"></i>
                            <small class="">Fill Ad Details</small>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.ad.lists') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            Back
                        </a>
                        <div class="btn-group">
                            <button type="button" id="republish-ad" class="btn btn-light-danger font-weight-bolder" data-ad-id="{{ $ad->id ?? '' }}">
                                Republish Ad
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Form-->
                    <form class="form" id="kt_form" method="POST" action="{{route('admin.ad.update')}}">
						@method('PUT')
						@csrf

                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class=" text-dark font-weight-bold mb-10">PetOwner Info:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Full Name</label>
                                        <div class="col-9">

											<input class="form-control form-control-solid" type="hidden" name="user_id"
                                                value="{{ $ad->user->id ?? '' }}" required/>
												<input class="form-control form-control-solid" type="hidden" name="pet_id"
                                                value="{{ $ad->pet_id ?? '' }}" required/>
												<input class="form-control form-control-solid" type="hidden" name="ad_id"
                                                value="{{ $ad->id ?? '' }}" required/>

                                            <input class="form-control form-control-solid @error('full_name') is-invalid @else is-valid @enderror" type="text" name="full_name"
                                                value="{{ $ad->user->full_name ?? '' }}" readonly required/>
											@error('full_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Contact Number</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <input type="tel" class="form-control form-control-solid @error('mobile') is-invalid @else is-valid @enderror" name="mobile"
                                                    value="{{ $ad->user->mobile ?? '' }}" placeholder="Phone" readonly required/>
												@error('mobile')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Email Address</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <input type="email" class="form-control form-control-solid @error('email') is-invalid @else is-valid @enderror" name="email"
                                                    value="{{ $ad->user->email }}" placeholder="Email" readonly required/>
												@error('email')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-5">
                                    <h3 class=" text-dark font-weight-bold mb-10">Pet Details:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Pet Name</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('name') is-invalid @else is-valid @enderror" type="text" name="name"
                                                value="{{ $ad->pets->name ?? '' }}" required />
											@error('name')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           	@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Species</label>
                                        <div class="col-9">
                                            <select class="form-control form-control-solid" name="species" required>
                                                @foreach ($petTypes as $petType)
                                                    <option value="{{ $petType->id }}">{{ $petType->species }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
									 <div class="form-group row">
                                        <label class="col-3">Breed</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('breed') is-invalid @else is-valid @enderror" type="text" name="breed"
                                                value="{{ $ad->pets->breed ?? '' }}" required/>
												@error('breed')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Size</label>
                                        <div class="col-9">
                                            <select class="form-control form-control-solid" name="size" required>
                                                @foreach ($petSizes as $petSize)
                                                    <option value="{{ $petSize->id }}">{{ $petSize->size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Age</label>
                                        <div class="col-9">
                                            <select class="form-control form-control-solid" name="age" required>
                                                @foreach ($petAges as $petAge)
                                                    <option value="{{ $petAge->id }}">{{ $petAge->age }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Medication</label>
                                        <div class="col-9">
                                            <select class="form-control form-control-solid" name="medication" required> 
                                                @foreach ($petMedications as $petMedication)
                                                    <option value="{{ $petMedication->id }}">
                                                        {{ $petMedication->medication }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Behavior</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <input type="text" class="form-control form-control-solid @error('behavior') is-invalid @else is-valid @enderror" name="behavior"
                                                    value="{{ $ad->pets->behavior ?? '' }}" placeholder="Behavior" required/>
												@error('behavior')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">About</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
												<textarea name="about" class="form-control form-control-solid @error('about') is-invalid @else is-valid @enderror" rows="5" placeholder="Short Bio" required>{{ $ad->pets->about ?? '' }}"</textarea>
												@error('about')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-5">
                                    <h3 class=" text-dark font-weight-bold mb-10">Ad Details:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Title</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('title') is-invalid @else is-valid @enderror" type="text" name="title"
                                                value="{{ $ad->title ?? '' }}" required />
												@error('title')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Reference No.</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('ref') is-invalid @else is-valid @enderror" type="text" name="ref"
                                                value="{{ $ad->ref ?? '' }}" readonly required/>
												@error('ref')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Required Date</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('req_date') is-invalid @else is-valid @enderror" type="date" name="req_date"
                                                value="{{ $ad->req_date ?? '' }}" required />
												@error('req_date')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Duration (in Days)</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('duration') is-invalid @else is-valid @enderror" type="tel" name="duration"
                                                value="{{ $ad->duration ?? '' }}" required />
												@error('duration')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Service</label>
                                    <div class="col-9">
                                        <select class="form-control form-control-solid" name="service" required>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-5">
                                    <h3 class=" text-dark font-weight-bold mb-10">Address Details:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Country</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('country') is-invalid @else is-valid @enderror" type="tel" name="country"
                                                value="{{ $ad->user->address->country ?? '' }}" readonly required/>
												@error('country')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Street Address</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('street') is-invalid @else is-valid @enderror" type="text" name="street"
                                                value="{{ $ad->user->address->street ?? '' }}" readonly required/>
												@error('street')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">City</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('city') is-invalid @else is-valid @enderror" type="text" name="city"
                                                value="{{ $ad->user->address->city ?? '' }}" readonly required/>
												@error('city')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Zip / Postal Code</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('post_code') is-invalid @else is-valid @enderror" type="text" name="post_code"
                                                value="{{ $ad->user->address->post_code ?? '' }}" readonly required/>
												@error('post_code')
                                                	<div class="alert alert-danger">{{ $message }}</div>
                                           		@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-52">
                                    <h3 class=" text-dark font-weight-bold mb-10">Ad Status:</h3>
                                    <div class="form-group row mt-10 mb-19">
                                        <label class="col-3">Status</label>
                                        <div class="col-9">
                                            <select class="form-control form-control-solid" name="active" required>
                                                <option value="0">{{ __('In-active') }}</option>
                                                <option value="1">{{ __('Active') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
								<div class="separator separator-dashed my-10"></div>
								<div class="my-52">
									<div class="form-group row mt-10">
										<label class="col-3"></label>
										<div class="col-9">
											<button type="submit" class="btn btn-light-success font-weight-bold btn-md">Update</button>
										</div>
									</div>
								</div>
                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>

        <!--end::Entry-->
    </div>
@endsection
