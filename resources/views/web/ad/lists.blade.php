@extends('web.layouts.app')

@section('content')
<style>
a.filter-clear-button{
   border: border:1px solid #E2E8F0;
   border-radius:12px;
   padding:5px 5px;
   font-size: 14px;

}

</style>
   <section class="listing-1">
      <div class="container">
            <div class="row">
               <div class="col-md-10">
                  <h1>Listing</h1> 
                   {{-- <a href="{{route('ad.lists')}}" style="border:1px solid #E2E8F0; border-radius:12px; padding:5px 5px; margin-top:10px; font-size: 14px;">Clear Filter</a>   --}}
               </div>         
               <div class="col-md-2">
                  <div class="filters">
                     <button class="filter-button"><svg class="svg-inline--fa fa-filter fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"></path></svg><!-- <i class="fas fa-filter"></i> --> Filter </button>
                                      
                    <div class="dropdown-content-1">
                        {{-- Advanced filter form start --}}
                        @include('web.includes.filter-form')
                          <a href="{{route('ad.lists')}}" style="font-size:14px;">Clear Filter</a>  
                     </div>
                  </div>
                  <div class="item-list">
                     <!-- Your item listing goes here -->
                  </div>
               </div>
            </div>
            <div class="item-list">
               @forelse ($ads as $ad)
                  <div class="row list-box">
                     <div class="col-md-3">
                        <div class="pic">
                           @if ($ad->pets->image && $ad->pets->image)
                              <img src="{{ asset('storage/' . $ad->pets->image->image_path ?? '') }}"  width="277" height="265"  alt="Ad Image">
                           @else
                              <img src="assets/image/user-placeholder.png">
                           @endif
                        </div>
                     </div>
                     <div class="col-md-9">
                        <div class="desc">
                           <h5>{{ $ad->title ?? ''}}</h5>
                           <p class="inner-1">Ad Responses: <span>{{ $ad->responses[0]['responses_count'] ?? '0'}}</span></p>
                           <p class="inner-1">Pet Name: <span>{{ $ad->pets->name ?? ''}}</span></p>
                           <p class="inner-1">Duration: <span>{{ $ad->duration ?? ''}} Days</span></p>
                           <p class="inner-1">Location: <span>{{ $ad->user->address->street ?? '' }}, {{ $ad->user->address->city ?? ''}}</span></p>
                           <p><strong>Additional Details:</strong></p>
                           <p>{{ $ad->about ?? ''}}</p>
                           <div class="view">
                              <a href="{{ route('ad.show', ['id' => $ad->id]) }}">View Details</a>
                           </div>
                        </div>
                     </div>
                  </div>
                   @empty
               <p>Sorry! There is no Ad!</p>
               @endforelse

            </div>
            {{-- <div class="load-more">
               <a href="#">Load More</a>
            </div> --}}
            <div class="pagination">                
               {{-- pagination links --}}
               {{-- {{ $ads->links() }} --}}
               {{ $ads->appends(request()->except('page'))->links() }}
            </div>
            <a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
      </div>
   </section>
@endsection
