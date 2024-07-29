@extends('web.layouts.app')

@section('content')
   <!-- ================================ Seller Section Starts ================================  -->
      <section class="abtseller-1">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="pic">
                       <!-- Display user profile picture here -->
                            @if ($pet_owner && $pet_owner->userImage)
                                <img src="{{ asset('storage/' . $pet_owner->userImage->image_path) }}" alt="User Image">
                            @else
                                 <img src="{{asset('assets/image/seller-about.png')}}">
                            @endif

                  </div>
                  <div class="reviews-rating">
                     <h2>Reviews & Rating</h2>`
                     <div class="row">
                        <div class="col-md-4">
                           <h1 class="rate">{{$averageRating}}</h1>
                           {{-- <div class="starts">
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                           </div> --}}
                           <div class="count"><p>{{ count($petOwnerReviews) ?? '0' }} Reviews</p></div>
                        </div>
                        <div class="col-md-8">
                           <div class="progress-head">
                              <ul>
                                 <li>5</li>
                                 <li>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: {{($ratingFive/$totalRating)*100}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                              <ul>
                                 <li><span>4</span></li>
                                 <li>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: {{($ratingFour/$totalRating)*100}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                              <ul>
                                 <li>
                                    <span>3</span>
                                 </li>
                                 <li>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: {{($ratingThree/$totalRating)*100}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                              <ul>
                                 <li><span>2</span></li>
                                 <li>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: {{($ratingTwo/$totalRating)*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                              <ul>
                                 <li><span>1</span></li>
                                 <li>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: {{($ratingOne/$totalRating)*100}}%" aria-valuenow="25%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>

                   <!-- Reviews List -->
            <div class="reviews-list">
                {{-- loop start --}}
                 {{-- Check if there are reviews available --}}
               @if ($petOwnerReviews && count($petOwnerReviews) > 0)
                  {{-- Loop through reviews if available --}}
                  @foreach ($petOwnerReviews as $review)
                    <div class="main">
                        <div class="pic">
                            <!-- Display user profile picture here -->
                            @if ($review && $review->sitter->user->userImage)
                                <img src="{{ asset('storage/' . $review->sitter->user->userImage->image_path) }}" alt="User Image">
                            @else
                                <img src="assets/image/user-placeholder.png" alt="Pet Owner Image">
                            @endif
                        </div>
                        <div class="title">
                            <h4>{{ $review->sitter->user->name }}</h4>
                            <div class="star">
                                <!-- Display user rating stars here -->
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}" aria-hidden="true"></i>
                                @endfor
                            </div>
                        </div>
                        <div class="content">
                            <p>{{ $review->comment }}</p>
                            <a href="#">Read more</a>
                            <div class="det">
                                <!-- Check if address relationship exists before accessing its properties -->
                               <p>{{ optional($review->sitter->user->address)->street ?? 'N/A' }} . {{ optional($review->sitter->user->address)->city ?? 'N/A' }} . {{$review->sitter->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- loop end --}}
                @else
                  <!-- Display a message if there are no reviews available -->
                  <div class="main">
                     <p>No reviews available.</p>
                  </div>
               @endif
            </div>
            <!-- Pagination for reviews can be added here if needed -->
                  {{-- <nav aria-label="Page navigation example">
                     <ul class="pagination">
                       <li class="page-item">
                         <a class="page-link" href="#" aria-label="Previous">
                           <span aria-hidden="true">&laquo;</span>
                           <span class="sr-only">Previous</span>
                         </a>
                       </li>
                       <li class="page-item"><a class="page-link" href="#">1</a></li>
                       <li class="page-item"><a class="page-link" href="#">2</a></li>
                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                       <li class="page-item">
                         <a class="page-link" href="#" aria-label="Next">
                           <span aria-hidden="true">&raquo;</span>
                           <span class="sr-only">Next</span>
                         </a>
                       </li>
                     </ul>
                   </nav> --}}
                    <div class="pagination">
                    {{-- pagination links --}}
                    {{ $petOwnerReviews->links() }}
                    {{-- {{ $petOwnerReviews->appends(request()->except('page'))->links() }} --}}
                    </div>
               </div>
               <div class="col-md-6">
                  <div class="title">
                     <h4>{{$pet_owner->full_name ?? ''}}</h4>
                  </div>
                  <div class="desc">
                     {{-- <p>{{$pet_owner->title}}</p> --}}
                  </div>
                  <div class="reviews">
                        {{-- <h3>Reviews <span> ({{ count($petOwnerReviews) ?? '0' }})</span></h3>
                        <div class="starts">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div> --}}
                     <div class="list">
                        <ul>
                           <li> <i class="fa fa-check" aria-hidden="true"></i> Email verified</li>
                           <li> <i class="fa fa-check" aria-hidden="true"></i> Phone verified</li>
                           {{-- <li> <i class="fa fa-check" aria-hidden="true"></i> ID verified</li>
                           <li> <i class="fa fa-check" aria-hidden="true"></i> 25 external references</li> --}}
                        </ul>
                     </div>
                  </div>
                  <div class="about">
                     <h5>About Me</h5>
                    <p>
                    <!-- Display truncated about me text -->
                    {{ $pet_owner->about ?? ''}}
                    <span id="dots">...</span><span id="more">{{ $pet_owner->about ?? ''}}.
                        <!-- ... Display remaining about me text ... -->
                    </span>
                </p>
                <button onclick="myFunction()" id="myBtn">Read more</button>
                  </div>
                  <div class="hire">
                     <a href="#rate-seller">Edit Review</a>
                  </div>
                  <div class="rate-seler">
                    {{-- form --}}
                    <form id="rate-seller" method="POST" action="{{route('pet-owner.review.store')}}">
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <h2>Rate this saller</h2>
                           <div class="rate">
                              <input type="radio" id="star5" name="rating" value="5" />
                              <label for="star5" title="text">5 stars</label>
                              <input type="radio" id="star4" name="rating" value="4" />
                              <label for="star4" title="text">4 stars</label>
                              <input type="radio" id="star3" name="rating" value="3" />
                              <label for="star3" title="text">3 stars</label>
                              <input type="radio" id="star2" name="rating" value="2" />
                              <label for="star2" title="text">2 stars</label>
                              <input type="radio" id="star1" name="rating" value="1" />
                              <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <small class="text-right">Rating & Reviews are verified</small>
                        </div>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <input type="hidden" name="user_id" value="{{$pet_owner->id ?? ''}}" required>
                                    <input type="hidden" name="sitter_id" value="{{$sitter->sitter->id ?? ''}}" required>
                                 </div>
                                 <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="full_name" class="@error('full_name') is-invalid @enderror" value="{{$sitter->full_name ?? ''}}" placeholder="Jonathan tan" required>
                                     @error('full_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                 </div>
                                 <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="email" name="email" class="@error('email') is-invalid @enderror" value="{{$sitter->email ?? ''}}" placeholder="jonathan@gmail.com" required>
                                     @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                 </div>
                                 <div class="col-md-12">
                                    <label>Contact Number</label>
                                    <input type="tel" name="mobile" class="@error('mobile') is-invalid @enderror" value="{{$sitter->mobile ?? ''}}" placeholder="000-1234-465" required>
                                     @error('mobile')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    <label>Write a Review</label>
                                    <textarea name="comment" id="" class="@error('comment') is-invalid @enderror" cols="30" rows="1" placeholder="Describe your experiance"></textarea>
                                     @error('comment')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    <input type="submit" value="Submit">
                                 </div>
                              </div>
                           </div>
                        </div>
                    </form>
                    {{-- form --}}
                  </div>
               </div>
            </div>
         </div>
      </section>
      {{-- Seller Section Ends --}}

@endsection
