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
                        Admin Area
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
            <div class="container" style="max-width:600px">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            Update Admin Settings
                        </h3>
                    </div>
                    <!--begin::Form-->
                    <form class="form" method="POST" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            {{-- Your form fields --}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="full_name" class="form-control form-control-solid @error('full_name') is-invalid @else is-valid @enderror" value="{{$admin->full_name}}" placeholder="Title" required/>
                                @error('full_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Email</label>
                                <input type="tel" name="email" class="form-control form-control-solid @error('email') is-invalid @else is-valid @enderror" value="{{$admin->email}}" placeholder="Email" required/>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Image</label>
                                {{-- <input type="tel" name="credits" class="form-control form-control-solid @error('credits') is-invalid @else is-valid @enderror" value="{{ old('credits') }}" placeholder="Credits" required/> --}}
                                <input type="file" class="form-control form-control-solid @error('image') is-invalid @else is-valid @enderror" name="image">
                                 @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
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
