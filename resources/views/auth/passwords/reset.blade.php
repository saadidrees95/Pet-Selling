
<!DOCTYPE html>
<html class="no-js" lang="">
   <head>
      <meta charset="utf-8">
      <title>Reset Password - Pet Lodger</title>
     <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta property="og:title" content="">
      <meta property="og:type" content="">
      <meta property="og:url" content="">
      <meta property="og:image" content="">
      <meta name="theme-color" content="#fff">

      <!------------------------- Links Start ---------------------->
      <link rel="apple-touch-icon" href="{{asset('assets/png/icon.png')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"/>
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}"/>
      <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
      <link rel="manifest" href="{{asset('assets/site.webmanifest')}}">
      <!------------------------- Links End ------------------------>
   </head>
   <body class="body-bg">

   <!-- ================================ Verification Starts ================================  -->
      <section class="ver">
         <div class="container-fluid p-0">
            <div class="row p-0">
               <div class="col-md-7">
                  <div class="logo">
                     <img src="{{asset('assets/image/site_logo.png')}}">
                  </div>
                  <div class="desc">
                     <h2>Create New Password</h2>
                     <p>Pleas create a new password for your account</p>
                     <form method="POST" action="{{route('reset.password')}}" class="content-area">
                         
                        @csrf
                        
                        <div class="form-floating">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new_password">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <input type="submit" value="{{ __('Submit') }}">
                      </form>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="pic">
                     <img src="{{asset('assets/image/verifocation-1.png')}}" alt="">
                  </div>
               </div>
            </div>
         </div>
      </section>
   <!-- ================================ Verification Ends ================================  -->
   <!-- ================================ Scripts ================================  -->
   <!-- <script src="js/vendor/modernizr-3.12.0.min.js"></script> -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>
   <script src="{{asset('assets/js/jquery.js')}} "></script>
   <script src="{{asset('assets/js/slick.min.js')}}"></script>
   <script src="{{asset('assets/js/main.js')}} "></script>
   <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('assets/js/library.js')}}"></script>
   </body>
</html>