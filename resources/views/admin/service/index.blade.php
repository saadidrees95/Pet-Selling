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
                                    Services List
                                </h5>
                                <!--end::Title-->

                                <!--begin::Separator-->
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200">
                                </div>
                                <!--end::Separator-->

                                <!--begin::Search Form-->
                                <div class="d-flex align-items-center" id="kt_subheader_search">
                                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                                       {{$services->count() }} Total
                                    </span>
                                 
                                </div>
                                <!--end::Search Form-->

                                <!--begin::Group Actions-->
                              
                                <!--end::Group Actions-->
                            </div>
                            <!--end::Details-->

                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center">
                                <!--begin::Button-->
                                <a href="/metronic/demo1/.html" class=""> </a>
                                <!--end::Button-->

                                <!--begin::Dropdown-->
                               
                                <!--end::Dropdown-->
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
                                            Service List
                                            <span class="d-block text-muted pt-2 font-size-sm">Service management made
                                                easy</span>
                                        </h3>
                                    </div>
                                    <div class="card-toolbar">

                                        <!--begin::Button-->
                                        <a href="{{route('admin.service.form')}}" class="btn btn-primary font-weight-bolder">
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
                                            Add New Service
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
                                                    <th data-field="ServiceID" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 200px">Service Title</span>
                                                    </th>
                                                    <th data-field="ShortDescription" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 200px">Short Description</span>
                                                    </th>
                                                    <th data-field="LongDescription" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 250px">Long Description</span>
                                                    </th>
                                                    <th data-field="CreatedOn"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Created On</span>
                                                    </th>
                                                    <th data-field="LastUpdated"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Last Update</span>
                                                    </th>
                                                    <th data-field="Actions" data-autohide-disabled="false"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 130px">Actions</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <!-- table body -->
                                            <tbody style="" class="datatable-body">
                                                
                                                @foreach ( $services as $service )

                                                <!-- table row -->
                                                <tr data-row="{{ $loop->index ?? '' }}" class="datatable-row" style="left: 0px">
                                                    <td class="datatable-cell-sorted datatable-cell-left datatable-cell"
                                                        data-field="ServiceID" aria-label="{{ $loop->iteration ?? '' }}">
                                                        <span style="width: 40px"><span
                                                                class="font-weight-bolder">{{ $loop->iteration ?? '' }}</span></span>
                                                    </td>
                                                    <td data-field="ServiceTitle" aria-label="service-title"
                                                        class="datatable-cell">
                                                        <span style="width: 200px">
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                    <span
                                                                        class="symbol-label font-size-h4 font-weight-bold">S</span>
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div
                                                                        class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                                        {{$service->title ?? '' }}
                                                                    </div>
                                                                    <a href="#"
                                                                        class="text-muted font-weight-bold text-hover-primary">{{$service->title ?? '' }}</a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="ShortDescription" aria-label="short-description" class="datatable-cell">
                                                        <span style="width: 200px; height: 40px; overflow: hidden;">
                                                            <div class="font-weight-bold text-muted">
                                                                {{$service->short_description ?? '' }}
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="LongDescription" aria-label="long-description" class="datatable-cell">
                                                        <span style="width: 250px; height: 40px; overflow: hidden;">
                                                            <div class="font-weight-bold text-muted">
                                                                {{$service->long_description ?? '' }}
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="CreatedOn" aria-label="created-on"
                                                        class="datatable-cell">
                                                        <span style="width: 100px">
                                                            <div class="font-weight-bold text-muted mb-0">
                                                                {{$service->created_at ?? '' }}
                                                            </div>
                                                        </span>
                                                    </td>
                                                     <td data-field="LongDescription" aria-label="long-description" class="datatable-cell">
                                                        <span style="width: 100px">
                                                            <div class="font-weight-bolder text-primary">
                                                                {{$service->updated_at ?? '' }}
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
                                                    <a href="{{route('admin.service.show', ['id' => $service->id])}}"
                                                        class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2"
                                                        title="View Details">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Up-right.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <rect fill="#000000" opacity="0.3"
                                                                        transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) "
                                                                        x="10.6464466" y="5.85355339" width="2"
                                                                        height="14" rx="1" />
                                                                    <path
                                                                        d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z"
                                                                        fill="#000000" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </a>
                                                    <a href="{{route('admin.service.edit', ['id' => $service->id])}}" class="btn btn-sm btn-default btn-text-primary btn-hover-success btn-icon mr-2"
                                                        title="Edit details"> <span
                                                            class="svg-icon svg-icon-success svg-icon-2x">
                                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24"
                                                                        height="24" />
                                                                    <path
                                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                                    <rect fill="#000000" opacity="0.3" x="5"
                                                                        y="20" width="15" height="2"
                                                                        rx="1" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> </a>
                                                    <a href="{{route('admin.service.destroy', ['id' => $service->id])}}" class="btn btn-sm btn-default btn-text-primary btn-hover-danger btn-icon mr-2"
                                                        title="Delete"> <span
                                                            class="svg-icon svg-icon-danger svg-icon-2x">
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
                                                        </span> </a>
                                                    </span>
                                                </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    <div class="pagination">                
                                        <!-- Display Pagination Links -->
                                        {{ $services->links() }}
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