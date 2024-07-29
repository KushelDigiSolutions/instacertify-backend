<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="74px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo apta-sidebar px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('admin.dashboard') }}">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_1510_29578)">
                    <rect x="2" y="1" width="32" height="32" rx="6.4" fill="#3595F6" />
                    <path
                        d="M21.8904 11.5804L20.7037 10.4004L14.1104 17.0004L20.7104 23.6004L21.8904 22.4204L16.4704 17.0004L21.8904 11.5804Z"
                        fill="white" />
                    <rect x="2.4" y="1.4" width="31.2" height="31.2" rx="6" stroke="#3595F6"
                        stroke-width="0.8" />
                </g>
                <defs>
                    <filter id="filter0_d_1510_29578" x="0.4" y="0.2" width="35.2" height="35.2"
                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix"
                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                        <feOffset dy="0.8" />
                        <feGaussianBlur stdDeviation="0.8" />
                        <feColorMatrix type="matrix"
                            values="0 0 0 0 0.0627451 0 0 0 0 0.0941176 0 0 0 0 0.156863 0 0 0 0.05 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1510_29578" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1510_29578" result="shape" />
                    </filter>
                </defs>
            </svg>

            <!-- <img alt="Logo" src="assets/media/logos/default-dark.svg" class="h-25px app-sidebar-logo-default" /> -->
            <!-- <img alt="Logo" src="assets/media/logos/default-small.svg" class="h-20px app-sidebar-logo-minimize" /> -->
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <!--begin::Minimized sidebar setup:
            if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
                1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
                2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
                3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
                4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
            }
        -->
        <!-- <div id="kt_app_sidebar_toggle"
              class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
              data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
              data-kt-toggle-name="app-sidebar-minimize">
              <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
            </div> -->
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->

    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">

                <!--begin:Menu item-->
                <a href="page-1">
                    <div class="menu-item menu-item2">
                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" area-lable="edit"
                            data-bs-original-title="Back Page List" data-bs-placement="right" class="menu-link">
                            <span class="menu-icon">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 17.5V11.5H12V17.5H17V9.5H20L10 0.5L0 9.5H3V17.5H8Z" fill="#7E8299" />
                                </svg>
                            </span>

                        </span>
                    </div>
                </a>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <a href="page-5">
                    <div class="menu-item menu-item2">
                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" area-lable="edit"
                            data-bs-original-title="Add Elements" data-bs-placement="right" class="menu-link">
                            <span class="menu-icon">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 0H1.99C0.89 0 0 0.9 0 2L0.00999999 16C0.00999999 17.1 0.9 18 2 18H12L18 12V2C18 0.9 17.1 0 16 0ZM4 5H14V7H4V5ZM9 11H4V9H9V11ZM11 16.5V11H16.5L11 16.5Z"
                                        fill="#7E8299" />
                                </svg>
                            </span>
                            <!-- <span class="menu-title">Sheet</span> -->


                        </span>
                    </div>
                </a>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <a href="page-9">
                    <div class="menu-item menu-item2">
                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" area-lable="edit"
                            data-bs-original-title="Add Section" data-bs-placement="right" class="menu-link">
                            <span class="menu-icon">
                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 12H0V14H10V12ZM16 4H0V6H16V4ZM0 10H16V8H0V10ZM0 0V2H16V0H0Z"
                                        fill="#7E8299" />
                                </svg>

                            </span>

                        </span>
                    </div>
                </a>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div class="menu-item menu-item2">
                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" area-lable="edit"
                        data-bs-original-title="Page History" class="menu-link">
                        <span class="menu-icon">
                            <svg width="22" height="18" viewBox="0 0 22 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.5 0C7.53 0 3.5 4.03 3.5 9H0.5L4.39 12.89L4.46 13.03L8.5 9H5.5C5.5 5.13 8.63 2 12.5 2C16.37 2 19.5 5.13 19.5 9C19.5 12.87 16.37 16 12.5 16C10.57 16 8.82 15.21 7.56 13.94L6.14 15.36C7.77 16.99 10.01 18 12.5 18C17.47 18 21.5 13.97 21.5 9C21.5 4.03 17.47 0 12.5 0ZM11.5 5V10L15.78 12.54L16.5 11.33L13 9.25V5H11.5Z"
                                    fill="#7E8299" />
                            </svg>
                        </span>

                    </span>
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div class="menu-item menu-item2">
                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="Layers"
                        class="menu-link">
                        <span class="menu-icon">
                            <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.99 17.0048L1.62 11.2748L0 12.5348L9 19.5348L18 12.5348L16.37 11.2648L8.99 17.0048ZM9 14.4648L16.36 8.73484L18 7.46484L9 0.464844L0 7.46484L1.63 8.73484L9 14.4648Z"
                                    fill="#7E8299" />
                            </svg>

                        </span>

                    </span>
                </div>
                <!-- ==============btn-add-column============= -->
                <div id="aks" class="menu-item menu-item2 btn-add-column">
                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="Page Settings"
                        class="menu-link">
                        <span class="menu-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.1401 10.9404C17.1801 10.6404 17.2001 10.3304 17.2001 10.0004C17.2001 9.68039 17.1801 9.36039 17.1301 9.06039L19.1601 7.48039C19.3401 7.34039 19.3901 7.07039 19.2801 6.87039L17.3601 3.55039C17.2401 3.33039 16.9901 3.26039 16.7701 3.33039L14.3801 4.29039C13.8801 3.91039 13.3501 3.59039 12.7601 3.35039L12.4001 0.81039C12.3601 0.57039 12.1601 0.400391 11.9201 0.400391H8.08011C7.84011 0.400391 7.65011 0.57039 7.61011 0.81039L7.25011 3.35039C6.66011 3.59039 6.12011 3.92039 5.63011 4.29039L3.24011 3.33039C3.02011 3.25039 2.77011 3.33039 2.65011 3.55039L0.74011 6.87039C0.62011 7.08039 0.66011 7.34039 0.86011 7.48039L2.89011 9.06039C2.84011 9.36039 2.80011 9.69039 2.80011 10.0004C2.80011 10.3104 2.82011 10.6404 2.87011 10.9404L0.84011 12.5204C0.66011 12.6604 0.61011 12.9304 0.72011 13.1304L2.64011 16.4504C2.76011 16.6704 3.01011 16.7404 3.23011 16.6704L5.62011 15.7104C6.12011 16.0904 6.65011 16.4104 7.24011 16.6504L7.60011 19.1904C7.65011 19.4304 7.84011 19.6004 8.08011 19.6004H11.9201C12.1601 19.6004 12.3601 19.4304 12.3901 19.1904L12.7501 16.6504C13.3401 16.4104 13.8801 16.0904 14.3701 15.7104L16.7601 16.6704C16.9801 16.7504 17.2301 16.6704 17.3501 16.4504L19.2701 13.1304C19.3901 12.9104 19.3401 12.6604 19.1501 12.5204L17.1401 10.9404ZM10.0001 13.6004C8.02011 13.6004 6.40011 11.9804 6.40011 10.0004C6.40011 8.02039 8.02011 6.40039 10.0001 6.40039C11.9801 6.40039 13.6001 8.02039 13.6001 10.0004C13.6001 11.9804 11.9801 13.6004 10.0001 13.6004Z"
                                    fill="#F3F6F8" />
                            </svg>


                        </span>

                    </span>
                </div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->

</div>
