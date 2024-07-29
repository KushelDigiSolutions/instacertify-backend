@extends('admin.layouts.app')
@section('content')
    <style>
        .pb-btn {
            min-width: 110px;
            min-height: 44px;
            background: #FFFFFF;
            border: 1px solid #E1E3EA;
            border-radius: 6px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 0 10px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 17px;
            color: #5E6278;
            transition: all 0.4s;
        }

        .pb-btn svg {
            transition: all 0.4s;
        }

        .pb-btn:hover {
            border-color: #000;
            background: #000;
            color: #fff;
        }

        .pb-btn:hover path {
            fill: #fff;
        }

        .btn-save {
            background: #3595F6;
            border-color: #3595F6;
            color: #FFFFFF;
        }


        .main-footer {
            width: 100%;
            padding: 47px 0 0 0;
            background: #2F2E33;
            border-radius: 20px;
        }

        .main-footer .container {
            max-width: 1100px;
        }

        .main-footer .ftr-parent {
            width: 100%;
            display: flex;
            align-items: flex-start;
        }

        .main-footer .ftr-info {
            width: 40%;
        }

        .main-footer .ftr-info .ftr-info-head {
            width: 100%;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 18.9358px;
            line-height: 23px;
            text-transform: uppercase;
            color: #FFFFFF;
        }

        .main-footer .ftr-info .ftr-info-sub-head {
            width: 100%;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 11.0459px;
            line-height: 13px;
            color: #FFFFFF;
        }


        .main-footer .ftr-quick-links {
            width: 20%;
        }

        .main-footer .ftr-quick-links .ftr-quick-link-head {
            width: 100%;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 25px;
            margin: 0 0 20px 0;
            color: #fff;
        }

        .main-footer .ftr-quick-links ul {
            width: 100%;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .main-footer .ftr-quick-links ul li {
            width: 100%;
            margin-bottom: 5px;
        }

        .main-footer .ftr-quick-links ul li a {
            display: block;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 17px;
            color: #FFFFFF;
            padding: 5px 0;
        }

        .main-footer .ftr-quick-links ul li a:hover {
            color: #3595F6;
        }


        .footer-copyright {
            width: 100%;
            margin-top: 30px;
            border-top: 1px solid #898989;
            padding: 30px 0;
        }

        .footer-copyright .parent {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .footer-copyright .parent .left p {
            width: 100%;
            margin: 0;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 238.3%;
            color: #BFC8D1;
        }

        .footer-copyright .parent .right .footer-social ul {
            width: 100%;
            display: flex;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 15px;
        }
    </style>


    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div class="custom-app-toolbar">
            <div class="left">
                <p class="back-lick">
                    <a href="{{ route('admin.footers.index') }}" class="text-dark">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.7049 16.59L11.1249 12L15.7049 7.41L14.2949 6L8.29492 12L14.2949 18L15.7049 16.59Z"
                                fill="#3F4254" />
                        </svg>
                        Preview
                    </a>
                </p>
            </div>

            <div class="right">
                <a href="{{ route('admin.users.create') }}" class="pb-btn btn-save">
                    <svg width="24" height="20" viewBox="0 0 24 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.77 2.9301L21.17 4.3301L8.43 17.0701L2.83 11.4701L4.23 10.0701L8.43 14.2701L19.77 2.9301ZM19.77 0.100098L8.43 11.4401L4.23 7.2401L0 11.4701L8.43 19.9001L24 4.3301L19.77 0.100098Z"
                            fill="white" />
                    </svg>
                    Save
                </a>
            </div>

        </div>
        <!--end::Toolbar-->

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <form class="form" enctype="multipart/form-data">
                    @csrf


                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100">

                        <div class="main-footer">
                            <div class="container">

                                <div class="ftr-parent">


                                    <div class="ftr-info">
                                        <h2 class="ftr-info-head">
                                            {{ $footer->title }}
                                        </h2>
                                        <p class="ftr-info-sub-head">
                                            FairchildFUN , fit for you
                                        </p>
                                    </div>
                                    @foreach (json_decode(json_decode($footer->items)) as $item)
                                        <div class="ftr-quick-links">
                                            <h2 class="ftr-quick-link-head">
                                                {{ $item->parentItems->title }}
                                            </h2>
                                            <ul>
                                                @foreach ($item->subItems as $sub_item)
                                                    <li>
                                                        <a href="{{ $sub_item->link }}">{{ $sub_item->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                    <!-- quick-links 1 -->

                                    <!-- quick-links 2 -->
                                    {{-- <div class="ftr-quick-links">
                                                <h2 class="ftr-quick-link-head">
                                                    Pricing
                                                </h2>
                                                <ul>
                                                    <li>
                                                        <a href="#">About Project</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Management</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- quick-links 3 -->
                                            <div class="ftr-quick-links">
                                                <h2 class="ftr-quick-link-head">
                                                    Media
                                                </h2>
                                                <ul>
                                                     <li>
                                                        <a href="#">Privacy Police</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Development</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Terms & service</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- quick-links 4 -->
                                            <div class="ftr-quick-links">
                                                <h2 class="ftr-quick-link-head">
                                                    Contact
                                                </h2>
                                                <ul>
                                                    <li>
                                                        <a href="tel:(001) 092 33 53">(001) 092 33 53</a>
                                                    </li>
                                                </ul>
                                            </div> --}}

                                </div>

                            </div>
                            <div class="footer-copyright">
                                <div class="container">
                                    <div class="parent">
                                        <div class="left">
                                            <p>2077 Untitled UI. All rights reserved.</p>
                                        </div>
                                        <div class="right">
                                            <div class="footer-social">
                                                <ul>
                                                    <li>
                                                        <a href="#" target="_blank">
                                                            <svg width="17" height="16" viewBox="0 0 17 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1573_4541)">
                                                                    <path
                                                                        d="M14.5835 4.79199C14.5929 4.92767 14.5929 5.06335 14.5929 5.20028C14.5929 9.37256 11.3996 14.1845 5.56041 14.1845V14.182C3.8355 14.1845 2.14643 13.693 0.694336 12.7664C0.945151 12.7964 1.19722 12.8114 1.44993 12.8121C2.87939 12.8133 4.26799 12.3362 5.39257 11.4578C4.03414 11.4321 2.84293 10.5512 2.42679 9.26502C2.90264 9.3563 3.39296 9.33755 3.86002 9.21062C2.37901 8.913 1.31352 7.61874 1.31352 6.11564C1.31352 6.10188 1.31352 6.08875 1.31352 6.07562C1.7548 6.3201 2.24889 6.45578 2.75429 6.47078C1.35941 5.54354 0.929436 3.6978 1.77177 2.25473C3.38353 4.22739 5.76156 5.42662 8.31435 5.55354C8.05851 4.45686 8.40801 3.30765 9.23275 2.53672C10.5113 1.34124 12.5223 1.40252 13.7242 2.67365C14.4351 2.53422 15.1165 2.27474 15.7401 1.90709C15.5031 2.63801 15.0072 3.25888 14.3446 3.65341C14.9738 3.57963 15.5886 3.41206 16.1676 3.15634C15.7414 3.79159 15.2045 4.34494 14.5835 4.79199Z"
                                                                        fill="#BFC8D1" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_1573_4541">
                                                                        <rect width="15.5895" height="15.5895"
                                                                            fill="white"
                                                                            transform="translate(0.631836 0.166992)" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" target="_blank">
                                                            <svg width="26" height="26" viewBox="0 0 26 26"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M17.1286 13.8164L17.6241 10.9349H14.7066V8.92808C14.7066 8.10478 15.0369 7.48731 16.358 7.48731H17.7892V4.86305C17.0186 4.76014 16.1378 4.65723 15.3672 4.65723C12.8351 4.65723 11.0736 6.098 11.0736 8.6708V10.9349H8.32129V13.8164H11.0736V21.0717C11.6791 21.1746 12.2846 21.2261 12.8901 21.2261C13.4956 21.2261 14.1011 21.1746 14.7066 21.0717V13.8164H17.1286Z"
                                                                    fill="#BFC8D1" />
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" target="_blank">
                                                            <svg width="25" height="26" viewBox="0 0 25 26"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1404_32395)">
                                                                    <path
                                                                        d="M19.1806 19.6446H16.4232V15.3189C16.4232 14.2874 16.4048 12.9595 14.9891 12.9595C13.553 12.9595 13.3332 14.0834 13.3332 15.2438V19.6443H10.5759V10.7489H13.2229V11.9645H13.26C13.799 11.0414 14.8048 10.488 15.8718 10.5277C18.6664 10.5277 19.1817 12.3691 19.1817 14.7648L19.1806 19.6446ZM7.46473 9.53294C6.58692 9.53294 5.86426 8.80943 5.86426 7.93009C5.86426 7.05074 6.58658 6.32715 7.46439 6.32715C8.34212 6.32715 9.06436 7.05057 9.06452 7.92975C9.06452 8.80893 8.34237 9.53286 7.46473 9.53294ZM8.84337 19.6446H6.08317V10.7489H8.84337V19.6446Z"
                                                                        fill="#BFC8D1" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_1404_32395">
                                                                        <rect width="14.2533" height="14.2533"
                                                                            fill="white"
                                                                            transform="translate(5.37109 5.83496)" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" target="_blank">
                                                            <svg width="26" height="26" viewBox="0 0 26 26"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M16.3126 5.2334H9.75694C7.28497 5.2334 5.28125 7.23714 5.28125 9.70909V16.2643C5.28125 18.7363 7.28497 20.74 9.75694 20.74H16.3121C18.7841 20.74 20.7878 18.7363 20.7878 16.2643V9.70953C20.7878 7.23757 18.7841 5.23384 16.3121 5.23384L16.3126 5.2334ZM19.3602 16.38C19.3602 18.0207 18.03 19.3509 16.3892 19.3509H9.68026C8.03951 19.3509 6.70932 18.0207 6.70932 16.38V9.6714C6.70932 8.03065 8.03951 6.70046 9.68026 6.70046H16.3888C18.0296 6.70046 19.3598 8.03065 19.3598 9.6714V16.38H19.3602Z"
                                                                    fill="#BFC8D1" />
                                                                <path
                                                                    d="M13.0342 9.00195C10.8122 9.00195 9.01074 10.8034 9.01074 13.0254C9.01074 15.2475 10.8122 17.0489 13.0342 17.0489C15.2562 17.0489 17.0577 15.2475 17.0577 13.0254C17.0577 10.8034 15.2562 9.00195 13.0342 9.00195ZM13.0342 15.6338C11.5936 15.6338 10.4258 14.4661 10.4258 13.0254C10.4258 11.5848 11.5936 10.417 13.0342 10.417C14.4749 10.417 15.6426 11.5848 15.6426 13.0254C15.6426 14.4661 14.4749 15.6338 13.0342 15.6338Z"
                                                                    fill="#BFC8D1" />
                                                                <path
                                                                    d="M17.1922 9.78675C17.7099 9.78675 18.1295 9.3671 18.1295 8.84942C18.1295 8.33176 17.7099 7.91211 17.1922 7.91211C16.6745 7.91211 16.2549 8.33176 16.2549 8.84942C16.2549 9.3671 16.6745 9.78675 17.1922 9.78675Z"
                                                                    fill="#BFC8D1" />
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>


    <!-- popup -->
    <div style="z-index: 109;" class="drawer-overlay-back"></div>
    <div class="popup-render-items bg-body drawer drawer-end w-xl-400px w-lg-450px">

        <form id="form-render-items" method="post" class="card w-100 border-0 rounded-0">

            <!-- head -->
            <div class="card-header pe-5 rounded-0">
                <div class="d-flex justify-content-center flex-column me-3">
                    <h2>Footer items</h2>
                </div>
            </div>

            <!-- popup body -->
            <div class="card-body">

                <p class="text-gray-500 mt-0 mb-5 fs-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.
                </p>



                <div class="mb-5 w-100">
                    <label class="form-label fs-5">Text</label>
                    <input type="text" name="popup_text" id="popup_text" class="form-control" placeholder="About Us"
                        required>
                </div>

                <div class="mb-5 w-100">
                    <label class="form-label fs-5">Link</label>
                    <input type="text" name="popup_link" id="popup_link" class="form-control form-control-solid"
                        placeholder="Search...">
                </div>

                <div class="mb-5 w-100 d-flex justify-content-between align-items-center">
                    <label class="form-label fs-5">Link open new tab?</label>
                    <label class="form-check form-switch d-inline px-0">
                        <input class="form-check-input m-0" id="popup_link_type" name="popup_link_type"
                            type="checkbox" />
                    </label>
                </div>

                <div class="w-100">
                    <input type="hidden" name="popup_action" id="popup_action" class="form-control" value="add"
                        readonly />
                    <input type="hidden" name="popup_content_id" id="popup_content_id" class="form-control"
                        value="0" readonly />
                    <input type="hidden" name="popup_type" id="popup_type" class="form-control" value="parent"
                        readonly />
                </div>

            </div>

            <!-- popup footer -->
            <div class="card-footer p-5 d-flex justify-content-between align-items-center">
                <button class="btn btn-outline w-100px" id="popup-btn-cancel" type="button">Cancel</button>
                <button class="btn btn-primary w-100px" id="popup-btn-save" type="submit">SAVE</button>
            </div>

        </form>

    </div>


    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(".sortable1").sortable({
            items: ".render-column-list-parent"
        });
        $(".sortable1").disableSelection();
        $(".sortable1").on("sortstop", function(event, ui) {
            // alert('sortstop parents');
            // console.log('sortstop parents Event = ', event, '  ui = ', ui);
            // console.log(ui.item);
            if ($(ui.item).hasClass('.render-column-list-parent')) {
                //alert('it is Parent element that just moved. In here you can do the things specific to Parent sortable elements');
            }
        });
        //children
        $(".sortable2").sortable({
            items: ".sub-menu"
        });
        $(".sortable2").disableSelection();
        $(".sortable2").on("sortstop", function(event, ui) {
            alert('sortstop children');
            console.log('sortstop children Event = ', event, '  ui = ', ui);
            //do sort of childrens
        });

        //Initialize Quill editor
        new Quill('#txt_global_title', {
            theme: 'snow'
        });
        new Quill('#subTitle', {
            theme: 'snow'
        });


        function generate_html_for_items(popup_type, list_length, popup_link, popup_link_type, is_popup_link) {

            let parent_menu = "";
            if (popup_type == 'parent') {
                parent_menu = `<div class="render-column-list-parent">`;
            }

            return `${parent_menu}<div class="render-column-list ${popup_type} index-${list_length}" popup_index="${list_length}"  popup_type="${popup_type}" popup_link="${popup_link}" popup_link_type="${popup_link_type}"><span class="rc-text">${is_popup_link}</span><div class="rc-action"><span class="rc-action-edit"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.57692" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M17.256 14.1208L17.9823 14.8471L10.8297 21.9997H10.1034V21.2734L17.256 14.1208ZM20.0981 9.36816C19.9007 9.36816 19.6954 9.44711 19.5454 9.59711L18.1007 11.0418L21.0612 14.0024L22.506 12.5576C22.8138 12.2497 22.8138 11.7524 22.506 11.4445L20.6586 9.59711C20.5007 9.43922 20.3033 9.36816 20.0981 9.36816ZM17.256 11.8866L8.52441 20.6181V23.5787H11.4849L20.2165 14.8471L17.256 11.8866Z" fill="#5E6278"></path><rect x="0.57692" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span><span class="rc-action-remove"><svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.735123" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M11.8949 21.9997C11.8949 22.8681 12.6055 23.5787 13.4739 23.5787H19.7897C20.6581 23.5787 21.3686 22.8681 21.3686 21.9997V12.5261H11.8949V21.9997ZM13.4739 14.105H19.7897V21.9997H13.4739V14.105ZM19.3949 10.1576L18.6054 9.36816H14.6581L13.8686 10.1576H11.1055V11.7366H22.1581V10.1576H19.3949Z" fill="#5E6278"></path><rect x="0.735123" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span><span class="rc-action-add"><svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.892349" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M22.1571 17.263H17.4203V21.9999H15.8413V17.263H11.1045V15.6841H15.8413V10.9473H17.4203V15.6841H22.1571V17.263Z" fill="#5E6278"></path><rect x="0.892349" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span></div></div>`;
        }



        $("#txtColorCode").on('change', function() {
            const colorCode = $(this).val()
            $('label[for="txtColorCode"]').text(colorCode)
        })

        $("#background_color").on('change', function() {
            const is_checked = $(this).prop('checked')
            if (is_checked) {
                $(".background_color-content").attr('style', "display:none !important;");
            } else {
                $(".background_color-content").attr('style', "display:flex !important;");
            }
        })
        $("#global_title").on('change', function() {
            const is_checked = $(this).prop('checked')
            if (is_checked) {
                $(".global_title-content").attr('style', "display:none !important;");
            } else {
                $(".global_title-content").attr('style', "display:block !important;");
            }
        })


        //popup open & close
        function popup_open_close() {
            $(".drawer-overlay-back").toggleClass('drawer-overlay')
            $(".popup-render-items").toggleClass("drawer-on")
            $("#popup_text").val('').focus();
            $("#popup_link").val('');
            $("#popup_link_type").prop('checked', false);
            $("#popup_type").val('parent');
            $("#popup_action").val('add');
            $("#popup_content_id").val('0');
        }

        //open popup
        $(".btn-add-column, #popup-btn-cancel, .drawer-overlay-back").on('click', function() {
            popup_open_close();
        })


        //popup form submit
        $("#form-render-items").on('submit', function(e) {
            e.preventDefault();
            const uuid = Math.floor((Math.random() + new Date().getTime() * 2 + Math.random()) * 2)
            let list_length = uuid;
            const popup_text = $("#popup_text").val();
            const popup_link = $("#popup_link").val();
            const popup_type = $("#popup_type").val();
            let popup_link_type = $("#popup_link_type").prop('checked');
            const popup_action = $('#popup_action').val()
            const popup_content_id = $('#popup_content_id').val()

            if (popup_text == "") {
                return false;
            }

            if (popup_action == 'update') {
                list_length = popup_content_id;
            }

            let is_popup_link = popup_text;
            if (popup_link != "") {
                if (popup_link_type == true) {
                    is_popup_link = `<a href="${popup_link}" target="_blank">${popup_text}</a>`
                } else {
                    is_popup_link = `<a href="${popup_link}">${popup_text}</a>`
                }
            }


            let render_html = generate_html_for_items(popup_type, list_length, popup_link, popup_link_type,
                is_popup_link);

            //add new
            if (popup_action == 'add') {
                render_html +=
                    `<div class="sortable2 sub-menu-items index-${list_length}" popup_index="sub-${list_length}"></div></div>`;
                $(".render-column-lists").append(render_html);
            }

            //update exits recode
            if (popup_action == 'update') {
                $('.render-column-list[popup_index="' + popup_content_id + '"]').replaceWith(render_html)
            }

            //Sub menu add new
            if (popup_action == 'sub-menu-add') {
                $('.sub-menu-items[popup_index="sub-' + popup_content_id + '"]').append(render_html)
            }
            popup_open_close();
        })



        //edit or update popup
        $(document).on('click', ".render-column-lists .rc-action-edit", function() {
            popup_open_close();
            const obj = $(this).parents('.render-column-list');
            const text = $(obj).find('.rc-text').text().trim()
            const popup_type = $(obj).attr('popup_type')
            const popup_link = $(obj).attr('popup_link')
            const popup_link_type = $(obj).attr('popup_link_type')
            //const popup_action= $(obj).attr('popup_action')
            const popup_index = $(obj).attr('popup_index')

            if (popup_link_type == "true") {
                $("#popup_link_type").prop('checked', true);
            }
            $("#popup_text").val(text);
            $("#popup_link").val(popup_link);
            $("#popup_link_type").val(popup_link_type);
            $("#popup_type").val(popup_type);
            $("#popup_action").val('update');
            $("#popup_content_id").val(popup_index);
        });


        //add sub menu popup
        $(document).on('click', ".render-column-lists .rc-action-add", function() {
            popup_open_close();
            const obj = $(this).parents('.render-column-list');
            const popup_index = $(obj).attr('popup_index')
            $("#popup_content_id").val(popup_index);
            $("#popup_action").val('sub-menu-add');
            $("#popup_type").val('sub-menu');
        });

        //delete items
        $(document).on('click', ".render-column-lists .rc-action-remove", function() {
            const obj = $(this).parents('.render-column-list');
            const popup_index = $(obj).attr('popup_index');
            const parent = $(obj).hasClass('parent');
            const subMenu = $(obj).hasClass('sub-menu');

            if (parent === true) {
                const result = confirm("Are you confirm remove this item with sub item?");
                if (result) {
                    $(obj).remove();
                    $('.sub-menu-items[popup_index="sub-' + popup_index + '"]').remove();
                }
            }

            if (subMenu === true) {
                const result_sub = confirm("Are you confirm remove this item?");
                if (result_sub) {
                    $(obj).remove();
                }
            }
        });
    </script>
@endsection
