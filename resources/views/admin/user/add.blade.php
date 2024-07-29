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
                        Create User
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
                            Create New Admin
                        </h3>
                    </div>
                    <!--begin::Form-->
                   <!--begin::Form-->
                   <form class="form" method="POST" action="{{ route('admin.user') }}">
                    @csrf

                    <div class="card-body">
                        {{-- Your form fields --}}
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name">Full Name</label>
                                <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control form-control-solid @error('full_name') is-invalid @else is-valid @enderror" placeholder="Full Name" required/>
                                @error('full_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name">Mobile</label>
                                <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control form-control-solid @error('mobile') is-invalid @else is-valid @enderror" placeholder="054-123-456" required/>
                                @error('mobile')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name">Role</label>
                                <select class="form-control form-control-solid" id="kt_select2_1" name="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-solid @error('email') is-invalid @else is-valid @enderror" placeholder="john.doe@gmail.com" required/>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-solid @error('password') is-invalid @else is-valid @enderror" placeholder="Password" required/>
                                <input type="checkbox" id="showPassword"> Show Password
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name">Confirm Password</label>
                                <input type="password" id="confirmPassword" name="password_confirmation" class="form-control form-control-solid @error('password_confirmation') is-invalid @else is-valid @enderror" autocomplete="password_confirmation" placeholder="Confirm Password" required/>
                                <input type="checkbox" id="showConfirmPassword"> Show Password
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
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
@push('scripts')
<script>
    $(document).ready(function () {
        $('#showPassword').change(function () {
            const passwordInput = $('#password');
            passwordInput.attr('type', $(this).prop('checked') ? 'text' : 'password');
        });
        $('#showConfirmPassword').change(function () {
            const passwordInput = $('#confirmPassword');
            passwordInput.attr('type', $(this).prop('checked') ? 'text' : 'password');
        });
    });
</script>
@endpush
