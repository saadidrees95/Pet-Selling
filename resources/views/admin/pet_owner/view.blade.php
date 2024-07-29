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
                        <a href="{{route('admin.pet-owner.lists')}}" class="btn btn-light-primary font-weight-bolder mr-2">
                            {{-- <i class="ki ki-long-arrow-back icon-sm"></i> --}}
                            Back
                        </a>
                        {{-- <div class="btn-group">
                            <button type="button" class="btn btn-primary font-weight-bolder">
                                Update
                            </button>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Form-->
                    <form class="form" id="kt_form">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class=" text-dark font-weight-bold mb-10">Customer Info:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Full Name</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text" value="{{$petOwner->full_name ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Contact Phone</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-solid"
                                                    value="{{$petOwner->mobile ?? ''}}" placeholder="Phone" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Insurance Number</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-solid"
                                                    value="{{$petOwner->insurance_number ?? ''}}" placeholder="Phone" readonly/>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-3">Email Address</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-solid"
                                                    value="{{$petOwner->email ?? ''}}" placeholder="Email" readonly/>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-3">About</label>
                                        <div class="col-9">
                                            <textarea name="long_desc" class="form-control form-control-solid" rows="3" readonly>{{$petOwner->about ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-5">
                                    <h3 class=" text-dark font-weight-bold mb-10">Address Details:</h3>
                                     <div class="form-group row">
                                        <label class="col-3">Country</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text"
                                                value="{{$petOwner->address->country ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Address Line 1</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text"
                                                value="{{$petOwner->address->street ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">City</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text"
                                                value="{{$petOwner->address->city ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Zip / Postal Code</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text"
                                                value="{{$petOwner->address->post_code ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-52">
                                    <h3 class=" text-dark font-weight-bold mb-10">Account Status:</h3>
                                    <div class="form-group row mt-10 mb-10">
                                        <label class="col-3">Status</label>
                                        <div class="col-9">
                                           <input class="form-control form-control-solid" type="text"
                                                value="@if($petOwner->active) {{__('Active')}} @else {{__('De-Active')}} @endif" readonly/>
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
