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
                            Sitter Details <i class="mr-2"></i>
                            {{-- <small class="">try to scroll the page</small> --}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{route('admin.sitter.lists')}}" class="btn btn-light-primary font-weight-bolder mr-2">
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Form-->
                    <form class="form" id="kt_form">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class=" text-dark font-weight-bold mb-10">Personal Info:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Full Name</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text" value="{{$sitter->full_name ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Contact Phone</label>
                                        <div class="col-9">
                                            <input type="tel" class="form-control form-control-solid"
                                                    value="{{$sitter->mobile ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Insurance Number</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-solid"
                                                    value="{{$sitter->insurance_number ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-3">Email Address</label>
                                        <div class="col-9">
                                            <input type="email" class="form-control form-control-solid"
                                                    value="{{$sitter->email ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-3">About</label>
                                        <div class="col-9">
                                            <textarea name="about" class="form-control form-control-solid" rows="3" readonly>{{$sitter->about ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                  <div class="separator separator-dashed my-10"></div>
                                    <div class="my-5">
                                    <h3 class=" text-dark font-weight-bold mb-10">Sitter Details:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Sitt Type</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text" value="{{$sitter->sitter->sit_type ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Sitter Experience</label>
                                        <div class="col-9">
                                            <input type="tel" class="form-control form-control-solid"
                                                    value="{{$sitter->sitter->experience->experience ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Rate</label>
                                        <div class="col-9">
                                            <input type="tel" class="form-control form-control-solid"
                                                    value="{{$sitter->sitter->rate ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-3">Availability</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-solid"
                                                    value="@if($sitter->sitter->availability) {{__('Available')}} @else {{__('Not Available')}} @endif" readonly/>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-3">Species</label>
                                        <div class="col-9">
                                             <input type="text" class="form-control form-control-solid"
                                                    value="{{$sitter->sitter->petType->species ?? ''}}" readonly/>
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
                                                value="{{$sitter->address->country ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Address Line 1</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text"
                                                value="{{$sitter->address->street ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">City</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text"
                                                value="{{$sitter->address->city ?? ''}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Zip / Postal Code</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text"
                                                value="{{$sitter->address->post_code ?? ''}}" readonly/>
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
                                                value="@if($sitter->active) {{__('Active')}} @else {{__('De-Active')}} @endif" readonly/>
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
