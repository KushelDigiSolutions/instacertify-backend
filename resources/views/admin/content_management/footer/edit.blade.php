@extends('admin.layouts.app')
@section('content')
    <style>
        .lbl-backImage {
            background: #D7EAFD;
            border: 1px dashed #3595F6;
            border-radius: 6px;
            padding: 30px 10px;
            position: relative;
            width: 213px;
            height: 151px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .lbl-backImage span.read-btn {
            width: 89px;
            height: 37px;
            background: #FFFFFF;
            border-radius: 4px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 14px;
            line-height: 17px;
            color: #A1A5B7;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .lbl-backImage span.content {
            display: block;
            margin-top: 15px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 15px;
            line-height: 18px;
            color: #2A78C5;
            margin-top: 15px;
        }

        .lbl-backImage>span b {
            color: #2A78C5;
        }

        .lbl-backImage .backImage {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
        }

        .mediaFileList {
            width: 100%;
            display: flex;
            align-items: flex-end;
        }

        .mediaFileList ul {
            width: auto;
            padding: 0;
            gap: 10px;
            list-style: none;
            flex-wrap: wrap;
            margin: 0;
        }

        .mediaFileList ul img {
            object-fit: cover;
            border-radius: 10px;
            width: 213px;
            height: 151px;
            object-position: center top;
        }

        .mediaFileList-d-logo ul {
            background: #E1E3EA;
            border-radius: 6px;
            padding: 10px;
        }

        .mediaFileList-d-logo ul img {
            object-fit: contain;
            object-position: center center;
        }

        .mediaFileList .clearBackImage {
            width: 93px;
            height: 36px;
            background: #F4F4F4;
            border-radius: 4px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 14px;
            line-height: 17px;
            color: #7E8299;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            margin-left: 10px;
            cursor: pointer;
        }

        .mediaFileList .clearBackImage:hover {
            background: #D7EAFD;
        }

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
            width: 170px;
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

        .sub-menu-items {
            width: 95%;
            margin: 0 0 0 auto;
        }

        .sub-menu-items .rc-action-add {
            pointer-events: none;
            display: none;
        }

        .sub-menu-items .rc-action-add svg {
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

        <!--begin::Toolbar-->
        <div class="custom-app-toolbar">
            <div class="left">
                <p>
                    Content Management
                </p>
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">Footer</a>
                    </li>
                </ul>
            </div>

            <div class="right">
                <a href="{{ route('admin.footers.show', $footer->id) }}" class="pb-btn btn-prev cursor-pointer">
                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.5 3.64L7.77 7L2.5 10.36V3.64ZM0.5 0V14L11.5 7L0.5 0Z" fill="#5E6278" />
                    </svg>
                    Preview
                </a>
                <a class="pb-btn btn-save cursor-pointer" onclick="$('#form_id').submit()">
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
                <form class="form" action="{{ route('admin.footers.update', $footer->id) }}" id="form_id" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100">

                        <!-- Block 1 -->
                        <div class="card card-flush">
                            <div class="card-body">
                                <div class="mb-10 fv-row">
                                    <label class="form-label fs-5">Footer Name</label>
                                    <input type="text" name="title" class="form-control mb-2"
                                        value="{{ $footer->title }}" placeholder="Title" required>
                                </div>

                                <div class="w-150px">
                                    <select class="form-select px-5" data-control="select2" data-hide-search="true"
                                        data-placeholder="Status" data-kt-ecommerce-product-filter="status"
                                        name="is_active">
                                        <option value="1" @if ($footer->is_active == '1') selected @endif>Active
                                        </option>
                                        <option value="0" @if ($footer->is_active == '0') selected @endif>Deactivate
                                        </option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="card card-flush">
                            <div class="card-body">
                                <div class="fv-row">
                                    <div class="d-flex fv-row mt-0 content">
                                        <div class="w-100">
                                            <p class="fw-bold text-gray-800 mb-2 fs-3">Footer Color</p>
                                            <p class="text-gray-500 mb-5">The default background color has been perselected.
                                                If you prefer to use your own logo,you can turn off the switch.</p>
                                            <div class="row">
                                                <div class="col-md-4 mt-3">
                                                    <h5>Text/Link Color</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="colorPicker">
                                                        <label class="colorCode">#ffffff</label>
                                                        <input type="color" name="parent_text_color"
                                                            value="{{ $footer->parent_text_color }}">
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
                                                        <input type="color" name="parent_text_hover_color"
                                                            value="{{ $footer->parent_text_hover_color }}">
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
                                    <div class="d-flex fv-row px-11 mt-10 ">
                                        <div class="w-100">
                                            <p class="fw-bold text-gray-800 mb-1 fs-5">Footer image</p>
                                            <p class="text-gray-500 mb-10">Choose or upload an image to be used when
                                                sharing your page Footer</p>

                                            <label class="lbl-backImage lbl-defualtLogo" for="txtDefualtLogo">
                                                <svg width="63" height="43" viewBox="0 0 63 43" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M30.0431 32.2895V10.71H32.9578V32.2895H30.0431ZM20.7021 22.9486V20.0509H42.2987V22.9486H20.7021Z"
                                                        fill="#3595F6" />
                                                </svg>
                                                <input type="file" id="txtDefualtLogo" name="footer_logo"
                                                    class="form-control backImage" accept="image/jpeg,image/gif,image/png">
                                            </label>
                                            <div class="mediaFileList mediaFileList-d-logo">
                                              @if($footer->footer_logo)  <ul>
                                                    <li> <img src="{{ asset($footer->footer_logo) }}" alt="admin.png"
                                                            title="admin.png"></li>
                                                </ul>
                                                <span class="clearBackImage clearBackImageEvent">Clear <svg width="20"
                                                        height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.8337 5.34199L14.6587 4.16699L10.0003 8.82533L5.34199 4.16699L4.16699 5.34199L8.82533 10.0003L4.16699 14.6587L5.34199 15.8337L10.0003 11.1753L14.6587 15.8337L15.8337 14.6587L11.1753 10.0003L15.8337 5.34199Z"
                                                            fill="#7E8299"></path>
                                                    </svg></span> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Block 2 -->
                        <div class="card card-flush">
                            <div class="card-body">
                                <div class="fv-row">

                                    <!-- background_color -->
                                    <div class="d-flex fv-row">
                                        <div class="w-100">
                                            <label class="form-check form-switch d-inline px-0">
                                                <input class="form-check-input m-0" id="background_color"
                                                    name="background_color" type="checkbox" value="1"
                                                    @if ($footer->background_color) checked @endif>
                                                <span
                                                    class="fw-bold text-gray-800 form-check-label px-2 mx-5 fs-5">Background
                                                    color</span>
                                            </label>
                                            <div class="text-gray-500 mt-4 fs-6">The default background color has been
                                                preselected. If you prefer to use your own logo, you can turn off the
                                                switch.</div>
                                        </div>


                                    </div>

                                    <!-- Background color Content -->
                                    <div class="d-flex fv-row mt-10 d-none background_color-content"
                                        @if ($footer->background_color) style="display:flex !important;" @endif>
                                        <div class="w-100">
                                            <p class="fw-bold text-gray-800 mb-1 fs-5">Enabled background color</p>
                                            <p class="text-gray-500 mb-5">Choose or upload an image to be used when sharing
                                                your page on header background</p>

                                            <div class="colorPicker">
                                                <label for="txtColorCode" class="colorCode">#112A46</label>
                                                <input type="color" name="txtColorCode" id="txtColorCode"
                                                    value="{{ $footer->background_color }}">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                        <!-- Block 3 -->
                        <div class="card card-flush">
                            <div class="card-body">

                                <!-- Global Title -->
                                <div class="d-flex fv-row">
                                    <div class="w-100">

                                        <label class="form-check form-switch d-inline px-0">
                                            <input class="form-check-input m-0" id="global_title" name="global_title"
                                                type="checkbox" @if ($footer->global_title) value="0" @endif>
                                            <span class="fw-bold text-gray-800 form-check-label px-2 mx-5 fs-5">Global
                                                Title</span>
                                        </label>
                                        <div class="text-gray-500 mt-4 fs-6">The default background color has been
                                            preselected. If you prefer to use your own logo, you can turn off the switch.
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mt-5 d-none global_title-content"
                                    @if ($footer->global_title) style="display:block !important;" @endif>
                                    <label class="form-label fs-5">Title</label>

                                    <textarea id="editor" name="global_title_text">{{ $footer->global_title }}</textarea>

                                </div>
                            </div>
                        </div>

                        <!-- Block 4 -->
                        <div class="card card-flush">
                            <div class="card-body">

                                <div class="fv-row">
                                    <label class="form-label fs-5">Sub Title</label>
                                    <textarea id="editor1" name="sub_title">{{ $footer->sub_title }}</textarea>
                                </div>

                            </div>
                        </div>

                        <!-- Block 5 -->
                        <div class="card card-flush mb-20">
                            <div class="card-body">

                                <div class="fv-row">
                                    <label class="form-label" style="color: #3595F6;">Footer Items</label>

                                    <div class="w-100 render-column-lists sortable1" id="render-column-lists">






                                    </div>

                                    <div class="w-100 mt-5">
                                        <button type="button"
                                            class="btn btn-outline btn-add-column d-flex align-items-center justify-content-center">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path
                                                    d="M11.8332 6.83366H6.83317V11.8337H5.1665V6.83366H0.166504V5.16699H5.1665V0.166992H6.83317V5.16699H11.8332V6.83366Z"
                                                    fill="#205A95" />
                                            </svg>
                                            &nbsp; Add Column
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <textarea style="display: none;" class="form-control mb-2" id="storeObjectItems" name="storeObjectItems"
                        rows="15" cols="15"></textarea>


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

    <div class="editFooter d-none">@php print_r(json_decode($footer->items)); @endphp</div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        function footerLoadHtml() {
            const editFooter = $(".editFooter").html()
            if (editFooter != "") {

                const itemsHtml = (id, link, linkType, title, subMenu) => {

                    let subMenuItems = '';
                    let isparentDivStart = ``;
                    let isparentDivEnd = ``;
                    let popupTypeIs = "parent";
                    if (subMenu != false) {
                        subMenuItems = `${subMenu}`;
                        isparentDivStart = `<div class="render-column-list-parent">`;
                        isparentDivEnd = `</div>`;
                    } else {
                        popupTypeIs = "sub-menu";
                    }

                    let is_popup_link = title;
                    if (link != "") {
                        if (linkType == true) {
                            is_popup_link = `<a href="${link}" target="_blank">${title}</a>`
                        } else {
                            is_popup_link = `<a href="${link}">${title}</a>`
                        }
                    }

                    return `${isparentDivStart}<div class="render-column-list ${popupTypeIs} index-${id}" popup_index="${id}" popup_type="${popupTypeIs}" popup_link="${link}" popup_link_type="${linkType}"><span class="rc-text">${is_popup_link}</span><div class="rc-action"><span class="rc-action-edit"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.57692" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M17.256 14.1208L17.9823 14.8471L10.8297 21.9997H10.1034V21.2734L17.256 14.1208ZM20.0981 9.36816C19.9007 9.36816 19.6954 9.44711 19.5454 9.59711L18.1007 11.0418L21.0612 14.0024L22.506 12.5576C22.8138 12.2497 22.8138 11.7524 22.506 11.4445L20.6586 9.59711C20.5007 9.43922 20.3033 9.36816 20.0981 9.36816ZM17.256 11.8866L8.52441 20.6181V23.5787H11.4849L20.2165 14.8471L17.256 11.8866Z" fill="#5E6278"></path><rect x="0.57692" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span><span class="rc-action-remove"><svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.735123" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M11.8949 21.9997C11.8949 22.8681 12.6055 23.5787 13.4739 23.5787H19.7897C20.6581 23.5787 21.3686 22.8681 21.3686 21.9997V12.5261H11.8949V21.9997ZM13.4739 14.105H19.7897V21.9997H13.4739V14.105ZM19.3949 10.1576L18.6054 9.36816H14.6581L13.8686 10.1576H11.1055V11.7366H22.1581V10.1576H19.3949Z" fill="#5E6278"></path><rect x="0.735123" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span><span class="rc-action-add"><svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.892349" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M22.1571 17.263H17.4203V21.9999H15.8413V17.263H11.1045V15.6841H15.8413V10.9473H17.4203V15.6841H22.1571V17.263Z" fill="#5E6278"></path><rect x="0.892349" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span></div></div> ${subMenuItems} ${isparentDivEnd}`
                }

                const obj = JSON.parse(editFooter);
                $("#storeObjectItems").val(JSON.stringify(obj))

                let htmlItems = "";
                obj.length > 0 && obj.map(ls => {
                    let subMenuHtml =
                        `<div class="sortable2 sub-menu-items index-${ls.parentId}" popup_index="sub-${ls.parentId}">`;
                    ls.subItems.length > 0 && ls.subItems.map(lss => {
                        subMenuHtml += itemsHtml(lss.id, lss.link, lss.linkType, lss.title, false);
                    })
                    subMenuHtml += `</div>`;
                    htmlItems += itemsHtml(ls.parentItems.id, ls.parentItems.link, ls.parentItems.linkType, ls
                        .parentItems.title, subMenuHtml)
                })
                $("#render-column-lists").html(htmlItems)
            }
        }
        footerLoadHtml();

        $("#render-column-lists").on("mouseover mouseleave", function() {
            setTimeout(() => {
                createItemsObject();
            }, 2000);
        });

        $(".sortable1").sortable({
            items: ".render-column-list-parent"
        });
        $(".sortable1").disableSelection();
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

        //Initialize Quill editor
        new Quill('#txt_global_title', {
            theme: 'snow'
        });
        new Quill('#subTitle', {
            theme: 'snow'
        });

        function createItemsObject() {
            $("#storeObjectItems").val('')
            let footer_items_list_final = [];
            let footer_items_list_sub_final = [];
            $(".render-column-lists .render-column-list-parent").each(function() {

                const popup_index = $(this).find('.parent').attr('popup_index');
                const popup_title = $(this).find('.parent .rc-text').text();
                const popup_link = $(this).find('.parent').attr('popup_link');
                const popup_link_type = $(this).find('.parent').attr('popup_link_type');

                if (popup_index != "" && typeof popup_index != "undefined") {

                    const obj_main = {
                        id: popup_index,
                        title: popup_title,
                        link: popup_link,
                        linkType: popup_link_type
                    }

                    $(this).find('.sub-menu-items.index-' + popup_index + ' .sub-menu').each(function() {
                        const popup_index_1 = $(this).attr('popup_index');
                        const popup_title_1 = $(this).find('.rc-text').text();
                        const popup_link_1 = $(this).attr('popup_link');
                        const popup_link_type_1 = $(this).attr('popup_link_type');
                        const obj_sub = {
                            id: popup_index_1,
                            title: popup_title_1,
                            link: popup_link_1,
                            linkType: popup_link_type_1
                        }
                        footer_items_list_sub_final.push(obj_sub)
                    });


                    footer_items_list_final.push({
                        parentId: popup_index,
                        parentItems: obj_main,
                        subItems: footer_items_list_sub_final
                    })
                }
                footer_items_list_sub_final = [];
            })



            if (footer_items_list_final.length > 0) {
                $("#storeObjectItems").val(JSON.stringify(footer_items_list_final))
            }

            footer_items_list_final = [];
            footer_items_list_sub_final = [];
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

            return `${parent_menu}<div class="render-column-list ${popup_type} index-${list_length}" popup_index="${list_length}" popup_type="${popup_type}" popup_link="${popup_link}" popup_link_type="${popup_link_type}"><span class="rc-text">${is_popup_link}</span><div class="rc-action"><span class="rc-action-edit"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.57692" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M17.256 14.1208L17.9823 14.8471L10.8297 21.9997H10.1034V21.2734L17.256 14.1208ZM20.0981 9.36816C19.9007 9.36816 19.6954 9.44711 19.5454 9.59711L18.1007 11.0418L21.0612 14.0024L22.506 12.5576C22.8138 12.2497 22.8138 11.7524 22.506 11.4445L20.6586 9.59711C20.5007 9.43922 20.3033 9.36816 20.0981 9.36816ZM17.256 11.8866L8.52441 20.6181V23.5787H11.4849L20.2165 14.8471L17.256 11.8866Z" fill="#5E6278"></path><rect x="0.57692" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span><span class="rc-action-remove"><svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.735123" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M11.8949 21.9997C11.8949 22.8681 12.6055 23.5787 13.4739 23.5787H19.7897C20.6581 23.5787 21.3686 22.8681 21.3686 21.9997V12.5261H11.8949V21.9997ZM13.4739 14.105H19.7897V21.9997H13.4739V14.105ZM19.3949 10.1576L18.6054 9.36816H14.6581L13.8686 10.1576H11.1055V11.7366H22.1581V10.1576H19.3949Z" fill="#5E6278"></path><rect x="0.735123" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span><span class="rc-action-add"><svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.892349" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" fill="white"></rect><path d="M22.1571 17.263H17.4203V21.9999H15.8413V17.263H11.1045V15.6841H15.8413V10.9473H17.4203V15.6841H22.1571V17.263Z" fill="#5E6278"></path><rect x="0.892349" y="0.57692" width="30.8462" height="30.8462" rx="1.42308" stroke="#BFC8D1" stroke-width="1.15384"></rect></svg></span></div></div>`;
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
                is_popup_link, popup_action);

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
            setTimeout(() => {
                createItemsObject();
            }, 200);
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

            setTimeout(() => {
                createItemsObject();
            }, 1000);
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'),{
            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
        })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor1'),{
            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
        })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>



    <script>
        const files_logo = $("#txtDefualtLogo");
        const fileList_logo = $(".mediaFileList-d-logo");
        const labelImage_logo = $(".lbl-defualtLogo");

        function getFileData_logo() {
            const closeBtnHtml =
                `<span class="clearBackImage clearBackImagedLogo">Clear <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.8337 5.34199L14.6587 4.16699L10.0003 8.82533L5.34199 4.16699L4.16699 5.34199L8.82533 10.0003L4.16699 14.6587L5.34199 15.8337L10.0003 11.1753L14.6587 15.8337L15.8337 14.6587L11.1753 10.0003L15.8337 5.34199Z" fill="#7E8299"/></svg></span>`
            var input = document.getElementById('txtDefualtLogo');
            var children = "";
            console.log(input)
            for (var i = 0; i < input.files.length; ++i) {

                children += '<li> <img src="' + window.URL.createObjectURL(input.files[i]) + '" alt="' + input.files.item(i)
                    .name + '" title="' + input.files.item(i).name + '" /></li>';
            }
            fileList_logo.html('<ul>' + children + '</ul>' + closeBtnHtml);
        }



        files_logo.change(function() {
            const maxAllowedSize = 10 * 1024 * 1024;
            const fileValue = $(this).val();
            console.log('fileValue')
            console.log(fileValue)
            if (fileValue != "") {
                labelImage_logo.hide();
                const idxDot = fileValue.lastIndexOf(".") + 1;
                const extFile = fileValue.substr(idxDot, fileValue.length).toLowerCase();
                if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
                    const imageSize = $(this).prop('files')[0]?.size;
                    const fileName = $(this).prop('files')[0]?.name;
                    if (imageSize <= maxAllowedSize) {
                        console.log(1111111)
                        getFileData_logo();
                    } else {
                        fileList_logo.html('');
                        files_logo.val('')
                        alert("Too big of a file. Uploads must be under 3 MB in size.")
                        return false;
                    }
                } else {
                    fileList_logo.html('');
                    files_logo.val('')
                    alert("Only images & documents files are allowed!")
                    return false;
                }
            } else {
                fileList_logo.html('');
                files_logo.val('')
                labelImage_logo.show();
            }
        });

        fileList_logo.on('click', '.clearBackImagedLogo', function() {
            labelImage_logo.show();
            fileList_logo.html('');
            files_logo.val('')
        })
    </script>
@endsection
