@extends('web.layouts.app')

@section('content')
    <!-- ================================ Seller Section Starts ================================  -->
    <section class="abtseller-1">
        <div class="container">
            {{-- Flash Message --}}
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="pic">
                        <img src="{{ asset('assets/image/seller-about.png') }}">
                    </div>
                    <div class="reviews-rating">
                        <h2>Reviews & Rating</h2>`
                        <div class="row">
                            <div class="col-md-4">
                                <h1 class="rate">4.8</h1>
                                <div class="starts">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="count">
                                    <p>{{ count($sitterReviews) }} Reviews</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="progress-head">
                                    <ul>
                                        <li>5</li>
                                        <li>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 80%"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li><span>4</span></li>
                                        <li>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 70%"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span>3</span>
                                        </li>
                                        <li>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 45%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li><span>2</span></li>
                                        <li>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 35%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li><span>1</span></li>
                                        <li>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="25%"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
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
                        @foreach ($sitterReviews as $review)
                            <div class="main">
                                <div class="pic">
                                    <!-- Display user profile picture here -->
                                    @if ($review && $review->user->userImage)
                                        <img src="{{ asset('storage/' . $review->user->userImage->image_path) }}"
                                            alt="User Image">
                                    @else
                                        <img src="assets/image/user-placeholder.png" alt="Pet Owner Image">
                                    @endif
                                </div>
                                <div class="title">
                                    <h4>{{ $review->user->name }}</h4>
                                    <div class="star">
                                        <!-- Display user rating stars here -->
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}"
                                                aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="content">
                                    <p>{{ $review->comment }}</p>
                                    <a href="#">Read more</a>
                                    <div class="det">
                                        <!-- Check if address relationship exists before accessing its properties -->
                                        <p>{{ optional($review->user->address)->street ?? 'N/A' }} .
                                            {{ optional($review->user->address)->city ?? 'N/A' }} .
                                            {{ $review->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- loop end --}}
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
                    {{ $sitterReviews->links() }}
                    {{-- {{ $sitterReviews->appends(request()->except('page'))->links() }} --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title">
                        <h4>{{ $sitter->user->full_name ?? '' }}</h4>
                    </div>
                    <div class="desc">
                        <p>{{ $sitter->title ?? '' }}</p>
                    </div>
                    <div class="reviews">
                        <h3>Reviews <span> ({{ count($sitterReviews) }})</span></h3>
                        <div class="starts">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
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
                            {{ $sitter->title ?? '' }}
                            <span id="dots">...</span><span id="more">{{ $sitter->user->about ?? '' }}.
                                <!-- ... Display remaining about me text ... -->
                            </span>
                        </p>
                        <button onclick="myFunction()" id="myBtn">Read more</button>
                    </div>
                    <div class="hire">
                        {{-- <a href="#rate-seller">Hire Me</a> --}}
                         <a href="#">Edit Comments</a>
                    </div>
                    <div class="rate-seler">
                        {{-- form --}}
                        <form id="rate-seller" method="POST" action="{{ route('sitter.review.store') }}">
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
                                            <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">
                                            <input type="hidden" name="sitter_id" value="{{ $sitter->id ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Name</label>
                                            <input type="text" name="full_name"
                                                class="@error('full_name') is-invalid @enderror"
                                                value="{{ $user->full_name ?? '' }}" required>
                                            @error('full_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Email</label>
                                            <input type="email" name="email"
                                                class="@error('email') is-invalid @enderror"
                                                value="{{ $user->email ?? '' }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label>Contact Number</label>
                                            <input type="tel" name="mobile"
                                                class="@error('mobile') is-invalid @enderror"
                                                value="{{ $user->mobile ?? '' }}" required>
                                            @error('mobile')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label>Write a Review</label>
                                            <textarea name="comment" id="" class="@error('comment') is-invalid @enderror" cols="30"
                                                rows="1" placeholder="Describe your experiance" required></textarea>
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
