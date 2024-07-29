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


        .main-header {
            width: 100%;
            padding: 28px 20px;
            background: #2F2E33;
            border-radius: 20px;
        }

        .main-header .container {
            max-width: 1200px;
        }



        .main-header .hdr-info .hdr-info-head {
            width: 100%;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 18.9358px;
            line-height: 23px;
            text-transform: uppercase;
            color: #FFFFFF;
            margin: 0;
        }


        .hdr-parent {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .hdr-parent ul {
            padding: 0;
            margin: 0;
            display: flex;
        }

        .hdr-parent ul li a {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 19px;
            color: #FFFFFF;
            display: inline-block;
            padding: 0 20px;
            text-align: center;
        }

        .hdr-parent ul li a:hover {
            color: #3595F6;
        }
    </style>


    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div class="custom-app-toolbar">
            <div class="left">
                <p class="back-lick">
                    <a href="{{ route('admin.headers.index') }}" class="text-dark">
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
                <a class="pb-btn btn-save">
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
                <form>
                    @csrf


                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100">

                        <div class="main-header"
                            @if ($header->background_color) style="background-color:{{ $header->background_color }}" @else style="background-image: url({{ asset('backend/admin/images/header/' . $header->background_image) }})" @endif>
                            <div class="container">

                                <div class="hdr-parent">
                                    <div class="hdr-info">
                                        <h2 class="hdr-info-head">
                                            {{ $header->title }}
                                        </h2>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#">Project</a>
                                        </li>
                                        <li>
                                            <a href="#">Track Record</a>
                                        </li>
                                        <li>
                                            <a href="#">Pricing</a>
                                        </li>
                                        <li>
                                            <a href="#">Services</a>
                                        </li>
                                        <li>
                                            <a href="#">Professional Worker</a>
                                        </li>
                                    </ul>
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
                        <input class="form-check-input m-0" id="popup_link_type" name="popup_link_type" type="checkbox" />
                    </label>
                </div>

                <div class="w-100">
                    <input type="hidden" name="popup_action" id="popup_action" class="form-control" value="add"
                        readonly />
                    <input type="hidden" name="popup_content_id" id="popup_content_id" class="form-control" value="0"
                        readonly />
                    <input type="hidden" name="popup_type" id="popup_type" class="form-control" value="parent" readonly />
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
