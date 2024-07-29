@extends('web.layouts.app')

@section('content')
    <!-- ================================ Seler Register Starts ================================  -->
    <section class="rseller">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="desc">
                        <h1>Register as a Sitter</h1>
                        {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p> --}}
                    </div>
                    {{-- form start --}}

                    <form method="POST" action="{{ route('sitter.register') }}" id="sitter" enctype="multipart/form-data">
                        @method('POST')
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label>Full Name</label>
                                <input type="text" name="full_name" class="@error('full_name') is-invalid @enderror"
                                    value="{{ old('full_name') }}" placeholder="Full Name" required>
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="@error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="Email address" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input type="password" id="password" name="password"
                                    class="@error('password') is-invalid @enderror" value="{{ old('password') }}" required>
                                <input type="checkbox" id="showPassword"> Show Password
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Confirm Password</label>
                                <input type="password" id="confirmPassword" name="password_confirmation"
                                    class="@error('password_confirmation') is-invalid @enderror"
                                    value="{{ old('password_confirmation') }}" required>
                                <input type="checkbox" id="showConfirmPassword"> Show Password
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Contact Number</label>
                                <input type="tel" name="mobile" class="@error('mobile') is-invalid @enderror"
                                    value="{{ old('mobile') }}" placeholder="Your mobile number" required>
                                @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label>Street</label>
                                <div class="relative">
                                    <input type="text" name="street" class="@error('street') is-invalid @enderror"
                                        value="{{ old('street') }}" placeholder="Your location" required>
                                    @error('street')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="icon">
                                        <img src="{{ asset('assets/image/map-marker.png') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label>City</label>
                                <div class="relative">
                                    <input type="text" name="city" class="@error('city') is-invalid @enderror"
                                        value="{{ old('city') }}" placeholder="Your location" required>
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="icon">
                                        <img src="{{ asset('assets/image/map-marker.png') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Post Code</label>
                                <div class="relative">
                                    <input type="text" name="post_code" class="@error('post_code') is-invalid @enderror"
                                        value="{{ old('post_code') }}" placeholder="Your location" required>
                                    @error('post_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="icon">
                                        <img src="{{ asset('assets/image/map-marker.png') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Year of Experience</label>
                                <select name="experience" id="experience">
                                    @foreach ($sitter_experiences as $sitter_experience)
                                        <option value="{{ $sitter_experience->id }}">
                                            {{ $sitter_experience->experience }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Species for Pet Sitting</label>
                                <select class="form-control" name="species[]" id="pet_type" multiple>
                                    @foreach ($pet_type as $type)
                                        <option value="{{ $type->id }}">{{ $type->species }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Select type of Sit</label>
                                <div id="checklist">
                                    <input checked="" value="House Sitter" name="sit_type" type="radio"
                                        id="01">
                                    <label for="01">House Sitter</label>
                                    <input value="Pet Sitter" name="sit_type" type="radio" id="02">
                                    <label for="02">Pet Sitter</label>
                                    <input value="Combine" name="sit_type" type="radio" id="03">
                                    <label for="03">Combine</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Other Species</label>
                                <input type="text" name="other_species"
                                    class="@error('other_species') is-invalid @enderror"
                                    value="{{ old('other_species') }}" min="1" max="100"
                                    placeholder="other species" required>
                                @error('other_species')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="d-block">Insurance</label>
                                <div class="d-flex">
                                    <div class="mr-3 ">
                                        <label class="m-0">Yes</label>
                                        <input type="radio" name="insurance" value="1"
                                            @if (old('insurance') == 'yes') checked @endif required
                                            style="width: 18px;">
                                    </div>
                                    <div>
                                        <label class="m-0">No</label>
                                        <input type="radio" name="insurance" value="0"
                                            @if (old('insurance') == 'no') checked @endif required
                                            style="width: 18px;">
                                    </div>
                                </div>
                                @error('insurance')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Please note that without insurance, it is not possible to access the platform.
                                </small>
                            </div>
                            <div class="col-md-12">
                                <label>About You</label>
                                <textarea name="about" id="" class="@error('about') is-invalid @enderror" cols="100" rows="1"
                                    placeholder="Write some details about your self" required>{{ old('about') }}</textarea>
                                @error('about')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="upload upload-btn-wrapper">
                                    <label>Upload Document</label>
                                    <button class="btn"> <img src="{{ asset('assets/image/upload-icon.png') }}"
                                            alt=""> Upload </button>
                                    <input type="file" name="document"
                                        class="@error('document') is-invalid @enderror accept="image/*" required>
                                    <p style="font-size:14px">The document size must not exceed 50MB.</p>
                                    @error('document')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <input type="submit" value="Submit Query">
                            </div>

                        </div>
                    </form>
                    {{-- form ends --}}
                </div>
            </div>
        </div>
    </section>
    <!-- ================================  Seler Register  Ends ================================  -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#showPassword').change(function() {
                const passwordInput = $('#password');
                passwordInput.attr('type', $(this).prop('checked') ? 'text' : 'password');
            });
            $('#showConfirmPassword').change(function() {
                const passwordInput = $('#confirmPassword');
                passwordInput.attr('type', $(this).prop('checked') ? 'text' : 'password');
            });
            $('#pet_type').select2();
        });

    </script>
@endpush
