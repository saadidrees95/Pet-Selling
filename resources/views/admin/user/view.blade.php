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
                        User Details
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
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container" style="max-width:750px">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            User Details
                        </h3>
                    </div>
                    <!--begin::Form-->
                   <!--begin::Form-->
                    <form class="form" >
                        <div class="card-body">
                            {{-- Your form fields --}}
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="full_name" class="form-control form-control-solid" value="{{$user->full_name ?? ''}}" disabled/>
                                    <input type="hidden" name="user_id" class="form-control form-control-solid" value="{{$user->id ?? ''}}" disabled/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name">Mobile</label>
                                    <input type="tel" name="mobile" class="form-control form-control-solid" value="{{$user->mobile ?? ''}}" disabled/>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Role</label>
                                    <input type="text" name="role_id" class="form-control form-control-solid" value="{{ $user->role->name ?? '' }}" disabled/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" name="email" class="form-control form-control-solid" value="{{$user->email ?? ''}}" disabled/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button onclick="goBack()" type="reset" class="btn btn-secondary">Back</button>
                        </div>
                    </form>
                    <!--end::Form-->
                   <script>
                        function goBack() {
                            // Use the history object to go back one step in the browser history
                            window.history.back();
                        }
                    </script>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
 