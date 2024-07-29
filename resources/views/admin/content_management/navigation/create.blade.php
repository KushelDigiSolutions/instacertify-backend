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

        .status-orange {
            position: relative;
        }

        .colorPicker {
            width: 258px;
            height: 62px;
            background: #FFFFFF;
            border: 1px solid #E1E3EA;
            border-radius: 6px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 15px;
            line-height: 18px;
            color: #3F4254;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .colorPicker input {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            border: none;
            overflow: hidden;
            cursor: pointer;
            padding: 0;
        }

        .btn-add-column {
            width: 180px;
            height: 48px;
            background: #E1E3EA;
            border: 1px solid #205A95 !important;
            border-radius: 6px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 17px;
            text-transform: uppercase;
            color: #205A95;
        }


        .popup-render-items .card-header {
            background: #F3F6F8;
        }

        .popup-render-items .card-header h2 {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 17px;
            line-height: 21px;
            color: #3595F6;
            margin: 0;
        }

        .render-column-list-parent {
            width: 100%;
        }

        .render-column-lists {
            display: flex;
            align-items: end;
            flex-direction: column;
        }

        .render-column-list {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px 30px;
            gap: 10px;
            width: 100%;
            height: 64px;
            background: #F3F6F8;
            border: 1px solid #D9E0E6;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .sub-menu-items, .sub-children-menu-items {
            width: 95%;
            margin: 0 0 0 auto;
        }


        .sub-children-menu-items .rc-action-add {
            pointer-events: none;
            display: none;
        }

        .sub-children-menu-items  .rc-action-add svg {
            pointer-events: none;
            display: none;
        }

        .render-column-list .rc-text {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 15px;
            line-height: 18px;
            color: #181C32;
        }

        .render-column-list .rc-action {
            display: flex;
            gap: 5px;
        }

        .render-column-list .rc-action>span {
            cursor: pointer;
        }
    </style>
    <div class="d-flex flex-column flex-column-fluid">
        <div class="custom-app-toolbar">
            <div class="left">
                <p>Content Management</p>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li><a href="#">Create Menu</a></li>
                </ul>
            </div>
            <div class="right">
                <a class="pb-btn btn-save cursor-pointer" onclick="$('#form_id').submit()">
                    <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.77 2.9301L21.17 4.3301L8.43 17.0701L2.83 11.4701L4.23 10.0701L8.43 14.2701L19.77 2.9301ZM19.77 0.100098L8.43 11.4401L4.23 7.2401L0 11.4701L8.43 19.9001L24 4.3301L19.77 0.100098Z" fill="white" />
                    </svg>
                    Save
                </a>
            </div>
        </div>
        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <form class="form" action="{{ route('admin.navigations.store') }}" id="form_id" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100">
                        <div class="card card-flush">
                            <div class="card-body">
                                <div class="mb-10 fv-row">
                                    <label class="form-label fs-5">Menu Name</label>
                                    <input type="text" name="title" class="form-control mb-2" placeholder="Menu Name" required>
                                </div>
                                <div class="w-150px">
                                    <select class="form-select px-5" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status" name="is_active">
                                        <option value="1">Active</option>
                                        <option value="0">Deactivate </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush">
                            <div class="card-body">
                                <div class="fv-row">
                                    <div class="d-flex fv-row background_color-content">
                                        <div class="w-100">
                                            <p class="fw-bold text-gray-800 mb-2 fs-3">Parent Menu Color</p>
                                            <p class="text-gray-500 mb-5">The default background color has been perselected. If you prefer to use your own logo,you can turn off the switch.</p>
                                            <div class="row">
                                                <div class="col-md-4 mt-3">
                                                    <h5>Text/Link Color</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="colorPicker">
                                                        <label class="colorCode">#ffffff</label>
                                                        <input type="color" name="parent_text_color" value="#ffffff">
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4 mt-3">
                                                    <h5>Text/Link Hover Color</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="colorPicker">
                                                        <label class="colorCode">#252626</label>
                                                        <input type="color" name="parent_text_hover_color" value="#252626">
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush">
                            <div class="card-body">
                                <div class="fv-row">
                                    <div class="d-flex fv-row background_color-content">
                                        <div class="w-100">
                                            <p class="fw-bold text-gray-800 mb-2 fs-3">Sub Menu Color</p>
                                            <p class="text-gray-500 mb-5">The default background color has been perselected. If you prefer to use your own logo,you can turn off the switch.</p>
                                            <div class="row">
                                                <div class="col-md-4 mt-3">
                                                    <h5>Background</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="colorPicker">
                                                        <label class="colorCode">#ffffff</label>
                                                        <input type="color" name="background_color" value="#ffffff">
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4 mt-3">
                                                    <h5>Text/Link</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="colorPicker">
                                                        <label class="colorCode">#252626</label>
                                                        <input type="color" name="text_link_color" value="#252626">
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4 mt-3">
                                                    <h5>Hover Background</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="colorPicker">
                                                        <label class="colorCode">#4C65FF</label>
                                                        <input type="color" name="hover_background_color" value="#4C65FF">
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4 mt-3">
                                                    <h5>Link On Hover</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="colorPicker">
                                                        <label class="colorCode">#8860ED</label>
                                                        <input type="color" name="link_hover_color" value="#8860ED">
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush mb-20">
                            <div class="card-body">
                                <div class="fv-row">
                                    <label class="form-label" style="color: #3595F6;">Menu Items</label>
                                    <div class="w-100 render-column-lists sortable1" id="render-column-lists"></div>
                                    <div class="w-150 mt-5">
                                        <button type="button" class="btn btn-outline btn-add-column d-flex align-items-center justify-content-center">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path d="M11.8332 6.83366H6.83317V11.8337H5.1665V6.83366H0.166504V5.16699H5.1665V0.166992H6.83317V5.16699H11.8332V6.83366Z" fill="#205A95" />
                                            </svg>
                                            &nbsp; Add Menu Item
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <textarea style="display: none;" class="form-control mb-2" id="storeObjectItems" name="storeObjectItems" rows="15" cols="15"></textarea>
                </form>
            </div>
        </div>
    </div>
    <div style="z-index: 109;" class="drawer-overlay-back"></div>
    <div class="popup-render-items bg-body drawer drawer-end w-xl-400px w-lg-450px">
        <form id="form-render-items" method="post" class="card w-100 border-0 rounded-0">
            <div class="card-header pe-5 rounded-0">
                <div class="d-flex justify-content-center flex-column me-3">
                    <h2>Menu items</h2>
                </div>
            </div>
            <div class="card-body">
                <p class="text-gray-500 mt-0 mb-5 fs-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.
                </p>
                <div class="mb-5 w-100">
                    <label class="form-label fs-5">Text</label>
                    <input type="text" name="popup_text" id="popup_text" class="form-control" placeholder="Text" required>
                </div>
                <div class="mb-5 w-100">
                    <label class="form-label fs-5">Link</label>
                    <input type="text" name="popup_link" id="popup_link" class="form-control form-control-solid" placeholder="Search...">
                </div>
                <div class="mb-5 w-100" style="display: none">
                    <label class="form-label fs-5">Hover Effect</label>
                    <select name="popup_link_type" id="popup_link_type" class="form-control form-control-solid">
                        <option value="none">None</option>
                        <option value="hove">Hover</option>
                        <option value="on_click">On Click</option>
                    </select>
                </div>
                <div class="w-100">
                    <input type="hidden" name="popup_action" id="popup_action" class="form-control" value="add" readonly />
                    <input type="hidden" name="popup_content_id" id="popup_content_id" class="form-control" value="0" readonly />
                    <input type="hidden" name="popup_type" id="popup_type" class="form-control" value="parent" readonly />
                </div>
            </div>
            <div class="card-footer p-5 d-flex justify-content-between align-items-center">
                <button class="btn btn-outline w-100px" id="popup-btn-cancel" type="button">Cancel</button>
                <button class="btn btn-primary w-100px" id="popup-btn-save" type="submit">SAVE</button>
            </div>
        </form>
    </div>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(".sortable1").sortable({
            items: ".render-column-list-parent"
        });
        $(".sortable1").disableSelection();

        $("#render-column-lists").on("mouseover mouseleave", function(){
            setTimeout(() => {
                createItemsObject();
            }, 2000);
        });

        // $(".sortable1").on("sortstop", function(event, ui) {
        //     // alert('sortstop parents');
        //     // console.log('sortstop parents Event = ', event, '  ui = ', ui);
        //     // console.log(ui.item);
        //     if ($(ui.item).hasClass('.render-column-list-parent')) {
        //         //alert('it is Parent element that just moved. In here you can do the things specific to Parent sortable elements');
        //     }
        // });
        // //children
        // $(".sortable2").sortable({
        //     items: ".sub-menu"
        // });
        // $(".sortable2").disableSelection();
        // $(".sortable2").on("sortstop", function(event, ui) {
        //     alert('sortstop children');
        //     console.log('sortstop children Event = ', event, '  ui = ', ui);
        //     //do sort of childrens
        // });

        //color piker code get
        $('input[type="color"]').on('change', function() {
            const colorCode = $(this).val()
            $(this).parent('.colorPicker').find('.colorCode').text(colorCode)
        })

        function createItemsObject() {
            $("#storeObjectItems").val('')
            let footer_items_list_final = [];
            let footer_items_list_sub_final = [];



            $(".render-column-lists .render-column-list-parent").each(function() {
                const parentThis = $(this);
                const popup_index = $(this).find('.parent').attr('popup_index');
                const popup_title = $(this).find('.parent .rc-text').text();
                const popup_link = $(this).find('.parent').attr('popup_link');
                const popup_link_type = $(this).find('.parent').attr('popup_link_type');

                if(popup_index != "" && typeof popup_index != "undefined"){

                    const obj_main = {
                        id: popup_index,
                        title: popup_title,
                        link: popup_link,
                        linkType: popup_link_type
                    }

                    //Sub Menu Start
                    $(parentThis).find('.sub-menu-items.index-' + popup_index + ' .sub-menu').each(function() {
                        const subThis = $(this);
                        const popup_index_1 = $(this).attr('popup_index');
                        const popup_title_1 = $(this).find('.rc-text').text();
                        const popup_link_1 = $(this).attr('popup_link');
                        const popup_link_type_1 = $(this).attr('popup_link_type');

                        let footer_items_list_children_final = [];
                        if($(subThis).parent().find('.sub-children-menu-items.index-'+popup_index_1+' > div').length > 0){
                            $(subThis).parent().find('.sub-children-menu-items.index-'+popup_index_1+' .sub-children-menu').each(function() {
                                const popup_index_2 = $(this).attr('popup_index');
                                const popup_title_2 = $(this).find('.rc-text').text();
                                const popup_link_2 = $(this).attr('popup_link');
                                const popup_link_type_2 = $(this).attr('popup_link_type');
                                const obj_sub_2 = {
                                    id: popup_index_2,
                                    title: popup_title_2,
                                    link: popup_link_2,
                                    linkType: popup_link_type_2
                                }
                                footer_items_list_children_final.push(obj_sub_2)
                            });
                        }else{
                            footer_items_list_children_final = [];
                        }


                        const obj_sub = {
                            id: popup_index_1,
                            title: popup_title_1,
                            link: popup_link_1,
                            linkType: popup_link_type_1,
                            childrenItems: footer_items_list_children_final
                        }
                        footer_items_list_sub_final.push(obj_sub);
                        footer_items_list_children_final = [];

                    });
                    //Sub Menu End


                    footer_items_list_final.push({
                        parentId: popup_index,
                        parentItems: obj_main,
                        subItems: footer_items_list_sub_final
                    });

                }
                footer_items_list_sub_final = [];
                footer_items_list_children_final = [];
            })




            if(footer_items_list_final.length > 0){
                $("#storeObjectItems").val(JSON.stringify(footer_items_list_final))
            }
            footer_items_list_final = [];
            footer_items_list_sub_final = [];
            footer_items_list_children_final = [];
        }


        function generate_html_for_items(popup_type, list_length, popup_link, popup_link_type, is_popup_link,
            popup_action) {

            let parent_menu = "";
            if (popup_type == 'parent') {
                parent_menu = `<div class="render-column-list-parent">`;
            }
            if (popup_action == 'update') {
                parent_menu = "";
            }

            let sub_children = "";

            if (popup_action == 'sub-menu-add') {
                sub_children = `<div class="sortable2 sub-children-menu-items index-${list_length}" popup_index="sub-children-${list_length}"></div>`;
            }

            return `${parent_menu}<div class="render-column-list ${popup_type} index-${list_length}" popup_index="${list_length}" popup_type="${popup_type}" popup_link="${popup_link}" popup_link_type="${popup_link_type}"><span class="rc-text">${is_popup_link}</span><div class="rc-action"><span class="rc-action-edit"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.57692" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M17.256 14.1208L17.9823 14.8471L10.8297 21.9997H10.1034V21.2734L17.256 14.1208ZM20.0981 9.36816C19.9007 9.36816 19.6954 9.44711 19.5454 9.59711L18.1007 11.0418L21.0612 14.0024L22.506 12.5576C22.8138 12.2497 22.8138 11.7524 22.506 11.4445L20.6586 9.59711C20.5007 9.43922 20.3033 9.36816 20.0981 9.36816ZM17.256 11.8866L8.52441 20.6181V23.5787H11.4849L20.2165 14.8471L17.256 11.8866Z" fill="#5E6278"></path><rect x="0.57692" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span><span class="rc-action-remove"><svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.735123" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M11.8949 21.9997C11.8949 22.8681 12.6055 23.5787 13.4739 23.5787H19.7897C20.6581 23.5787 21.3686 22.8681 21.3686 21.9997V12.5261H11.8949V21.9997ZM13.4739 14.105H19.7897V21.9997H13.4739V14.105ZM19.3949 10.1576L18.6054 9.36816H14.6581L13.8686 10.1576H11.1055V11.7366H22.1581V10.1576H19.3949Z" fill="#5E6278"></path><rect x="0.735123" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span><span class="rc-action-add"><svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.892349" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M22.1571 17.263H17.4203V21.9999H15.8413V17.263H11.1045V15.6841H15.8413V10.9473H17.4203V15.6841H22.1571V17.263Z" fill="#5E6278"></path><rect x="0.892349" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span></div></div>${sub_children}`;
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
            $("#popup_link_type").val('');
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
            let popup_link_type = $("#popup_link_type").val();
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
                is_popup_link, popup_action);

            //add new
            if (popup_action == 'add') {
                render_html +=
                    `<div class="sortable2 sub-menu-items index-${list_length}" popup_index="sub-${list_length}"></div>
                    </div>`;
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
            //Sub children menu add new
            if (popup_action == 'sub-children-menu-add') {
                $('.sub-children-menu-items[popup_index="sub-children-' + popup_content_id + '"]').append(render_html)
            }
            setTimeout(() => {
                createItemsObject();
            }, 500);
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

            // if (popup_link_type == "true") {
            //     $("#popup_link_type").prop('checked', true);
            // }
            $("#popup_text").val(text);
            $("#popup_link").val(popup_link);
            $("#popup_link_type").val(popup_link_type);
            $("#popup_type").val(popup_type);
            $("#popup_action").val('update');
            $("#popup_content_id").val(popup_index);
        });


        //add sub menu popup
        $('.render-column-lists').on('click', ".render-column-list.parent .rc-action-add", function() {
            popup_open_close();
            const obj = $(this).parents('.render-column-list');
            const popup_index = $(obj).attr('popup_index')
            $("#popup_content_id").val(popup_index);
            $("#popup_action").val('sub-menu-add');
            $("#popup_type").val('sub-menu');
        });

        //add sub children menu popup
        $('.render-column-lists').on('click', ".sub-menu-items .rc-action-add", function() {
            popup_open_close();
            const obj = $(this).parents('.sub-menu');
            const popup_index = $(obj).attr('popup_index')
            $("#popup_content_id").val(popup_index);
            $("#popup_action").val('sub-children-menu-add');
            $("#popup_type").val('sub-children-menu');
        });

        //delete items
        $(document).on('click', ".rc-action-remove", function() {
            const obj = $(this).parents('.render-column-list');
            const popup_index = $(obj).attr('popup_index');
            const parent = $(obj).hasClass('parent');
            const subMenu = $(obj).hasClass('sub-menu');
            const childrenMenu = $(obj).hasClass('sub-children-menu');

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
                    $(".index-"+popup_index).remove();
                }
            }

            if (childrenMenu === true) {
                const result_sub = confirm("Are you confirm remove this item?");
                if (result_sub) {
                    $(obj).remove();
                }
            }
            setTimeout(() => {
                createItemsObject();
            }, 1000);
        });
    </script>

@endsection
