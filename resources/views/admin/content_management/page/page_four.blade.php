@extends('admin.layouts.cms.app')
@section('content')
<style>
    .sideji1{
       left:100%;
       transition: all .5s;
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
                <div id="far" class="sideeji sideji1">
                  <div class="sideeji-alert">
                      <div class="alertsas">
                          <h2>Filters</h2>
                          <svg style="cursor: pointer;" id="crosst" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.8327 1.34199L10.6577 0.166992L5.99935 4.82533L1.34102 0.166992L0.166016 1.34199L4.82435 6.00033L0.166016 10.6587L1.34102 11.8337L5.99935 7.17533L10.6577 11.8337L11.8327 10.6587L7.17435 6.00033L11.8327 1.34199Z" fill="#5E6278"/>
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
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.1479 14.3519L11.6273 10.8321C12.6477 9.60705 13.1566 8.03577 13.048 6.44512C12.9394 4.85447 12.2217 3.36692 11.0443 2.29193C9.86684 1.21693 8.32029 0.637251 6.72635 0.673476C5.13241 0.709701 3.6138 1.35904 2.48642 2.48642C1.35904 3.6138 0.709701 5.13241 0.673476 6.72635C0.637251 8.32029 1.21693 9.86684 2.29193 11.0443C3.36692 12.2217 4.85447 12.9394 6.44512 13.048C8.03577 13.1566 9.60705 12.6477 10.8321 11.6273L14.3519 15.1479C14.4042 15.2001 14.4663 15.2416 14.5345 15.2699C14.6028 15.2982 14.676 15.3127 14.7499 15.3127C14.8238 15.3127 14.897 15.2982 14.9653 15.2699C15.0336 15.2416 15.0956 15.2001 15.1479 15.1479C15.2001 15.0956 15.2416 15.0336 15.2699 14.9653C15.2982 14.897 15.3127 14.8238 15.3127 14.7499C15.3127 14.676 15.2982 14.6028 15.2699 14.5345C15.2416 14.4663 15.2001 14.4042 15.1479 14.3519ZM1.81242 6.87492C1.81242 5.87365 2.10933 4.89487 2.6656 4.06234C3.22188 3.22982 4.01253 2.58095 4.93758 2.19778C5.86263 1.81461 6.88053 1.71435 7.86256 1.90969C8.84459 2.10503 9.74664 2.58718 10.4546 3.29519C11.1626 4.00319 11.6448 4.90524 11.8401 5.88727C12.0355 6.8693 11.9352 7.8872 11.5521 8.81225C11.1689 9.7373 10.52 10.528 9.68749 11.0842C8.85497 11.6405 7.87618 11.9374 6.87492 11.9374C5.53272 11.9359 4.24591 11.4021 3.29683 10.453C2.34775 9.50392 1.81391 8.21712 1.81242 6.87492Z" fill="#7E8299"/>
                                    </svg>
                                    
                                <input type="text" data-kt-filemanager-table-filter="search" class="form-control form-control-solid search-das search-fas1 search-fas2 w-250px ps-15" placeholder="Search Pages">
                            </div>
                         </div>
                        
                            <!--begin::Input group-->
                            <div class=" mt-6">
                                <label class="form-label fs-6 fw-semibold">Author by</label>
                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
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
                      </form>
                  </div>
            </div>

                    <div>
                        <!--begin::Toolbar-->
                        {{-- <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
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
                                    <button id="secta" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_new_target">+ Create New Page</button>
                                    <!--end::Primary button-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar container-->
                        </div> --}}
                        <!--end::Toolbar-->
                    </div>

                    <!-- ====================crate page html start================ -->

                    <div   class="modal  fade" tabindex="-1" id="kt_modal_1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header modal-header56 modal-header57">
                            <h3 class="modal-title modal-title11">
                              Create a page
                            </h3>
                           
                            <!--begin::Close-->
                            <div id="ui" class="btn btn-icon btn-sm btn-active-light-primary ms-2 cut-btn2" data-bs-dismiss="modal"
                              aria-label="Close">
                              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#7E8299"/>
                              </svg>
                            </div>
                            <!--end::Close-->
                          </div>
                     
                             
                          <div class="modal-body modal-body11 modal-body22 position-relative">
                            <!-- <p>Modal body text goes here.</p> -->
                           
                            <p>Internal page name</p>
                            <input type="text">
  
                            <div class="creat22-btn">
                               <a href="page-3"> <button class="creat-pg">Create page</button></a>
                                <button data-bs-dismiss="modal" class="cancel">Cancel</button>
                            </div>
  
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- ===================craete page html end===================== -->

                    <div>
                        <div id="kt_app_content_container" class="app-container container-xxl app-conjing">

                            <!--begin::Card-->
                            <div class="card card-flush card-body2 card-slush">

                                <!--begin::Card header-->
                                <div class="card-header pt-8">
                                    <div class="card-title">
                                        <!--begin::Search-->
                                        <div class=" d-flex align-items-center">
                                            <div class="d-flex align-items-center search-das1 position-relative my-1">
                                                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="text" data-kt-filemanager-table-filter="search"
                                                    class="form-control form-control-solid search-das search-fas1 w-250px ps-15"
                                                    placeholder="Search Pages" />
                                            </div>
                                            <div  id="more_filt" class="d-flex align-items-center justify-content-center danda ">
                                                <img src="{{asset('backend/admin/images/img/danda.png')}}" alt="danda">
                                                <p>More Filters</p>
                                            </div>
                                        </div>


                                        <!--end::Search-->
                                    </div>
                                </div>
                                <!-- <div class="site-sel">
                                        <div class="tuton">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8333 0.5H2.16667C1.25 0.5 0.5 1.25 0.5 2.16667V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V2.16667C15.5 1.25 14.75 0.5 13.8333 0.5ZM12.1667 8.83333H3.83333V7.16667H12.1667V8.83333Z" fill="#3595F6"/>
                                                </svg>

                                            <p>1 site selected</p>
                                        </div>
                                        <div class="tuton tuton1">
                                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.00033 13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333H1.00033V13.8333ZM11.8337 1.33333H8.91699L8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333Z"
                                                    fill="#3595F6" />
                                            </svg>

                                            <p>Delete</p>

                                        </div>
                                    </div> -->
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body card-body4 card-si">
                                    <!--begin::Table-->
                                    <div class="site-sel">
                                        <div class="tuton">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.8333 0.5H2.16667C1.25 0.5 0.5 1.25 0.5 2.16667V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V2.16667C15.5 1.25 14.75 0.5 13.8333 0.5ZM12.1667 8.83333H3.83333V7.16667H12.1667V8.83333Z"
                                                    fill="#3595F6" />
                                            </svg>

                                            <p>1 site selected</p>
                                        </div>
                                        <div class="tuton tuton1">
                                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.00033 13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333H1.00033V13.8333ZM11.8337 1.33333H8.91699L8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333Z"
                                                    fill="#3595F6" />
                                            </svg>

                                            <p>Delete</p>

                                        </div>
                                    </div>
                                    <table id="kt_file_manager_list" data-kt-filemanager-table="files"
                                        class="table align-middle table-row-dashed fs-6 gy-5">
                                        <thead class="suching">
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0 tr-fash">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3 sights">
                                                        <input class="checking" type="checkbox" />
                                                    </div>
                                                </th>
                                                <th class="name44">Name</th>
                                                <th class="name44">URL</th>
                                                <th class="name44">Author</th>
                                                <th class="name44">Last Updated</th>
                                                <th class="name44">Status</th>
                                                <th class="name44">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            <tr class="tri11">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                        <input class="checking" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <a href="#" class="text-gray-800 text-hover-primary">Home
                                                            Page</a>
                                                    </div>
                                                </td>
                                                <td>/index</td>
                                                <td>Roya245</td>
                                                <td>August 19, 2022</td>
                                                <td>
                                                    <div class="status-baring">
                                                        <div class="reding"></div>
                                                        <p>Inactive</p>
                                                        <img src="{{asset('backend/admin/images/img/bottomDrop.png')}}" alt="bottom">
                                                    </div>

                                                </td>
                                                <td>
                                                    <!-- <div class="roting">
                                                        <div class="action-fas">
                                                            <img src="{{asset('backend/admin/images/img/threeDot.png')}}" alt="">
                                                        </div>
                                                        <div class="active-inActive active1-inactive1">
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <img src="{{asset('backend/admin/images/img/edit.png')}}" alt="">
                                                                <p class=" edit1">Edit</p>
                                                            </div>
                                                            <div class="line-div"></div>
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <img src="{{asset('backend/admin/images/img/delete.png')}}" alt="">
                                                                <p class=" delete1">Delete</p>
                                                            </div>
                                                        </div>
                                                        <div class="sisi">
                                                            <img src="{{asset('backend/admin/images/img/akhji.png')}}" alt="">
                                                        </div>
                                                    </div> -->
                                                   
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer show menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="left-start">
                                                        <circle cx="15" cy="15" r="14.5" fill="white" stroke="#E1E3EA"></circle>
                                                        <path d="M10.9993 13.6667C10.266 13.6667 9.66602 14.2667 9.66602 15C9.66602 15.7333 10.266 16.3333 10.9993 16.3333C11.7327 16.3333 12.3327 15.7333 12.3327 15C12.3327 14.2667 11.7327 13.6667 10.9993 13.6667ZM18.9993 13.6667C18.266 13.6667 17.666 14.2667 17.666 15C17.666 15.7333 18.266 16.3333 18.9993 16.3333C19.7327 16.3333 20.3327 15.7333 20.3327 15C20.3327 14.2667 19.7327 13.6667 18.9993 13.6667ZM14.9993 13.6667C14.266 13.6667 13.666 14.2667 13.666 15C13.666 15.7333 14.266 16.3333 14.9993 16.3333C15.7327 16.3333 16.3327 15.7333 16.3327 15C16.3327 14.2667 15.7327 13.6667 14.9993 13.6667Z" fill="#5E6278"></path>
                                                    </svg>
                                                    <svg class="tyu" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M23.1853 7.69625C23.1525 7.62219 22.3584 5.86062 20.5931 4.09531C18.2409 1.74312 15.27 0.5 12 0.5C8.72999 0.5 5.75905 1.74312 3.40687 4.09531C1.64155 5.86062 0.843741 7.625 0.814679 7.69625C0.772035 7.79217 0.75 7.89597 0.75 8.00094C0.75 8.10591 0.772035 8.20971 0.814679 8.30562C0.847491 8.37969 1.64155 10.1403 3.40687 11.9056C5.75905 14.2569 8.72999 15.5 12 15.5C15.27 15.5 18.2409 14.2569 20.5931 11.9056C22.3584 10.1403 23.1525 8.37969 23.1853 8.30562C23.2279 8.20971 23.25 8.10591 23.25 8.00094C23.25 7.89597 23.2279 7.79217 23.1853 7.69625ZM12 14C9.11437 14 6.59343 12.9509 4.50655 10.8828C3.65028 10.0313 2.92179 9.06027 2.34374 8C2.92164 6.93963 3.65014 5.9686 4.50655 5.11719C6.59343 3.04906 9.11437 2 12 2C14.8856 2 17.4066 3.04906 19.4934 5.11719C20.3514 5.9684 21.0815 6.93942 21.6609 8C20.985 9.26188 18.0403 14 12 14ZM12 3.5C11.11 3.5 10.2399 3.76392 9.49993 4.25839C8.7599 4.75285 8.18313 5.45566 7.84253 6.27792C7.50194 7.10019 7.41282 8.00499 7.58646 8.87791C7.76009 9.75082 8.18867 10.5526 8.81801 11.182C9.44735 11.8113 10.2492 12.2399 11.1221 12.4135C11.995 12.5872 12.8998 12.4981 13.7221 12.1575C14.5443 11.8169 15.2471 11.2401 15.7416 10.5001C16.2361 9.76005 16.5 8.89002 16.5 8C16.4988 6.80691 16.0242 5.66303 15.1806 4.81939C14.337 3.97575 13.1931 3.50124 12 3.5ZM12 11C11.4066 11 10.8266 10.8241 10.3333 10.4944C9.83993 10.1648 9.45542 9.69623 9.22835 9.14805C9.00129 8.59987 8.94188 7.99667 9.05764 7.41473C9.17339 6.83279 9.45911 6.29824 9.87867 5.87868C10.2982 5.45912 10.8328 5.1734 11.4147 5.05764C11.9967 4.94189 12.5999 5.0013 13.148 5.22836C13.6962 5.45542 14.1648 5.83994 14.4944 6.33329C14.824 6.82664 15 7.40666 15 8C15 8.79565 14.6839 9.55871 14.1213 10.1213C13.5587 10.6839 12.7956 11 12 11Z" fill="#7E8299"/>
                                                        </svg>
                                                        
                                                    <!-- <p>hi</p> -->
                                                

                                                    <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10" data-kt-menu="true" style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);" data-popper-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="http://127.0.0.1:8000/admin/footers/1/edit" class="menu-link px-3">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z" fill="#2A78C5"/>
                                                                    </svg>
                                                                    
                                                               <span style="color: #2A78C5;">Edit</span> 
                                                            </a>
                                                            <hr class="hr-fag">
                                                            <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z" fill="#FF5449"/>
                                                                    </svg>
                                                                    
                                                              <span style="color: #FF5449;">Delete</span>
                                                            </a>
                                                            <form action="http://127.0.0.1:8000/admin/footers/1" id="delete_form_1" method="POST">
                                                                <input type="hidden" name="_method" value="DELETE">                                <input type="hidden" name="_token" value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">                            </form>
                                                        </div>
                                                    </div>

                                               
                                                </td>
                                            </tr>
                                            <tr class="tri11">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                        <input class="checking" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <a href="#" class="text-gray-800 text-hover-primary">Home
                                                            Page</a>
                                                    </div>
                                                </td>
                                                <td>/index</td>
                                                <td>Roya245</td>
                                                <td>August 19, 2022</td>
                                                <td>
                                                    <div class="status-baring">
                                                        <div class="reding"></div>
                                                        <p>Inactive</p>
                                                        <img src="{{asset('backend/admin/images/img/bottomDrop.png')}}" alt="bottom">
                                                    </div>

                                                </td>
                                                <td>
                                                    <!-- <div class="roting">
                                                        <div class="action-fas">
                                                            <img src="{{asset('backend/admin/images/img/threeDot.png')}}" alt="">
                                                        </div>
                                                        <div class="active-inActive active1-inactive1">
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <img src="{{asset('backend/admin/images/img/edit.png')}}" alt="">
                                                                <p class=" edit1">Edit</p>
                                                            </div>
                                                            <div class="line-div"></div>
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <img src="{{asset('backend/admin/images/img/delete.png')}}" alt="">
                                                                <p class=" delete1">Delete</p>
                                                            </div>
                                                        </div>
                                                        <div class="sisi">
                                                            <img src="{{asset('backend/admin/images/img/akhji.png')}}" alt="">
                                                        </div>
                                                    </div> -->
                                                   
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer show menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="left-start">
                                                        <circle cx="15" cy="15" r="14.5" fill="white" stroke="#E1E3EA"></circle>
                                                        <path d="M10.9993 13.6667C10.266 13.6667 9.66602 14.2667 9.66602 15C9.66602 15.7333 10.266 16.3333 10.9993 16.3333C11.7327 16.3333 12.3327 15.7333 12.3327 15C12.3327 14.2667 11.7327 13.6667 10.9993 13.6667ZM18.9993 13.6667C18.266 13.6667 17.666 14.2667 17.666 15C17.666 15.7333 18.266 16.3333 18.9993 16.3333C19.7327 16.3333 20.3327 15.7333 20.3327 15C20.3327 14.2667 19.7327 13.6667 18.9993 13.6667ZM14.9993 13.6667C14.266 13.6667 13.666 14.2667 13.666 15C13.666 15.7333 14.266 16.3333 14.9993 16.3333C15.7327 16.3333 16.3327 15.7333 16.3327 15C16.3327 14.2667 15.7327 13.6667 14.9993 13.6667Z" fill="#5E6278"></path>
                                                    </svg>
                                                    <svg class="tyu" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M23.1853 7.69625C23.1525 7.62219 22.3584 5.86062 20.5931 4.09531C18.2409 1.74312 15.27 0.5 12 0.5C8.72999 0.5 5.75905 1.74312 3.40687 4.09531C1.64155 5.86062 0.843741 7.625 0.814679 7.69625C0.772035 7.79217 0.75 7.89597 0.75 8.00094C0.75 8.10591 0.772035 8.20971 0.814679 8.30562C0.847491 8.37969 1.64155 10.1403 3.40687 11.9056C5.75905 14.2569 8.72999 15.5 12 15.5C15.27 15.5 18.2409 14.2569 20.5931 11.9056C22.3584 10.1403 23.1525 8.37969 23.1853 8.30562C23.2279 8.20971 23.25 8.10591 23.25 8.00094C23.25 7.89597 23.2279 7.79217 23.1853 7.69625ZM12 14C9.11437 14 6.59343 12.9509 4.50655 10.8828C3.65028 10.0313 2.92179 9.06027 2.34374 8C2.92164 6.93963 3.65014 5.9686 4.50655 5.11719C6.59343 3.04906 9.11437 2 12 2C14.8856 2 17.4066 3.04906 19.4934 5.11719C20.3514 5.9684 21.0815 6.93942 21.6609 8C20.985 9.26188 18.0403 14 12 14ZM12 3.5C11.11 3.5 10.2399 3.76392 9.49993 4.25839C8.7599 4.75285 8.18313 5.45566 7.84253 6.27792C7.50194 7.10019 7.41282 8.00499 7.58646 8.87791C7.76009 9.75082 8.18867 10.5526 8.81801 11.182C9.44735 11.8113 10.2492 12.2399 11.1221 12.4135C11.995 12.5872 12.8998 12.4981 13.7221 12.1575C14.5443 11.8169 15.2471 11.2401 15.7416 10.5001C16.2361 9.76005 16.5 8.89002 16.5 8C16.4988 6.80691 16.0242 5.66303 15.1806 4.81939C14.337 3.97575 13.1931 3.50124 12 3.5ZM12 11C11.4066 11 10.8266 10.8241 10.3333 10.4944C9.83993 10.1648 9.45542 9.69623 9.22835 9.14805C9.00129 8.59987 8.94188 7.99667 9.05764 7.41473C9.17339 6.83279 9.45911 6.29824 9.87867 5.87868C10.2982 5.45912 10.8328 5.1734 11.4147 5.05764C11.9967 4.94189 12.5999 5.0013 13.148 5.22836C13.6962 5.45542 14.1648 5.83994 14.4944 6.33329C14.824 6.82664 15 7.40666 15 8C15 8.79565 14.6839 9.55871 14.1213 10.1213C13.5587 10.6839 12.7956 11 12 11Z" fill="#7E8299"/>
                                                        </svg>
                                                        
                                                    <!-- <p>hi</p> -->
                                                

                                                    <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10" data-kt-menu="true" style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);" data-popper-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="http://127.0.0.1:8000/admin/footers/1/edit" class="menu-link px-3">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z" fill="#2A78C5"/>
                                                                    </svg>
                                                                    
                                                               <span style="color: #2A78C5;">Edit</span> 
                                                            </a>
                                                            <hr class="hr-fag">
                                                            <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z" fill="#FF5449"/>
                                                                    </svg>
                                                                    
                                                              <span style="color: #FF5449;">Delete</span>
                                                            </a>
                                                            <form action="http://127.0.0.1:8000/admin/footers/1" id="delete_form_1" method="POST">
                                                                <input type="hidden" name="_method" value="DELETE">                                <input type="hidden" name="_token" value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">                            </form>
                                                        </div>
                                                    </div>

                                               
                                                </td>
                                            </tr>
                                            <tr class="tri11">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                        <input class="checking" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <a href="#" class="text-gray-800 text-hover-primary">Home
                                                            Page</a>
                                                    </div>
                                                </td>
                                                <td>/index</td>
                                                <td>Roya245</td>
                                                <td>August 19, 2022</td>
                                                <td>
                                                    <div class="status-baring">
                                                        <div class="reding"></div>
                                                        <p>Inactive</p>
                                                        <img src="{{asset('backend/admin/images/img/bottomDrop.png')}}" alt="bottom">
                                                    </div>

                                                </td>
                                                <td>
                                                    <!-- <div class="roting">
                                                        <div class="action-fas">
                                                            <img src="{{asset('backend/admin/images/img/threeDot.png')}}" alt="">
                                                        </div>
                                                        <div class="active-inActive active1-inactive1">
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <img src="{{asset('backend/admin/images/img/edit.png')}}" alt="">
                                                                <p class=" edit1">Edit</p>
                                                            </div>
                                                            <div class="line-div"></div>
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <img src="{{asset('backend/admin/images/img/delete.png')}}" alt="">
                                                                <p class=" delete1">Delete</p>
                                                            </div>
                                                        </div>
                                                        <div class="sisi">
                                                            <img src="{{asset('backend/admin/images/img/akhji.png')}}" alt="">
                                                        </div>
                                                    </div> -->
                                                   
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer show menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="left-start">
                                                        <circle cx="15" cy="15" r="14.5" fill="white" stroke="#E1E3EA"></circle>
                                                        <path d="M10.9993 13.6667C10.266 13.6667 9.66602 14.2667 9.66602 15C9.66602 15.7333 10.266 16.3333 10.9993 16.3333C11.7327 16.3333 12.3327 15.7333 12.3327 15C12.3327 14.2667 11.7327 13.6667 10.9993 13.6667ZM18.9993 13.6667C18.266 13.6667 17.666 14.2667 17.666 15C17.666 15.7333 18.266 16.3333 18.9993 16.3333C19.7327 16.3333 20.3327 15.7333 20.3327 15C20.3327 14.2667 19.7327 13.6667 18.9993 13.6667ZM14.9993 13.6667C14.266 13.6667 13.666 14.2667 13.666 15C13.666 15.7333 14.266 16.3333 14.9993 16.3333C15.7327 16.3333 16.3327 15.7333 16.3327 15C16.3327 14.2667 15.7327 13.6667 14.9993 13.6667Z" fill="#5E6278"></path>
                                                    </svg>
                                                    <svg class="tyu" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M23.1853 7.69625C23.1525 7.62219 22.3584 5.86062 20.5931 4.09531C18.2409 1.74312 15.27 0.5 12 0.5C8.72999 0.5 5.75905 1.74312 3.40687 4.09531C1.64155 5.86062 0.843741 7.625 0.814679 7.69625C0.772035 7.79217 0.75 7.89597 0.75 8.00094C0.75 8.10591 0.772035 8.20971 0.814679 8.30562C0.847491 8.37969 1.64155 10.1403 3.40687 11.9056C5.75905 14.2569 8.72999 15.5 12 15.5C15.27 15.5 18.2409 14.2569 20.5931 11.9056C22.3584 10.1403 23.1525 8.37969 23.1853 8.30562C23.2279 8.20971 23.25 8.10591 23.25 8.00094C23.25 7.89597 23.2279 7.79217 23.1853 7.69625ZM12 14C9.11437 14 6.59343 12.9509 4.50655 10.8828C3.65028 10.0313 2.92179 9.06027 2.34374 8C2.92164 6.93963 3.65014 5.9686 4.50655 5.11719C6.59343 3.04906 9.11437 2 12 2C14.8856 2 17.4066 3.04906 19.4934 5.11719C20.3514 5.9684 21.0815 6.93942 21.6609 8C20.985 9.26188 18.0403 14 12 14ZM12 3.5C11.11 3.5 10.2399 3.76392 9.49993 4.25839C8.7599 4.75285 8.18313 5.45566 7.84253 6.27792C7.50194 7.10019 7.41282 8.00499 7.58646 8.87791C7.76009 9.75082 8.18867 10.5526 8.81801 11.182C9.44735 11.8113 10.2492 12.2399 11.1221 12.4135C11.995 12.5872 12.8998 12.4981 13.7221 12.1575C14.5443 11.8169 15.2471 11.2401 15.7416 10.5001C16.2361 9.76005 16.5 8.89002 16.5 8C16.4988 6.80691 16.0242 5.66303 15.1806 4.81939C14.337 3.97575 13.1931 3.50124 12 3.5ZM12 11C11.4066 11 10.8266 10.8241 10.3333 10.4944C9.83993 10.1648 9.45542 9.69623 9.22835 9.14805C9.00129 8.59987 8.94188 7.99667 9.05764 7.41473C9.17339 6.83279 9.45911 6.29824 9.87867 5.87868C10.2982 5.45912 10.8328 5.1734 11.4147 5.05764C11.9967 4.94189 12.5999 5.0013 13.148 5.22836C13.6962 5.45542 14.1648 5.83994 14.4944 6.33329C14.824 6.82664 15 7.40666 15 8C15 8.79565 14.6839 9.55871 14.1213 10.1213C13.5587 10.6839 12.7956 11 12 11Z" fill="#7E8299"/>
                                                        </svg>
                                                        
                                                    <!-- <p>hi</p> -->
                                                

                                                    <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10" data-kt-menu="true" style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);" data-popper-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="http://127.0.0.1:8000/admin/footers/1/edit" class="menu-link px-3">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z" fill="#2A78C5"/>
                                                                    </svg>
                                                                    
                                                               <span style="color: #2A78C5;">Edit</span> 
                                                            </a>
                                                            <hr class="hr-fag">
                                                            <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z" fill="#FF5449"/>
                                                                    </svg>
                                                                    
                                                              <span style="color: #FF5449;">Delete</span>
                                                            </a>
                                                            <form action="http://127.0.0.1:8000/admin/footers/1" id="delete_form_1" method="POST">
                                                                <input type="hidden" name="_method" value="DELETE">                                <input type="hidden" name="_token" value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">                            </form>
                                                        </div>
                                                    </div>

                                               
                                                </td>
                                            </tr>
                                            <tr class="tri11">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                        <input class="checking" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <a href="#" class="text-gray-800 text-hover-primary">Home
                                                            Page</a>
                                                    </div>
                                                </td>
                                                <td>/index</td>
                                                <td>Roya245</td>
                                                <td>August 19, 2022</td>
                                                <td>
                                                    <div class="status-baring">
                                                        <div class="reding"></div>
                                                        <p>Inactive</p>
                                                        <img src="{{asset('backend/admin/images/img/bottomDrop.png')}}" alt="bottom">
                                                    </div>

                                                </td>
                                                <td>
                                                    <!-- <div class="roting">
                                                        <div class="action-fas">
                                                            <img src="{{asset('backend/admin/images/img/threeDot.png')}}" alt="">
                                                        </div>
                                                        <div class="active-inActive active1-inactive1">
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <img src="{{asset('backend/admin/images/img/edit.png')}}" alt="">
                                                                <p class=" edit1">Edit</p>
                                                            </div>
                                                            <div class="line-div"></div>
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <img src="{{asset('backend/admin/images/img/delete.png')}}" alt="">
                                                                <p class=" delete1">Delete</p>
                                                            </div>
                                                        </div>
                                                        <div class="sisi">
                                                            <img src="{{asset('backend/admin/images/img/akhji.png')}}" alt="">
                                                        </div>
                                                    </div> -->
                                                   
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer show menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="left-start">
                                                        <circle cx="15" cy="15" r="14.5" fill="white" stroke="#E1E3EA"></circle>
                                                        <path d="M10.9993 13.6667C10.266 13.6667 9.66602 14.2667 9.66602 15C9.66602 15.7333 10.266 16.3333 10.9993 16.3333C11.7327 16.3333 12.3327 15.7333 12.3327 15C12.3327 14.2667 11.7327 13.6667 10.9993 13.6667ZM18.9993 13.6667C18.266 13.6667 17.666 14.2667 17.666 15C17.666 15.7333 18.266 16.3333 18.9993 16.3333C19.7327 16.3333 20.3327 15.7333 20.3327 15C20.3327 14.2667 19.7327 13.6667 18.9993 13.6667ZM14.9993 13.6667C14.266 13.6667 13.666 14.2667 13.666 15C13.666 15.7333 14.266 16.3333 14.9993 16.3333C15.7327 16.3333 16.3327 15.7333 16.3327 15C16.3327 14.2667 15.7327 13.6667 14.9993 13.6667Z" fill="#5E6278"></path>
                                                    </svg>
                                                    <svg class="tyu" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M23.1853 7.69625C23.1525 7.62219 22.3584 5.86062 20.5931 4.09531C18.2409 1.74312 15.27 0.5 12 0.5C8.72999 0.5 5.75905 1.74312 3.40687 4.09531C1.64155 5.86062 0.843741 7.625 0.814679 7.69625C0.772035 7.79217 0.75 7.89597 0.75 8.00094C0.75 8.10591 0.772035 8.20971 0.814679 8.30562C0.847491 8.37969 1.64155 10.1403 3.40687 11.9056C5.75905 14.2569 8.72999 15.5 12 15.5C15.27 15.5 18.2409 14.2569 20.5931 11.9056C22.3584 10.1403 23.1525 8.37969 23.1853 8.30562C23.2279 8.20971 23.25 8.10591 23.25 8.00094C23.25 7.89597 23.2279 7.79217 23.1853 7.69625ZM12 14C9.11437 14 6.59343 12.9509 4.50655 10.8828C3.65028 10.0313 2.92179 9.06027 2.34374 8C2.92164 6.93963 3.65014 5.9686 4.50655 5.11719C6.59343 3.04906 9.11437 2 12 2C14.8856 2 17.4066 3.04906 19.4934 5.11719C20.3514 5.9684 21.0815 6.93942 21.6609 8C20.985 9.26188 18.0403 14 12 14ZM12 3.5C11.11 3.5 10.2399 3.76392 9.49993 4.25839C8.7599 4.75285 8.18313 5.45566 7.84253 6.27792C7.50194 7.10019 7.41282 8.00499 7.58646 8.87791C7.76009 9.75082 8.18867 10.5526 8.81801 11.182C9.44735 11.8113 10.2492 12.2399 11.1221 12.4135C11.995 12.5872 12.8998 12.4981 13.7221 12.1575C14.5443 11.8169 15.2471 11.2401 15.7416 10.5001C16.2361 9.76005 16.5 8.89002 16.5 8C16.4988 6.80691 16.0242 5.66303 15.1806 4.81939C14.337 3.97575 13.1931 3.50124 12 3.5ZM12 11C11.4066 11 10.8266 10.8241 10.3333 10.4944C9.83993 10.1648 9.45542 9.69623 9.22835 9.14805C9.00129 8.59987 8.94188 7.99667 9.05764 7.41473C9.17339 6.83279 9.45911 6.29824 9.87867 5.87868C10.2982 5.45912 10.8328 5.1734 11.4147 5.05764C11.9967 4.94189 12.5999 5.0013 13.148 5.22836C13.6962 5.45542 14.1648 5.83994 14.4944 6.33329C14.824 6.82664 15 7.40666 15 8C15 8.79565 14.6839 9.55871 14.1213 10.1213C13.5587 10.6839 12.7956 11 12 11Z" fill="#7E8299"/>
                                                        </svg>
                                                        
                                                    <!-- <p>hi</p> -->
                                                

                                                    <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10" data-kt-menu="true" style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);" data-popper-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="http://127.0.0.1:8000/admin/footers/1/edit" class="menu-link px-3">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z" fill="#2A78C5"/>
                                                                    </svg>
                                                                    
                                                               <span style="color: #2A78C5;">Edit</span> 
                                                            </a>
                                                            <hr class="hr-fag">
                                                            <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z" fill="#FF5449"/>
                                                                    </svg>
                                                                    
                                                              <span style="color: #FF5449;">Delete</span>
                                                            </a>
                                                            <form action="http://127.0.0.1:8000/admin/footers/1" id="delete_form_1" method="POST">
                                                                <input type="hidden" name="_method" value="DELETE">                                <input type="hidden" name="_token" value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">                            </form>
                                                        </div>
                                                    </div>

                                               
                                                </td>
                                            </tr>
                                            <tr class="tri11">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                        <input class="checking" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <a href="#" class="text-gray-800 text-hover-primary">Home
                                                            Page</a>
                                                    </div>
                                                </td>
                                                <td>/index</td>
                                                <td>Roya245</td>
                                                <td>August 19, 2022</td>
                                                <td>
                                                    <div class="status-baring">
                                                        <div class="reding"></div>
                                                        <p>Inactive</p>
                                                        <img src="{{asset('backend/admin/images/img/bottomDrop.png')}}" alt="bottom">
                                                    </div>

                                                </td>
                                                <td>
                                                    <!-- <div class="roting">
                                                        <div class="action-fas">
                                                            <img src="{{asset('backend/admin/images/img/threeDot.png')}}" alt="">
                                                        </div>
                                                        <div class="active-inActive active1-inactive1">
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <img src="{{asset('backend/admin/images/img/edit.png')}}" alt="">
                                                                <p class=" edit1">Edit</p>
                                                            </div>
                                                            <div class="line-div"></div>
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <img src="{{asset('backend/admin/images/img/delete.png')}}" alt="">
                                                                <p class=" delete1">Delete</p>
                                                            </div>
                                                        </div>
                                                        <div class="sisi">
                                                            <img src="{{asset('backend/admin/images/img/akhji.png')}}" alt="">
                                                        </div>
                                                    </div> -->
                                                   
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer show menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="left-start">
                                                        <circle cx="15" cy="15" r="14.5" fill="white" stroke="#E1E3EA"></circle>
                                                        <path d="M10.9993 13.6667C10.266 13.6667 9.66602 14.2667 9.66602 15C9.66602 15.7333 10.266 16.3333 10.9993 16.3333C11.7327 16.3333 12.3327 15.7333 12.3327 15C12.3327 14.2667 11.7327 13.6667 10.9993 13.6667ZM18.9993 13.6667C18.266 13.6667 17.666 14.2667 17.666 15C17.666 15.7333 18.266 16.3333 18.9993 16.3333C19.7327 16.3333 20.3327 15.7333 20.3327 15C20.3327 14.2667 19.7327 13.6667 18.9993 13.6667ZM14.9993 13.6667C14.266 13.6667 13.666 14.2667 13.666 15C13.666 15.7333 14.266 16.3333 14.9993 16.3333C15.7327 16.3333 16.3327 15.7333 16.3327 15C16.3327 14.2667 15.7327 13.6667 14.9993 13.6667Z" fill="#5E6278"></path>
                                                    </svg>
                                                    <svg class="tyu" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M23.1853 7.69625C23.1525 7.62219 22.3584 5.86062 20.5931 4.09531C18.2409 1.74312 15.27 0.5 12 0.5C8.72999 0.5 5.75905 1.74312 3.40687 4.09531C1.64155 5.86062 0.843741 7.625 0.814679 7.69625C0.772035 7.79217 0.75 7.89597 0.75 8.00094C0.75 8.10591 0.772035 8.20971 0.814679 8.30562C0.847491 8.37969 1.64155 10.1403 3.40687 11.9056C5.75905 14.2569 8.72999 15.5 12 15.5C15.27 15.5 18.2409 14.2569 20.5931 11.9056C22.3584 10.1403 23.1525 8.37969 23.1853 8.30562C23.2279 8.20971 23.25 8.10591 23.25 8.00094C23.25 7.89597 23.2279 7.79217 23.1853 7.69625ZM12 14C9.11437 14 6.59343 12.9509 4.50655 10.8828C3.65028 10.0313 2.92179 9.06027 2.34374 8C2.92164 6.93963 3.65014 5.9686 4.50655 5.11719C6.59343 3.04906 9.11437 2 12 2C14.8856 2 17.4066 3.04906 19.4934 5.11719C20.3514 5.9684 21.0815 6.93942 21.6609 8C20.985 9.26188 18.0403 14 12 14ZM12 3.5C11.11 3.5 10.2399 3.76392 9.49993 4.25839C8.7599 4.75285 8.18313 5.45566 7.84253 6.27792C7.50194 7.10019 7.41282 8.00499 7.58646 8.87791C7.76009 9.75082 8.18867 10.5526 8.81801 11.182C9.44735 11.8113 10.2492 12.2399 11.1221 12.4135C11.995 12.5872 12.8998 12.4981 13.7221 12.1575C14.5443 11.8169 15.2471 11.2401 15.7416 10.5001C16.2361 9.76005 16.5 8.89002 16.5 8C16.4988 6.80691 16.0242 5.66303 15.1806 4.81939C14.337 3.97575 13.1931 3.50124 12 3.5ZM12 11C11.4066 11 10.8266 10.8241 10.3333 10.4944C9.83993 10.1648 9.45542 9.69623 9.22835 9.14805C9.00129 8.59987 8.94188 7.99667 9.05764 7.41473C9.17339 6.83279 9.45911 6.29824 9.87867 5.87868C10.2982 5.45912 10.8328 5.1734 11.4147 5.05764C11.9967 4.94189 12.5999 5.0013 13.148 5.22836C13.6962 5.45542 14.1648 5.83994 14.4944 6.33329C14.824 6.82664 15 7.40666 15 8C15 8.79565 14.6839 9.55871 14.1213 10.1213C13.5587 10.6839 12.7956 11 12 11Z" fill="#7E8299"/>
                                                        </svg>
                                                        
                                                    <!-- <p>hi</p> -->
                                                

                                                    <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10" data-kt-menu="true" style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);" data-popper-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="http://127.0.0.1:8000/admin/footers/1/edit" class="menu-link px-3">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z" fill="#2A78C5"/>
                                                                    </svg>
                                                                    
                                                               <span style="color: #2A78C5;">Edit</span> 
                                                            </a>
                                                            <hr class="hr-fag">
                                                            <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z" fill="#FF5449"/>
                                                                    </svg>
                                                                    
                                                              <span style="color: #FF5449;">Delete</span>
                                                            </a>
                                                            <form action="http://127.0.0.1:8000/admin/footers/1" id="delete_form_1" method="POST">
                                                                <input type="hidden" name="_method" value="DELETE">                                <input type="hidden" name="_token" value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">                            </form>
                                                        </div>
                                                    </div>

                                               
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="next-prev">
                                        <img class="nest nest3" src="{{asset('backend/admin/images/img/leftsa.png')}}" alt="">
                                        <div class=" d-flex align-content-center justify-content-center nest nest1">
                                            <p class="nest2">Prev</p>
                                            <div class="shambu nest2">
                                                <p>1</p>
                                            </div>
                                            <p class="nest2">Next</p>
                                        </div>
                                        <img class="nest nest3" src="{{asset('backend/admin/images/img/rightsa.png')}}" alt="">
                                    </div>
                                    <!--end::Table-->
                                </div>


                                <!--end::Card body-->
                            </div>

                            <!--end::Card-->
                            <!--begin::Upload template-->
                            <table class="d-none">
                                <tr id="kt_file_manager_new_folder_row" data-kt-filemanager-template="upload">
                                    <td></td>
                                    <td id="kt_file_manager_add_folder_form" class="fv-row">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Folder icon-->
                                            <span id="kt_file_manager_folder_icon">
                                                <i class="ki-duotone ki-folder fs-2x text-primary me-4">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <!--end::Folder icon-->
                                            <!--begin:Input-->
                                            <input type="text" name="new_folder_name"
                                                placeholder="Enter the folder name" class="form-control mw-250px me-3" />
                                            <!--end:Input-->
                                            <!--begin:Submit button-->
                                            <button class="btn btn-icon btn-light-primary me-3"
                                                id="kt_file_manager_add_folder">
                                                <span class="indicator-label">
                                                    <i class="ki-duotone ki-check fs-1"></i>
                                                </span>
                                                <span class="indicator-progress">
                                                    <span class="spinner-border spinner-border-sm align-middle"></span>
                                                </span>
                                            </button>
                                            <!--end:Submit button-->
                                            <!--begin:Cancel button-->
                                            <button class="btn btn-icon btn-light-danger"
                                                id="kt_file_manager_cancel_folder">
                                                <span class="indicator-label">
                                                    <i class="ki-duotone ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                                <span class="indicator-progress">
                                                    <span class="spinner-border spinner-border-sm align-middle"></span>
                                                </span>
                                            </button>
                                            <!--end:Cancel button-->
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                            <!--end::Upload template-->
                            <!--begin::Rename template-->
                            <div class="d-none" data-kt-filemanager-template="rename">
                                <div class="fv-row">
                                    <div class="d-flex align-items-center">
                                        <span id="kt_file_manager_rename_folder_icon"></span>
                                        <input type="text" id="kt_file_manager_rename_input" name="rename_folder_name"
                                            placeholder="Enter the new folder name" class="form-control mw-250px me-3"
                                            value="" />
                                        <button class="btn btn-icon btn-light-primary me-3"
                                            id="kt_file_manager_rename_folder">
                                            <i class="ki-duotone ki-check fs-1"></i>
                                        </button>
                                        <button class="btn btn-icon btn-light-danger"
                                            id="kt_file_manager_rename_folder_cancel">
                                            <span class="indicator-label">
                                                <i class="ki-duotone ki-cross fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <span class="indicator-progress">
                                                <span class="spinner-border spinner-border-sm align-middle"></span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Rename template-->
                            <!--begin::Action template-->
                            <div class="d-none" data-kt-filemanager-template="action">
                                <div class="d-flex justify-content-end">
                                    <!--begin::Share link-->
                                    <div class="ms-2" data-kt-filemanger-table="copy_link">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-fasten fs-5 m-0">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-300px"
                                            data-kt-menu="true">
                                            <!--begin::Card-->
                                            <div class="card card-flush card-slush">
                                                <div class="card-body p-5">
                                                    <!--begin::Loader-->
                                                    <div class="d-flex" data-kt-filemanger-table="copy_link_generator">
                                                        <!--begin::Spinner-->
                                                        <div class="me-5" data-kt-indicator="on">
                                                            <span class="indicator-progress">
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
                                                        </div>
                                                        <!--end::Spinner-->
                                                        <!--begin::Label-->
                                                        <div class="fs-6 text-dark">Generating Share Link...
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Loader-->
                                                    <!--begin::Link-->
                                                    <div class="d-flex flex-column text-start d-none"
                                                        data-kt-filemanger-table="copy_link_result">
                                                        <div class="d-flex mb-3">
                                                            <i class="ki-duotone ki-check fs-2 text-success me-3"></i>
                                                            <div class="fs-6 text-dark">Share Link Generated
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="https://path/to/file/or/folder/" />
                                                        <div class="text-muted fw-normal mt-2 fs-8 px-3">
                                                            Read only.
                                                            <a href="../../demo1/dist/apps/file-manager/settings/.html"
                                                                class="ms-2">Change
                                                                permissions</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Link-->
                                                </div>
                                            </div>
                                            <!--end::Card-->
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Share link-->
                                    <!--begin::More-->
                                    <div class="ms-2">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-dots-square fs-5 m-0">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </button>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Download File</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3"
                                                    data-kt-filemanager-table="rename">Rename</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3"
                                                    data-kt-filemanager-table-filter="move_row" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_move_to_folder">Move to
                                                    folder</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link text-danger px-3"
                                                    data-kt-filemanager-table-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::More-->
                                </div>
                            </div>
                            <!--end::Action template-->
                            <!--begin::Checkbox template-->
                            <div class="d-none" data-kt-filemanager-template="checkbox">
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </div>
                            <!--end::Checkbox template-->
                            <!--begin::Modals-->
                            <!--begin::Modal - Upload File-->
                            <div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Form-->
                                        <form class="form" action="none" id="kt_modal_upload_form">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Upload files</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                    data-bs-dismiss="modal">
                                                    <i class="ki-duotone ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body pt-10 pb-15 px-lg-17">
                                                <!--begin::Input group-->
                                                <div class="form-group">
                                                    <!--begin::Dropzone-->
                                                    <div class="dropzone dropzone-queue mb-2"
                                                        id="kt_modal_upload_dropzone">
                                                        <!--begin::Controls-->
                                                        <div class="dropzone-panel mb-4">
                                                            <a class="dropzone-select btn btn-sm btn-primary me-2">Attach
                                                                files</a>
                                                            <a class="dropzone-upload btn btn-sm btn-light-primary me-2">Upload
                                                                All</a>
                                                            <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove
                                                                All</a>
                                                        </div>
                                                        <!--end::Controls-->
                                                        <!--begin::Items-->
                                                        <div class="dropzone-items wm-200px">
                                                            <div class="dropzone-item p-5" style="display:none">
                                                                <!--begin::File-->
                                                                <div class="dropzone-file">
                                                                    <div class="dropzone-filename text-dark"
                                                                        title="some_image_file_name.jpg">
                                                                        <span
                                                                            data-dz-name="">some_image_file_name.jpg</span>
                                                                        <strong>(
                                                                            <span data-dz-size="">340kb</span>)</strong>
                                                                    </div>
                                                                    <div class="dropzone-error mt-0"
                                                                        data-dz-errormessage=""></div>
                                                                </div>
                                                                <!--end::File-->
                                                                <!--begin::Progress-->
                                                                <div class="dropzone-progress">
                                                                    <div class="progress bg-gray-300">
                                                                        <div class="progress-bar bg-primary"
                                                                            role="progressbar" aria-valuemin="0"
                                                                            aria-valuemax="100" aria-valuenow="0"
                                                                            data-dz-uploadprogress=""></div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Progress-->
                                                                <!--begin::Toolbar-->
                                                                <div class="dropzone-toolbar">
                                                                    <span class="dropzone-start">
                                                                        <i class="ki-duotone ki-to-right fs-1"></i>
                                                                    </span>
                                                                    <span class="dropzone-cancel" data-dz-remove=""
                                                                        style="display: none;">
                                                                        <i class="ki-duotone ki-cross fs-2">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </span>
                                                                    <span class="dropzone-delete" data-dz-remove="">
                                                                        <i class="ki-duotone ki-cross fs-2">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </span>
                                                                </div>
                                                                <!--end::Toolbar-->
                                                            </div>
                                                        </div>
                                                        <!--end::Items-->
                                                    </div>
                                                    <!--end::Dropzone-->
                                                    <!--begin::Hint-->
                                                    <span class="form-text fs-6 text-muted">Max file size is
                                                        1MB per file.</span>
                                                    <!--end::Hint-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Modal body-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Modal - Upload File-->
                            <!--begin::Modal - New Product-->
                            <div class="modal fade" id="kt_modal_move_to_folder" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Form-->
                                        <form class="form" action="#" id="kt_modal_move_to_folder_form">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Move to folder</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                    data-bs-dismiss="modal">
                                                    <i class="ki-duotone ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body pt-10 pb-15 px-lg-17">
                                                <!--begin::Input group-->
                                                <div class="form-group fv-row">
                                                    <!--begin::Item-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="move_to_folder"
                                                                type="radio" value="0"
                                                                id="kt_modal_move_to_folder_0" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                for="kt_modal_move_to_folder_0">
                                                                <div class="fw-bold">
                                                                    <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>account
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Item-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="move_to_folder"
                                                                type="radio" value="1"
                                                                id="kt_modal_move_to_folder_1" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                for="kt_modal_move_to_folder_1">
                                                                <div class="fw-bold">
                                                                    <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>apps
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Item-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="move_to_folder"
                                                                type="radio" value="2"
                                                                id="kt_modal_move_to_folder_2" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                for="kt_modal_move_to_folder_2">
                                                                <div class="fw-bold">
                                                                    <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>widgets
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Item-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="move_to_folder"
                                                                type="radio" value="3"
                                                                id="kt_modal_move_to_folder_3" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                for="kt_modal_move_to_folder_3">
                                                                <div class="fw-bold">
                                                                    <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>assets
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Item-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="move_to_folder"
                                                                type="radio" value="4"
                                                                id="kt_modal_move_to_folder_4" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                for="kt_modal_move_to_folder_4">
                                                                <div class="fw-bold">
                                                                    <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>documentation
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Item-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="move_to_folder"
                                                                type="radio" value="5"
                                                                id="kt_modal_move_to_folder_5" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                for="kt_modal_move_to_folder_5">
                                                                <div class="fw-bold">
                                                                    <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>layouts
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Item-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="move_to_folder"
                                                                type="radio" value="6"
                                                                id="kt_modal_move_to_folder_6" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                for="kt_modal_move_to_folder_6">
                                                                <div class="fw-bold">
                                                                    <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>modals
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Item-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="move_to_folder"
                                                                type="radio" value="7"
                                                                id="kt_modal_move_to_folder_7" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                for="kt_modal_move_to_folder_7">
                                                                <div class="fw-bold">
                                                                    <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>authentication
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Item-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="move_to_folder"
                                                                type="radio" value="8"
                                                                id="kt_modal_move_to_folder_8" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                for="kt_modal_move_to_folder_8">
                                                                <div class="fw-bold">
                                                                    <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>dashboards
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Item-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="move_to_folder"
                                                                type="radio" value="9"
                                                                id="kt_modal_move_to_folder_9" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                for="kt_modal_move_to_folder_9">
                                                                <div class="fw-bold">
                                                                    <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>pages
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Action buttons-->
                                                <div class="d-flex flex-center mt-12">
                                                    <!--begin::Button-->
                                                    <button type="button" class="btn btn-primary"
                                                        id="kt_modal_move_to_folder_submit">
                                                        <span class="indicator-label">Save</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                                <!--begin::Action buttons-->
                                            </div>
                                            <!--end::Modal body-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Modal - Move file-->
                            <!--end::Modals-->
                        </div>
                    </div>



                </div>
                <!--end::Content container-->
            </div>
        </div>
    </div>
    <script>
        $('#secta').on('click', function () {
        $('#kt_modal_1').modal('show');
    });
  </script>
    <script>
        let more_filt = document.getElementById("more_filt");
        more_filt.addEventListener("click",(e)=>{
            console.log(e);
            document.getElementById("far").style.left="0px"
        })
      var modal = document.getElementById("far");
       window.onclick = function(event){
         if(event.target === modal){
           modal.style.left = "100%"
         }
       }

    //    ======================logic to click cross================ 
       let crosst = document.getElementById("crosst").addEventListener("click",(e)=>{
          document.getElementById("far").style.left="100%";
       })

    //    ========================
   
    </script>

   
@endsection
