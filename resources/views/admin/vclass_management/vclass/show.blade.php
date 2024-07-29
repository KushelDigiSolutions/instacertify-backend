@extends('admin.layouts.app')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />

@section('content')
<style>
	.brnn{
	width:156px !important;
	max-width:100% !important;
	height:48px !important;
}
</style>
    <div class="d-flex flex-column flex-column-fluid">


        <!--begin::Toolbar-->
        <div class="custom-app-toolbar">
            <div class="left">
                <p>
                    @isset($page_title)
                        {{ $page_title }}
                    @endisset
                </p>
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.vclasses.index') }}">class List</a>
                    </li>
                    <li>
                        <a href="#">Show vclass</a>
                    </li>
                </ul>
            </div>

        </div>
        <!--end::Toolbar-->


        <section class="p-4 mb-20">
            <div class="container">


                <div class="card card-flush">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-3">

                                <ul class="vclass-gallery-main" id="vclass-gallery-main">
                                    @foreach ($vclass->images as $key => $item)
                                        <li><img class="vclass-image"
                                                src="{{ asset('backend/admin/images/vclass_management/vclass/' . $vclass->images[$key]) }}"
                                                alt="{{ $vclass->title }}"></li>
                                    @endforeach
                                </ul>

                                <div class="vclass-gallery-parent">
                                    <ul class="vclass-gallery mt-5" id="vclass-gallery">
                                        @foreach ($vclass->images as $key => $item)
                                            <li><img class="vclass-image-gallery"
                                                    src="{{ asset('backend/admin/images/vclass_management/vclass/' . $vclass->images[$key]) }}"
                                                    alt="{{ $vclass->title }}"></li>
                                        @endforeach
                                    </ul>
                                    <div class="slick-arrow-custom">
                                        <button class="js-vclass-prev-arrow slick-arrow">
                                            <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.12452 0.750004V13.25C8.12461 13.3737 8.08801 13.4946 8.01934 13.5975C7.95067 13.7004 7.85302 13.7805 7.73876 13.8279C7.62449 13.8752 7.49875 13.8876 7.37745 13.8635C7.25615 13.8393 7.14474 13.7797 7.05733 13.6922L0.807327 7.44219C0.749217 7.38415 0.703118 7.31522 0.671665 7.23934C0.640213 7.16347 0.624023 7.08214 0.624023 7C0.624023 6.91787 0.640213 6.83654 0.671665 6.76067C0.703118 6.68479 0.749217 6.61586 0.807327 6.55782L7.05733 0.307816C7.14474 0.220309 7.25615 0.160705 7.37745 0.136548C7.49875 0.112392 7.62449 0.12477 7.73876 0.172115C7.85302 0.21946 7.95067 0.299644 8.01934 0.402515C8.08801 0.505386 8.12461 0.626319 8.12452 0.750004Z"
                                                    fill="white" />
                                            </svg>
                                        </button>
                                        <button class="js-vclass-next-arrow slick-arrow">
                                            <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.875485 0.750004V13.25C0.875387 13.3737 0.91199 13.4946 0.98066 13.5975C1.04933 13.7004 1.14698 13.7805 1.26124 13.8279C1.37551 13.8752 1.50125 13.8876 1.62255 13.8635C1.74385 13.8393 1.85526 13.7797 1.94267 13.6922L8.19267 7.44219C8.25078 7.38415 8.29688 7.31522 8.32833 7.23934C8.35979 7.16347 8.37598 7.08214 8.37598 7C8.37598 6.91787 8.35979 6.83654 8.32833 6.76067C8.29688 6.68479 8.25078 6.61586 8.19267 6.55782L1.94267 0.307816C1.85526 0.220309 1.74385 0.160705 1.62255 0.136548C1.50125 0.112392 1.37551 0.12477 1.26124 0.172115C1.14698 0.21946 1.04933 0.299644 0.98066 0.402515C0.91199 0.505386 0.875387 0.626319 0.875485 0.750004Z"
                                                    fill="white" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-7">
                                <div class="vclass-content">
                                    <h3 class="evt-title">{{ $vclass->title }}</h3>

                                    
                                    

                                    <span class="evt-location">
                                        
                                        {{ $vclass->location }}
                                    </span>
									   <div class="training_dept d-flex align-items-center">
                                    @if(!empty($vclass->instruct_pic[0]))
                                    <div class="instructors_profile left_dept d-flex align-items-center">
                                        <img width="28" height="28" src="{{ asset('/backend/admin/images/vclass_management/instructors/'.$vclass->instruct_pic[0].'') }}">
                                        <h5 class="darl">{{$vclass->instruct_name}}</h5>
                                    </div>
                                    @endif
                                    <div id="kt_drawer_example_basic_button" class="right_dept cursor-pointer">
                                        <span class="dept_view">View profile</span>
                                        <svg width="6" height="8" viewBox="0 0 6 8" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.47125 0L0.53125 0.94L3.58458 4L0.53125 7.06L1.47125 8L5.47125 4L1.47125 0Z"
                                                fill="#3595F6" />
                                        </svg>

                                    </div>
                                </div>
                                    <p class="evt-short-description">{{ strip_tags($vclass->prerequisites); }}</p>
                                </div>
								   <div class="publish_time d-flex align-items-center">
                                    <p class="pub_content">Publish</p>
                                    <p class="how_min">{{$vclass->created_at->diffForHumans()}} </p>
                                </div>
                            </div>

                            <div class="col-md-2 d-flex justify-content-end">
                                <div
                                id="kt_drawer_example_dismiss_button"
                                class="col-lg-12 d-flex flex-column align-items-end justify-content-between align-content-between">
                                <div><button id="butn" class="btn btn-primary jh">Show Enrollment</button></div>
                            </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 vclass-time-card-hr">
                                <hr />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="vclass-time-card">
                                    <div class="evt-icon">
                                        <img src="{{ asset('backend/admin/images/dollar.png') }}">
                                    </div>
                                    <div class="evt-content">
                                        <h6>Ticket Price</h6>
                                        <p>${{ $vclass->price }}.00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="vclass-time-card">
                                    <div class="evt-icon">
                                        <img src="{{ asset('backend/admin/images/chalender.png') }}">
                                    </div>
                                    <div class="evt-content">
                                        <h6>Date</h6>
                                        @if ($vclass->single_day == '1')
                                            <p>{{ date('d F Y', strtotime($vclass->start_date)) }}</p>
                                        @else
                                            <p>{{ date('d F Y', strtotime($vclass->start_date)) }} to
                                            {{ date('d F Y', strtotime($vclass->end_date)) }}</p>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="vclass-time-card">
                                    <div class="evt-icon">
                                        <img src="{{ asset('backend/admin/images/clock.png') }}">
                                    </div>
                                    <div class="evt-content">
                                        <h6>Time</h6>
                                        <p>{{ $vclass->class_length }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="vclass-time-card">
                                    <div class="evt-icon">
                                        <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="class">
                                            <path id="Vector" d="M23.9987 3.1665H7.9987C6.53203 3.1665 5.33203 4.3665 5.33203 5.83317V27.1665C5.33203 28.6332 6.53203 29.8332 7.9987 29.8332H23.9987C25.4654 29.8332 26.6654 28.6332 26.6654 27.1665V5.83317C26.6654 4.3665 25.4654 3.1665 23.9987 3.1665ZM11.9987 5.83317H14.6654V12.4998L13.332 11.4998L11.9987 12.4998V5.83317ZM23.9987 27.1665H7.9987V5.83317H9.33203V17.8332L13.332 14.8332L17.332 17.8332V5.83317H23.9987V27.1665Z" fill="#323268"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="evt-content">
                                        <h6>Category</h6>
                                        <p>
                                            @foreach ($vclass_categories as $ids)
                                                {{$ids->name}} <br/>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="vclass-time-card">
                                    <div class="evt-icon">
                                        <img src="{{ asset('backend/admin/images/location.png') }}">
                                    </div>
                                    <div class="evt-content">
                                        <h6>Location</h6>
                                        <p>{{ $vclass->location }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
			
			   <div id="kt_drawer_example_basic" class="bg-white instructor-pop drawer_ji" data-kt-drawer="true"
                        data-kt-drawer-activate="true" data-kt-drawer-toggle="#kt_drawer_example_basic_button"
                        data-kt-drawer-close="#kt_drawer_example_basic_close">

                        <div class="card carf">
                            <div class="card-header card_healing">
                                <h3 class="card-title card-title55">ABOUT INSTRUCTOR</h3>
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
                                <div class="instructor_card">
                                    <div class="instructor_img">
                                    {@if(!empty($vclass->instruct_pic[0]))}
                                        <img width="150" height="150" src="{{ asset('/backend/admin/images/vclass_management/instructors/'.$vclass->instruct_pic[0].'') }}">
                                        {@endif}
                                    </div>
                                    <div class="instructor_name">
                                        <h3>{{$vclass->instruct_name}}</h3>
                                    </div>
                                </div>
                               
                                <div class="instructor_bio mt-8">
                                    <h4>Bio</h4>
                                    <p>
                                    {@if(!empty($vclass->instruct_bio))}
                                        {{$vclass->instruct_bio}}
                                        {@endif;}
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!-- Footer -->
                            </div>
                        </div>
							
							

                    </div>
				   
				    <div id="kt_drawer_example_dismiss" class="bg-white" data-kt-drawer="true"
                        data-kt-drawer-activate="true" data-kt-drawer-toggle="#kt_drawer_example_dismiss_button"
                        data-kt-drawer-close="#kt_drawer_example_dismiss_close" data-kt-drawer-overlay="true"
                        data-kt-drawer-width="{default:'300px', 'md': '480px'}">
                        <div class="card carf">
                            <div class="card-header card_healing">
                                <h3 class="card-title card-title55">Enrollment List</h3>
                                <div class="card-toolbar">

                                    <svg class="cursor-pointer" data-kt-drawer-dismiss="true" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.3346 2.5465L17.4546 0.666504L10.0013 8.11984L2.54797 0.666504L0.667969 2.5465L8.1213 9.99984L0.667969 17.4532L2.54797 19.3332L10.0013 11.8798L17.4546 19.3332L19.3346 17.4532L11.8813 9.99984L19.3346 2.5465Z"
                                            fill="#5E6278" />
                                    </svg>


                                </div>
                            </div>
                            <div class="card-body">
                                <div class="search_instructor_form">
                                    <form data-kt-search-element="form"
                                        class="d-none d-lg-block w-100 mb-5 mb-lg-0 position-relative"
                                        autocomplete="off">

                                        <!-- <i
                                            class="ki-duotone ki-magnifier fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-4"><span
                                                class="path1"></span><span class="path2"></span></i> -->

                                        <svg class=" ki-magnifier position-absolute top-50 translate-middle-y ms-4 mg_left" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.1479 14.3519L11.6273 10.8321C12.6477 9.60705 13.1566 8.03577 13.048 6.44512C12.9394 4.85447 12.2217 3.36692 11.0443 2.29193C9.86684 1.21693 8.32029 0.637251 6.72635 0.673476C5.13241 0.709701 3.6138 1.35904 2.48642 2.48642C1.35904 3.6138 0.709701 5.13241 0.673476 6.72635C0.637251 8.32029 1.21693 9.86684 2.29193 11.0443C3.36692 12.2217 4.85447 12.9394 6.44512 13.048C8.03577 13.1566 9.60705 12.6477 10.8321 11.6273L14.3519 15.1479C14.4042 15.2001 14.4663 15.2416 14.5345 15.2699C14.6028 15.2982 14.676 15.3127 14.7499 15.3127C14.8238 15.3127 14.897 15.2982 14.9653 15.2699C15.0336 15.2416 15.0956 15.2001 15.1479 15.1479C15.2001 15.0956 15.2416 15.0336 15.2699 14.9653C15.2982 14.897 15.3127 14.8238 15.3127 14.7499C15.3127 14.676 15.2982 14.6028 15.2699 14.5345C15.2416 14.4663 15.2001 14.4042 15.1479 14.3519ZM1.81242 6.87492C1.81242 5.87365 2.10933 4.89487 2.6656 4.06234C3.22188 3.22982 4.01253 2.58095 4.93758 2.19778C5.86263 1.81461 6.88053 1.71435 7.86256 1.90969C8.84459 2.10503 9.74664 2.58718 10.4546 3.29519C11.1626 4.00319 11.6448 4.90524 11.8401 5.88727C12.0355 6.8693 11.9352 7.8872 11.5521 8.81225C11.1689 9.7373 10.52 10.528 9.68749 11.0842C8.85497 11.6405 7.87618 11.9374 6.87492 11.9374C5.53272 11.9359 4.24591 11.4021 3.29683 10.453C2.34775 9.50392 1.81391 8.21712 1.81242 6.87492Z"
                                                fill="#7E8299" />
                                        </svg>


                                        <input type="text"
                                            class="form-control form-solid44 form-control-solid h-40px bg-body ps-13 fs-7"
                                            name="search" value="" placeholder="Search..."
                                            data-kt-search-element="input">
                                        <!--end::Input-->

                                        <!--begin::Spinner-->
                                        <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                                            data-kt-search-element="spinner">
                                            <span
                                                class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                                        </span>
                                        <!--end::Spinner-->

                                        <!--begin::Reset-->
                                        <span
                                            class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4"
                                            data-kt-search-element="clear">
                                            <i class="ki-duotone ki-cross fs-2 me-0"><span class="path1"></span><span
                                                    class="path2"></span></i> </span>
                                        <!--end::Reset-->
                                    </form>
                                </div>

                                <div class="instructor_information mt-10">
                                      <div class="instructor_list d-flex align-items-center justify-content-between">
                                           <h5>Jacob Jones</h5>
                                           <p>Dec 18 2023</p>
                                      </div>
                                      <div class="instructor_list d-flex align-items-center justify-content-between">
                                           <h5>Jacob Jones</h5>
                                           <p>Dec 18 2023</p>
                                      </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!-- Footer -->
                            </div>
                        </div>

                    </div>
        </section>


    </div>
    </div>
    </div>
@endsection

<style>

.instructor_img img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
}
.instructors_profile img{
    width: 28px;
    height: 28px;
    border-radius: 50%;
    object-fit: cover;
}

    .vclass-gallery-main,
    .vclass-gallery {
        width: 100%;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .vclass-gallery-main .slick-slide,
    .vclass-gallery .slick-slide {
        height: auto !important;
        padding: 0 5px;
    }

    .vclass-image {
        width: 100%;
        height: 220px;
        border-radius: 6px;
        object-fit: cover;
    }

    .vclass-image-gallery {
        width: 68px;
        height: 46px;
        border-radius: 6px;
        object-fit: cover;
    }

    .vclass-content {
        width: 100%;
    }

    .vclass-content .evt-title {
        width: 100%;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 24px;
        line-height: 29px;
        color: #323268;
    }

    .vclass-content .evt-location {
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

    .vclass-content .evt-short-description {
        width: 100%;
        font-size: 13px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        color: #5E6278;
        margin-top: 10px
    }

    .vclass-time-card-hr {
        width: 100%;
    }

    .vclass-time-card-hr hr {
        margin-top: 50px !important;
        padding-top: 30px;
        border-color: #9c9ea1;
    }

    .vclass-time-card {
        width: 100%;
        background: #F9F9F9;
        border: 1px solid #E1E3EA;
        border-radius: 12px;
        padding: 20px 15px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .vclass-time-card .evt-content {
        width: 100%;
    }

    .vclass-time-card .evt-content h6 {
        width: 100%;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 15px;
        color: #323268;
        margin: 0 0 5px 0;
    }

    .vclass-time-card .evt-content p {
        width: 100%;
        font-style: normal;
        font-weight: 500;
        font-size: 15px;
        line-height: 20px;
        color: #323268;
        margin: 0;
    }

    .vclass-gallery-parent {
        position: relative;
    }

    .vclass-gallery-parent .slick-arrow {
        border: none;
        background: none;
        position: absolute;
        top: 30%;
    }

    .vclass-gallery-parent .js-vclass-prev-arrow {
        left: 0px;
    }

    .vclass-gallery-parent .js-vclass-next-arrow {
        right: 0px;
    }
</style>

<script>
    var $jq = jQuery.noConflict();
    setTimeout(() => {
        $jq("#vclass-gallery-main").slick({
            autoplay: false,
            arrows: false,
            asNavFor: "#vclass-gallery"
        });
        $jq("#vclass-gallery").slick({
            arrows: true,
            mobileFirst: false,
            slidesToShow: 3,
            centerMode:true,
            asNavFor: "#vclass-gallery-main",
            prevArrow: ".js-vclass-prev-arrow",
            nextArrow: ".js-vclass-next-arrow",
            responsive: [
                {
                    "breakpoint": 1700,
                    "settings": {
                        centerMode:false,
                        slidesToShow :4
                    }
                },
                {
                    "breakpoint": 1500,
                    "settings": {
                        centerMode:false,
                        slidesToShow : 3
                    }
                },
                {
                    "breakpoint": 1260,
                    "settings": {
                        centerMode:true,
                        slidesToShow : 1
                    }
                },
                {
                    "breakpoint": 992,
                    "settings": {
                        centerMode:false,
                        slidesToShow : 1
                    }
                }
            ]
        });
    }, 2000);

    $jq(document).ready(function () {
        $('#toggleActiveBtn').on('click', function () {
            var vclassId = $(this).data('id');
            toggleActive(vclassId);
        });

        function toggleActive(id) {
            $jq.ajax({
                url: '{{env('APP_URL') }}admin/vclass/toggle-active/' + id,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        // Update the button text or style based on the new is_active state
                        alert('Toggle success! New is_active state: ' + response.is_active);
                    } else {
                        alert('Toggle failed!');
                    }
                },
                error: function () {
                    alert('Toggle failed! Server error.');
                }
            });
        }
    });
</script>
