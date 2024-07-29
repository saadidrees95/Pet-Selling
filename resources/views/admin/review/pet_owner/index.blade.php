@extends('admin.layouts.app')

@section('content')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                        <div
                            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center flex-wrap mr-2">
                                <!--begin::Title-->
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                    Pet Owner Reviews
                                </h5>
                                <!--end::Title-->

                                <!--begin::Separator-->
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200">
                                </div>
                                <!--end::Separator-->

                                <!--begin::Search Form-->
                                <div class="d-flex align-items-center" id="kt_subheader_search">
                                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                                        {{$reviews->count()}} Total
                                    </span>
                                </div>
                                <!--end::Search Form-->

                            </div>
                            <!--end::Details-->

                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center">
                                <!--begin::Button-->
                                <a href="/metronic/demo1/.html" class=""> </a>
                                <!--end::Button-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                    </div>
                    <!--end::Subheader-->

                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <!--begin::Header-->
                                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            Pet Owner Reviews List
                                            <span class="d-block text-muted pt-2 font-size-sm">Reviews by Pet Owners</span>
                                        </h3>
                                    </div>
                                    <div class="card-toolbar">

                                        <!--begin::Button-->
                                        <a href="{{route('admin.dashboard')}}" class="btn btn-primary font-weight-bolder">
                                            <span
                                                class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                                        <path
                                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            Dashboard
                                        </a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body">
                                {{-- Flash Message --}}
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                    <!--begin: Datatable-->
                                    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                        id="kt_datatable" style="">
                                        <!-- table start -->
                                        <table class="datatable-table" style="display: block; overflow-x: scroll">
                                            <!-- table header -->
                                            <thead class="datatable-head">
                                                <tr class="datatable-row" style="left: 0px">
                                                    <th data-field="RecordID"
                                                        class="datatable-cell-left datatable-cell datatable-cell-sort datatable-cell-sorted"
                                                        data-sort="asc">
                                                        <span style="width: 40px">ID<i
                                                                class="flaticon2-arrow-up"></i></span>
                                                    </th>
                                                    <th data-field="Sitter" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 250px">Pet Owner</span>
                                                    </th>
                                                    {{-- <th data-field="ContactNo" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 120px">Contact No.</span>
                                                    </th> --}}
                                                    <th data-field="Location" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 250px; overflow:hidden;">Comment</span>
                                                    </th>
                                                    <th data-field="Service"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Rating</span>
                                                    </th>
                                                    <th data-field="Species"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 150px">Sitter Name</span>
                                                    </th>
                                                    <th data-field="Species"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Ad ID</span>
                                                    </th>
                                                    <th data-field="Register" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Created On</span>
                                                    </th>
                                                    <th data-field="Register" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Updated On</span>
                                                    </th>
                                                     <th data-field="Actions" data-autohide-disabled="false"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 130px">Actions</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <!-- table body -->
                                            <tbody style="" class="datatable-body">
                                                @foreach ($reviews as $review)
                                                
                                                <!-- table row -->
                                                <tr data-row="{{ $loop->index }}" class="datatable-row" style="left: 0px">
                                                    <td class="datatable-cell-sorted datatable-cell-left datatable-cell"
                                                        data-field="RecordID" aria-label="{{ $loop->iteration ?? '' }}">
                                                        <span style="width: 40px"><span
                                                                class="font-weight-bolder">{{ $loop->iteration ?? '' }}</span></span>
                                                    </td>
                                                    <td data-field="OrderID" aria-label="64616-103"
                                                        class="datatable-cell">
                                                        <span style="width: 250px">
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                   <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                    {{-- user profile pic --}}
                                                                    @if ($review && $review->user->userImage)
                                                                        <img src="{{ asset('storage/' . $review->user->userImage->image_path) }}" alt="Ad Image">
                                                                    @else
                                                                        <img src="assets/image/user-placeholder.png">
                                                                    @endif
                                                                </div>
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div
                                                                        class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                                        {{$review->user->full_name ?? ''}}
                                                                    </div>
                                                                    <a href="#"
                                                                        class="text-muted font-weight-bold text-hover-primary">{{$review->user->email ?? ''}}</a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </td>
                                                    {{-- <td data-field="Contact" aria-label="London" class="datatable-cell">
                                                        <span style="width: 120px">
                                                            <div class="font-weight-bold text-muted">
                                                                {{$review->user->mobile ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td> --}}
                                                    <td data-field="Comment" aria-label="Pets" class="datatable-cell">
                                                        <span style="width: 250px">
                                                            <div class="font-weight-bold text-muted">
                                                                {{$review->comment ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="Rating" aria-label="Casper-Kerluke"
                                                        class="datatable-cell">
                                                        <span style="width: 100px">
                                                            <div class="font-weight-bold text-muted">
                                                                {{$review->rating ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>    
                                                    <td data-field="Sitter_id" aria-label="Casper-Kerluke"
                                                        class="datatable-cell">
                                                        <span style="width: 150px">
                                                            <div class="font-weight-bold text-muted">
                                                                {{$review->sitter->user->full_name ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>                                                     
                                                    <td data-field="Ad ID" aria-label="5" class="datatable-cell">
                                                        <span style="width: 100px"><span
                                                                class="label label-lg font-weight-bold label-light-info label-inline">{{$review->ad_id ?? ''}}</span></span>
                                                    </td>
                                                   
                                                     <td data-field="CreatedDate" aria-label="req_date"
                                                        class="datatable-cell">
                                                        <span style="width: 100px">
                                                            <div class="font-weight-bold text-muted">
                                                               {{$review->created_at ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>
                                                     <td data-field="UpdatedDate" aria-label="req_date"
                                                        class="datatable-cell">
                                                        <span style="width: 100px">
                                                            <div class="font-weight-bold text-muted">
                                                               {{$review->updated_at ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>
                                                      <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                                        class="datatable-cell">
                                                        <span
                                                            style="
                                                                            overflow: visible;
                                                                            position: relative;
                                                                            width: 130px;
                                                                            ">
                                                    {{-- <a href="{{ route('admin.owner-review.destroy', ['id' => $review->id]) }}" class="btn btn-sm btn-default btn-text-primary btn-hover-danger btn-icon mr-2"
                                                        title="Delete"> <span
                                                            class="svg-icon svg-icon-primary svg-icon-2x">
                                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24"
                                                                        height="24" />
                                                                    <path
                                                                        d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                                                                        fill="#000000" fill-rule="nonzero" />
                                                                    <path
                                                                        d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                        fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> </a> --}}
                                                         <a href="{{ route('admin.owner-review.destroy', ['id' => $review->id]) }}" class="btn btn-sm btn-light-danger font-weight-bolder">Delete</a>
                                                </span>
                                            </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="datatable-pager datatable-paging-loaded">
                                        <div class="pagination">                
                                            <!-- Display Pagination Links -->
                                            {{ $reviews->links() }}
                                        </div>

                                        </div>
                                    </div>
                                    <!--end: Datatable-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
@endsection