@extends('web.layouts.app')

@section('content')
  <!-- ================================ Header Ends ================================  -->
      <section class="checout-1">
         <div class="container">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2>Error!</h2>
                    {{-- Flash Message --}}
                     @if (session('error'))
                        <div class="alert alert-danger">
                           {{ session('error') }}
                        </div>
                     @endif
            </div>
            <div class="col-md-2"></div>
         </div>
      </section>
   <!-- ================================ Footer Starts ================================  -->

  
@endsection