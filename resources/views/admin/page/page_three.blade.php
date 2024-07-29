@extends('admin.layouts.app')
@section('content')
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.js"></script>
    <style>
        .sideji1 {
            /* display: none; */
            left: 100%;
            transition: all .5s;
        }

        .kt_app_toll {
            max-width: 1500px !important;
        }
    </style>
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        @isset($page_title)
                            {{ $page_title }}
                        @endisset
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            @isset($page_title)
                                {{ $page_title }}
                            @endisset
                        </li>
                    </ul>
                </div>

                <button id="secta" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_new_target">+ Create New Page</button>

            </div>
        </div>
        <div class="app-content flex-column-fluid">
            <div id="kt_app_content" class="app-content app-conjing flex-column-fluid">

                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid app-conjing das">
                    @include('admin.layouts.alert_message')
                    <div id="far" class="sideeji sideji1">
                        <div class="sideeji-alert ">
                            <div class="alertsas">
                                <h2>Filters</h2>
                                <svg style="cursor: pointer;" id="crosst" width="12" height="12"
                                    viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.8327 1.34199L10.6577 0.166992L5.99935 4.82533L1.34102 0.166992L0.166016 1.34199L4.82435 6.00033L0.166016 10.6587L1.34102 11.8337L5.99935 7.17533L10.6577 11.8337L11.8327 10.6587L7.17435 6.00033L11.8327 1.34199Z"
                                        fill="#5E6278" />
                                </svg>
                            </div>
                            <div class="hr-alsas">
                                <hr>
                                <!-- ki-duotone ki-magnifier fs-1 position-absolute ms-6 -->
                            </div>
                            <form action="" class="left-sidebar">
                                <div class="search-alas">
                                    <h3>Option</h3>
                                    <div class="d-flex align-items-center search-das1 position-relative my-1">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.1479 14.3519L11.6273 10.8321C12.6477 9.60705 13.1566 8.03577 13.048 6.44512C12.9394 4.85447 12.2217 3.36692 11.0443 2.29193C9.86684 1.21693 8.32029 0.637251 6.72635 0.673476C5.13241 0.709701 3.6138 1.35904 2.48642 2.48642C1.35904 3.6138 0.709701 5.13241 0.673476 6.72635C0.637251 8.32029 1.21693 9.86684 2.29193 11.0443C3.36692 12.2217 4.85447 12.9394 6.44512 13.048C8.03577 13.1566 9.60705 12.6477 10.8321 11.6273L14.3519 15.1479C14.4042 15.2001 14.4663 15.2416 14.5345 15.2699C14.6028 15.2982 14.676 15.3127 14.7499 15.3127C14.8238 15.3127 14.897 15.2982 14.9653 15.2699C15.0336 15.2416 15.0956 15.2001 15.1479 15.1479C15.2001 15.0956 15.2416 15.0336 15.2699 14.9653C15.2982 14.897 15.3127 14.8238 15.3127 14.7499C15.3127 14.676 15.2982 14.6028 15.2699 14.5345C15.2416 14.4663 15.2001 14.4042 15.1479 14.3519ZM1.81242 6.87492C1.81242 5.87365 2.10933 4.89487 2.6656 4.06234C3.22188 3.22982 4.01253 2.58095 4.93758 2.19778C5.86263 1.81461 6.88053 1.71435 7.86256 1.90969C8.84459 2.10503 9.74664 2.58718 10.4546 3.29519C11.1626 4.00319 11.6448 4.90524 11.8401 5.88727C12.0355 6.8693 11.9352 7.8872 11.5521 8.81225C11.1689 9.7373 10.52 10.528 9.68749 11.0842C8.85497 11.6405 7.87618 11.9374 6.87492 11.9374C5.53272 11.9359 4.24591 11.4021 3.29683 10.453C2.34775 9.50392 1.81391 8.21712 1.81242 6.87492Z"
                                                fill="#7E8299" />
                                        </svg>

                                        <input type="text" data-kt-filemanager-table-filter="search" name="search_key"
                                            class="form-control form-control-solid search-das search-fas1 search-fas2 w-250px ps-15"
                                            onkeyup="fillter()" placeholder="Search Pages">
                                    </div>
                                </div>

                                <!--begin::Input group-->
                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Author by</label>
                                    <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                        data-placeholder="Select option" data-allow-clear="true"
                                        data-kt-user-table-filter="role" data-hide-search="true">
                                        <option></option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Analyst">Analyst</option>
                                        <option value="Developer">Developer</option>
                                        <option value="Support">Support</option>
                                        <option value="Trial">Trial</option>
                                    </select>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->

                                <div class="mt-6">
                                    <label class="form-label fs-6 fw-semibold">Dates</label>
                                    <input class="form-control form-control1" type="date">
                                </div>

                                <div class="apply_cancle_btn d-flex align-items-center justify-content-center">
                                    {{-- <button class="apply">Apply</button> --}}
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <!--begin::Toolbar-->
                        {{-- <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container"
                                class="app-container container-fluid d-flex flex-stack kt_app_toll">
                                <!--begin::Page title-->
                                <div
                                    class="page-title page-title55 d-flex flex-column justify-content-center flex-wrap me-3">
                                    <h1
                                        class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        Website Pages</h1>
                                    <p>Select a site to edit, view and open it dashboard</p>
                                </div>
                                <!--end::Page title-->

                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <!--begin::Primary button-->
                                    @can('pages-create')
                                    <button id="secta" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_new_target">+ Create New Page</button>
                                        @endcan
                                    <!--end::Primary button-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar container-->
                        </div> --}}
                        <!--end::Toolbar-->
                    </div>

                    <!-- ===============craete page html================ -->


                    <div class="modal  fade" tabindex="-1" id="kt_modal_1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modal-header56 modal-header57">
                                    <h3 class="modal-title modal-title11">
                                        Create a page
                                    </h3>

                                    <!--begin::Close-->
                                    <div id="ui" class="btn btn-icon btn-sm btn-active-light-primary ms-2 cut-btn2"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"
                                                fill="#7E8299" />
                                        </svg>
                                    </div>
                                    <!--end::Close-->
                                </div>


                                <div class="modal-body modal-body11 modal-body22 position-relative">
                                    <!-- <p>Modal body text goes here.</p> -->
                                    <form class="form" action="{{ route('admin.pages.store') }}" method="POST">
                                        @csrf
                                        <p>Internal page name</p>
                                        <input type="text" placeholder="page" required name="title">

                                        <div class="creat22-btn">
                                            <a href="page-3"> <button class="creat-pg">Create page</button></a>
                                            <button data-bs-dismiss="modal" class="cancel">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div style="z-index: 109;" class="drawer-overlay-back"></div>
                    <div class="popup-render-items popreb bg-body drawer drawer-end w-xl-400px w-lg-450px">

                        <form id="form-render-items" method="post" action="{{ route('admin.pages.update', 1) }}"
                            class="card w-100 border-0 rounded-0">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="edit_page_id" id="edit_page_id">

                            <div class="card-header card-header1 pe-5 rounded-0">
                                <div class="d-flex flex22 justify-content-between align-items-center flex-row me-3">
                                    <h2>Edit</h2>
                                    <svg class=" cursor-pointer" id="crit" width="33" height="32"
                                        viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" width="32" height="32" rx="16"
                                            fill="#F3F6F8" />
                                        <path
                                            d="M22.3327 11.341L21.1577 10.166L16.4993 14.8243L11.841 10.166L10.666 11.341L15.3243 15.9993L10.666 20.6577L11.841 21.8327L16.4993 17.1743L21.1577 21.8327L22.3327 20.6577L17.6743 15.9993L22.3327 11.341Z"
                                            fill="#5E6278" />
                                    </svg>

                                </div>
                            </div>


                            <div class="card-body">
                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Page Name</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control seo-title111" placeholder="Page Name" />
                                </div>
                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Header</label>
                                    <select class="form-select form-sel44  form-control3 form-select-solid fw-bold"
                                        data-kt-select2="true" data-placeholder="Select" data-allow-clear="true"
                                        data-kt-user-table-filter="role" data-hide-search="true" required id="header_id"
                                        name="header_id">
                                    </select>
                                </div>

                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Footer</label>
                                    <select class="form-select form-sel44  form-control3 form-select-solid fw-bold"
                                        data-kt-select2="true" data-placeholder="Select" data-allow-clear="true"
                                        data-kt-user-table-filter="role" data-hide-search="true" required id="footer_id"
                                        name="footer_id">
                                    </select>
                                </div>

                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Navigation</label>
                                    <select class="form-select form-sel44  form-control3 form-select-solid fw-bold"
                                        data-kt-select2="true" data-placeholder="Select" data-allow-clear="true"
                                        data-kt-user-table-filter="role" data-hide-search="true" required
                                        id="navigation_id" name="navigation_id">
                                    </select>
                                </div>
                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Url</label>
                                    <input type="text" name="custom_url" id="custom_url"
                                        class="form-control seo-title111" placeholder="Custom Url" />
                                </div>
                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Seo Title</label>
                                    <input type="text" name="seo_title" id="seo_title"
                                        class="form-control seo-title111" placeholder="Seo Title" />
                                </div>
                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Seo Description</label>
                                    <textarea name="seo_description" id="seo_description" class="form-control seo-title111" placeholder="Description"></textarea>
                                </div>
                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Keyword</label>
                                    <input type="text" name="seo_keywords" id="seo_keywords"
                                        class="form-control seo-title111" placeholder="Keyword" />
                                </div>

                            </div>


                            <div class="card-footer p-5 d-flex justify-content-between align-items-center">
                                <button class="btn btn-primary w-100px" id="popup-btn-save" type="submit">SAVE</button>
                                <button class="btn btn-outline w-100px" id="popup-btn-cancel"
                                    type="button">Cancel</button>

                                <a id="pageBuilderButton" href="{{ route('admin.pages.pagebuilder') }}"><button
                                        class="btn btn-primary w-101px" id="popup-btn-cancel" type="button">Page
                                        Builder</button></a>

                            </div>

                        </form>

                    </div> -->


                    <div>
                        <div id="kt_app_content_container" class="app-container container-xxl app-conjing">

                            <!--begin::Card-->
                            <div  class="card card-flush card-body2 card-slush222">


                                <div class="card-body card-body4 card-si">

                                    <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
                                        <thead>
                                            <tr class="fw-semibold fs-6 text-muted">

                                                <th>Name</th>
                                                <th>URL</th>
                                                <th>Author</th>
                                                <th>Last Updated</th>
                                                @canany(['pages-edit', 'pages-delete'])
                                                <th>Status</th>
												<th>Homepage</th>
                                                <th>Action</th>
                                                @endcanany
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @include('admin.page.table')
                                        </tbody>
                                    </table>


                                    <div class="modal modal444 fade" tabindex="-1" id="kt_modal_1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header modal-header56 modal-header57">
                                                    <h3 class="modal-title modal-title11">
                                                        Create a duplicate page
                                                    </h3>

                                                    <!--begin::Close-->
                                                    <div id="ui"
                                                        class="btn btn-icon btn-sm btn-active-light-primary ms-2 cut-btn2"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"
                                                                fill="#7E8299" />
                                                        </svg>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>


                                                <div class="modal-body modal-body11 modal-body22 position-relative">
                                                    <!-- <p>Modal body text goes here.</p> -->
                                                    <form class="form" id="dupicateid"
                                                        action="{{ route('admin.pages.page.duplicate') }}" method="POST">
                                                        @csrf
                                                        <p>Duplicate page name</p>
                                                        <input type="text" placeholder="page" required
                                                            name="duplicate">

                                                        <div class="creat22-btn">
                                                            <button class="creat-pg" type="submit">Create page</button>
                                                            <button data-bs-dismiss="modal" class="cancel">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Table-->
                                </div>


                                <!--end::Card body-->
                            </div>


                        </div>
                    </div>



                </div>
                <!--end::Content container-->
            </div>
        </div>
    </div>

    <style>
        /* .dropDownCustom {
            display: block;
            position: absolute !important;
            right: 170px !important;
            top: 0 !important;
            transform: none !important;
        } */
    </style>
    <script>
        $("#kt_datatable_zero_configuration").DataTable();


        $('#secta').on('click', function() {
            $('#kt_modal_1').modal('show');
        });

        $('#red').on('click', function() {
            $('.modal1').modal('show');
        });
    </script>
    <script>
        let more_filt = document.getElementById("more_filt");
        more_filt.addEventListener("click", (e) => {
            console.log(e);
            document.getElementById("far").style.left = "0px"
        })
        var modal = document.getElementById("far");
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.left = "100%"
            }
        }

        //    ======================logic to click cross================
        let crosst = document.getElementById("crosst").addEventListener("click", (e) => {
            document.getElementById("far").style.left = "100%";
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
        $(".column-add, #popup-btn-cancel, .drawer-overlay-back, #crit").on('click', function() {
            popup_open_close();
        })
    </script>
    <script>
        function fillter() {
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.pages.index') }}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    console.log(data);
                    $('.daynamicTable').html(data)
                }
            });
        }

        function editPage(id) {
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.page.edit', '') }}/" + id,
                success: function(data) {
                    $('#header_id').empty();
                    $('#header_id').append('<option value="">Select Header</option>');
                    const is_pageBuilderButtonHref = $("#pageBuilderButton").attr('href');
                    $("#pageBuilderButton").attr('href', is_pageBuilderButtonHref + "?id=" + id);
                    let isheader = "";
                    let isfooter = "";
                    let isnavigation = "";
                    $.each(data.headers, function(key, val) {
                        if (data.page.header_id === val.id) {
                            isheader = "selected";
                        }
                        $('#header_id').append('<option value="' + val.id + '" ' + isheader + '>' + val
                            .title +
                            '</option>');
                        isheader = "";
                    });
                    $('#footer_id').empty();
                    $('#footer_id').append('<option value="">Select Footer</option>');
                    $.each(data.footers, function(key, val) {
                        if (data.page.footer_id === val.id) {
                            isfooter = "selected";
                        }
                        $('#footer_id').append('<option value="' + val.id + '" ' + isfooter + '>' + val
                            .title +
                            '</option>');
                        isfooter = "";
                    });
                    $('#navigation_id').empty();
                    $('#navigation_id').append('<option value="">Select Navigation</option>');
                    $.each(data.navigations, function(key, val) {
                        if (data.page.navigation_id === val.id) {
                            isnavigation = "selected";
                        }
                        $('#navigation_id').append('<option value="' + val.id + '" ' + isnavigation +
                            '>' + val.title +
                            '</option>');
                        isnavigation = "";
                    });
                    $('#title').val(data.page.title);
                    $('#edit_page_id').val(data.page.id)
                    $('#seo_title').val(data.page.seo_title)
                    $('#custom_url').val(data.page.custom_url)
                    $('#seo_description').val(data.page.seo_description)
                    $('#seo_keywords').val(data.page.seo_keywords);
                }
            });
        }

        $(function() {

            $(document).on('click', '.duplicated-items-btn', function() {
                var dataid = $(this).attr('data');
                $('.modal444').modal('show');
                var dupicateid = $("#dupicateid").attr('action');
                $("#dupicateid").attr('action', dupicateid + "?id=" + dataid);
            });

            $(document).on('click', '.click-dropdown-open', function(event) {
                $('.dropDownCustom').removeClass('dropDownCustom')
                $(this).parent('td').find('.dropdown-more-details').toggleClass('dropDownCustom')
            })


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
    </script>
@endsection
