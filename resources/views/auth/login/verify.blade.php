<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Email Verification - Pet Lodger</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta name="theme-color" content="#fff">

    <!------------------------- Links Start ---------------------->
    <link rel="apple-touch-icon" href="{{ asset('assets/png/icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="manifest" href="{{ asset('assets/site.webmanifest') }}">
    <!------------------------- Links End ------------------------>
</head>

<body class="body-bg">

    <!-- ================================ Verification Starts ================================  -->
    <section class="ver">
        <div class="container-fluid p-0">
            <div class="row p-0">
                <div class="col-md-7">
                    <div class="logo">
                        <img src="{{ asset('assets/image/site_logo.png') }}">
                    </div>
                    <div class="desc">
                        <h2>Confirm OTP Code</h2>
                        <p>To complete the <strong>login process</strong> please enter the verification code we sent you
                            by email</p>
                        <form class="content-area" method="POST" action="{{ route('login.verification') }}">

                            @csrf

                            <fieldset class='number-code'>
                                <legend>Verification Code</legend>
                                <div>
                                    <input name='code1' class='code-input' required />
                                    <input name='code2' class='code-input' required />
                                    <input name='code3' class='code-input' required />
                                    <input name='code4' class='code-input' required />
                                </div>
                            </fieldset>
                            <input type="submit" value="Verify">
                        </form>
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
    <!-- ================================ Verification Ends ================================  -->
    <!-- ================================ Scripts ================================  -->
    <!-- <script src="js/vendor/modernizr-3.12.0.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>
    <script src="{{ asset('assets/js/jquery.js') }} "></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/library.js') }}"></script>
</body>

</html>
