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

            <div class="og22">
                <div class="og">
                    <div class="add-textarea w-full">
                        <div class="spoint">
                            <div class="tpoint">
                                <svg class="cursor-pointer" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-original-title="Edit" width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.2069 3.23063L9.41438 0.437505C9.32152 0.344622 9.21127 0.270943 9.08993 0.220674C8.96859 0.170405 8.83853 0.144531 8.70719 0.144531C8.57585 0.144531 8.4458 0.170405 8.32446 0.220674C8.20312 0.270943 8.09287 0.344622 8 0.437505L0.29313 8.14501C0.199867 8.23753 0.125926 8.34766 0.0756045 8.46902C0.025283 8.59037 -0.000414649 8.72051 5.05934e-06 8.85188V11.645C5.05934e-06 11.9102 0.105362 12.1646 0.292898 12.3521C0.480435 12.5396 0.734789 12.645 1.00001 12.645H3.79313C3.9245 12.6454 4.05464 12.6197 4.17599 12.5694C4.29735 12.5191 4.40748 12.4451 4.50001 12.3519L12.2069 4.64501C12.2998 4.55214 12.3734 4.44189 12.4237 4.32055C12.474 4.19921 12.4999 4.06916 12.4999 3.93782C12.4999 3.80648 12.474 3.67642 12.4237 3.55508C12.3734 3.43374 12.2998 3.32349 12.2069 3.23063ZM1.20688 8.64501L6.85376 2.99813L7.89626 4.04125L2.25001 9.6875L1.20688 8.64501ZM1.00001 9.85188L2.79313 11.645H1.00001V9.85188ZM4.00001 11.4381L2.95688 10.395L8.60375 4.74813L9.64625 5.79125L4.00001 11.4381Z"
                                        fill="white" />
                                </svg>

                                <svg class="cursor-pointer" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-original-title="Delete" width="12" height="13" viewBox="0 0 12 13"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.5 2H9V1.5C9 1.10218 8.84196 0.720644 8.56066 0.43934C8.27936 0.158035 7.89782 0 7.5 0H4.5C4.10218 0 3.72064 0.158035 3.43934 0.43934C3.15804 0.720644 3 1.10218 3 1.5V2H0.5C0.367392 2 0.240215 2.05268 0.146447 2.14645C0.0526785 2.24021 0 2.36739 0 2.5C0 2.63261 0.0526785 2.75979 0.146447 2.85355C0.240215 2.94732 0.367392 3 0.5 3H1V12C1 12.2652 1.10536 12.5196 1.29289 12.7071C1.48043 12.8946 1.73478 13 2 13H10C10.2652 13 10.5196 12.8946 10.7071 12.7071C10.8946 12.5196 11 12.2652 11 12V3H11.5C11.6326 3 11.7598 2.94732 11.8536 2.85355C11.9473 2.75979 12 2.63261 12 2.5C12 2.36739 11.9473 2.24021 11.8536 2.14645C11.7598 2.05268 11.6326 2 11.5 2ZM5 9.5C5 9.63261 4.94732 9.75979 4.85355 9.85355C4.75979 9.94732 4.63261 10 4.5 10C4.36739 10 4.24021 9.94732 4.14645 9.85355C4.05268 9.75979 4 9.63261 4 9.5V5.5C4 5.36739 4.05268 5.24021 4.14645 5.14645C4.24021 5.05268 4.36739 5 4.5 5C4.63261 5 4.75979 5.05268 4.85355 5.14645C4.94732 5.24021 5 5.36739 5 5.5V9.5ZM8 9.5C8 9.63261 7.94732 9.75979 7.85355 9.85355C7.75979 9.94732 7.63261 10 7.5 10C7.36739 10 7.24021 9.94732 7.14645 9.85355C7.05268 9.75979 7 9.63261 7 9.5V5.5C7 5.36739 7.05268 5.24021 7.14645 5.14645C7.24021 5.05268 7.36739 5 7.5 5C7.63261 5 7.75979 5.05268 7.85355 5.14645C7.94732 5.24021 8 5.36739 8 5.5V9.5ZM8 2H4V1.5C4 1.36739 4.05268 1.24021 4.14645 1.14645C4.24021 1.05268 4.36739 1 4.5 1H7.5C7.63261 1 7.75979 1.05268 7.85355 1.14645C7.94732 1.24021 8 1.36739 8 1.5V2Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                        <textarea class="form-control" placeholder="Add Your Heading Text Here" name="" id="" cols="30"
                            rows="10"></textarea>
                    </div>
                    <div class="area-control w-100">
                        <div class="area-wise"></div>
                    </div>
                    <div class="dragsa">
                        <div class="dropzone dropzone1 dst dz-clickable position-relative"
                            id="kt_ecommerce_add_product_media">
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
                </div>
            </div>

            <!-- ==============rightSidebar============ -->
            <div class="page32">
                <div class="d-flex flex-row">
                    <!--begin::Start sidebar-->
                    <div class="d-lg-flex sysn flex-column flex-lg-row-auto w-lg-325px" data-kt-drawer="true"
                        data-kt-drawer-name="start-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                        data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '250px': '300px'}"
                        data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_social_start_sidebar_toggle">
                        <!--begin::List widget 10-->
                        <div class="card card-flush">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Nav-->
                                <ul class="nav nava-pilla nav-pills nav-pills-custom row position-relative mx-0 mb-9">
                                    <!--begin::Item-->
                                    <li class="nav-item col-4 mx-0 p-0">
                                        <!--begin::Link-->
                                        <a class="nav-link  active d-flex justify-content-center w-100 border-0 h-100"
                                            data-bs-toggle="pill" href="#kt_list_widget_10_tab_1">
                                            <!--begin::Subtitle-->
                                            <div class="santi">
                                                <span class="nav-text nav-text1 text-gray-800 fw-bold fs-6 mb-3"><svg
                                                        width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.15766 5.1352L9.88782 5.86536L2.69734 13.0558H1.96718V12.3257L9.15766 5.1352ZM12.0148 0.357422C11.8164 0.357422 11.61 0.436787 11.4592 0.587581L10.0069 2.03996L12.9831 5.01615L14.4354 3.56377C14.745 3.25425 14.745 2.75425 14.4354 2.44472L12.5783 0.587581C12.4196 0.42885 12.2212 0.357422 12.0148 0.357422ZM9.15766 2.88917L0.379883 11.6669V14.6431H3.35607L12.1339 5.86536L9.15766 2.88917Z"
                                                            fill="#3595F6" />
                                                    </svg>
                                                    Content</span>
                                            </div>
                                            <!--end::Subtitle-->
                                            <!--begin::Bullet-->
                                            <span
                                                class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item col-4 mx-0 px-0">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100"
                                            data-bs-toggle="pill" href="#kt_list_widget_10_tab_2">
                                            <!--begin::Subtitle-->
                                            <div class="santi1">
                                                <span class="nav-text nav-text1 text-gray-800 fw-bold fs-6 mb-3"><svg
                                                        width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M3.52279 9.16667C3.88945 9.16667 4.18945 9.46667 4.18945 9.83333C4.18945 10.5667 3.58945 11.1667 2.85612 11.1667C2.74279 11.1667 2.63612 11.1533 2.52279 11.1333C2.72945 10.7667 2.85612 10.3267 2.85612 9.83333C2.85612 9.46667 3.15612 9.16667 3.52279 9.16667ZM11.3028 0.5C11.1295 0.5 10.9628 0.566667 10.8295 0.693333L4.85612 6.66667L6.68945 8.5L12.6628 2.52667C12.9228 2.26667 12.9228 1.84667 12.6628 1.58667L11.7695 0.693333C11.6361 0.56 11.4695 0.5 11.3028 0.5ZM3.52279 7.83333C2.41612 7.83333 1.52279 8.72667 1.52279 9.83333C1.52279 10.7067 0.749453 11.1667 0.189453 11.1667C0.802786 11.98 1.84945 12.5 2.85612 12.5C4.32945 12.5 5.52279 11.3067 5.52279 9.83333C5.52279 8.72667 4.62945 7.83333 3.52279 7.83333Z"
                                                            fill="#7E8299" />
                                                    </svg> Style</span>
                                            </div>
                                            <!--end::Subtitle-->
                                            <!--begin::Bullet-->
                                            <span
                                                class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Bullet-->
                                    <span
                                        class="position-absolute z-index-1 bottom-0 w-100 h-4px bg-light rounded"></span>
                                    <!--end::Bullet-->
                                </ul>
                                <!--end::Nav-->
                                <!--begin::Tab Content-->
                                <div class="tab-content">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane tab-pane1 fade show active" id="kt_list_widget_10_tab_1">
                                        <div class="mb-5">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control form-control1"
                                                placeholder="Add your heading text here" />
                                        </div>

                                        <div class="mb-5">
                                            <label for="title">Link</label>
                                            <input type="text" class="form-control form-control1"
                                                placeholder="Paste URL or type" />
                                        </div>

                                        <div class=" mt-6">
                                            <label class="form-label fs-6 fw-semibold">Header</label>
                                            <select class="form-select  form-control3 form-select-solid fw-bold"
                                                data-kt-select2="true" data-placeholder="Select option"
                                                data-allow-clear="true" data-kt-user-table-filter="role"
                                                data-hide-search="true">
                                                <option></option>
                                                <option value="Administrator">First header</option>
                                                <option value="Analyst">Second header</option>
                                                <option value="Developer">Third header</option>
                                                <option value="Support">Fourth header</option>
                                                <option value="Trial">Fifth header</option>
                                            </select>
                                        </div>

                                        <div>
                                            <hr class="hr-setca">
                                        </div>

                                        <div class="mt-4">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="B">
                                                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.75 8.9875C11.9625 8.15 12.8125 6.775 12.8125 5.5C12.8125 2.675 10.625 0.5 7.8125 0.5H0V18H8.8C11.4125 18 13.4375 15.875 13.4375 13.2625C13.4375 11.3625 12.3625 9.7375 10.75 8.9875ZM3.75 3.625H7.5C8.5375 3.625 9.375 4.4625 9.375 5.5C9.375 6.5375 8.5375 7.375 7.5 7.375H3.75V3.625ZM8.125 14.875H3.75V11.125H8.125C9.1625 11.125 10 11.9625 10 13C10 14.0375 9.1625 14.875 8.125 14.875Z"
                                                            fill="#3F4254" />
                                                    </svg>
                                                </div>
                                                <div class="I">
                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.75 0.5V4.25H8.5125L4.2375 14.25H0.75V18H10.75V14.25H7.9875L12.2625 4.25H15.75V0.5H5.75Z"
                                                            fill="#3F4254" />
                                                    </svg>
                                                </div>
                                                <div class="U">
                                                    <svg width="38" height="41" viewBox="0 0 38 41" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.9688 12.7578H18.8047V13.1191H18.4629C17.9486 13.1191 17.5938 13.1745 17.3984 13.2852C17.2096 13.3893 17.0729 13.5358 16.9883 13.7246C16.9102 13.9134 16.8711 14.3854 16.8711 15.1406V21.625C16.8711 22.8099 16.959 23.5944 17.1348 23.9785C17.3171 24.3626 17.6133 24.6816 18.0234 24.9355C18.4336 25.1895 18.9512 25.3164 19.5762 25.3164C20.2923 25.3164 20.901 25.1569 21.4023 24.8379C21.9102 24.5124 22.2878 24.0664 22.5352 23.5C22.7891 22.9336 22.916 21.9473 22.916 20.541V15.1406C22.916 14.5482 22.8542 14.125 22.7305 13.8711C22.6068 13.6172 22.4505 13.4414 22.2617 13.3438C21.9688 13.194 21.5553 13.1191 21.0215 13.1191V12.7578H25.6016V13.1191H25.3281C24.957 13.1191 24.6478 13.194 24.4004 13.3438C24.153 13.4935 23.974 13.7181 23.8633 14.0176C23.7786 14.2259 23.7363 14.6003 23.7363 15.1406V20.1699C23.7363 21.7259 23.6322 22.849 23.4238 23.5391C23.222 24.2292 22.724 24.8639 21.9297 25.4434C21.1354 26.0228 20.0514 26.3125 18.6777 26.3125C17.5319 26.3125 16.6465 26.1595 16.0215 25.8535C15.1686 25.4368 14.5664 24.903 14.2148 24.252C13.8633 23.6009 13.6875 22.7253 13.6875 21.625V15.1406C13.6875 14.3789 13.6452 13.9069 13.5605 13.7246C13.4759 13.5358 13.3294 13.3861 13.1211 13.2754C12.9128 13.1647 12.5286 13.1126 11.9688 13.1191V12.7578Z"
                                                            fill="#3F4254" />
                                                        <path d="M11.5 29.125H25.9434V31.0293H11.5V29.125Z"
                                                            fill="#3F4254" />
                                                    </svg>

                                                </div>

                                                <div class="quote">
                                                    <svg width="18" height="13" viewBox="0 0 18 13" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.25 12.75H5L7.5 7.75V0.25H0V7.75H3.75L1.25 12.75ZM11.25 12.75H15L17.5 7.75V0.25H10V7.75H13.75L11.25 12.75Z"
                                                            fill="#3F4254" />
                                                    </svg>
                                                </div>
                                                <div class="align">
                                                    <svg width="24" height="19" viewBox="0 0 24 19" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.0625 7.625C1.025 7.625 0.1875 8.4625 0.1875 9.5C0.1875 10.5375 1.025 11.375 2.0625 11.375C3.1 11.375 3.9375 10.5375 3.9375 9.5C3.9375 8.4625 3.1 7.625 2.0625 7.625ZM2.0625 0.125C1.025 0.125 0.1875 0.9625 0.1875 2C0.1875 3.0375 1.025 3.875 2.0625 3.875C3.1 3.875 3.9375 3.0375 3.9375 2C3.9375 0.9625 3.1 0.125 2.0625 0.125ZM2.0625 15.125C1.025 15.125 0.1875 15.975 0.1875 17C0.1875 18.025 1.0375 18.875 2.0625 18.875C3.0875 18.875 3.9375 18.025 3.9375 17C3.9375 15.975 3.1 15.125 2.0625 15.125ZM5.8125 18.25H23.3125V15.75H5.8125V18.25ZM5.8125 10.75H23.3125V8.25H5.8125V10.75ZM5.8125 0.75V3.25H23.3125V0.75H5.8125Z"
                                                            fill="#3F4254" />
                                                    </svg>
                                                </div>

                                                <div class="align1">
                                                    <svg width="25" height="21" viewBox="0 0 25 21" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.5 16.75H3V17.375H1.75V18.625H3V19.25H0.5V20.5H4.25V15.5H0.5V16.75ZM1.75 5.5H3V0.5H0.5V1.75H1.75V5.5ZM0.5 9.25H2.75L0.5 11.875V13H4.25V11.75H2L4.25 9.125V8H0.5V9.25ZM6.75 1.75V4.25H24.25V1.75H6.75ZM6.75 19.25H24.25V16.75H6.75V19.25ZM6.75 11.75H24.25V9.25H6.75V11.75Z"
                                                            fill="#3F4254" />
                                                    </svg>

                                                </div>

                                            </div>
                                        </div>

                                        <div>
                                            <hr class="hr-setca">
                                        </div>

                                        <div class="w-100 mt-4">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2 saya45">
                                                Font Size
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Slider-->
                                            <div class="d-flex align-items-center text-center">
                                                <div id="fontSizeSlider" class="noUi-sm w-100"></div>

                                                <div class="d-flex sans justify-content-center">
                                                    <span class="fw-bold fs-3x"
                                                        id="kt_modal_create_campaign_budget_label"></span>
                                                    <span id="fontSize" class="fw-bold fs-3x sara8">.00</span>
                                                    <span class="fw-bold fs-4  me-2 sara8">px</span>
                                                </div>
                                            </div>

                                            <label class="fs-6 fw-semibold mb-2 saya45">
                                                Character Spacing
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Slider-->
                                            <div class="d-flex align-items-center text-center">
                                                <div id="fontSizeSlider1" class="noUi-sm w-100"></div>

                                                <div class="d-flex sans justify-content-center">
                                                    <span class="fw-bold fs-3x"
                                                        id="kt_modal_create_campaign_budget_label1"></span>
                                                    <span id="fontSize1" class="fw-bold fs-3x sara8">.00</span>
                                                    <span class="fw-bold fs-4  me-2 sara8">px</span>
                                                </div>
                                            </div>
                                            <!--end::Slider-->
                                        </div>


                                        <div class="mt-6">
                                            <label class="form-label form-label1 fs-6 fw-semibold">Text Color</label>
                                            <div class=" d-flex">
                                              <div class="colorPicker1">
                                                <label for="txtColorCode1" class="colorCode">
                                                  <input type="color" name="txtColorCode1" id="txtColorCode1" value="#252626">
                                                </label>
                                              </div>
                                              <div class=" d-flex align-items-start ">
                                                <input type="text" id="percentageInput" class="percentageInput"
                                                  oninput="addPercentageSymbol()" value="0%">
            
                                                <div class="sanst position-relative">
                                                  <div>
                                                    <svg onclick="handleUp('percentageInput', '%')" class="cursor-pointer"
                                                      width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                      xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                        d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                        fill="#7E8299"></path>
                                                    </svg>
                                                  </div>
                                                  <hr class="sitry">
                                                  <div>
                                                    <svg onclick="handleDown('percentageInput', '%')" class="sy cursor-pointer"
                                                      width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                      xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                        d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                        fill="#7E8299"></path>
                                                    </svg>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="mt-6">
                                            <label class="form-label form-label1 fs-6 fw-semibold">Background
                                                Color</label>
                                            <div class=" d-flex">
                                                <div class="colorPicker1">
                                                    <label for="txtColorCode2" class="colorCode">
                                                      <input type="color" name="txtColorCode2" id="txtColorCode2"
                                                      value="#FFFFFF">
                                                    </label>
                                                </div>
                                                <div class=" d-flex align-items-start ">
                                                    <input type="text" id="percentageInput1" class="percentageInput"
                                                        oninput="addPercentageSymbol()" value="0%">
                                                    <div class="sanst position-relative">
                                                        <div>
                                                            <svg onclick="handleUp('percentageInput1', '%')" width="21"
                                                                class="cursor-pointer" height="20" viewBox="0 0 21 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                    fill="#7E8299"></path>
                                                            </svg>
                                                        </div>
                                                        <hr class="sitry">
                                                        <div>
                                                            <svg onclick="handleDown('percentageInput1', '%')"
                                                                class="sy cursor-pointer" width="21" height="20"
                                                                viewBox="0 0 21 20" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                    fill="#7E8299"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kt_list_widget_10_tab_2">
                                    <!--begin::Accordion-->
                                    <!--begin::Section-->
                                    <div class="m-0">
                                        <!--begin::Heading-->
                                        <div onclick="side_toggle('kt_job_4_4')" class="d-flex wrapta align-items-center collapsible py-3 toggle collapsed mb-0"
                                            data-bs-toggle="collapse" data-bs-target="#kt_job_4_4">
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <svg class="ki-duotone ki-up toggle-on" width="12" height="6"
                                                    viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.3541 0.85375L6.35414 5.85375C6.30771 5.90024 6.25256 5.93712 6.19186 5.96228C6.13117 5.98744 6.0661 6.00039 6.00039 6.00039C5.93469 6.00039 5.86962 5.98744 5.80892 5.96228C5.74822 5.93712 5.69308 5.90024 5.64664 5.85375L0.646644 0.85375C0.576638 0.783823 0.528954 0.694696 0.509629 0.597654C0.490304 0.500611 0.500206 0.400016 0.538082 0.308605C0.575959 0.217193 0.640106 0.139075 0.722403 0.08414C0.8047 0.0292046 0.901446 -7.77138e-05 1.00039 1.549e-07H11.0004C11.0993 -7.77138e-05 11.1961 0.0292046 11.2784 0.08414C11.3607 0.139075 11.4248 0.217193 11.4627 0.308605C11.5006 0.400016 11.5105 0.500611 11.4912 0.597654C11.4718 0.694696 11.4241 0.783823 11.3541 0.85375Z"
                                                        fill="#7E8299" />
                                                </svg>

                                                <svg class="ki-duotone ki-down toggle-off fs-1" width="12" height="6"
                                                    viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.3541 0.85375L6.35414 5.85375C6.30771 5.90024 6.25256 5.93712 6.19186 5.96228C6.13117 5.98744 6.0661 6.00039 6.00039 6.00039C5.93469 6.00039 5.86962 5.98744 5.80892 5.96228C5.74822 5.93712 5.69308 5.90024 5.64664 5.85375L0.646644 0.85375C0.576638 0.783823 0.528954 0.694696 0.509629 0.597654C0.490304 0.500611 0.500206 0.400016 0.538082 0.308605C0.575959 0.217193 0.640106 0.139075 0.722403 0.08414C0.8047 0.0292046 0.901446 -7.77138e-05 1.00039 1.549e-07H11.0004C11.0993 -7.77138e-05 11.1961 0.0292046 11.2784 0.08414C11.3607 0.139075 11.4248 0.217193 11.4627 0.308605C11.5006 0.400016 11.5105 0.500611 11.4912 0.597654C11.4718 0.694696 11.4241 0.783823 11.3541 0.85375Z"
                                                        fill="#7E8299" />
                                                </svg>
                                            </div>

                                            <!--begin::Title-->
                                            <h4 class="text-gray-700 tesla fw-bold cursor-pointer mb-0">Layout</h4>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->

                                        <div id="kt_job_4_4" class="collapse none fs-6 ms-1">
                                            <div>
                                                <div class="alignments44 mt-6">
                                                    <p>Alignment</p>
                                                    <div class="aligments45 d-flex">
                                                        <div class="alist44 alist45">
                                                            <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M0.6875 1C0.6875 0.75136 0.786272 0.512903 0.962087 0.337087C1.1379 0.161272 1.37636 0.0625 1.625 0.0625H15.375C15.6236 0.0625 15.8621 0.161272 16.0379 0.337087C16.2137 0.512903 16.3125 0.75136 16.3125 1C16.3125 1.24864 16.2137 1.4871 16.0379 1.66291C15.8621 1.83873 15.6236 1.9375 15.375 1.9375H1.625C1.37636 1.9375 1.1379 1.83873 0.962087 1.66291C0.786272 1.4871 0.6875 1.24864 0.6875 1ZM3.5 3.1875C3.25136 3.1875 3.0129 3.28627 2.83709 3.46209C2.66127 3.6379 2.5625 3.87636 2.5625 4.125C2.5625 4.37364 2.66127 4.6121 2.83709 4.78791C3.0129 4.96373 3.25136 5.0625 3.5 5.0625H13.5C13.7486 5.0625 13.9871 4.96373 14.1629 4.78791C14.3387 4.6121 14.4375 4.37364 14.4375 4.125C14.4375 3.87636 14.3387 3.6379 14.1629 3.46209C13.9871 3.28627 13.7486 3.1875 13.5 3.1875H3.5ZM15.375 6.3125H1.625C1.37636 6.3125 1.1379 6.41127 0.962087 6.58709C0.786272 6.7629 0.6875 7.00136 0.6875 7.25C0.6875 7.49864 0.786272 7.7371 0.962087 7.91291C1.1379 8.08873 1.37636 8.1875 1.625 8.1875H15.375C15.6236 8.1875 15.8621 8.08873 16.0379 7.91291C16.2137 7.7371 16.3125 7.49864 16.3125 7.25C16.3125 7.00136 16.2137 6.7629 16.0379 6.58709C15.8621 6.41127 15.6236 6.3125 15.375 6.3125ZM13.5 9.4375H3.5C3.25136 9.4375 3.0129 9.53627 2.83709 9.71209C2.66127 9.8879 2.5625 10.1264 2.5625 10.375C2.5625 10.6236 2.66127 10.8621 2.83709 11.0379C3.0129 11.2137 3.25136 11.3125 3.5 11.3125H13.5C13.7486 11.3125 13.9871 11.2137 14.1629 11.0379C14.3387 10.8621 14.4375 10.6236 14.4375 10.375C14.4375 10.1264 14.3387 9.8879 14.1629 9.71209C13.9871 9.53627 13.7486 9.4375 13.5 9.4375Z"
                                                                    fill="#3F4254" />
                                                            </svg>

                                                        </div>
                                                        <div class="alist44">
                                                            <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M0.6875 1C0.6875 0.75136 0.786272 0.512903 0.962087 0.337087C1.1379 0.161272 1.37636 0.0625 1.625 0.0625H15.375C15.6236 0.0625 15.8621 0.161272 16.0379 0.337087C16.2137 0.512903 16.3125 0.75136 16.3125 1C16.3125 1.24864 16.2137 1.4871 16.0379 1.66291C15.8621 1.83873 15.6236 1.9375 15.375 1.9375H1.625C1.37636 1.9375 1.1379 1.83873 0.962087 1.66291C0.786272 1.4871 0.6875 1.24864 0.6875 1ZM15.375 3.1875H1.625C1.37636 3.1875 1.1379 3.28627 0.962087 3.46209C0.786272 3.6379 0.6875 3.87636 0.6875 4.125C0.6875 4.37364 0.786272 4.6121 0.962087 4.78791C1.1379 4.96373 1.37636 5.0625 1.625 5.0625H15.375C15.6236 5.0625 15.8621 4.96373 16.0379 4.78791C16.2137 4.6121 16.3125 4.37364 16.3125 4.125C16.3125 3.87636 16.2137 3.6379 16.0379 3.46209C15.8621 3.28627 15.6236 3.1875 15.375 3.1875ZM15.375 6.3125H1.625C1.37636 6.3125 1.1379 6.41127 0.962087 6.58709C0.786272 6.7629 0.6875 7.00136 0.6875 7.25C0.6875 7.49864 0.786272 7.7371 0.962087 7.91291C1.1379 8.08873 1.37636 8.1875 1.625 8.1875H15.375C15.6236 8.1875 15.8621 8.08873 16.0379 7.91291C16.2137 7.7371 16.3125 7.49864 16.3125 7.25C16.3125 7.00136 16.2137 6.7629 16.0379 6.58709C15.8621 6.41127 15.6236 6.3125 15.375 6.3125ZM15.375 9.4375H1.625C1.37636 9.4375 1.1379 9.53627 0.962087 9.71209C0.786272 9.8879 0.6875 10.1264 0.6875 10.375C0.6875 10.6236 0.786272 10.8621 0.962087 11.0379C1.1379 11.2137 1.37636 11.3125 1.625 11.3125H15.375C15.6236 11.3125 15.8621 11.2137 16.0379 11.0379C16.2137 10.8621 16.3125 10.6236 16.3125 10.375C16.3125 10.1264 16.2137 9.8879 16.0379 9.71209C15.8621 9.53627 15.6236 9.4375 15.375 9.4375Z"
                                                                    fill="#3F4254" />
                                                            </svg>

                                                        </div>
                                                        <div class="alist44">
                                                            <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M0.6875 1C0.6875 0.75136 0.786272 0.512903 0.962087 0.337087C1.1379 0.161272 1.37636 0.0625 1.625 0.0625H15.375C15.6236 0.0625 15.8621 0.161272 16.0379 0.337087C16.2137 0.512903 16.3125 0.75136 16.3125 1C16.3125 1.24864 16.2137 1.4871 16.0379 1.66291C15.8621 1.83873 15.6236 1.9375 15.375 1.9375H1.625C1.37636 1.9375 1.1379 1.83873 0.962087 1.66291C0.786272 1.4871 0.6875 1.24864 0.6875 1ZM1.625 5.0625H11.625C11.8736 5.0625 12.1121 4.96373 12.2879 4.78791C12.4637 4.6121 12.5625 4.37364 12.5625 4.125C12.5625 3.87636 12.4637 3.6379 12.2879 3.46209C12.1121 3.28627 11.8736 3.1875 11.625 3.1875H1.625C1.37636 3.1875 1.1379 3.28627 0.962087 3.46209C0.786272 3.6379 0.6875 3.87636 0.6875 4.125C0.6875 4.37364 0.786272 4.6121 0.962087 4.78791C1.1379 4.96373 1.37636 5.0625 1.625 5.0625ZM15.375 6.3125H1.625C1.37636 6.3125 1.1379 6.41127 0.962087 6.58709C0.786272 6.7629 0.6875 7.00136 0.6875 7.25C0.6875 7.49864 0.786272 7.7371 0.962087 7.91291C1.1379 8.08873 1.37636 8.1875 1.625 8.1875H15.375C15.6236 8.1875 15.8621 8.08873 16.0379 7.91291C16.2137 7.7371 16.3125 7.49864 16.3125 7.25C16.3125 7.00136 16.2137 6.7629 16.0379 6.58709C15.8621 6.41127 15.6236 6.3125 15.375 6.3125ZM11.625 9.4375H1.625C1.37636 9.4375 1.1379 9.53627 0.962087 9.71209C0.786272 9.8879 0.6875 10.1264 0.6875 10.375C0.6875 10.6236 0.786272 10.8621 0.962087 11.0379C1.1379 11.2137 1.37636 11.3125 1.625 11.3125H11.625C11.8736 11.3125 12.1121 11.2137 12.2879 11.0379C12.4637 10.8621 12.5625 10.6236 12.5625 10.375C12.5625 10.1264 12.4637 9.8879 12.2879 9.71209C12.1121 9.53627 11.8736 9.4375 11.625 9.4375Z"
                                                                    fill="#3F4254" />
                                                            </svg>

                                                        </div>
                                                        <div class="alist44 alist46">
                                                            <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M0.6875 1C0.6875 0.75136 0.786272 0.512903 0.962087 0.337087C1.1379 0.161272 1.37636 0.0625 1.625 0.0625H15.375C15.6236 0.0625 15.8621 0.161272 16.0379 0.337087C16.2137 0.512903 16.3125 0.75136 16.3125 1C16.3125 1.24864 16.2137 1.4871 16.0379 1.66291C15.8621 1.83873 15.6236 1.9375 15.375 1.9375H1.625C1.37636 1.9375 1.1379 1.83873 0.962087 1.66291C0.786272 1.4871 0.6875 1.24864 0.6875 1ZM15.375 3.1875H5.375C5.12636 3.1875 4.8879 3.28627 4.71209 3.46209C4.53627 3.6379 4.4375 3.87636 4.4375 4.125C4.4375 4.37364 4.53627 4.6121 4.71209 4.78791C4.8879 4.96373 5.12636 5.0625 5.375 5.0625H15.375C15.6236 5.0625 15.8621 4.96373 16.0379 4.78791C16.2137 4.6121 16.3125 4.37364 16.3125 4.125C16.3125 3.87636 16.2137 3.6379 16.0379 3.46209C15.8621 3.28627 15.6236 3.1875 15.375 3.1875ZM15.375 6.3125H1.625C1.37636 6.3125 1.1379 6.41127 0.962087 6.58709C0.786272 6.7629 0.6875 7.00136 0.6875 7.25C0.6875 7.49864 0.786272 7.7371 0.962087 7.91291C1.1379 8.08873 1.37636 8.1875 1.625 8.1875H15.375C15.6236 8.1875 15.8621 8.08873 16.0379 7.91291C16.2137 7.7371 16.3125 7.49864 16.3125 7.25C16.3125 7.00136 16.2137 6.7629 16.0379 6.58709C15.8621 6.41127 15.6236 6.3125 15.375 6.3125ZM15.375 9.4375H5.375C5.12636 9.4375 4.8879 9.53627 4.71209 9.71209C4.53627 9.8879 4.4375 10.1264 4.4375 10.375C4.4375 10.6236 4.53627 10.8621 4.71209 11.0379C4.8879 11.2137 5.12636 11.3125 5.375 11.3125H15.375C15.6236 11.3125 15.8621 11.2137 16.0379 11.0379C16.2137 10.8621 16.3125 10.6236 16.3125 10.375C16.3125 10.1264 16.2137 9.8879 16.0379 9.71209C15.8621 9.53627 15.6236 9.4375 15.375 9.4375Z"
                                                                    fill="#3F4254" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="padding-things mt-6">
                                                    <p class="pad66">Padding</p>
                                                    <div class="d-flex">
                                                        <div class="top44">
                                                            <p>Top</p>
                                                            <div class="d-flex align-items-start">
                                                                <input class="percentageInput1" type="text"
                                                                    id="pxInput1" oninput="addPercentageSymbol()"
                                                                    value="0px">
                                                                <div class="sanst1 position-relative">
                                                                    <div>
                                                                        <svg onclick="handleUp('pxInput1', 'px')"
                                                                            width="21" height="20" viewBox="0 0 21 20"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <hr class="sitry">
                                                                    <div>
                                                                        <svg onclick="handleDown('pxInput1', 'px')"
                                                                            class="sy" width="21" height="20"
                                                                            viewBox="0 0 21 20" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="top44 top46">
                                                            <p>Right</p>
                                                            <div class="d-flex align-items-start">
                                                                <input class="percentageInput1" type="text"
                                                                    id="pxInput2" oninput="addPercentageSymbol()"
                                                                    value="0px">
                                                                <div class=" sanst1 position-relative">
                                                                    <div>
                                                                        <svg onclick="handleUp('pxInput2', 'px')"
                                                                            width="21" height="20" viewBox="0 0 21 20"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <hr class="sitry">
                                                                    <div>
                                                                        <svg onclick="handleDown('pxInput2', 'px')"
                                                                            class="sy" width="21" height="20"
                                                                            viewBox="0 0 21 20" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-5">
                                                        <div class="top44">
                                                            <p>Bottom</p>
                                                            <div class="d-flex align-items-start">
                                                                <input class="percentageInput1" type="text"
                                                                    id="pxInput3" oninput="addPercentageSymbol()"
                                                                    value="0px">
                                                                <div class="sanst1 position-relative">
                                                                    <div>
                                                                        <svg onclick="handleUp('pxInput3', 'px')"
                                                                            width="21" height="20" viewBox="0 0 21 20"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <hr class="sitry">
                                                                    <div>
                                                                        <svg onclick="handleDown('pxInput3', 'px')"
                                                                            class="sy" width="21" height="20"
                                                                            viewBox="0 0 21 20" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="top44 top46">
                                                            <p>Left</p>
                                                            <div class="d-flex align-items-start">
                                                                <input class="percentageInput1" type="text"
                                                                    id="pxInput4" oninput="addPercentageSymbol()"
                                                                    value="0px">
                                                                <div class="sanst1 position-relative">
                                                                    <div>
                                                                        <svg onclick="handleUp('pxInput4', 'px')"
                                                                            width="21" height="20" viewBox="0 0 21 20"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <hr class="sitry">
                                                                    <div>
                                                                        <svg onclick="handleDown('pxInput4', 'px')"
                                                                            class="sy" width="21" height="20"
                                                                            viewBox="0 0 21 20" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center mt-6">
                                                        <input class="chet" type="checkbox" name="" id="">
                                                        <span class="check-inp">Apply to all sides</span>
                                                    </div>
                                                </div>

                                                <div class="padding-things mt-6">
                                                    <p class="pad66">Margin</p>
                                                    <div class="d-flex">
                                                        <div class="top44">
                                                            <p>Top</p>
                                                            <div class="d-flex align-items-start">
                                                                <input class="percentageInput1" type="text"
                                                                    id="pxInput5" oninput="addPercentageSymbol()"
                                                                    value="0px">
                                                                <div class="sanst1 position-relative">
                                                                    <div>
                                                                        <svg onclick="handleUp('pxInput5', 'px')"
                                                                            width="21" height="20" viewBox="0 0 21 20"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <hr class="sitry">
                                                                    <div>
                                                                        <svg onclick="handleDown('pxInput5', 'px')"
                                                                            class="sy" width="21" height="20"
                                                                            viewBox="0 0 21 20" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="top44 top46">
                                                            <p>Right</p>
                                                            <div class="d-flex align-items-start">
                                                                <input class="percentageInput1" type="text"
                                                                    id="pxInput6" oninput="addPercentageSymbol()"
                                                                    value="0px">
                                                                <div class=" sanst1 position-relative">
                                                                    <div>
                                                                        <svg onclick="handleUp('pxInput6', 'px')"
                                                                            width="21" height="20" viewBox="0 0 21 20"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <hr class="sitry">
                                                                    <div>
                                                                        <svg onclick="handleDown('pxInput6', 'px')"
                                                                            class="sy" width="21" height="20"
                                                                            viewBox="0 0 21 20" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-5">
                                                        <div class="top44">
                                                            <p>Bottom</p>
                                                            <div class="d-flex align-items-start">
                                                                <input class="percentageInput1" type="text"
                                                                    id="pxInput7" oninput="addPercentageSymbol()"
                                                                    value="0px">
                                                                <div class="sanst1 position-relative">
                                                                    <div>
                                                                        <svg onclick="handleUp('pxInput7', 'px')"
                                                                            width="21" height="20" viewBox="0 0 21 20"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <hr class="sitry">
                                                                    <div>
                                                                        <svg onclick="handleDown('pxInput7', 'px')"
                                                                            class="sy" width="21" height="20"
                                                                            viewBox="0 0 21 20" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="top44 top46">
                                                            <p>Left</p>
                                                            <div class="d-flex align-items-start">
                                                                <input class="percentageInput1" type="text"
                                                                    id="pxInput8" oninput="addPercentageSymbol()"
                                                                    value="0px">
                                                                <div class="sanst1 position-relative">
                                                                    <div>
                                                                        <svg onclick="handleUp('pxInput8', 'px')"
                                                                            width="21" height="20" viewBox="0 0 21 20"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <hr class="sitry">
                                                                    <div>
                                                                        <svg onclick="handleUp('pxInput8', 'px')"
                                                                            class="sy" width="21" height="20"
                                                                            viewBox="0 0 21 20" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                                fill="#7E8299"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center mt-6">
                                                        <input class="chet" type="checkbox" name="" id="">
                                                        <span class="check-inp">Apply to all sides</span>
                                                    </div>
                                                </div>

                                                <div class="widths22 mt-6">
                                                    <div class="widths22-p">
                                                        <span>Width</span>
                                                    </div>
                                                    <div class="select-widths">

                                                        <select
                                                            class="form-select  form-control3 form-control4 form-select-solid fw-bold"
                                                            data-kt-select2="true" data-placeholder="Select Option"
                                                            data-allow-clear="true" data-kt-user-table-filter="role"
                                                            data-hide-search="true">
                                                            <option></option>
                                                            <option value="Administrator">Default</option>
                                                            <option value="Analyst">Second header</option>
                                                            <option value="Developer">Third header</option>
                                                            <option value="Support">Fourth header</option>
                                                            <option value="Trial">Fifth header</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div>
                                                    <hr class="hr-setca">
                                                </div>

                                                <div class="widths22 mt-6">
                                                    <div class="widths22-p">
                                                        <span>Z-index</span>
                                                    </div>
                                                    <div class="select-widths">

                                                        <select
                                                            class="form-select  form-control3 form-control4 form-select-solid fw-bold"
                                                            data-kt-select2="true" data-placeholder="Select Option"
                                                            data-allow-clear="true" data-kt-user-table-filter="role"
                                                            data-hide-search="true">
                                                            <option></option>
                                                            <option value="Administrator">Default</option>
                                                            <option value="Analyst">Second header</option>
                                                            <option value="Developer">Third header</option>
                                                            <option value="Support">Fourth header</option>
                                                            <option value="Trial">Fifth header</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="widths22 mt-5">
                                                    <div class="widths22-p">
                                                        <span>Position</span>
                                                    </div>
                                                    <div class="select-widths">

                                                        <input class="form-control form-control3 form-control4"
                                                            type="text">
                                                    </div>
                                                </div>

                                                <div class="widths22 mt-5">
                                                    <div class="widths22-p">
                                                        <span>CSS ID</span>
                                                    </div>
                                                    <div class="select-widths">

                                                        <input class="form-control form-control3 form-control4"
                                                            type="text">
                                                    </div>
                                                </div>

                                                <div class="widths22 widths23 mt-5">
                                                    <div class="widths22-p">
                                                        <span>CSS Classes</span>
                                                    </div>
                                                    <div class="select-widths">

                                                        <input class="form-control form-control3 form-control4"
                                                            type="text">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed"></div>
                                        <!--end::Separator-->
                                    </div>
                                    <!--end::Section-->

                                    <!--begin::Section-->
                                    <div class="m-0">
                                        <!--begin::Heading-->
                                        <div onclick="side_toggle('kt_job_4_1')" class="d-flex align-items-center wrapta collapsible py-3 toggle collapsed mb-0"
                                            data-bs-toggle="collapse" data-bs-target="#kt_job_4_1">
                                            <!--begin::Icon-->
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <!-- <i class="ki-duotone ki-up toggle-on text-primary fs-1">
                                      <span class="path1"></span>
                                      <span class="path2"></span>
                                    </i>
                                    <i class="ki-duotone ki-down toggle-off fs-1">
                                      <span class="path1"></span>
                                      <span class="path2"></span>
                                      <span class="path3"></span>
                                    </i> -->
                                                <svg class="ki-duotone ki-up toggle-on" width="12" height="6"
                                                    viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.3541 0.85375L6.35414 5.85375C6.30771 5.90024 6.25256 5.93712 6.19186 5.96228C6.13117 5.98744 6.0661 6.00039 6.00039 6.00039C5.93469 6.00039 5.86962 5.98744 5.80892 5.96228C5.74822 5.93712 5.69308 5.90024 5.64664 5.85375L0.646644 0.85375C0.576638 0.783823 0.528954 0.694696 0.509629 0.597654C0.490304 0.500611 0.500206 0.400016 0.538082 0.308605C0.575959 0.217193 0.640106 0.139075 0.722403 0.08414C0.8047 0.0292046 0.901446 -7.77138e-05 1.00039 1.549e-07H11.0004C11.0993 -7.77138e-05 11.1961 0.0292046 11.2784 0.08414C11.3607 0.139075 11.4248 0.217193 11.4627 0.308605C11.5006 0.400016 11.5105 0.500611 11.4912 0.597654C11.4718 0.694696 11.4241 0.783823 11.3541 0.85375Z"
                                                        fill="#7E8299" />
                                                </svg>

                                                <svg class="ki-duotone ki-down toggle-off fs-1" width="12" height="6"
                                                    viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.3541 0.85375L6.35414 5.85375C6.30771 5.90024 6.25256 5.93712 6.19186 5.96228C6.13117 5.98744 6.0661 6.00039 6.00039 6.00039C5.93469 6.00039 5.86962 5.98744 5.80892 5.96228C5.74822 5.93712 5.69308 5.90024 5.64664 5.85375L0.646644 0.85375C0.576638 0.783823 0.528954 0.694696 0.509629 0.597654C0.490304 0.500611 0.500206 0.400016 0.538082 0.308605C0.575959 0.217193 0.640106 0.139075 0.722403 0.08414C0.8047 0.0292046 0.901446 -7.77138e-05 1.00039 1.549e-07H11.0004C11.0993 -7.77138e-05 11.1961 0.0292046 11.2784 0.08414C11.3607 0.139075 11.4248 0.217193 11.4627 0.308605C11.5006 0.400016 11.5105 0.500611 11.4912 0.597654C11.4718 0.694696 11.4241 0.783823 11.3541 0.85375Z"
                                                        fill="#7E8299" />
                                                </svg>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Title-->
                                            <h4 class="text-gray-700 fw-bold cursor-pointer tesla mb-0">Border</h4>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div id="kt_job_4_1" class="collapse none fs-6 ms-1">
                                            <div>
                                                <div class="border-style1">
                                                    <label for="">Border Style</label>
                                                    <select
                                                        class="form-select form-sel5 mt-2  form-control3  form-select-solid fw-bold"
                                                        data-kt-select2="true" data-placeholder="Select a border style"
                                                        data-allow-clear="true" data-kt-user-table-filter="role"
                                                        data-hide-search="true">
                                                        <option></option>
                                                        <option value="Administrator">Default</option>
                                                        <option value="Analyst">Second header</option>
                                                        <option value="Developer">Third header</option>
                                                        <option value="Support">Fourth header</option>
                                                        <option value="Trial">Fifth header</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex mt-4">
                                                    <div class="top44 top46  top47 top48">
                                                        <p class="tik">Thickness</p>
                                                        <div class="d-flex align-items-start">
                                                            <input class="percentageInput1" type="text"
                                                                id="percentageInput" oninput="addPercentageSymbol()">
                                                            <div class="sanst1 position-relative">
                                                                <div>
                                                                    <svg width="21" height="20" viewBox="0 0 21 20"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                            fill="#7E8299"></path>
                                                                    </svg>
                                                                </div>
                                                                <hr class="sitry">
                                                                <div>
                                                                    <svg class="sy" width="21" height="20"
                                                                        viewBox="0 0 21 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                            fill="#7E8299"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="top44 top46 top48">
                                                        <p class="tik">Corner radius</p>
                                                        <div class="d-flex align-items-start">
                                                            <input class="percentageInput1" type="text"
                                                                id="percentageInput" oninput="addPercentageSymbol()">
                                                            <div class="sanst1 position-relative">
                                                                <div>
                                                                    <svg width="21" height="20" viewBox="0 0 21 20"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                            fill="#7E8299"></path>
                                                                    </svg>
                                                                </div>
                                                                <hr class="sitry">
                                                                <div>
                                                                    <svg class="sy" width="21" height="20"
                                                                        viewBox="0 0 21 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                            fill="#7E8299"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4 widths23">
                                                    <label class="form-label form-label1 fs-6 fw-semibold">Border
                                                        Color</label>
                                                    <div class=" d-flex">
                                                        <div class="colorPicker1">
                                                            <label for="txtColorCode3" class="colorCode">
                                                              <input type="color" name="txtColorCode3" id="txtColorCode3"
                                                              value="#252626">
                                                            </label>
                                                        </div>
                                                        <div class=" d-flex align-items-start ">
                                                            <input type="text" id="percentageInput2"
                                                                class="percentageInput" oninput="addPercentageSymbol()"
                                                                value="0%">
                                                            <div class="sanst position-relative">
                                                                <div>
                                                                    <svg onclick="handleUp('percentageInput2', '%')"
                                                                        class="cursor-pointer" width="21" height="20"
                                                                        viewBox="0 0 21 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11.3962 5.58626L17.6462 11.8363C17.8223 12.0124 17.9212 12.2513 17.9212 12.5003C17.9212 12.7494 17.8223 12.9883 17.6462 13.1644C17.47 13.3405 17.2312 13.4395 16.9821 13.4395C16.733 13.4395 16.4942 13.3405 16.318 13.1644L10.7329 7.57767L5.14616 13.1628C5.05895 13.25 4.95542 13.3192 4.84148 13.3664C4.72754 13.4136 4.60542 13.4379 4.4821 13.4379C4.35877 13.4379 4.23665 13.4136 4.12271 13.3664C4.00877 13.3192 3.90524 13.25 3.81803 13.1628C3.73083 13.0756 3.66165 12.9721 3.61446 12.8582C3.56726 12.7442 3.54297 12.6221 3.54297 12.4988C3.54297 12.3754 3.56726 12.2533 3.61446 12.1394C3.66165 12.0254 3.73083 11.9219 3.81803 11.8347L10.068 5.5847C10.1552 5.49741 10.2588 5.42818 10.3728 5.38099C10.4868 5.33381 10.609 5.3096 10.7324 5.30974C10.8558 5.30989 10.978 5.33439 11.0919 5.38184C11.2058 5.42929 11.3092 5.49876 11.3962 5.58626Z"
                                                                            fill="#7E8299"></path>
                                                                    </svg>
                                                                </div>
                                                                <hr class="sitry">
                                                                <div>
                                                                    <svg onclick="handleDown('percentageInput2', '%')"
                                                                        class="sy cursor-pointer" width="21" height="20"
                                                                        viewBox="0 0 21 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10.0687 14.4137L3.81869 8.16373C3.64257 7.98761 3.54362 7.74874 3.54362 7.49967C3.54362 7.2506 3.64257 7.01173 3.81869 6.83561C3.99481 6.65949 4.23368 6.56055 4.48275 6.56055C4.73182 6.56055 4.97069 6.65949 5.14681 6.83561L10.732 12.4223L16.3187 6.83717C16.4059 6.74997 16.5094 6.68079 16.6234 6.6336C16.7373 6.5864 16.8594 6.56211 16.9827 6.56211C17.1061 6.56211 17.2282 6.5864 17.3421 6.6336C17.4561 6.68079 17.5596 6.74997 17.6468 6.83717C17.734 6.92438 17.8032 7.02791 17.8504 7.14185C17.8976 7.25579 17.9219 7.37791 17.9219 7.50124C17.9219 7.62456 17.8976 7.74668 17.8504 7.86062C17.8032 7.97456 17.734 8.07809 17.6468 8.1653L11.3968 14.4153C11.3096 14.5026 11.206 14.5718 11.092 14.619C10.978 14.6662 10.8558 14.6904 10.7324 14.6903C10.609 14.6901 10.4869 14.6656 10.373 14.6182C10.2591 14.5707 10.1557 14.5012 10.0687 14.4137Z"
                                                                            fill="#7E8299"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed"></div>
                                        <!--end::Separator-->
                                    </div>
                                    <!--end::Section-->

                                    <!--begin::Section-->
                                    <div class="m-0">
                                        <!--begin::Heading-->
                                        <div onclick="side_toggle('kt_job_4_2')" class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0"
                                            data-bs-toggle="collapse" data-bs-target="#kt_job_4_2">
                                            <!--begin::Icon-->
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <!-- <i class="ki-duotone ki-up toggle-on text-primary fs-1">
                                      <span class="path1"></span>
                                      <span class="path2"></span>
                                    </i>
                                    <i class="ki-duotone ki-down toggle-off fs-1">
                                      <span class="path1"></span>
                                      <span class="path2"></span>
                                      <span class="path3"></span>
                                    </i> -->
                                                <svg class="ki-duotone ki-up toggle-on" width="12" height="6"
                                                    viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.3541 0.85375L6.35414 5.85375C6.30771 5.90024 6.25256 5.93712 6.19186 5.96228C6.13117 5.98744 6.0661 6.00039 6.00039 6.00039C5.93469 6.00039 5.86962 5.98744 5.80892 5.96228C5.74822 5.93712 5.69308 5.90024 5.64664 5.85375L0.646644 0.85375C0.576638 0.783823 0.528954 0.694696 0.509629 0.597654C0.490304 0.500611 0.500206 0.400016 0.538082 0.308605C0.575959 0.217193 0.640106 0.139075 0.722403 0.08414C0.8047 0.0292046 0.901446 -7.77138e-05 1.00039 1.549e-07H11.0004C11.0993 -7.77138e-05 11.1961 0.0292046 11.2784 0.08414C11.3607 0.139075 11.4248 0.217193 11.4627 0.308605C11.5006 0.400016 11.5105 0.500611 11.4912 0.597654C11.4718 0.694696 11.4241 0.783823 11.3541 0.85375Z"
                                                        fill="#7E8299" />
                                                </svg>

                                                <svg class="ki-duotone ki-down toggle-off fs-1" width="12" height="6"
                                                    viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.3541 0.85375L6.35414 5.85375C6.30771 5.90024 6.25256 5.93712 6.19186 5.96228C6.13117 5.98744 6.0661 6.00039 6.00039 6.00039C5.93469 6.00039 5.86962 5.98744 5.80892 5.96228C5.74822 5.93712 5.69308 5.90024 5.64664 5.85375L0.646644 0.85375C0.576638 0.783823 0.528954 0.694696 0.509629 0.597654C0.490304 0.500611 0.500206 0.400016 0.538082 0.308605C0.575959 0.217193 0.640106 0.139075 0.722403 0.08414C0.8047 0.0292046 0.901446 -7.77138e-05 1.00039 1.549e-07H11.0004C11.0993 -7.77138e-05 11.1961 0.0292046 11.2784 0.08414C11.3607 0.139075 11.4248 0.217193 11.4627 0.308605C11.5006 0.400016 11.5105 0.500611 11.4912 0.597654C11.4718 0.694696 11.4241 0.783823 11.3541 0.85375Z"
                                                        fill="#7E8299" />
                                                </svg>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Title-->
                                            <h4 class="text-gray-700 fw-bold tesla cursor-pointer mb-0">Effects</h4>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div id="kt_job_4_2" class="collapse none fs-6 ms-1">
                                            <div>
                                                <div class="border-style1">
                                                    <label for="">Animation</label>
                                                    <select
                                                        class="form-select form-sel5 mt-2  form-control3  form-select-solid fw-bold"
                                                        data-kt-select2="true" data-placeholder="Default"
                                                        data-allow-clear="true" data-kt-user-table-filter="role"
                                                        data-hide-search="true">
                                                        <option></option>
                                                        <option value="Administrator">None</option>
                                                        <option value="Analyst">Fading entrances</option>
                                                        <option value="Developer">fadeIn</option>
                                                        <option value="Support">fadeInDown</option>
                                                        <option value="Trial">fadeInLeft</option>
                                                        <option value="Trial">fadeInLeftBig</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed"></div>
                                        <!--end::Separator-->
                                    </div>
                                    <!--end::Section-->

                                    <!--begin::Section-->
                                    <div class="m-0">
                                        <!--begin::Heading-->
                                        <div onclick="side_toggle('kt_job_4_3')" class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0"
                                            data-bs-toggle="collapse" data-bs-target="#kt_job_4_3">
                                            <!--begin::Icon-->
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <!-- <i class="ki-duotone ki-up toggle-on text-primary fs-1">
                                      <span class="path1"></span>
                                      <span class="path2"></span>
                                    </i>
                                    <i class="ki-duotone ki-down toggle-off fs-1">
                                      <span class="path1"></span>
                                      <span class="path2"></span>
                                      <span class="path3"></span>
                                    </i> -->
                                                <svg class="ki-duotone ki-up toggle-on" width="12" height="6"
                                                    viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.3541 0.85375L6.35414 5.85375C6.30771 5.90024 6.25256 5.93712 6.19186 5.96228C6.13117 5.98744 6.0661 6.00039 6.00039 6.00039C5.93469 6.00039 5.86962 5.98744 5.80892 5.96228C5.74822 5.93712 5.69308 5.90024 5.64664 5.85375L0.646644 0.85375C0.576638 0.783823 0.528954 0.694696 0.509629 0.597654C0.490304 0.500611 0.500206 0.400016 0.538082 0.308605C0.575959 0.217193 0.640106 0.139075 0.722403 0.08414C0.8047 0.0292046 0.901446 -7.77138e-05 1.00039 1.549e-07H11.0004C11.0993 -7.77138e-05 11.1961 0.0292046 11.2784 0.08414C11.3607 0.139075 11.4248 0.217193 11.4627 0.308605C11.5006 0.400016 11.5105 0.500611 11.4912 0.597654C11.4718 0.694696 11.4241 0.783823 11.3541 0.85375Z"
                                                        fill="#7E8299" />
                                                </svg>

                                                <svg class="ki-duotone ki-down toggle-off fs-1" width="12" height="6"
                                                    viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.3541 0.85375L6.35414 5.85375C6.30771 5.90024 6.25256 5.93712 6.19186 5.96228C6.13117 5.98744 6.0661 6.00039 6.00039 6.00039C5.93469 6.00039 5.86962 5.98744 5.80892 5.96228C5.74822 5.93712 5.69308 5.90024 5.64664 5.85375L0.646644 0.85375C0.576638 0.783823 0.528954 0.694696 0.509629 0.597654C0.490304 0.500611 0.500206 0.400016 0.538082 0.308605C0.575959 0.217193 0.640106 0.139075 0.722403 0.08414C0.8047 0.0292046 0.901446 -7.77138e-05 1.00039 1.549e-07H11.0004C11.0993 -7.77138e-05 11.1961 0.0292046 11.2784 0.08414C11.3607 0.139075 11.4248 0.217193 11.4627 0.308605C11.5006 0.400016 11.5105 0.500611 11.4912 0.597654C11.4718 0.694696 11.4241 0.783823 11.3541 0.85375Z"
                                                        fill="#7E8299" />
                                                </svg>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Title-->
                                            <h4 class="text-gray-700 fw-bold tesla cursor-pointer mb-0">SEO &
                                                accessibility </h4>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div id="kt_job_4_3" class="collapse none fs-6 ms-1">
                                            <div>Content here</div>
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed"></div>
                                        <!--end::Separator-->
                                    </div>

                                    <p class="text-center mt-10 reset-theme">Reset to theme</p>
                                    <!--end::Section-->
                                    <!--end::Accordion-->
                                </div>
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::List widget 10-->
                </div>
                <!--end::Start sidebar-->
                <!--begin::Content-->
                <div class="w-100 flex-lg-row-fluid mx-lg-13">
                    <!--begin::Mobile toolbar-->
                    <div class="d-flex d-lg-none align-items-center justify-content-end mb-10">
                        <div class="d-flex align-items-center gap-2">
                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                                id="kt_social_start_sidebar_toggle">
                                <i class="ki-duotone ki-profile-circle fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>

                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                                id="kt_social_end_sidebar_toggle">
                                <i class="ki-duotone ki-scroll fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                        </div>
                    </div>
                    <!--end::Mobile toolbar-->
                </div>
                <!--end::Content-->
            </div>

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

document.getElementById("sant").addEventListener("click", (e) => {
    document.getElementById("pickd").classList.toggle("thunder");
});

document.getElementById("sanj").addEventListener("click", (e) => {
    document.getElementById("pickfid").classList.toggle("thunder1");
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

var budgetSlider1 = document.querySelector("#fontSizeSlider1");
var budgetValue1 = document.querySelector("#fontSize1");

noUiSlider.create(budgetSlider1, {
    start: [5],
    connect: true,
    range: {
        "min": 1,
        "max": 500
    }
});

budgetSlider1.noUiSlider.on("update", function(values, handle) {
    budgetValue1.innerHTML = Math.round(values[handle]);
    if (handle) {
        budgetValue1.innerHTML = Math.round(values[handle]);
    }
});

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

const side_toggle=(id)=>{
  document.getElementById(id).classList.toggle('none');
}

// ===========================colorPicker=========================
</script>

<script>
const handleUp = (id, symbol) => {
    // console.log(id);
    // console.log('up');
    let ele = document.getElementById(id);
    let currentValue = ele.value;
    // console.log(currentValue);
    currentValue = Number(currentValue.replace(symbol, ''));
    if (currentValue < 100) {
        currentValue += 1;
    }
    ele.value = currentValue + symbol;
};

const handleDown = (id, symbol) => {
    // console.log(id);
    // console.log('down');
    let ele = document.getElementById(id);
    let currentValue = ele.value;
    // console.log(currentValue);
    currentValue = Number(currentValue.replace(symbol, ''));
    if (currentValue > 0) {
        currentValue -= 1;
    }
    ele.value = currentValue + symbol;
}

document.querySelectorAll('input[type=color]').forEach(function (picker) {

var targetLabel = document.querySelector('label[for="' + picker.id + '"]'),
  codeArea = document.createElement('span');

codeArea.innerHTML = picker.value;
targetLabel.parentNode.prepend(codeArea);

picker.addEventListener('change', function () {
  codeArea.innerHTML = picker.value;
  targetLabel.parentNode.prepend(codeArea);
});
});
</script>
@endsection