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
                                    Orders
                                </h5>
                                <!--end::Title-->

                                <!--begin::Separator-->
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200">
                                </div>
                                <!--end::Separator-->

                                <!--begin::Search Form-->
                                <div class="d-flex align-items-center" id="kt_subheader_search">
                                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                                       {{$orders->count()}} Total
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
                                           Order List
                                            <span class="d-block text-muted pt-2 font-size-sm">Order management made
                                                easy</span>
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
                                        <!--begin::Button-->
                                        <a href="{{route('export.orders')}}" class="btn btn-primary font-weight-bolder">
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
                                            Export
                                        </a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body">
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
                                                    <th data-field="OrderID"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 230px">Sitter Name</span>
                                                    </th>
                                                    <th data-field="Country"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 130px">Package</span>
                                                    </th>
                                                    <th data-field="Country"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Amount</span>
                                                    </th>

                                                    {{-- <th data-field="CompanyName"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Discount</span>
                                                    </th> --}}
                                                    <th data-field="ShipDate"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Total Amt.</span>
                                                    </th>
                                                    <th data-field="Country"
                                                    class="datatable-cell datatable-cell-sort">
                                                    <span style="width: 100px">Transaction Id</span>
                                                </th>
                                                    <th data-field="Status"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Created On</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <!-- table body -->
                                            <tbody style="" class="datatable-body">
                                                <!-- table row -->
                                                @foreach ($orders as $order)

                                                <tr data-row="{{ $loop->index }}" class="datatable-row" style="left: 0px">
                                                    <td class="datatable-cell-sorted datatable-cell-left datatable-cell"
                                                        data-field="RecordID" aria-label="{{ $loop->iteration ?? '' }}">
                                                        <span style="width: 40px"><span
                                                                class="font-weight-bolder">{{ $loop->iteration ?? '' }}</span></span>
                                                    </td>
                                                    <td data-field="OrderID" aria-label="64616-103"
                                                        class="datatable-cell">
                                                        <span style="width: 230px">
                                                            <div class="d-flex align-items-center">
                                                                {{-- <div
                                                                    class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                    <span
                                                                        class="symbol-label font-size-h4 font-weight-bold">H</span>
                                                                </div> --}}
                                                                <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                    {{-- user profile pic --}}
                                                                    @if ($order->user && $order->user->userImage)
                                                                        <img src="{{ asset('storage/' . $order->user->userImage->image_path) }}" alt="Ad Image">
                                                                    @else
                                                                        <img src="assets/image/user-placeholder.png">
                                                                    @endif
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div
                                                                        class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                                        {{$order->user->full_name ?? ''}}
                                                                    </div>
                                                                    <a href="#"
                                                                        class="text-muted font-weight-bold text-hover-primary">{{$order->user->email ?? ''}}</a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="City" aria-label="London" class="datatable-cell">
                                                        <span style="width: 130px">
                                                            <div class="font-weight-bolder font-size-lg mb-0">
                                                                {{$order->package->name ?? ''}}
                                                            </div>
                                                            <div class="font-weight-bold text-muted">
                                                                {{$order->package->credits ?? ''}} {{' ' . 'Credits'}}
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="Pets" aria-label="Pets" class="datatable-cell">
                                                        <span style="width: 100px">
                                                             <div class="font-weight-bold text-muted">
                                                                {{ '$ ' . $order->package->price ?? ''}}
                                                            </div>
                                                            {{-- <div class="font-weight-bold text-muted">
                                                                {{$order->package->price}}
                                                            </div> --}}
                                                        </span>
                                                    </td>
                                                    {{-- <td data-field="CompanyName" aria-label="Casper-Kerluke"
                                                        class="datatable-cell">
                                                        <span style="width: 100px">
                                                            <div class="font-weight-bold text-muted">
                                                               {{'No Discount'}}
                                                            </div>
                                                        </span>
                                                    </td> --}}
                                                    <td data-field="ShipDate" aria-label="10/15/2017"
                                                        class="datatable-cell">
                                                        <span style="width: 100px">
                                                            <div class="font-weight-bolder text-primary mb-0">
                                                               {{'$ ' . $order->total_amount ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="ShipDate" aria-label="10/15/2017"
                                                        class="datatable-cell">
                                                        <span style="width: 100px">
                                                            <div class="font-weight-bolder text-primary mb-0">
                                                               {{'$ ' . $order->transaction_id ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="ShipDate" aria-label="10/15/2017"
                                                        class="datatable-cell">
                                                        <span style="width: 100px">
                                                             <div class="font-weight-bold text-muted">
                                                                {{$order->created_at ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div class="datatable-pager datatable-paging-loaded">

                                             <div class="paginationx">
                                            <!-- Display Pagination Links -->
                                                {{ $orders->links() }}
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
