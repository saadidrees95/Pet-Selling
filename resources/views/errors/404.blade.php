@extends('web.layouts.app')

@section('content')
      
      <section class="abt-banner banner" style="background-image: url({{asset('assets/image/abt-banner.png')}});">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="headline">
                    {{-- <h1>404 Not Found</h1> --}}
                 </div>
              </div>
           </div>
        </div>
     </section>

     <div class="not-found">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="desc">
              <h1>Page Not Found</h1>
              <p>Sorry, but the page you were trying to view does not exist.</p>
            </div>
          </div>
        </div>
      </div>
     </div>
@endsection
