<!doctype html>
{{-- lang --}}
<html class="no-js" lang="">

<head>
    <meta charset="UTF-8">
    {{-- title --}}
    <title>{{ $pageTitle ?? '' }}</title>
    {{-- meta name --}}
    <meta name="theme-color" content="#fff">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    {{-- meta property --}}
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    {{-- links starts --}}
    <link rel="apple-touch-icon" href="{{ asset('assets/png/icon.png') }}">
    {{-- stylesheet --}}
    <link rel="stylesheet" href="{{ asset('assets/font-awesome.5.9.0/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- manifest --}}
    {{-- <link rel="manifest" href="{{asset('assets/site.webmanifest')}}"> --}}
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
                        <h2>Sign In</h2>
                        <p>Please sumbit your email and password for login</p>
                        {{-- form start --}}
                        <form method="POST" class="content-area" action="{{ route('login') }}">
                            @csrf

                            <div class="form-floating">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <label>Captcha</label>
                                <span class="captcha">{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-success btn-refresh"><i class="fa-solid fa-arrows-rotate"></i></button>
                            </div>

                            <div class="form-floating">
                                <input id="captcha" type="text" class="form-control mt-2 @error('captcha') is-invalid @enderror"
                                    placeholder="Enter Captcha" name="captcha">
                                @error('captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input class="form-check-input mt-3" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">{{ __('Remember Me') }}</label>
                            </div>

                            {{-- <button class="btn btn-primary w-100 py-2 mt-3 mb-3" type="submit">{{ __('Sign In') }}</button> --}}
                            <input type="submit" value="{{ __('Sign In') }}">

                            <p>{{ __('Don\'t have id?') }} <a class="btn-link"
                                    href="{{ route('pre-signup') }}">{{ __('Please Sign Up here!') }}</a></p>
                            <a class="btn-link"
                                href="{{ route('forgot.password.form') }}">{{ __('Forgot Your Password?') }}</a>

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
    {{-- Scripts --}}
    <!-- <script src="js/vendor/modernizr-3.12.0.min.js"></script> -->
    <script src="{{ asset('assets/font-awesome.5.9.0/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }} "></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/library.js') }}"></script>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript">


        $(".btn-refresh").click(function(){
          $.ajax({
             type:'GET',
             url:'/refresh_captcha',
             success:function(data){
                $(".captcha").html(data.captcha);
             }
          });
        });


        </script>
</body>

</html>
