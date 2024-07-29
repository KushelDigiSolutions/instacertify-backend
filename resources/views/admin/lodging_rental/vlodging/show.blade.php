@extends('admin.layouts.app')
@section('content')
<link href="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.js"></script>
<div class="d-flex flex-column flex-column-fluid">


    <!--begin::Toolbar-->
    <div class="custom-app-toolbar">
        <div class="left">
            <p>
            Location Rental
            </p>
            <ul>
                <li>
                    <a href="#!">Home</a>
                </li>
                <li>
                    <a href="#!">Lists</a>
                </li>
                <li>
                    <a href="#">{{$lodging->title}}</a>
                </li>
            </ul>
        </div>
        <div class="right">
            <div class="button_setting d-flex align-center">
                <button class="edit_camp">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.06 6.02L11.98 6.94L2.92 16H2V15.08L11.06 6.02ZM14.66 0C14.41 0 14.15 0.1 13.96 0.29L12.13 2.12L15.88 5.87L17.71 4.04C18.1 3.65 18.1 3.02 17.71 2.63L15.37 0.29C15.17 0.09 14.92 0 14.66 0ZM11.06 3.19L0 14.25V18H3.75L14.81 6.94L11.06 3.19Z"
                            fill="#5E6278" />
                    </svg>
                    <span>Edit Camping</span>
                </button>
                <button class="create_camp">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 8H8V14H6V8H0V6H6V0H8V6H14V8Z" fill="white" />
                    </svg>
                    <span>Create New</span>
                </button>
            </div>
        </div>

    </div>
    <!--end::Toolbar-->


    <section class="p-4 mb-20">
        <div class="container">


            <div class="card card-flush">
                <div class="card-body card-bfg11">

                    <div class="row">

                        <div class="col-md-3">

                            <ul class="event-gallery-main slick-initialized slick-slider" >
                                <div aria-live="polite" class="slick-list draggable">
                                
                                    <div class="slider slider-content" id ="event-gallery-main">
										@foreach ($lodging->images as $key => $item)
                                        <li >
											<img class="event-image"
                                                src="{{ asset('backend/admin/images/lodging_rental/vclasss/' . $item) }}">
                                        </li>
                                    @endforeach
                                    </div>
                                </div>
                            </ul>

                            <div class="event-gallery-parent">
                                <ul class="event-gallery mt-5 slick-initialized slick-slider" >
                                    <div aria-live="polite" class="slick-list draggable">
                                   
                                        <div class="slider slider-thumb" id="event-gallery">
											 @foreach ($lodging->images as $key => $item)
                                            <li><img class="event-image-gallery"
                                                    src="{{ asset('backend/admin/images/lodging_rental/vclasss/' . $item) }}"
                                                    alt="2023 Air Force Photo Contest - 101 Days of Summer"></li>
											@endforeach
                                        </div>
                                        
                                    </div>
                                </ul>
                                <div class="slick-arrow-custom">
                                    <button class="js-event-prev-arrow slick-arrow slick-hidden" aria-disabled="true"
                                        tabindex="-1">
                                        <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.12452 0.750004V13.25C8.12461 13.3737 8.08801 13.4946 8.01934 13.5975C7.95067 13.7004 7.85302 13.7805 7.73876 13.8279C7.62449 13.8752 7.49875 13.8876 7.37745 13.8635C7.25615 13.8393 7.14474 13.7797 7.05733 13.6922L0.807327 7.44219C0.749217 7.38415 0.703118 7.31522 0.671665 7.23934C0.640213 7.16347 0.624023 7.08214 0.624023 7C0.624023 6.91787 0.640213 6.83654 0.671665 6.76067C0.703118 6.68479 0.749217 6.61586 0.807327 6.55782L7.05733 0.307816C7.14474 0.220309 7.25615 0.160705 7.37745 0.136548C7.49875 0.112392 7.62449 0.12477 7.73876 0.172115C7.85302 0.21946 7.95067 0.299644 8.01934 0.402515C8.08801 0.505386 8.12461 0.626319 8.12452 0.750004Z"
                                                fill="white"></path>
                                        </svg>
                                    </button>
                                    <button class="js-event-next-arrow slick-arrow slick-hidden" aria-disabled="true"
                                        tabindex="-1">
                                        <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.875485 0.750004V13.25C0.875387 13.3737 0.91199 13.4946 0.98066 13.5975C1.04933 13.7004 1.14698 13.7805 1.26124 13.8279C1.37551 13.8752 1.50125 13.8876 1.62255 13.8635C1.74385 13.8393 1.85526 13.7797 1.94267 13.6922L8.19267 7.44219C8.25078 7.38415 8.29688 7.31522 8.32833 7.23934C8.35979 7.16347 8.37598 7.08214 8.37598 7C8.37598 6.91787 8.35979 6.83654 8.32833 6.76067C8.29688 6.68479 8.25078 6.61586 8.19267 6.55782L1.94267 0.307816C1.85526 0.220309 1.74385 0.160705 1.62255 0.136548C1.50125 0.112392 1.37551 0.12477 1.26124 0.172115C1.14698 0.21946 1.04933 0.299644 0.98066 0.402515C0.91199 0.505386 0.875387 0.626319 0.875485 0.750004Z"
                                                fill="white"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-7 event_coniy">
                            <div class="event-content">

                                <h3 class="evt-title evt_title11">$65 /night</h3>
                                <div class="reservi d-flex align-items-center">
                                    <div class="rsv_svg">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.16667 10.5H0.5V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H5.5V13.8333H2.16667V10.5ZM2.16667 2.16667H5.5V0.5H2.16667C1.25 0.5 0.5 1.25 0.5 2.16667V5.5H2.16667V2.16667ZM13.8333 0.5H10.5V2.16667H13.8333V5.5H15.5V2.16667C15.5 1.25 14.75 0.5 13.8333 0.5ZM13.8333 13.8333H10.5V15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V10.5H13.8333V13.8333ZM8 5.5C6.61667 5.5 5.5 6.61667 5.5 8C5.5 9.38333 6.61667 10.5 8 10.5C9.38333 10.5 10.5 9.38333 10.5 8C10.5 6.61667 9.38333 5.5 8 5.5Z"
                                                fill="#5E6278" />
                                        </svg>

                                    </div>
                                    <div class="rsv_para">
                                        <span>Not Reserved</span>
                                    </div>
                                </div>
                                <h1 class="redwood">{{$lodging->title}}</h1>
                                <span class="camping">Camping</span>
                                <p class="evt-short-description mt-2 evt1_short evt1_short1">{{strip_tags($lodging->description)}}</p>

                                <div class="room_ment row">
                                    <div class="col-md-3">
                                        <div class="room_left">
                                            <h2>Room Class</h2>
											
                                            <p>{{(isset($roomType[0]->name))?roomType[0]->name:""}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="room_right">
                                            <h2>Capacity</h2>
                                            <p>{{$lodging->room_capacity}} Guest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-md-2">
                            <div
                                class="col-lg-12 d-flex flex-column align-items-end justify-content-between align-content-between">
                                <div><button id="butn" class="btn btn-primary jh">Guest List</button></div>
                            </div>
                        </div> -->

                    </div>

                    <div class="ammenities mt-6">
                        <h2>Amenities</h2>
                        <div class="row">
                            @foreach($aminities as $aminity)
                            <div class="col-md-3">
                                <div class="amn_t">
                                    <div class="aminitiesh d-flex align-items-center">
                                        <div class="aminit_svg">
                                        <img src="{{ asset('backend/admin/images/lodging_rental/amenities/' . $aminity->image) }}"
                                style="width: 30px;height: 30px;">

                                        </div>
                                        <div class="aminit_para">
                                            <span>{{$aminity->name}}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                            
                           
                        </div>
                    </div>

                    <div class="ammenities mt-6">
                        <h2>Features</h2>
                        <div class="row">
                            @foreach($features as $feature)
                            <div class="col-md-3">
                                <div class="amn_t">
                                    <div class="aminitiesh d-flex align-items-center">
                                        <div class="aminit_svg">
                                        <img src="{{ asset('backend/admin/images/lodging_rental/feature/' . $feature->image) }}"
                                style="width: 30px;height: 30px;">
                                        </div>
                                        <div class="aminit_para">
                                            <span>{{$feature->name}}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                            
                           
                        </div>
                    </div>






                    <!-- ===============drawer about instructor=========== -->

                    <!--begin::Trigger button-->
                    <!-- <button id="kt_drawer_example_basic_button" class="btn btn-primary">Toggle basic drawer</button> -->
                    <!--end::Trigger button-->

                    <!--begin::View component-->
                    <div id="kt_drawer_example_basic" class="bg-white instructor-pop" data-kt-drawer="true"
                        data-kt-drawer-activate="true" data-kt-drawer-toggle="#kt_drawer_example_basic_button"
                        data-kt-drawer-close="#kt_drawer_example_basic_close" data-kt-drawer-width="480px">

                        <div class="card carf">
                            <div class="card-header card_healing">
                                <h3 class="card-title card-title55">ABOUT OWNER</h3>
                                <div class="card-toolbar">

                                    <svg class="cursor-pointer" id="kt_drawer_example_basic_button" width="20"
                                        height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.3346 2.5465L17.4546 0.666504L10.0013 8.11984L2.54797 0.666504L0.667969 2.5465L8.1213 9.99984L0.667969 17.4532L2.54797 19.3332L10.0013 11.8798L17.4546 19.3332L19.3346 17.4532L11.8813 9.99984L19.3346 2.5465Z"
                                            fill="#5E6278" />
                                    </svg>


                                </div>
                            </div>
                            <div class="card-body">
                                <div class="owner_detail">
                                    <div class="owner_inf d-flex">
                                        <img src="https://res.cloudinary.com/dt2lhechn/image/upload/v1697007440/Ellipse_126_1_ngbnws.png"
                                            alt="">
                                        <div class="det_ownk">
                                            <h4>Hosted by Srujan</h4>
                                            <p>Joined in March 2019</p>
                                        </div>
                                    </div>
                                    <div class="owner_verify d-flex mt-4">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22 10.99L19.56 8.2L19.9 4.51L16.29 3.69L14.4 0.5L11 1.96L7.6 0.5L5.71 3.69L2.1 4.5L2.44 8.2L0 10.99L2.44 13.78L2.1 17.48L5.71 18.3L7.6 21.5L11 20.03L14.4 21.49L16.29 18.3L19.9 17.48L19.56 13.79L22 10.99ZM18.05 12.47L17.49 13.12L17.57 13.97L17.75 15.92L15.01 16.54L14.57 17.28L13.58 18.96L11.8 18.19L11 17.85L10.21 18.19L8.43 18.96L7.44 17.29L7 16.55L4.26 15.93L4.44 13.97L4.52 13.12L3.96 12.47L2.67 11L3.96 9.52L4.52 8.87L4.43 8.01L4.25 6.07L6.99 5.45L7.43 4.71L8.42 3.03L10.2 3.8L11 4.14L11.79 3.8L13.57 3.03L14.56 4.71L15 5.45L17.74 6.07L17.56 8.02L17.48 8.87L18.04 9.52L19.33 10.99L18.05 12.47Z"
                                                fill="#3595F6" />
                                            <path
                                                d="M9.09 12.75L6.77 10.42L5.29 11.91L9.09 15.72L16.43 8.36L14.95 6.87L9.09 12.75Z"
                                                fill="#3595F6" />
                                        </svg>
                                        <p>Identity verified</p>
                                    </div>
                                    <div class="owner_mobile d-flex mt-4">
                                        <svg width="14" height="22" viewBox="0 0 14 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 0H3C1.34 0 0 1.34 0 3V19C0 20.66 1.34 22 3 22H11C12.66 22 14 20.66 14 19V3C14 1.34 12.66 0 11 0ZM12 17H2V3H12V17ZM9 20H5V19H9V20Z"
                                                fill="#3595F6" />
                                        </svg>
                                        <p>(684) 555-0102</p>

                                    </div>
                                    <div class="ownner_location d-flex mt-4">
                                        <svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7 0C3.13 0 0 3.13 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 3.13 10.87 0 7 0ZM2 7C2 4.24 4.24 2 7 2C9.76 2 12 4.24 12 7C12 9.88 9.12 14.19 7 16.88C4.92 14.21 2 9.85 2 7Z"
                                                fill="#3595F6" />
                                            <path
                                                d="M7 9.5C8.38071 9.5 9.5 8.38071 9.5 7C9.5 5.61929 8.38071 4.5 7 4.5C5.61929 4.5 4.5 5.61929 4.5 7C4.5 8.38071 5.61929 9.5 7 9.5Z"
                                                fill="#3595F6" />
                                        </svg>

                                        <p>2118 Thornridge Cir. Syracuse, Connecticut 35624</p>

                                    </div>

                                    <div class="response_rate mt-4">
                                        <span>Response rate: 27%</span>
                                    </div>
                                    <div class="response_time mt-8">
                                        <span>Response time: a few days or more</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!-- Footer -->
                            </div>
                        </div>

                    </div>
                    <!--end::View component-->


                    <!-- ==========================instructor list drawer============ -->







                </div>
            </div>

            <div class="card card-flush card-body2 card-slush mt-6">

                <!--begin::Card header-->
                <div class="card-header pt-8">

                    <!--begin::Search-->


                    <div class="all_order all_order1">
                        <h3>Booking History</h3>
                    </div>
                    <div class="d-flex align-items-center search-das1 position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" data-kt-filemanager-table-filter="search"
                            class="form-control form-control-solid search-das search-fas1 w-250px ps-15"
                            placeholder="Search.." />
                    </div>







                    <!--end::Search-->

                </div>
                <!-- <div class="site-sel">
            <div class="tuton">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.8333 0.5H2.16667C1.25 0.5 0.5 1.25 0.5 2.16667V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V2.16667C15.5 1.25 14.75 0.5 13.8333 0.5ZM12.1667 8.83333H3.83333V7.16667H12.1667V8.83333Z" fill="#3595F6"/>
                    </svg>

                <p>1 site selected</p>
            </div>
            <div class="tuton tuton1">
                <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.00033 13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333H1.00033V13.8333ZM11.8337 1.33333H8.91699L8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333Z"
                        fill="#3595F6" />
                </svg>

                <p>Delete</p>

            </div>
        </div> -->
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body card-body4 card-si">
                    <!--begin::Table-->

                    <table id="kt_file_manager_list" data-kt-filemanager-table="files"
                        class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead class="suching">
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0  tr-fash1">
                                <th class="w-10px pe-2">
                                    <div
                                        class="form-check form-check-sm form-check-custom form-check-solid me-3 sights">
                                        <input class="checking" type="checkbox" />
                                    </div>
                                </th>
                                <th class=" name45">Order ID</th>
                                <th class=" name45">Order Name</th>
                                <th class=" name45">Order Date</th>
                                <th class=" name45">Check In</th>
                                <th class=" name45">Check Out</th>
                                <th class=" name45">Guest</th>
                                <th class=" name45">Status</th>
                                <th class="name45">Action</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @if(!empty($orders))
                            @foreach($orders as $order)
                            <tr class="tri11 tr4353">
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid sights">
                                        <input class="checking" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <a href="#" class="text-gray-800 text-hover-primary">#23456</a>
                                    </div>
                                </td>
                                <td>Mr. Graha Caesara</td>
                                <td>Thu, 22 Mar 2023</td>
                                <td>
                                    Thu, 24 Mar 2023
                                </td>
                                <td>
                                    Thu, 26 Mar 2023
                                </td>
                                <td>
                                    2 Guest
                                </td>
                                <td>
                                    <span>Not Reserved</span>
                                </td>

                                <td>
                                    <svg data-kt-menu-trigger="click" width="32" height="32" viewBox="0 0 32 32"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                        <path
                                            d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                            fill="#7E8299" />
                                    </svg>




                                    <!-- <p>hi</p> -->


                                    <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                        data-kt-menu="true"
                                        style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                        data-popper-placement="left-start">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="http://127.0.0.1:8000/admin/footers/1/edit" class="menu-link px-3">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                        fill="#2A78C5" />
                                                </svg>

                                                <span style="color: #2A78C5;">Edit</span>
                                            </a>
                                            <hr class="hr-fag">
                                            <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                        fill="#FF5449" />
                                                </svg>

                                                <span style="color: #FF5449;">Delete</span>
                                            </a>
                                            <form action="http://127.0.0.1:8000/admin/footers/1" id="delete_form_1"
                                                method="POST">
                                                <input type="hidden" name="_method" value="DELETE"> <input type="hidden"
                                                    name="_token" value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif

   <?php /*                         <tr class="tri11 tr4353">
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid sights">
                                        <input class="checking" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <a href="#" class="text-gray-800 text-hover-primary">#23456</a>
                                    </div>
                                </td>
                                <td>Mr. Graha Caesara</td>
                                <td>Thu, 22 Mar 2023</td>
                                <td>
                                    Thu, 24 Mar 2023
                                </td>
                                <td>
                                    Thu, 26 Mar 2023
                                </td>
                                <td>
                                    2 Guest
                                </td>
                                <td class="reb">
                                    <span>Reserved</span>
                                </td>

                                <td>
                                    <svg data-kt-menu-trigger="click" width="32" height="32" viewBox="0 0 32 32"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                        <path
                                            d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                            fill="#7E8299" />
                                    </svg>




                                    <!-- <p>hi</p> -->


                                    <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                        data-kt-menu="true"
                                        style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                        data-popper-placement="left-start">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="http://127.0.0.1:8000/admin/footers/1/edit" class="menu-link px-3">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                        fill="#2A78C5" />
                                                </svg>

                                                <span style="color: #2A78C5;">Edit</span>
                                            </a>
                                            <hr class="hr-fag">
                                            <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                        fill="#FF5449" />
                                                </svg>

                                                <span style="color: #FF5449;">Delete</span>
                                            </a>
                                            <form action="http://127.0.0.1:8000/admin/footers/1" id="delete_form_1"
                                                method="POST">
                                                <input type="hidden" name="_method" value="DELETE"> <input type="hidden"
                                                    name="_token" value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
*/ ?>

                        </tbody>
                    </table>
                    <div class="next-prev next_prev1">
                        <div class="pty_next1 d-flex align-items-center justify-content-between">
                            <div class="gji">
                                <p>Showing 1 to 06 of 10 entries</p>
                            </div>
                            <div class="pty_next d-flex align-items-center justify-content-center">
                                <button class="prev">Previous</button>
                                <div class="topo">
                                    <span>1</span>
                                </div>
                                <button class="nxt">Next</button>
                            </div>
                        </div>
                    </div>
                    <!--end::Table-->
                </div>






                <!--end::Table-->
            </div>


            <!--end::Card body-->
        </div>


        <!--end::Card body-->
</div>


</div>
</section>


</div>
</div>
</div>
@endsection

<style>
.event-gallery-main,
.event-gallery {
    width: 100%;
    list-style: none;
    margin: 0;
    padding: 0;
}

.event-gallery-main .slick-slide,
.event-gallery .slick-slide {
    height: auto !important;
    padding: 0 5px;
}

.event-image {
    /* max-width:258px; */
    /* width:100%; */
    width: 258px;
    height: 200px;
    border-radius: 6px;
    object-fit: contain;
}

.event-image-gallery {
    width: 100%;
    height: 60px;
    border-radius: 6px;
    object-fit: contain;
}

.event-content {
    width: 100%;
}

.event-content .evt-title {
    width: 100%;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 29px;
    color: #323268;
}

.event-content .evt-location {
    width: 100%;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    color: #3595F6;
    display: block;
    margin: 15px 0;
}

.event-content .evt-short-description {
    width: 100%;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 15px;
    line-height: 18px;
    color: #5E6278;
}

.event-time-card-hr {
    width: 100%;
}

.event-time-card-hr hr {
    margin-top: 50px !important;
    padding-top: 30px;
    border-color: #9c9ea1;
}

.event-time-card {
    width: 100%;
    background: #F9F9F9;
    border: 1px solid #E1E3EA;
    border-radius: 12px;
    padding: 20px 15px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.event-time-card .evt-content {
    width: 100%;
}

.event-time-card .evt-content h6 {
    width: 100%;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 15px;
    color: #323268;
    margin: 0 0 5px 0;
}

.event-time-card .evt-content p {
    width: 100%;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 17px;
    line-height: 22px;
    color: #323268;
    margin: 0;
}

.event-gallery-parent {
    position: relative;
}

.event-gallery-parent .slick-arrow {
    border: none;
    background: none;
    position: absolute;
    top: 40%;
}

.event-gallery-parent .js-event-prev-arrow {
    left: 10px;
}

.event-gallery-parent .js-event-next-arrow {
    right: 10px;
}
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
<script>
//$("#kt_datatable_zero_configuration").DataTable();
var $jq = jQuery.noConflict();
setTimeout(() => {
    $jq("#event-gallery-main").slick({
        autoplay: true,
        arrows: false,
        asNavFor: "#event-gallery"
    });
    $jq("#event-gallery").slick({
        mobileFirst: true,
        slidesToShow: 3,
        asNavFor: "#event-gallery-main",
        prevArrow: ".js-event-prev-arrow",
        nextArrow: ".js-event-next-arrow",
        responsive: [{
            "breakpoint": 1600,
            "settings": {
                "slidesToShow": 4
            }
        }]
    });
}, 500);
	
</script>