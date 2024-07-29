@extends('admin.layouts.cms.app')
@section('content')
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

        </div>
    </div>
    <div class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid app-conjing das">

            <!-- ====================yaha par============== -->
            <!-- ====================yaha par============== -->
            <div class="fragsa dragsa">
                <div class="dropzone dropzone1 dst dz-clickable position-relative" id="kt_ecommerce_add_product_media">
                    <!--begin::Message-->
                    <div class="dz-message needsclick">
                        <!--begin::Icon-->
                        <!-- <i class="ki-duotone ki-file-up text-primary fs-3x">
                          <span class="path1"></span>
                          <span class="path2"></span>
                        </i> -->
                        <!--end::Icon-->
                        <!--begin::Info-->
                        <!-- <div class="ms-4">
                          <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                          <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                        </div> -->
                        <!--end::Info-->
                        <div class="sansji">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V22C0 22.5304 0.210714 23.0391 0.585786 23.4142C0.960859 23.7893 1.46957 24 2 24H22C22.5304 24 23.0391 23.7893 23.4142 23.4142C23.7893 23.0391 24 22.5304 24 22V2C24 1.46957 23.7893 0.960859 23.4142 0.585786C23.0391 0.210714 22.5304 0 22 0ZM19 13H13V19C13 19.2652 12.8946 19.5196 12.7071 19.7071C12.5196 19.8946 12.2652 20 12 20C11.7348 20 11.4804 19.8946 11.2929 19.7071C11.1054 19.5196 11 19.2652 11 19V13H5C4.73478 13 4.48043 12.8946 4.29289 12.7071C4.10536 12.5196 4 12.2652 4 12C4 11.7348 4.10536 11.4804 4.29289 11.2929C4.48043 11.1054 4.73478 11 5 11H11V5C11 4.73478 11.1054 4.48043 11.2929 4.29289C11.4804 4.10536 11.7348 4 12 4C12.2652 4 12.5196 4.10536 12.7071 4.29289C12.8946 4.48043 13 4.73478 13 5V11H19C19.2652 11 19.5196 11.1054 19.7071 11.2929C19.8946 11.4804 20 11.7348 20 12C20 12.2652 19.8946 12.5196 19.7071 12.7071C19.5196 12.8946 19.2652 13 19 13Z"
                                    fill="#3595F6" />
                            </svg>

                            <p class="text-center">Drag here</p>

                        </div>
                    </div>
                </div>
            </div>

            <!-- ==============rightSidebar============ -->
            <div style="z-index: 109;" class="drawer-overlay-back drawer-overlay-back1"></div>

            <div id="akg"
                class="popup-render-items bg-body drawer drawer-end  w-xl-400px w-lg-450px drawer-on drawer-on1 drawer-on2">
                <form id="form-render-items" method="post" class="card w-100 border-0 rounded-0">
                    <!-- head -->
                    <div class="card-header card-header1  pe-5 rounded-0">
                        <div class="sigh">
                            <h2>Settings</h2>
                            <svg id="popup-btn-cancel" width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="32" rx="16" fill="#F3F6F8" />
                                <path
                                    d="M21.8337 11.341L20.6587 10.166L16.0003 14.8243L11.342 10.166L10.167 11.341L14.8253 15.9993L10.167 20.6577L11.342 21.8327L16.0003 17.1743L20.6587 21.8327L21.8337 20.6577L17.1753 15.9993L21.8337 11.341Z"
                                    fill="#5E6278" />
                            </svg>
                        </div>
                    </div>

                    <!-- popup body -->
                    <div class="card-body">
                        <div id="sant" class="genting d-flex align-items-center">
                            <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.3541 0.85375L6.35414 5.85375C6.30771 5.90024 6.25256 5.93712 6.19186 5.96228C6.13117 5.98744 6.0661 6.00039 6.00039 6.00039C5.93469 6.00039 5.86962 5.98744 5.80892 5.96228C5.74822 5.93712 5.69308 5.90024 5.64664 5.85375L0.646644 0.85375C0.576638 0.783823 0.528954 0.694696 0.509629 0.597654C0.490304 0.500611 0.500206 0.400016 0.538082 0.308605C0.575959 0.217193 0.640106 0.139075 0.722403 0.08414C0.8047 0.0292046 0.901446 -7.77138e-05 1.00039 1.549e-07H11.0004C11.0993 -7.77138e-05 11.1961 0.0292046 11.2784 0.08414C11.3607 0.139075 11.4248 0.217193 11.4627 0.308605C11.5006 0.400016 11.5105 0.500611 11.4912 0.597654C11.4718 0.694696 11.4241 0.783823 11.3541 0.85375Z"
                                    fill="#7E8299" />
                            </svg>
                            <p class="">General</p>
                        </div>
                        <div id="pickd" class="sas">
                            <form class="internal-global hidden" action="">
                                <div class="mt-6">
                                    <label class="form-label form-label1 fs-6 fw-semibold">Internal page name *</label>
                                    <input class="form-control form-control1" type="text">
                                </div>
                                <div class="mt-4">
                                    <label class="form-label form-label1 fs-6 fw-semibold">Page title *</label>
                                    <input class="form-control form-control1" type="text">
                                </div>
                                <div>
                                    <hr class="hr-setca">
                                </div>
                                <div class="mt-6">
                                    <label class="form-label form-label1 fs-6 fw-semibold">Page URL*</label>
                                    <input class="form-control form-control1" type="text">
                                </div>
                                <div class="mt-4">
                                    <label class="form-label form-label1 fs-6 fw-semibold">Meta Description *</label>
                                    <textarea class="form-control form-control1 form-control2" name="" id="" cols="30"
                                        rows="10"></textarea>
                                </div>
                                <div>
                                    <hr class="hr-setca">
                                </div>

                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Header</label>
                                    <select class="form-select  form-control3 form-select-solid fw-bold"
                                        data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true"
                                        data-kt-user-table-filter="role" data-hide-search="true">
                                        <option></option>
                                        <option value="Administrator">First header</option>
                                        <option value="Analyst">Second header</option>
                                        <option value="Developer">Third header</option>
                                        <option value="Support">Fourth header</option>
                                        <option value="Trial">Fifth header</option>
                                    </select>
                                </div>

                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Footer</label>
                                    <select class="form-select  form-control3 form-select-solid fw-bold"
                                        data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true"
                                        data-kt-user-table-filter="role" data-hide-search="true">
                                        <option></option>
                                        <option value="Administrator">Dark Footer</option>
                                        <option value="Analyst">Second header</option>
                                        <option value="Developer">Third header</option>
                                        <option value="Support">Fourth header</option>
                                        <option value="Trial">Fifth header</option>
                                    </select>
                                </div>
                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Navigation</label>
                                    <select class="form-select  form-control3 form-select-solid fw-bold"
                                        data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true"
                                        data-kt-user-table-filter="role" data-hide-search="true">
                                        <option></option>
                                        <option value="Administrator">Dark Footer</option>
                                        <option value="Analyst">Second header</option>
                                        <option value="Developer">Third header</option>
                                        <option value="Support">Fourth header</option>
                                        <option value="Trial">Fifth header</option>
                                    </select>
                                </div>


                            </form>
                        </div>
                        <div>
                            <hr class="hr-setca1">
                        </div>
                        <div id="sanj" class="genting d-flex align-items-center">
                            <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.3541 0.85375L6.35414 5.85375C6.30771 5.90024 6.25256 5.93712 6.19186 5.96228C6.13117 5.98744 6.0661 6.00039 6.00039 6.00039C5.93469 6.00039 5.86962 5.98744 5.80892 5.96228C5.74822 5.93712 5.69308 5.90024 5.64664 5.85375L0.646644 0.85375C0.576638 0.783823 0.528954 0.694696 0.509629 0.597654C0.490304 0.500611 0.500206 0.400016 0.538082 0.308605C0.575959 0.217193 0.640106 0.139075 0.722403 0.08414C0.8047 0.0292046 0.901446 -7.77138e-05 1.00039 1.549e-07H11.0004C11.0993 -7.77138e-05 11.1961 0.0292046 11.2784 0.08414C11.3607 0.139075 11.4248 0.217193 11.4627 0.308605C11.5006 0.400016 11.5105 0.500611 11.4912 0.597654C11.4718 0.694696 11.4241 0.783823 11.3541 0.85375Z"
                                    fill="#7E8299" />
                            </svg>
                            <p class="">Global</p>

                        </div>

                        <div id="pickfid" class="saj">
                            <form class="internal-global hidden" action="">
                                <div class="mt-6">
                                    <label class="form-label form-label1 fs-6 fw-semibold">Primary Color</label>
                                    <div class=" d-flex">
                                        <div class="colorPicker1">
                                            <label for="txtColorCode4" class="colorCode"> <input type="color"
                                                    name="txtColorCode4" id="txtColorCode4" value="#112A46"></label>

                                        </div>
                                        <div class=" d-flex align-items-start ">
                                            <input class="percentageInput" type="text" id="percentageInput"
                                                oninput="addPercentageSymbol()" value="0%">
                                            <div class="sanst position-relative">
                                                <div>
                                                    <svg onclick="handleUp('percentageInput')" width="21" height="20"
                                                        viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                                <hr class="sitry">
                                                <div>
                                                    <svg onclick="handleDown('percentageInput')" class="sy" width="21"
                                                        height="20" viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="form-label form-label1 fs-6 fw-semibold">Secondary Color</label>
                                    <div class=" d-flex">
                                        <div class="colorPicker1">
                                            <label for="txtColorCode5" class="colorCode">
                                                <input type="color" name="txtColorCode5" id="txtColorCode5"
                                                    value="#D9E0E6">
                                            </label>

                                        </div>
                                        <div class=" d-flex align-items-start ">
                                            <input class="percentageInput" type="text" id="percentageInput1"
                                                oninput="addPercentageSymbol()" value="0%">
                                            <div class="sanst position-relative">
                                                <div>
                                                    <svg onclick="handleUp('percentageInput1')" width="21" height="20"
                                                        viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                                <hr class="sitry">
                                                <div>
                                                    <svg onclick="handleDown('percentageInput')" class="sy" width="21"
                                                        height="20" viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="form-label form-label1 fs-6 fw-semibold">Background Color</label>
                                    <div class=" d-flex">
                                        <div class="colorPicker1">
                                            <label for="txtColorCode6" class="colorCode">
                                                <input type="color" name="txtColorCode6" id="txtColorCode6"
                                                    value="#0785FA">
                                            </label>

                                        </div>
                                        <div class=" d-flex align-items-start ">
                                            <input class="percentageInput" type="text" id="percentageInput2"
                                                oninput="addPercentageSymbol()" value="0%">
                                            <div class="sanst position-relative">
                                                <div>
                                                    <svg onclick="handleUp('percentageInput2')" width="21" height="20"
                                                        viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                                <hr class="sitry">
                                                <div>
                                                    <svg onclick="handleDown('percentageInput2')" class="sy" width="21"
                                                        height="20" viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <hr class="hr-setca">
                                </div>
                                <div class=" mt-6">
                                    <label class="form-label fs-6 fw-semibold">Body Text</label>
                                    <div class="d-flex">
                                        <div>
                                            <select
                                                class="form-select for-cont4 form-control3 form-select-solid fw-bold"
                                                data-kt-select2="true" data-placeholder="Select option"
                                                data-allow-clear="true" data-kt-user-table-filter="role"
                                                data-hide-search="true">
                                                <option></option>
                                                <option value="Administrator">Poppins</option>
                                                <option value="Analyst">Second header</option>
                                                <option value="Developer">Third header</option>
                                                <option value="Support">Fourth header</option>
                                                <option value="Trial">Fifth header</option>
                                            </select>
                                        </div>
                                        <div class=" d-flex align-items-start ">
                                            <input class="percentageInput" type="text" id="percentageInput">
                                            <div class="sanst position-relative">
                                                <div>
                                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                                <hr class="sitry">
                                                <div>
                                                    <svg class="sy" width="21" height="20" viewBox="0 0 21 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <hr class="hr-setca">
                                </div>
                                <div class="mt-4">
                                    <label class="form-label form-label1 fs-6 fw-semibold">Button Background
                                        Color</label>
                                    <div class=" d-flex">
                                        <div class="colorPicker1">
                                            <label for="txtColorCode7" class="colorCode">
                                                <input type="color" name="txtColorCode7" id="txtColorCode7"
                                                    value="#0785FA">
                                            </label>

                                        </div>
                                        <div class=" d-flex align-items-start ">
                                            <input class="percentageInput" type="text" id="percentageInput3"
                                                oninput="addPercentageSymbol()" value="0%">
                                            <div class="sanst position-relative">
                                                <div>
                                                    <svg onclick="handleUp('percentageInput3')" width="21" height="20"
                                                        viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                                <hr class="sitry">
                                                <div>
                                                    <svg onclick="handleDown('percentageInput3')" class="sy" width="21"
                                                        height="20" viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="form-label form-label1 fs-6 fw-semibold">Background Color</label>
                                    <div class=" d-flex">
                                        <div class="colorPicker1">
                                            <label for="txtColorCode8" class="colorCode">
                                            <input type="color" name="txtColorCode8" id="txtColorCode8" value="#D9E0E6">
                                            </label>
                                            
                                        </div>
                                        <div class=" d-flex align-items-start ">
                                            <input class="percentageInput" type="text" id="percentageInput4"
                                                oninput="addPercentageSymbol()" value="0%">
                                            <div class="sanst position-relative">
                                                <div>
                                                    <svg onclick="handleUp('percentageInput4')" width="21" height="20"
                                                        viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                                <hr class="sitry">
                                                <div>
                                                    <svg onclick="handleDown('percentageInput4')" class="sy" width="21"
                                                        height="20" viewBox="0 0 21 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                            fill="#7E8299" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none;" class="w-100">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold mb-2">
                                        Font Size
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Slider-->
                                    <div class="d-flex align-items-center text-center">
                                        <div id="fontSizeSlider" class="noUi-sm w-100"></div>
                                        <div class="d-flex align-items-start justify-content-center mb-7">
                                            <span class="fw-bold fs-3x"
                                                id="kt_modal_create_campaign_budget_label"></span>
                                            <span id="fontSize" class="fw-bold fs-3x">.00</span>
                                            <span class="fw-bold fs-4 mt-1 me-2">px</span>
                                        </div>
                                    </div>
                                    <!--end::Slider-->
                                </div>
                                <div class="w-100 mt-4">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold mb-2 saya45">
                                        Button Corner Radius
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Slider-->
                                    <div class="d-flex align-items-center text-center">
                                        <div id="fontSizeSlider1" class="noUi-sm w-100"></div>
                                        <div class="d-flex  sans justify-content-center">
                                            <span class="fw-bold fs-3x"
                                                id="kt_modal_create_campaign_budget_label"></span>
                                            <span id="fontSize1" class="fw-bold fs-3x sara8">.00</span>
                                            <span class="fw-bold fs-4  me-2 sara8">px</span>
                                        </div>
                                    </div>
                                    <!--end::Slider-->
                                </div>
                            </form>
                        </div>



                    </div>

                    <!-- popup footer -->
                    <!-- <div class="card-footer p-5 d-flex justify-content-between align-items-center">
                          <button class="btn btn-outline w-100px" id="popup-btn-cancel" type="button">Cancel</button>
                          <button class="btn btn-primary w-100px" id="popup-btn-save" type="submit">SAVE</button>
                      </div> -->
                </form>
            </div>

            <!-- =================modal end======================== -->

        </div>
    </div>
</div>

<!-- <script src="assets/plugins/global/plugins.bundle.js"></script>
  <script src="assets/js/scripts.bundle.js"></script> -->

<script src="{{ asset('backend/admin/js/plugins.bundle.js') }}"></script>
<script src="{{ asset('backend/admin/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('backend/admin/js/datatables.bundle.js') }}"></script>
<script src="{{ asset('backend/admin/js/vis-timeline.bundle.js') }}"></script>
<script src="{{ asset('backend/admin/js/save-product.js') }}"></script>
<script src="{{ asset('backend/admin/js/formrepeater.bundle.js') }}"></script>
<script src="{{ asset('backend/admin/js/summernote-bs4.min.js') }}"></script>



<script>
$(window).on('click', function() {
    $('.popup-render-items').modal('hide');
});

function popup_open_close() {
    $(".drawer-overlay-back").toggleClass('drawer-overlay')
    $(".popup-render-items").toggleClass("drawer-on2")
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



// let more_filt = document.getElementById("aks");
//     more_filt.addEventListener("click",(e)=>{
//         console.log(e);
//         document.getElementById("akg").style.display="block"
//     })

//    window.onclick = function(){
//     document.getElementById("akg").style.display="none"
//    }

document.getElementById("sant").addEventListener("click", (e) => {
    document.getElementById("pickd").classList.toggle("thunder");
})

document.getElementById("sanj").addEventListener("click", (e) => {
    document.getElementById("pickfid").classList.toggle("thunder1");
})

var budgetSlider = document.querySelector("#fontSizeSlider");
var budgetValue = document.querySelector("#fontSize");

noUiSlider.create(budgetSlider, {
    start: [5],
    connect: true,
    range: {
        "min": 1,
        "max": 500
    }
});

budgetSlider.noUiSlider.on("update", function(values, handle) {
    budgetValue.innerHTML = Math.round(values[handle]);
    if (handle) {
        budgetValue.innerHTML = Math.round(values[handle]);
    }
});

var budgetSlider = document.querySelector("#fontSizeSlider1");
var budgetValue = document.querySelector("#fontSize1");

noUiSlider.create(budgetSlider, {
    start: [5],
    connect: true,
    range: {
        "min": 1,
        "max": 500
    }
});

budgetSlider.noUiSlider.on("update", function(values, handle) {
    budgetValue.innerHTML = Math.round(values[handle]);
    if (handle) {
        budgetValue.innerHTML = Math.round(values[handle]);
    }
});
</script>

<!-- =============percentage functionality=============== -->
<script>
function addPercentageSymbol() {
    var input = document.getElementById("percentageInput");
    var value = input.value.trim();
    value = value.replace(/%/g, "");
    var valueWithPercentage = value + "%";
    input.value = valueWithPercentage;
}

var myDropzone = new Dropzone("#kt_ecommerce_add_product_media", {
    url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 10,
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    accept: function(file, done) {
        if (file.name == "wow.jpg") {
            done("Naha, you don't.");
        } else {
            done();
        }
    }
});
</script>

<script>
const handleUp = (id) => {
    // console.log(id);
    // console.log('up');
    let ele = document.getElementById(id);
    let currentValue = ele.value;
    // console.log(currentValue);
    currentValue = Number(currentValue.replace('%', ''));
    if (currentValue < 100) {
        currentValue += 1;
    }
    ele.value = currentValue + "%";
};

const handleDown = (id) => {
    // console.log(id);
    console.log('down');
    let ele = document.getElementById(id);
    let currentValue = ele.value;
    // console.log(currentValue);
    currentValue = Number(currentValue.replace('%', ''));
    if (currentValue > 0) {
        currentValue -= 1;
    }
    ele.value = currentValue + "%";
}

document.querySelectorAll('input[type=color]').forEach(function(picker) {

    var targetLabel = document.querySelector('label[for="' + picker.id + '"]'),
        codeArea = document.createElement('span');

    codeArea.innerHTML = picker.value;
    targetLabel.parentNode.prepend(codeArea);

    picker.addEventListener('change', function() {
        codeArea.innerHTML = picker.value;
        targetLabel.parentNode.prepend(codeArea);
    });
});
</script>

@endsection