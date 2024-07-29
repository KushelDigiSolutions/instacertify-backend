<style>
    .event-lists .eve-list .inner{
        border-bottom: none;
        padding: 5px 0;
        margin-bottom: 40px;
        transition: all 0.35s;
    }
    .event-lists .eve-list .inner:hover{
        background: #f9f9f9;
    }
    .event-lists .eve-list .inner .inner-content .image{
        width: 225px !important;
        border-radius: 4px !important;
    }
    .carousel-control-next, .carousel-control-prev{
        width: 22%;
        opacity: 1;
    }
    .carousel-control-next:hover, .carousel-control-prev:hover{
        opacity: 0.5;
    }
    .carousel-control-next svg, .carousel-control-prev svg{
        width: 50px;
        height: 50px;
    }
    .img_gen11 {
        width: 225px !important;
        height: 150px !important;
        border-radius: 4px !important;
    }

    .carsoul11 {
        width: 100% !important;
    }

    #page-section-body .event-lists .eve-list .inner .content .content-inner h4{
        color: #323268;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }
    #page-section-body  .event-lists .eve-list .inner .content .content-inner h5{
        color: #323268;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }
    #page-section-body  .event-lists .eve-list .inner .content .content-inner p{
        color:#5E6278;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    #page-section-body  h6 {
        color: #5E6278;
        font-size: 14px !important;
        font-style: normal !important;
        font-weight: 400 !important;
        line-height: normal !important;
        width: auto;
        display: inline-block;
        margin-left: 16px;
    }
    #page-section-body .event-lists .eve-list .inner .content{
        width: 65%
    }
</style>

@foreach ($vclasss as $key => $vclass)

    <div class="event-lists">
        <div class="eve-list">
            <div class="inner @if ($loop->last) inner-last @endif">

                <div class="inner-content">

                    <div class="image" style="overflow: hidden">
                        @if (!empty($vclass->images))
                            @if (count($vclass->images) > 1)
                                <div id="carsoulE{{ $key }}" class="carousel slide">
                                    <div class="carousel-inner">
                                        {{-- Swapin Please use the  image validation for making all images same size --}}
                                        @foreach ($vclass->images as $vkey => $vimg)
                                            <div
                                                class="carousel-item carsoul{{ $key }} mySlides  @if ($vkey == 0) active @endif">
                                                <img src="{{ asset('/backend/admin/images/vclass_management/vclass/' . $vimg) }}"
                                                    class="d-block  img_gen11" style="min-height:150px;">
                                            </div>
                                        @endforeach
                                        {{-- Swapin end --}}
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carsoulE{{ $key }}" data-bs-slide="prev">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_5426_8199)">
                                                <circle cx="27" cy="24" r="15.625" fill="white"
                                                    stroke="#F8FAFC" stroke-width="0.75" />
                                                <path
                                                    d="M24.3293 23.3038H32.3359V24.6951H24.3293V26.782L21.6693 23.9994L24.3293 21.2168V23.3038Z"
                                                    fill="#1F1F1F" />
                                            </g>
                                            <defs>
                                                <filter id="filter0_d_5426_8199" x="0.5" y="0.5" width="59"
                                                    height="59" filterUnits="userSpaceOnUse"
                                                    color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                        result="hardAlpha" />
                                                    <feOffset dx="3" dy="6" />
                                                    <feGaussianBlur stdDeviation="6.75" />
                                                    <feComposite in2="hardAlpha" operator="out" />
                                                    <feColorMatrix type="matrix"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.16 0" />
                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                        result="effect1_dropShadow_5426_8199" />
                                                    <feBlend mode="normal" in="SourceGraphic"
                                                        in2="effect1_dropShadow_5426_8199" result="shape" />
                                                </filter>
                                            </defs>
                                        </svg>

                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carsoulE{{ $key }}" data-bs-slide="next">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_5426_8196)">
                                                <circle cx="16" cy="16" r="15.625"
                                                    transform="matrix(-1 0 0 1 43 8)" fill="white" stroke="#F8FAFC"
                                                    stroke-width="0.75" />
                                                <path
                                                    d="M29.6707 23.3038H21.6641V24.6951H29.6707V26.782L32.3307 23.9994L29.6707 21.2168V23.3038Z"
                                                    fill="#1F1F1F" />
                                            </g>
                                            <defs>
                                                <filter id="filter0_d_5426_8196" x="0.5" y="0.5" width="59"
                                                    height="59" filterUnits="userSpaceOnUse"
                                                    color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                        result="hardAlpha" />
                                                    <feOffset dx="3" dy="6" />
                                                    <feGaussianBlur stdDeviation="6.75" />
                                                    <feComposite in2="hardAlpha" operator="out" />
                                                    <feColorMatrix type="matrix"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.16 0" />
                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                        result="effect1_dropShadow_5426_8196" />
                                                    <feBlend mode="normal" in="SourceGraphic"
                                                        in2="effect1_dropShadow_5426_8196" result="shape" />
                                                </filter>
                                            </defs>
                                        </svg>

                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @else
                                <img class="img_gen11"
                                    src="{{ asset('backend/admin/images/vclass_management/vclass/' . $vclass->images[0]) }}"
                                    style="height:150px !important; border-radius:4px;">
                            @endif
                        @endif
                    </div>

                    <div class="content">
                        <div class="content-inner">
                            <h4>{{ $vclass->title }}</h4>

                            <div class="remark d-flex align-center mt-2">
                                @if (!empty($vclass->instruct_pic[0]))
                                    <img width="28" height="28" style="border-radius:28px"
                                        src="{{ asset('/backend/admin/images/vclass_management/instructors/' . $vclass->instruct_pic[0]) }}"
                                        alt="">
                                @endif
                                <h5>{{ $vclass->instruct_name }}</h5>
                            </div>

                            <p class="mt-2 short_der">{{ substr(strip_tags($vclass->description), 0, 200) }}</p>

                            <div class="dropdown status-dropdown">
                                <button type="button"
                                    class="@if ($vclass->is_active == '1') status-active @else status-deactive @endif"
                                    id="dropdownMenuOffset{{ $key }}" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                    @if ($vclass->is_active)
                                        Publish
                                    @else
                                        Unpublished
                                    @endif
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M11.06 5.52979L8 8.58312L4.94 5.52979L4 6.46979L8 10.4698L12 6.46979L11.06 5.52979Z"
                                            fill="#7E8299" />
                                    </svg>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset{{ $key }}">
                                    <a class="toggleActiveBtn dropdown-item" href="javascript:void(0)" data-id="{{ $vclass->id }}">
                                        Publish
                                    </a>
                                    <a class="toggleActiveBtn dropdown-item" href="javascript:void(0)" data-id="{{ $vclass->id }}">
                                        Unpublished
                                    </a>
                                </div>
                                <h6> {{ Carbon\Carbon::parse($vclass->created_at)->diffForHumans() }}</h6>
                            </div>
                            
                        </div>
                    </div>

                </div>

                <div class="event-action">



                    <div class="dropdown">
                        <div class="evt-action vclass-more-details cursor-pointer" id="self_car_{{ $key }}"
                            data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                            <svg width="59" height="58" viewBox="0 0 59 58" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="29.7444" cy="28.9884" r="28.9709" fill="#E9EFF4" />
                                <path
                                    d="M29.7444 24.3061C31.032 24.3061 32.0855 23.2526 32.0855 21.965C32.0855 20.6774 31.032 19.6239 29.7444 19.6239C28.4568 19.6239 27.4033 20.6774 27.4033 21.965C27.4033 23.2526 28.4568 24.3061 29.7444 24.3061ZM29.7444 26.6472C28.4568 26.6472 27.4033 27.7007 27.4033 28.9883C27.4033 30.2759 28.4568 31.3294 29.7444 31.3294C31.032 31.3294 32.0855 30.2759 32.0855 28.9883C32.0855 27.7007 31.032 26.6472 29.7444 26.6472ZM29.7444 33.6704C28.4568 33.6704 27.4033 34.7239 27.4033 36.0115C27.4033 37.2991 28.4568 38.3526 29.7444 38.3526C31.032 38.3526 32.0855 37.2991 32.0855 36.0115C32.0855 34.7239 31.032 33.6704 29.7444 33.6704Z"
                                    fill="#7E8299" />
                            </svg>
                        </div>


                        <!--begin::Menu-->
                        <div class="dropdown-more-details menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10 new-dp1 dropdown-menu"
                            id="sey_{{ $key }}" aria-labelledby="self_car_{{ $key }}">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">

                                {{-- <a href="{{ route('admin.vclasses.show', $vclass->id) }}"
                                        class="menu-link px-3">
                                        <svg width="20" height="20" viewBox="0 0 20 20"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.7157 7.51667L12.4824 8.28333L4.93236 15.8333H4.16569V15.0667L11.7157 7.51667ZM14.7157 2.5C14.5074 2.5 14.2907 2.58333 14.1324 2.74167L12.6074 4.26667L15.7324 7.39167L17.2574 5.86667C17.5824 5.54167 17.5824 5.01667 17.2574 4.69167L15.3074 2.74167C15.1407 2.575 14.9324 2.5 14.7157 2.5ZM11.7157 5.15833L2.49902 14.375V17.5H5.62402L14.8407 8.28333L11.7157 5.15833Z"
                                                fill="#5E6278"></path>
                                        </svg>
                                        Edit Class
                                    </a> --}}
                                {{-- Edited by swapin --}}
                                <a href="{{ route('admin.vclasses.edit', $vclass->id) }}" class="menu-link px-3">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.7157 7.51667L12.4824 8.28333L4.93236 15.8333H4.16569V15.0667L11.7157 7.51667ZM14.7157 2.5C14.5074 2.5 14.2907 2.58333 14.1324 2.74167L12.6074 4.26667L15.7324 7.39167L17.2574 5.86667C17.5824 5.54167 17.5824 5.01667 17.2574 4.69167L15.3074 2.74167C15.1407 2.575 14.9324 2.5 14.7157 2.5ZM11.7157 5.15833L2.49902 14.375V17.5H5.62402L14.8407 8.28333L11.7157 5.15833Z"
                                            fill="#5E6278"></path>
                                    </svg>
                                    Edit Class
                                </a>
                                {{-- Edit Ended by swapin --}}
                                <a href="{{ route('admin.vclasses.show', $vclass->id) }}" class="menu-link px-3">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.83333 9.16666H7.5V10.8333H5.83333V9.16666ZM17.5 5V16.6667C17.5 17.5833 16.75 18.3333 15.8333 18.3333H4.16667C3.24167 18.3333 2.5 17.5833 2.5 16.6667L2.50833 5C2.50833 4.08333 3.24167 3.33333 4.16667 3.33333H5V1.66666H6.66667V3.33333H13.3333V1.66666H15V3.33333H15.8333C16.75 3.33333 17.5 4.08333 17.5 5ZM4.16667 6.66666H15.8333V5H4.16667V6.66666ZM15.8333 16.6667V8.33333H4.16667V16.6667H15.8333ZM12.5 10.8333H14.1667V9.16666H12.5V10.8333ZM9.16667 10.8333H10.8333V9.16666H9.16667V10.8333Z"
                                            fill="#5E6278" />
                                    </svg>
                                    View Class
                                </a>
                                <a href="{{ route('duplicateVclass', ['id' => $vclass->id]) }}"
                                    class="menu-link px-3">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.83333 9.16666H7.5V10.8333H5.83333V9.16666ZM17.5 5V16.6667C17.5 17.5833 16.75 18.3333 15.8333 18.3333H4.16667C3.24167 18.3333 2.5 17.5833 2.5 16.6667L2.50833 5C2.50833 4.08333 3.24167 3.33333 4.16667 3.33333H5V1.66666H6.66667V3.33333H13.3333V1.66666H15V3.33333H15.8333C16.75 3.33333 17.5 4.08333 17.5 5ZM4.16667 6.66666H15.8333V5H4.16667V6.66666ZM15.8333 16.6667V8.33333H4.16667V16.6667H15.8333ZM12.5 10.8333H14.1667V9.16666H12.5V10.8333ZM9.16667 10.8333H10.8333V9.16666H9.16667V10.8333Z"
                                            fill="#5E6278"></path>
                                    </svg>
                                    Duplicate Class
                                </a>
                                <a href="{{ route('admin.vclass.makeDel', $vclass->id) }}" class="menu-link px-3">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.3337 7.5V15.8333H6.66699V7.5H13.3337ZM12.0837 2.5H7.91699L7.08366 3.33333H4.16699V5H15.8337V3.33333H12.917L12.0837 2.5ZM15.0003 5.83333H5.00033V15.8333C5.00033 16.75 5.75033 17.5 6.66699 17.5H13.3337C14.2503 17.5 15.0003 16.75 15.0003 15.8333V5.83333Z"
                                            fill="#5E6278"></path>
                                    </svg>
                                    Delete Class
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                    </div>
                    <!--end::Menu-->


                </div>


            </div>
        </div>
    </div>

@endforeach

<div class="row">
    {{-- <div class="col-md-12">
        <p>
            <b>Showing {{ ($vclasss->currentpage() - 1) * $vclasss->perpage() + 1 }} to
                {{ ($vclasss->currentpage() - 1) * $vclasss->perpage() + $vclasss->count() }} of
                {{ $vclasss->total() }} vclasss
            </b>
        </p>
    </div> --}}
    <div class="col-md-12 d-flex justify-content-center">
        {!! $vclasss->links() !!}
    </div>
</div>



<script>
    $(function() {
        $('.page-link').on('click', function(vclass) {
            vclass.prvclassDefault()
            var url = $(this).attr('href');
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    $('#table').html(data)
                }
            });
        });
    });

    function confirmDelete(form_id) {
        Swal.fire({
            title: 'Are you sure to delete this data?',
            text: 'All related data to this will be deleted',
            showCancelButton: true,
            confirmButtonColor: '#377dff',
            cancelButtonColor: 'secondary',
            confirmButtonText: 'Yes, Go Ahead!'
        }).then((result) => {
            if (result.value) {
                $('#delete_form_' + form_id).submit()
            }
        })
        return false;
    }

    // let slideIndex = 1;
    // let slideshowId = "carsoul6";
    // showSlides(slideIndex, slideshowId);

    // function plusSlides(n) {
    //     console.log("plus slide clicked" , n)
    //     showSlides(slideIndex += n, slideshowId);
    // }

    // function currentSlide(n) {
    //     showSlides(slideIndex = n, slideshowId);
    // }

    // function showSlides(n, slideshowId) {
    //     let i;
    //     let slides = document.getElementsByClassName(slideshowId + " mySlides");
    //     console.log(slides.length);
    //     let dots = document.getElementsByClassName(slideshowId + " dot");
    //     if (n > slides.length) {
    //         slideIndex = 1
    //     }
    //     if (n < 1) {
    //         slideIndex = slides.length
    //     }
    //     for (i = 0; i < slides.length; i++) {
    //         slides[i].style.display = "none";
    //     }
    //     // for (i = 0; i < dots.length; i++) {
    //     //     dots[i].className = dots[i].className.replace(" active", "");
    //     // }
    //     slides[slideIndex - 1].style.display = "block";
    //     // dots[slideIndex - 1].className += " active";
    // }
</script>
