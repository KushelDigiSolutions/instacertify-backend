@extends('admin.layouts.app')
@section('content')
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
                        <a href="{{ route('admin.qcos.index') }}">qco List</a>
                    </li>
                    <li>
                        <a href="#">Show qco</a>
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

                            <div class="col-md-4">

                                <ul class="qco-gallery-main" id="qco-gallery-main">
                                    @foreach ($qco->images as $key => $item)
                                        <li><img class="qco-image"
                                                src="{{ asset('backend/admin/images/qco_management/qcos/' . $qco->images[$key]) }}"
                                                alt="{{ $qco->title }}"></li>
                                    @endforeach
                                </ul>

                                <div class="qco-gallery-parent">
                                    <ul class="qco-gallery mt-5" id="qco-gallery">
                                        @foreach ($qco->images as $key => $item)
                                            <li><img class="qco-image-gallery"
                                                    src="{{ asset('backend/admin/images/qco_management/qcos/' . $qco->images[$key]) }}"
                                                    alt="{{ $qco->title }}"></li>
                                        @endforeach
                                    </ul>
                                    <div class="slick-arrow-custom">
                                        <button class="js-qco-prev-arrow slick-arrow">
                                            <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.12452 0.750004V13.25C8.12461 13.3737 8.08801 13.4946 8.01934 13.5975C7.95067 13.7004 7.85302 13.7805 7.73876 13.8279C7.62449 13.8752 7.49875 13.8876 7.37745 13.8635C7.25615 13.8393 7.14474 13.7797 7.05733 13.6922L0.807327 7.44219C0.749217 7.38415 0.703118 7.31522 0.671665 7.23934C0.640213 7.16347 0.624023 7.08214 0.624023 7C0.624023 6.91787 0.640213 6.83654 0.671665 6.76067C0.703118 6.68479 0.749217 6.61586 0.807327 6.55782L7.05733 0.307816C7.14474 0.220309 7.25615 0.160705 7.37745 0.136548C7.49875 0.112392 7.62449 0.12477 7.73876 0.172115C7.85302 0.21946 7.95067 0.299644 8.01934 0.402515C8.08801 0.505386 8.12461 0.626319 8.12452 0.750004Z"
                                                    fill="white" />
                                            </svg>
                                        </button>
                                        <button class="js-qco-next-arrow slick-arrow">
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

                            <div class="col-md-6">
                                <div class="qco-content">
                                    <h3 class="evt-title">{{ $qco->title }}</h3>
                                    <span class="evt-location">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.5 5H16.5V13.18C16.19 13.07 15.85 13 15.5 13C13.84 13 12.5 14.34 12.5 16C12.5 17.66 13.84 19 15.5 19C17.16 19 18.5 17.66 18.5 16V7H21.5V5ZM14.5 5H2.5V7H14.5V5ZM14.5 9H2.5V11H14.5V9ZM10.5 13H2.5V15H10.5V13Z"
                                                fill="#3595F6"></path>
                                        </svg>
                                        {{ $qco->location }}
                                    </span>
                                    <p class="evt-short-description">{{ $qco->short_description }}</p>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div
                                    class="col-lg-12 d-flex flex-column align-items-end justify-content-between align-content-between">
                                    <div><button id="butn" class="btn btn-primary">Sell Ticket</button></div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 qco-time-card-hr">
                                <hr />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="qco-time-card">
                                    <div class="evt-icon">
                                        <img src="{{ asset('backend/admin/images/dollar.png') }}">
                                    </div>
                                    <div class="evt-content">
                                        <h6>Ticket Price</h6>
                                        <p>${{ $qco->ticket_price }}.00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="qco-time-card">
                                    <div class="evt-icon">
                                        <img src="{{ asset('backend/admin/images/chalender.png') }}">
                                    </div>
                                    <div class="evt-content">
                                        <h6>Date</h6>
                                        @if ($qco->single_day == '1')
                                            <p>{{ $qco->date }}</p>
                                        @else
                                            <p>{{ $qco->start_date }}</p>
                                            <p>{{ $qco->end_date }}</p>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="qco-time-card">
                                    <div class="evt-icon">
                                        <img src="{{ asset('backend/admin/images/clock.png') }}">
                                    </div>
                                    <div class="evt-content">
                                        <h6>Time</h6>
                                        <p>{{ $qco->start_time }} - {{ $qco->end_time }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="qco-time-card">
                                    <div class="evt-icon">
                                        <img src="{{ asset('backend/admin/images/location.png') }}">
                                    </div>
                                    <div class="evt-content">
                                        <h6>Location</h6>
                                        <p>{{ $qco->location }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </section>


    </div>
    </div>
    </div>
@endsection

<style>
    .qco-gallery-main,
    .qco-gallery {
        width: 100%;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .qco-gallery-main .slick-slide,
    .qco-gallery .slick-slide {
        height: auto !important;
        padding: 0 5px;
    }

    .qco-image {
        width: 100%;
        height: 300px;
        border-radius: 6px;
        object-fit: cover;
    }

    .qco-image-gallery {
        width: 100%;
        height: 60px;
        border-radius: 6px;
        object-fit: contain;
    }

    .qco-content {
        width: 100%;
    }

    .qco-content .evt-title {
        width: 100%;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 24px;
        line-height: 29px;
        color: #323268;
    }

    .qco-content .evt-location {
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

    .qco-content .evt-short-description {
        width: 100%;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 15px;
        line-height: 18px;
        color: #5E6278;
    }

    .qco-time-card-hr {
        width: 100%;
    }

    .qco-time-card-hr hr {
        margin-top: 50px !important;
        padding-top: 30px;
        border-color: #9c9ea1;
    }

    .qco-time-card {
        width: 100%;
        background: #F9F9F9;
        border: 1px solid #E1E3EA;
        border-radius: 12px;
        padding: 20px 15px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .qco-time-card .evt-content {
        width: 100%;
    }

    .qco-time-card .evt-content h6 {
        width: 100%;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 15px;
        color: #323268;
        margin: 0 0 5px 0;
    }

    .qco-time-card .evt-content p {
        width: 100%;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 17px;
        line-height: 22px;
        color: #323268;
        margin: 0;
    }

    .qco-gallery-parent {
        position: relative;
    }

    .qco-gallery-parent .slick-arrow {
        border: none;
        background: none;
        position: absolute;
        top: 40%;
    }

    .qco-gallery-parent .js-qco-prev-arrow {
        left: 10px;
    }

    .qco-gallery-parent .js-qco-next-arrow {
        right: 10px;
    }
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
<script>
    var $jq = jQuery.noConflict();
    setTimeout(() => {
        $jq("#qco-gallery-main").slick({
            autoplay: true,
            arrows: false,
            asNavFor: "#qco-gallery"
        });
        $jq("#qco-gallery").slick({
            mobileFirst: true,
            slidesToShow: 3,
            asNavFor: "#qco-gallery-main",
            prevArrow: ".js-qco-prev-arrow",
            nextArrow: ".js-qco-next-arrow",
            responsive: [{
                "breakpoint": 1600,
                "settings": {
                    "slidesToShow": 4
                }
            }]
        });
    }, 500);

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
