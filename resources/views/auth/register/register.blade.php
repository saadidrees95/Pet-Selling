<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle ?? '' }}</title>
    <meta name="theme-color" content="#fff">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="apple-touch-icon" href="{{ asset('assets/png/icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body class="body-bg">

    <section class="ver">
        <div class="container-fluid p-0">
            <div class="row p-0">
                <div class="col-md-7">
                    <div class="logo">
                        <a href="{{ route('welcome') }}"><img src="{{ asset('assets/image/site_logo.png') }}"></a>
                    </div>
                    <div class="desc">
                        <h2>Sign Up</h2>
                        {{-- <p>Please register with your email to submit ads free of cost!</p> --}}

                        {{-- form start --}}
                        <form method="POST" class="content-area" action="{{ route('register') }}">   
                            @csrf    

                            <div class="form-floating">
                            <label for="full_name">{{ __('Full Name') }}</label>
                            <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{old('full_name')}}"  autocomplete="full_name" required autofocus>
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" autocomplete="email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                            <label for="mobile">{{ __('Phone Number') }}</label>
                            <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{old('mobile')}}" autocomplete="mobile" required>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" autocomplete="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="form-floating">
                            <label for="password">{{ __('Confirm Password') }}</label>
                            <input id="confirm_password" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{old('password_confirmation')}}" autocomplete="password_confirmation" required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                           
                            {{-- <button class="btn btn-primary w-100 py-2 mt-3 mb-3" type="submit">{{ __('Sign Up') }}</button> --}}
                            <input type="submit" value="{{ __('Sign Up') }}">
                            
                            <p>{{ __('Alreday have id? | ') }}  <a class="btn-link" href="{{ route('login.form') }}">{{ __('Please Sign In here!') }}</a></p>    
                                                                                    
                        </form>
                        {{-- from ends --}}

                        <p class="mt-5 mb-3 text-body-secondary">&copy;2017–2023</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="pic">
                        <img src="{{ asset('assets/image/verifocation-1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/library.js') }}"></script>
</body>

</html>
