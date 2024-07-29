@extends('web.layouts.app')

@section('content')
    {{-- Seller Profile Signup Starts --}}
    <section class="sprofile-sgnup">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#credit">Credit History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#picked">Picked Job</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Profile -->
                        <div id="profile" class="container tab-pane active">
                            <br>
                            {{-- Flash Message --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {!! session('success') !!}

                                </div>
                            @endif
                            <div class="main">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="desc">
                                            <h2>Sitter Profile</h2>
                                            {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="more">
                                            <a href="{{ route('sitter.profile.edit', ['id' => $user->id]) }}">Edit
                                                Profile</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="more">
                                            <a href="{{ route('sitter.profile.delete', $user->id) }}">Delete Profile</a>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="pic">
                                                    {{-- user profile pic --}}
                                                    @if ($user && $user->userImage)
                                                        <img src="{{ asset('storage/' . $user->userImage->image_path) }}"
                                                            alt="Ad Image">
                                                    @else
                                                        <img src="assets/image/user-placeholder.png">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Name</label>
                                                <input type="text" value="{{ $user->full_name ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Email</label>
                                                <input type="email" value="{{ $user->email ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Contact Number</label>
                                                <input type="tel" value="{{ $user->mobile ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label>National Insurance No.</label>
                                                <input type="text" name="insurance_number"
                                                    value="{{ $user->insurance_number ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Sit Type For Sitting</label>
                                                <input type="text" value="{{ $user->sitter->sit_type ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Species For Sitting</label>
                                                <div class="row">
                                                @foreach ($pet_types as $pet_type)
                                                    <input class="col-2" type="text" value="{{ $pet_type->species ?? '' }}" disabled>
                                                @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Sitter Experience</label>
                                                <input type="text"
                                                    value="{{ $user->sitter->experience->experience ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                                <input type="text" value="{{ $user->sitter->rate ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Sitter Availability</label>
                                                @if ($user->sitter->availability == 1)
                                                    <input type="text" value="{{ 'Available' }}" disabled>
                                                @else
                                                    <input type="text" value="{{ 'Not Available' }}" disabled>
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <div class="relative">
                                                    <label>Location</label>
                                                    <textarea name="" id="address" cols="30" rows="1" disabled>{{ $user->address->street ?? '' }}, {{ $user->address->post_code ?? '' }}, {{ $user->address->city ?? '' }}</textarea>
                                                    <div class="icon">
                                                        <img src="{{ asset('assets/image/map-marker.png') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <label>About You</label>
                                                <textarea name="" id="about" cols="30" rows="4" disabled>{{ $user->about ?? '' }}</textarea>
                                                <label>Notes</label>
                                                <textarea name="" id="notes" cols="30" rows="4" disabled>{{ $user->notes ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Credit History -->
                        <div id="credit" class="container tab-pane fade">
                            <br>
                            <div class="main">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="desc">
                                            <h2>Credit History</h2>
                                            {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="more">
                                            <a href="{{ route('package.lists') }}">Buy More</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="overflow">
                                            <p>Credit Balance: {{ $creditBalance }}</p>
                                            <table id="history">
                                                <tr>
                                                    <th>Order Date</th>
                                                    <th>Package</th>
                                                    <th>Pricing</th>
                                                    <th>Credits</th>
                                                </tr>
                                                <!-- Loop through orders and display order details -->
                                                @foreach ($order->orders as $orderItem)
                                                    <tr>
                                                        <td>{{ $orderItem->created_at->format('l, d F Y') ?? '' }}</td>
                                                        <td>{{ $orderItem->package->name ?? '' }}</td>
                                                        <td>£{{ $orderItem->package->price ?? '' }}</td>
                                                        <td>{{ $orderItem->package->credits ?? '' }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Picked Job -->

                        {{-- {{ dd($ads) }} --}}
                        <div id="picked" class="container tab-pane fade">
                            <br>
                            <div class="main">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="desc">
                                            <h2>Picked Job</h2>
                                            {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p> --}}
                                        </div>
                                    </div>
                                </div>

                                <!-- Pet Box -->
                                @if ($jobs)
                                    @foreach ($jobs->sitter->responses as $response)
                                        <div class="row box">
                                            <div class="col-md-2">
                                                <div class="pet-img">
                                                    @if ($response->ads && $response->ads->pets->image)
                                                        <img src="{{ asset('storage/' . $response->ads->pets->image->image_path ?? '') }}"
                                                            alt="Ad Image">
                                                    @else
                                                        <img src="assets/image/user-placeholder.png">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row align-items-end">
                                                    <div class="col-md-12">
                                                        <div class="persondetails">
                                                            <h4>Name</h4>
                                                            <p>{{ $response->ads->user->full_name ?? '' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="pet-details">
                                                            <h5>{{ $response->ads->title ?? '' }}</h5>
                                                            <p>Pet Name:
                                                                <strong>{{ $response->ads->pets->name ?? '' }}</strong></p>
                                                            <ul>
                                                                <li>Duration:</li>
                                                                <li><strong> {{ $response->ads->duration ?? '' }}
                                                                        Days</strong></li>
                                                            </ul>
                                                            <ul>
                                                                <li>Location:</li>
                                                                <li><strong>{{ $jobs->address->street ?? '' }}</strong>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li>Ad ID: </li>
                                                                <li><strong>{{ $response->ads->ref ?? '' }}</strong> </li>
                                                            </ul>
                                                            {{-- <ul>
                                                                @if ($response->ads->active === 1)
                                                                    <li>Status:</li>
                                                                    <li><strong>Active</strong></li>
                                                                @else
                                                                    <li>Status:</li>
                                                                    <li><strong>Expired</strong></li>
                                                                @endif
                                                            </ul> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="more">
                                                            <a
                                                                href="{{ route('my-job.show', ['id' => $response->ads->id]) }}">View
                                                                Details</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Sorry! you have no ad!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- Seller Profile Signup  Ends --}}
@endsection
