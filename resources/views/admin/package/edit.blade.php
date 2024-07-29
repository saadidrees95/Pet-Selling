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
                        Edit Package
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
                            Edit Package
                        </h3>
                    </div>
                    <!--begin::Form-->
                   <form class="form" method="POST" action="{{ route('admin.package.update') }}">
                         @method('PUT')
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Title</label>
                                 <input type="hidden" name="id" class="form-control form-control-solid" value="{{$package->id}}" required/>
                                  <input type="text" name="name" value="{{$package->name}}" class="form-control form-control-solid @error('name') is-invalid @else is-valid @enderror" placeholder="Package Name" required/>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Price</label>
                                 <input type="tel" name="price" class="form-control form-control-solid @error('price') is-invalid @else is-valid @enderror" value="{{$package->price}}" placeholder="$" required/>
                                 @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Credits</label>
                                 <input type="tel" name="credits" class="form-control form-control-solid @error('credits') is-invalid @else is-valid @enderror" value="{{$package->credits}}" placeholder="Credits" required/>
                                 @error('credits')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
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
 