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
                   <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                       id="kt_app_header_menu" data-kt-menu="true">
                       <div class="d-flex align-items-center">
                           <p class="me-4 paging45">Pages <svg class="pages-cms22" width="6" height="9"
                                   viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M0.530215 7.56L3.58355 4.5L0.530215 1.44L1.47021 0.5L5.47021 4.5L1.47021 8.5L0.530215 7.56Z"
                                       fill="#7E8299" />
                               </svg>
                           </p>
                           <p class="paging46">Home <svg class="pages-cms22" width="12" height="6"
                                   viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M11.3537 0.85375L6.35366 5.85375C6.30722 5.90024 6.25207 5.93712 6.19138 5.96228C6.13068 5.98744 6.06561 6.00039 5.99991 6.00039C5.9342 6.00039 5.86913 5.98744 5.80844 5.96228C5.74774 5.93712 5.69259 5.90024 5.64616 5.85375L0.646155 0.85375C0.57615 0.783823 0.528466 0.694696 0.509141 0.597654C0.489816 0.500611 0.499718 0.400016 0.537594 0.308605C0.57547 0.217193 0.639617 0.139075 0.721914 0.08414C0.804211 0.0292046 0.900958 -7.77138e-05 0.999905 1.549e-07H10.9999C11.0989 -7.77138e-05 11.1956 0.0292046 11.2779 0.08414C11.3602 0.139075 11.4243 0.217193 11.4622 0.308605C11.5001 0.400016 11.51 0.500611 11.4907 0.597654C11.4713 0.694696 11.4237 0.783823 11.3537 0.85375Z"
                                       fill="#7E8299" />
                               </svg>
                           </p>

                       </div>
                   </div>
                   <!--end::Menu-->
               </div>
               <!--end::Menu wrapper-->
               <!--begin::Navbar-->
               <div class="app-navbar flex-shrink-0">
                   <div class="d-flex align-items-center">
                       <div class="force force1">
                           <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                               <path
                                   d="M4.25583 5.84909L6.73682 8.33009L5.35303 9.71387L0.509766 4.87061L5.35303 0.0273438L6.73682 1.41114L4.25583 3.89212H11.2731C15.5964 3.89212 19.101 7.39679 19.101 11.7201C19.101 16.0432 15.5964 19.548 11.2731 19.548H2.46674V17.591H11.2731C14.5155 17.591 17.144 14.9625 17.144 11.7201C17.144 8.47759 14.5155 5.84909 11.2731 5.84909H4.25583Z"
                                   fill="#7E8299" />
                           </svg>

                           <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                               <path
                                   d="M15.8169 5.84909H8.79957C5.55715 5.84909 2.92865 8.47759 2.92865 11.7201C2.92865 14.9625 5.55715 17.591 8.79957 17.591H17.606V19.548H8.79957C4.47634 19.548 0.97168 16.0432 0.97168 11.7201C0.97168 7.39679 4.47634 3.89212 8.79957 3.89212H15.8169L13.3358 1.41114L14.7197 0.0273438L19.5629 4.87061L14.7197 9.71387L13.3358 8.33009L15.8169 5.84909Z"
                                   fill="#E1E3EA" />
                           </svg>

                       </div>
                       <div class="force force1">
                           <svg width="30" height="24" viewBox="0 0 30 24" fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                               <rect width="30" height="24" rx="12" fill="#BFC8D1" />
                               <g clip-path="url(#clip0_1510_26644)">
                                   <path
                                       d="M19.8364 7.70574L18.6931 6.5625L13.5526 11.703L14.6958 12.8463L19.8364 7.70574ZM23.2742 6.5625L14.6958 15.1409L11.3067 11.7598L10.1634 12.903L14.6958 17.4355L24.4256 7.70574L23.2742 6.5625ZM5.57422 12.903L10.1067 17.4355L11.2499 16.2922L6.72557 11.7598L5.57422 12.903Z"
                                       fill="white" />
                               </g>
                               <defs>
                                   <clipPath id="clip0_1510_26644">
                                       <rect width="19.4595" height="19.4595" fill="white"
                                           transform="translate(5.27051 2.26953)" />
                                   </clipPath>
                               </defs>
                           </svg>

                       </div>
                       <div class="force">
                           <svg width="22" height="19" viewBox="0 0 22 19" fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                               <path
                                   d="M10.7422 0.435547C16.0183 0.435547 20.4078 4.23184 21.328 9.24193C20.4078 14.252 16.0183 18.0483 10.7422 18.0483C5.46599 18.0483 1.07653 14.252 0.15625 9.24193C1.07653 4.23184 5.46599 0.435547 10.7422 0.435547ZM10.7422 16.0913C14.8866 16.0913 18.4331 13.2068 19.3307 9.24193C18.4331 5.27713 14.8866 2.39252 10.7422 2.39252C6.59759 2.39252 3.05118 5.27713 2.15348 9.24193C3.05118 13.2068 6.59759 16.0913 10.7422 16.0913ZM10.7422 13.6451C8.31031 13.6451 6.33893 11.6738 6.33893 9.24193C6.33893 6.81011 8.31031 4.83874 10.7422 4.83874C13.1739 4.83874 15.1454 6.81011 15.1454 9.24193C15.1454 11.6738 13.1739 13.6451 10.7422 13.6451ZM10.7422 11.6881C12.0932 11.6881 13.1884 10.5929 13.1884 9.24193C13.1884 7.89093 12.0932 6.79571 10.7422 6.79571C9.39117 6.79571 8.29591 7.89093 8.29591 9.24193C8.29591 10.5929 9.39117 11.6881 10.7422 11.6881Z"
                                   fill="#7E8299" />
                           </svg>

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
