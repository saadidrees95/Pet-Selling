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
                        Ads 
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
			 <a href="{{route('admin.ad.lists')}}" class="btn btn-light-primary font-weight-bolder mr-2">
                            Back
                        </a>
			<div class="btn-group">
				{{-- <button type="button" class="btn btn-light-success font-weight-bolder">
					Republish Ad
				</button> --}}
			</div>
		</div>
	</div>
	<div class="card-body">
		<!--begin::Form-->
		<form class="form" id="kt_form">
			<div class="row">
				<div class="col-xl-2"></div>
				<div class="col-xl-8">
                    <div class="my-5">
						<h3 class=" text-dark font-weight-bold mb-10">PetOwner Info:</h3>
						<div class="form-group row">
							<label class="col-3">Full Name</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="{{$ad->user->full_name ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Contact Number</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<input type="tel" class="form-control form-control-solid" value="{{$ad->user->mobile ?? ''}}" placeholder="Phone" readonly/>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Email Address</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<input type="email" class="form-control form-control-solid" value="{{$ad->user->email}}" placeholder="Email" readonly/>
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
								<input class="form-control form-control-solid" type="text" value="{{$ad->pets->name ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Species</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="{{$ad->pets->type->species ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Breed</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="{{$ad->pets->breed ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Size</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="{{$ad->pets->size->size ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Age</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<input type="text" class="form-control form-control-solid" value="{{$ad->pets->age->age ?? ''}}" placeholder="Phone" readonly/>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Medication</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<input type="text" class="form-control form-control-solid" value="{{$ad->pets->medication->medication ?? ''}}" placeholder="Email" readonly/>
								</div>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-3">Behavior</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<input type="text" class="form-control form-control-solid" value="{{$ad->pets->behavior ?? ''}}" placeholder="Email" readonly/>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">About</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<input type="text" class="form-control form-control-solid" placeholder="Username" value="{{$ad->pets->about ?? ''}}" readonly/>
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
								<input class="form-control form-control-solid" type="text" value="{{$ad->title ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Reference No.</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="{{$ad->ref ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Required Date</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="date" value="{{$ad->req_date ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Duration</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="tel" value="{{$ad->duration ?? ''}} {{__(' Days')}}" readonly/>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-3">Service</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="tel" value="{{$ad->service->title ?? ''}}" readonly/>
							</div>
						</div>
					</div>
                    <div class="separator separator-dashed my-10"></div>
					<div class="my-5">
						<h3 class=" text-dark font-weight-bold mb-10">Address Details:</h3>
						<div class="form-group row">
							<label class="col-3">Country</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="tel" value="{{$ad->user->address->country ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Street Address</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="{{$ad->user->address->street ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">City</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="{{$ad->user->address->city ?? ''}}" readonly/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Zip / Postal Code</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="{{$ad->user->address->post_code ?? ''}}" readonly/>
							</div>
						</div>
					</div>
					<div class="separator separator-dashed my-10"></div>
					<div class="my-52">
                    <h3 class=" text-dark font-weight-bold mb-10">Ad Status:</h3>
						<div class="form-group row mt-10">
							<label class="col-3">Status</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="@if($ad->active) {{__('Active')}} @else {{__('In-Active')}} @endif" readonly/>
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
