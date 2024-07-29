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
                        Buyer
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
                            Pet Owner Details <i class="mr-2"></i>
                            {{-- <small class="">try to scroll the page</small> --}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                             
                        <a href="{{ route('admin.pet-owner.lists') }}"
                            class="btn btn-light-primary font-weight-bolder mr-2">
                            {{-- <i class="ki ki-long-arrow-back icon-sm"></i> --}}
                            Back
                        </a>
                    </div>
                </div>
            
                <div class="card-body">
                     {{-- Flash Message --}}
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    <!--begin::Form-->
                    <form class="form" id="kt_form" method="POST" action="{{ route('admin.pet-owner.update') }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class=" text-dark font-weight-bold mb-10">Customer Info:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Full Name</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="hidden" name="user_id"
                                                value="{{ $petOwner->id ?? '' }}" required />
                                            <input
                                                class="form-control form-control-solid @error('full_name') is-invalid @else is-valid @enderror"
                                                type="text" id="full_name" name="full_name"
                                                value="{{ $petOwner->full_name }}" placeholder="Full Name" required />
                                            @error('full_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Contact Phone</label>
                                        <div class="col-9">
                                            <input type="tel"
                                                class="form-control form-control-solid @error('mobile') is-invalid @else is-valid @enderror"
                                                id="mobile" name="mobile" value="{{ $petOwner->mobile ?? '' }}"
                                                placeholder="Mobile Number" required />
                                            @error('mobile')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Insurance Number</label>
                                        <div class="col-9">
                                            <input type="text"
                                                class="form-control form-control-solid @error('insurance_number') is-invalid @else is-valid @enderror"
                                                name="insurance_number" value="{{ $petOwner->insurance_number ?? '' }}"
                                                placeholder="Insurance Number" />
                                            @error('insurance_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Email Address</label>
                                        <div class="col-9">
                                            <input type="email"
                                                class="form-control form-control-solid @error('email') is-invalid @else is-valid @enderror"
                                                name="email" value="{{ $petOwner->email ?? '' }}" required readonly />
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">About</label>
                                        <div class="col-9">
                                            <textarea name="about" class="form-control form-control-solid @error('about') is-invalid @else is-valid @enderror"
                                                rows="3" placeholder="Short Bio">{{ $petOwner->about ?? '' }}</textarea>
                                            @error('about')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-5">
                                    <h3 class=" text-dark font-weight-bold mb-10">Address Details:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Country</label>
                                        <div class="col-9">
                                            <input
                                                class="form-control form-control-solid @error('country') is-invalid @else is-valid @enderror"
                                                type="text" name="country"
                                                value="{{ $petOwner->address->country ?? '' }}"
                                                placeholder="United Kingdom" />
                                            @error('country')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Address Line 1</label>
                                        <div class="col-9">
                                            <input
                                                class="form-control form-control-solid @error('street') is-invalid @else is-valid @enderror"
                                                type="text" name="street"
                                                value="{{ $petOwner->address->street ?? '' }}"
                                                placeholder="District 6 1352 W. Olive Ave" />
                                            @error('street')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">City</label>
                                        <div class="col-9">
                                            <input
                                                class="form-control form-control-solid @error('city') is-invalid @else is-valid @enderror"
                                                type="text" name="city"
                                                value="{{ $petOwner->address->city ?? '' }}" placeholder="London" />
                                            @error('city')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Zip / Postal Code</label>
                                        <div class="col-9">
                                            <input
                                                class="form-control form-control-solid @error('post_code') is-invalid @else is-valid @enderror"
                                                type="text" name="post_code"
                                                value="{{ $petOwner->address->post_code ?? '' }}" placeholder="WSN114" />
                                            @error('post_code')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-52">
                                    <h3 class=" text-dark font-weight-bold mb-10">Account Status:</h3>
                                    <div class="form-group row mt-10 mb-10">
                                        <label class="col-3">Status</label>
                                        <div class="col-9">
                                            <select class="form-control form-control-solid" name="active" required>
                                                <option value="1">Active</option>
                                                <option value="0">Deactivate</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-52">
                                    <div class="form-group row mt-10">
                                        <label class="col-3"></label>
                                        <div class="col-9">
                                            <button type="submit"
                                                class="btn btn-light-primary font-weight-bolder mr-2">Update</button>
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
