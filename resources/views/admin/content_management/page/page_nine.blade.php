<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="{{ asset('backend/admin/images/favicon.ico') }}" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
  <!--end::Fonts-->
  <!--begin::Vendor Stylesheets(used for this page only)-->
  <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend/admin/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
  <!--end::Vendor Stylesheets-->
  <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
  <link href="{{ asset('backend/admin/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
  <!--end::Global Stylesheets Bundle-->
  <link rel="stylesheet" href="style.css">
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
  data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
  data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true"
  data-kt-app-toolbar-enabled="true" class="app-default">
  <!--begin::Theme mode setup on page load-->
  <script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
  <!--end::Theme mode setup on page load-->
  <!--begin::App-->

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

      <!--begin::Header-->
      <div id="kt_app_header" class="app-header">
        <!--begin::Header container-->
        <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
          id="kt_app_header_container">
          <!--begin::Sidebar mobile toggle-->
          <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
              <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
            </div>
          </div>
          <!--end::Sidebar mobile toggle-->

          <!--begin::Mobile logo-->
          <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="../../demo1/dist/index.html" class="d-lg-none">
              <img alt="Logo" src="assets/media/logos/default-small.svg" class="h-30px" />
            </a>
          </div>
          <!--end::Mobile logo-->

          <!--begin::Header wrapper-->
          <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1 header-wrappers"
            id="kt_app_header_wrapper ">
            <!--begin::Menu wrapper-->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
              data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
              data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
              data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
              data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
              data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
              <!--begin::Menu-->
              <div
                class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                id="kt_app_header_menu" data-kt-menu="true">
                <div class="d-flex align-items-center">
                  <p class="me-4 paging45">Pages <img class="veci" src="./img/veci.png" alt=""></p>
                  <p class="paging46">Home <img class="testa" src="./img/Vector (2).png" alt=""></p>

                </div>
              </div>
              <!--end::Menu-->
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
              <div class="d-flex align-items-center">
                <div class="force force1">
                  <img src="./img/left.png" alt="">
                  <img src="./img/right.png" alt="">
                </div>
                <div class="force force1">
                  <img src="./img/Frame 38317.png" alt="">
                </div>
                <div class="force">
                  <img src="./img/akh.png" alt="">
                </div>
                <div class="force">
                  <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <button class="btn btn-sm fw-bold btn-primary ts" data-bs-toggle="modal"
                      data-bs-target="#kt_modal_new_target">Publish</button>
                    <!--end::Primary button-->
                  </div>
                </div>
              </div>

              <!--begin::Header menu toggle-->
              <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px"
                  id="kt_app_header_menu_toggle">
                  <i class="ki-duotone ki-element-4 fs-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                  </i>
                </div>
              </div>
              <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar-->
          </div>
          <!--end::Header wrapper-->
        </div>
        <!--end::Header container-->
      </div>
      <!--end::Header-->

      <!--begin::Wrapper-->
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

        <!--begin::Sidebar-->
        <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
          data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="74px"
          data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
          <!--begin::Logo-->
          <div class="app-sidebar-logo apta-sidebar px-6" id="kt_app_sidebar_logo">
            <!--begin::Logo image-->
            <a href="../../demo1/dist/index.html">
              <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_1510_29578)">
                  <rect x="2" y="1" width="32" height="32" rx="6.4" fill="#3595F6" />
                  <path
                    d="M21.8904 11.5804L20.7037 10.4004L14.1104 17.0004L20.7104 23.6004L21.8904 22.4204L16.4704 17.0004L21.8904 11.5804Z"
                    fill="white" />
                  <rect x="2.4" y="1.4" width="31.2" height="31.2" rx="6" stroke="#3595F6" stroke-width="0.8" />
                </g>
                <defs>
                  <filter id="filter0_d_1510_29578" x="0.4" y="0.2" width="35.2" height="35.2"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                      result="hardAlpha" />
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
              data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
              data-kt-scroll-save-state="true">
              <!--begin::Menu-->
              <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">

                <!--begin:Menu item-->
                <div class="menu-item menu-item2">
                  <span data-bs-toggle="tooltip" data-bs-trigger="hover" area-lable="edit"
                    data-bs-original-title="Back Page List" data-bs-placement="right" class="menu-link">
                    <span class="menu-icon">
                      <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 17.5V11.5H12V17.5H17V9.5H20L10 0.5L0 9.5H3V17.5H8Z" fill="#7E8299" />
                      </svg>
                    </span>

                  </span>
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div class="menu-item menu-item2">
                  <span data-bs-toggle="tooltip" data-bs-trigger="hover" area-lable="edit"
                    data-bs-original-title="Add Elements" data-bs-placement="right" class="menu-link">
                    <span class="menu-icon">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M16 0H1.99C0.89 0 0 0.9 0 2L0.00999999 16C0.00999999 17.1 0.9 18 2 18H12L18 12V2C18 0.9 17.1 0 16 0ZM4 5H14V7H4V5ZM9 11H4V9H9V11ZM11 16.5V11H16.5L11 16.5Z"
                          fill="#7E8299" />
                      </svg>
                    </span>
                    <!-- <span class="menu-title">Sheet</span> -->


                  </span>
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div class="menu-item menu-item2">
                  <span data-bs-toggle="tooltip" data-bs-trigger="hover" area-lable="edit"
                    data-bs-original-title="Add Section" data-bs-placement="right" class="menu-link">
                    <span class="menu-icon">
                      <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 12H0V14H10V12ZM16 4H0V6H16V4ZM0 10H16V8H0V10ZM0 0V2H16V0H0Z" fill="#7E8299" />
                      </svg>

                    </span>

                  </span>
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div class="menu-item menu-item2">
                  <span data-bs-toggle="tooltip" data-bs-trigger="hover" area-lable="edit"
                    data-bs-original-title="Page History" class="menu-link">
                    <span class="menu-icon">
                      <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                      <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
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
        <!--end::Sidebar-->

        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <!--begin::Content wrapper-->

          <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->

            <div id="kt_app_content" class="app-content flex-column-fluid app-conjing">
              <!--begin::Content container-->
              <div id="kt_app_content_container" class="app-container container-fluid app-conjing das">

                <!-- ====================yaha par============== -->
                <div class="dragsa">
                  <div class="dropzone dst dz-clickable position-relative" id="kt_ecommerce_add_product_media">
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
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                  class="popup-render-items   bg-body drawer drawer-end  w-xl-400px w-lg-450px drawer-on drawer-on1 drawer-on2">

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
                        <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <select class="form-select  form-control3 form-select-solid fw-bold" data-kt-select2="true"
                              data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role"
                              data-hide-search="true">
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
                            <select class="form-select  form-control3 form-select-solid fw-bold" data-kt-select2="true"
                              data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role"
                              data-hide-search="true">
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
                            <select class="form-select  form-control3 form-select-solid fw-bold" data-kt-select2="true"
                              data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role"
                              data-hide-search="true">
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
                        <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                <label for="txtColorCode" class="colorCode">#112A46</label>
                                <input type="color" name="txtColorCode" id="txtColorCode" value="#112A46">
                              </div>
                              <div class=" d-flex align-items-start ">
                                <input type="text" id="percentageInput" oninput="addPercentageSymbol()">
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
                                    <svg class="sy" width="21" height="20" viewBox="0 0 21 20" fill="none"
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
                                <label for="txtColorCode" class="colorCode">#D9E0E6</label>
                                <input type="color" name="txtColorCode" id="txtColorCode" value="#D9E0E6">
                              </div>
                              <div class=" d-flex align-items-start ">
                                <input type="text" id="percentageInput" oninput="addPercentageSymbol()">
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
                                    <svg class="sy" width="21" height="20" viewBox="0 0 21 20" fill="none"
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
                                <label for="txtColorCode" class="colorCode">#0785FA</label>
                                <input type="color" name="txtColorCode" id="txtColorCode" value="#0785FA">
                              </div>
                              <div class=" d-flex align-items-start ">
                                <input type="text" id="percentageInput" oninput="addPercentageSymbol()">
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
                                    <svg class="sy" width="21" height="20" viewBox="0 0 21 20" fill="none"
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
                                <select class="form-select for-cont4 form-control3 form-select-solid fw-bold"
                                  data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true"
                                  data-kt-user-table-filter="role" data-hide-search="true">
                                  <option></option>
                                  <option value="Administrator">Poppins</option>
                                  <option value="Analyst">Second header</option>
                                  <option value="Developer">Third header</option>
                                  <option value="Support">Fourth header</option>
                                  <option value="Trial">Fifth header</option>
                                </select>
                              </div>
                              <div class=" d-flex align-items-start ">
                                <input type="text" id="percentageInput">
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
                                    <svg class="sy" width="21" height="20" viewBox="0 0 21 20" fill="none"
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
                          <div class="mt-4">
                            <label class="form-label form-label1 fs-6 fw-semibold">Button Background Color</label>
                            <div class=" d-flex">
                              <div class="colorPicker1">
                                <label for="txtColorCode" class="colorCode">#0785FA</label>
                                <input type="color" name="txtColorCode" id="txtColorCode" value="#0785FA">
                              </div>
                              <div class=" d-flex align-items-start ">
                                <input type="text" id="percentageInput" oninput="addPercentageSymbol()">
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
                                    <svg class="sy" width="21" height="20" viewBox="0 0 21 20" fill="none"
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
                                <label for="txtColorCode" class="colorCode">#D9E0E6</label>
                                <input type="color" name="txtColorCode" id="txtColorCode" value="#D9E0E6">
                              </div>
                              <div class=" d-flex align-items-start ">
                                <input type="text" id="percentageInput" oninput="addPercentageSymbol()">
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
                                    <svg class="sy" width="21" height="20" viewBox="0 0 21 20" fill="none"
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
                          <div class="d-flex align-items-center ps-4">
                            <div id="kt_app_toolbar_slider"
                              class="noUi-target noUi-target-success w-75px w-xxl-150px noUi-sm noUi-ltr noUi-horizontal noUi-txt-dir-ltr">
                              <div class="noUi-base">
                                <div class="noUi-connects">
                                  <div class="noUi-connect" style="transform: translate(0%, 0px) scale(0, 1);"></div>
                                </div>
                                <div class="noUi-origin" style="transform: translate(-100%, 0px); z-index: 4;">
                                  <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider"
                                    aria-orientation="horizontal" aria-valuemin="1.0" aria-valuemax="10.0"
                                    aria-valuenow="1.0" aria-valuetext="1.0">
                                    <div class="noUi-touch-area"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <span id="kt_app_toolbar_slider_value"
                              class="d-flex flex-center bg-light-success rounded-circle w-35px h-35px ms-4 fs-7 fw-bold text-success"
                              data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Set impact level"
                              data-bs-original-title="Set impact level" data-kt-initialized="1">1.0</span>
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
                <div>

                </div>
              </div>
              <!--end::Content container-->
            </div>
            <!--end::Content-->
          </div>
          <!--end::Content wrapper-->
        </div>
        <!--end:::Main-->

      </div>

      <!--end::Wrapper-->

    </div>
    <!--end::Page-->
  </div>

  <!--end::App-->

  <!--begin::Scrolltop-->
  <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-duotone ki-arrow-up">
      <span class="path1"></span>
      <span class="path2"></span>
    </i>
  </div>
  <!--end::Scrolltop-->

  <!--begin::Javascript-->
  <script>var hostUrl = "assets/";</script>
  <!--begin::Global Javascript Bundle(mandatory for all pages)-->
  <script src="assets/plugins/global/plugins.bundle.js"></script>
  <script src="assets/js/scripts.bundle.js"></script>
  <!--end::Global Javascript Bundle-->
  <!--begin::Vendors Javascript(used for this page only)-->
  <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
  <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>

  <!--end::Vendors Javascript-->
  <!--begin::Custom Javascript(used for this page only)-->
  <script src="assets/js/widgets.bundle.js"></script>
  <script src="assets/js/custom/widgets.js"></script>
  <script src="assets/js/custom/apps/chat/chat.js"></script>
  <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
  <script src="assets/js/custom/utilities/modals/create-app.js"></script>
  <script src="assets/js/custom/utilities/modals/new-target.js"></script>
  <script src="assets/js/custom/utilities/modals/users-search.js"></script>
  <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
  <script src="assets/js/custom/utilities/modals/users-search.js"></script>
  <!--end::Custom Javascript-->
  <!--end::Javascript-->

  <script>
    $(window).on('click', function () {
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
    $(".btn-add-column, #popup-btn-cancel, .drawer-overlay-back").on('click', function () {
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

  </script>

</body>

</html>
