@extends('web.layouts.app')

@section('content')
   {{-- mid sec start --}}
   <section class="pre-secion-1">
    
        <div class="container">
            <div class="pre-heading row">
                <div class="col-md-12">
                    <h2 style="color: gray;">Become a valued member of our community!</h2>
                    <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                </div>
            </div>
            
            <div class="pre-main row">
                <div class="col-md-6">
                    <a href="{{route('sitter.register.form')}}" class="pre-box">
                        <img src="{{asset('assets/image/landing-bg.png')}}" alt="">
                        <p>Pet Sitter</p>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{route('register.form')}}" class="pre-box">
                        <img src="{{asset('assets/image/landing-bg.png')}}"  alt="">
                        <p>Post Advertisement</p>
                    </a>
                </div>
            </div>
        </div>

   </section>
@endsection