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
                                    Pets 
                                </h5>
                                <!--end::Title-->

                                <!--begin::Separator-->
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200">
                                </div>
                                <!--end::Separator-->

                                <!--begin::Search Form-->
                                <div class="d-flex align-items-center" id="kt_subheader_search">
                                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                                        {{$pets->count()}} Total
                                    </span>
                                  
                                </div>
                                <!--end::Search Form-->

                           
                                <!--end::Group Actions-->
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
                                            Pet List
                                            <span class="d-block text-muted pt-2 font-size-sm">Pets management made
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
                                                    <th data-field="UserID" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 150px">Pets</span>
                                                    </th>
                                                    <th data-field=Contact" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 150px">Breed</span>
                                                    </th>
                                                    <th data-field="Location" 
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 150px">Behavior</span>
                                                    </th>
                                                    <th data-field="Pets"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 150px">Age & Size</span>
                                                    </th>
                                                     <th data-field="Pets"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 150px">Medication</span>
                                                    </th>
                                                    <th data-field="PetOwner"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 150px">PetOwner</span>
                                                    </th>   
                                                    <th data-field="CreateOn"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 100px">Created On</span>
                                                    </th>   
                                                     <th data-field="Actions" data-autohide-disabled="false"
                                                        class="datatable-cell datatable-cell-sort">
                                                        <span style="width: 130px">Actions</span>
                                                    </th>                                           
                                                            
                                                </tr>
                                            </thead>
                                            <!-- table body -->
                                            <tbody style="" class="datatable-body">
                                                @foreach ($pets as $pet)

                                                <!-- table row -->
                                                <tr data-row="{{ $loop->index }}" class="datatable-row" style="left: 0px">
                                                    <td class="datatable-cell-sorted datatable-cell-left datatable-cell"
                                                        data-field="RecordID" aria-label="{{ $loop->iteration }}">
                                                        <span style="width: 40px"><span
                                                                class="font-weight-bolder">{{ $loop->iteration }}</span></span>
                                                    </td>
                                                    <td data-field="OrderID" aria-label="64616-103"
                                                        class="datatable-cell">
                                                        <span style="width: 150px">
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                    {{-- user profile pic --}}
                                                                    @if ($pet && $pet->image)
                                                                        <img src="{{ asset('storage/' . $pet->image->image_path) }}" alt="Ad Image">
                                                                    @else
                                                                        <img src="assets/image/user-placeholder.png">
                                                                    @endif
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div
                                                                        class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                                        {{$pet->type->species ?? ''}}   
                                                                    </div>
                                                                    <a href="#"
                                                                        class="text-muted font-weight-bold text-hover-primary">
                                                                        {{$pet->name ?? ''}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </td>
                                                     <td data-field="City" aria-label="Breed" class="datatable-cell">
                                                        <span style="width: 150px">
                                                            <div class="font-weight-bold text-muted">
                                                                {{$pet->breed ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="City" aria-label="Behavior" class="datatable-cell">
                                                        <span style="width: 150px">
                                                            <div class="font-weight-bold text-muted">
                                                                {{$pet->behavior ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="Pets" aria-label="AgeAndSize" class="datatable-cell">
                                                       <span style="width: 150px">
                                                            <div class="font-weight-bolder font-size-lg mb-0">
                                                                {{$pet->size->size ?? ''}}
                                                            </div>
                                                            <div class="font-weight-bold text-muted">
                                                                {{$pet->age->age ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="Pets" aria-label="AgeAndSize" class="datatable-cell">
                                                       <span style="width: 150px">
                                                            <div class="font-weight-bold text-muted">
                                                                {{$pet->medication->medication ?? ''}}
                                                            </div>
                                                        </span>
                                                    </td>
                                                     <td data-field="PetOwner" aria-label="5" class="datatable-cell">
                                                        <span style="width: 150px">
                                                        <div class="text-muted font-weight-bold text-hover-primary">
                                                            {{$pet->user->full_name ?? ''}}
                                                        </div>
                                                        </span>
                                                    </td>
                                                    <td data-field="RegisterOn" aria-label="registerOn"
                                                        class="datatable-cell">
                                                        <span style="width: 100px">
                                                             <div class="font-weight-bold text-muted">
                                                                {{$pet->created_at ?? ''}}
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
                                                        <a href="{{ route('admin.pet.destroy', ['id' => $pet->id]) }}" class="btn btn-sm btn-light-danger font-weight-bolder">Delete</a>
                                                </span> 
                                            </td>
                                                </tr>
                                                 @endforeach
                                            </tbody>
                                        </table>
                                       
                                        <div class="pagination">                
                                                <!-- Display Pagination Links -->
                                                {{ $pets->links() }}
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