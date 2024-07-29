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
        <div class="app-content app-content1 flex-column-fluid">
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

                   
                    <div class="modal  fade" tabindex="-1" id="kt_modal_1">
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
                                <button data-bs-dismiss="modal"  class="cancel">Cancel</button>
                            </div>
  
                          </div>
                        </div>
                      </div>
                    </div>
                  

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
                                <i class="ki-duotone ki-bab ki-magnifier fs-1 position-absolute ms-6">
                                  <span class="path1"></span>
                                  <span class="path2"></span>
                                </i>
                                <input  type="text" data-kt-filemanager-table-filter="search"
                                  class="form-control form-control-solid search-das w-250px ps-15"
                                  placeholder="Search Pages" />
                              </div>
                              <div id="more_filt" class="d-flex align-items-center justify-content-center danda">
                                <img src="{{asset('backend/admin/images/img/danda.png')}}" alt="danda">
                                <p>More Filters</p>
                              </div>
                            </div>
                            <!--end::Search-->
                          </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body card-body4 card-si">
                          <!--begin::Table-->
                          <table id="kt_file_manager_list" data-kt-filemanager-table="files"
                            class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead class="suching">
                              <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0 tr-fash">
                                <th class="w-10px pe-2">
                                  <div class="form-check form-check-sm form-check-custom form-check-solid me-3 sights">
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


                          </table>
                          <div class="no-img">
                            <img src="{{asset('backend/admin/images/img/site.png')}}" alt="">
                            <h3>No pages to display!</h3>
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
                              <input type="text" name="new_folder_name" placeholder="Enter the folder name"
                                class="form-control mw-250px me-3" />
                              <!--end:Input-->
                              <!--begin:Submit button-->
                              <button class="btn btn-icon btn-light-primary me-3" id="kt_file_manager_add_folder">
                                <span class="indicator-label">
                                  <i class="ki-duotone ki-check fs-1"></i>
                                </span>
                                <span class="indicator-progress">
                                  <span class="spinner-border spinner-border-sm align-middle"></span>
                                </span>
                              </button>
                              <!--end:Submit button-->
                              <!--begin:Cancel button-->
                              <button class="btn btn-icon btn-light-danger" id="kt_file_manager_cancel_folder">
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
                              placeholder="Enter the new folder name" class="form-control mw-250px me-3" value="" />
                            <button class="btn btn-icon btn-light-primary me-3" id="kt_file_manager_rename_folder">
                              <i class="ki-duotone ki-check fs-1"></i>
                            </button>
                            <button class="btn btn-icon btn-light-danger" id="kt_file_manager_rename_folder_cancel">
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
                            <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                              data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                              <i class="ki-duotone ki-fasten fs-5 m-0">
                                <span class="path1"></span>
                                <span class="path2"></span>
                              </i>
                            </button>
                            <!--begin::Menu-->
                            <div
                              class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-300px"
                              data-kt-menu="true">
                              <!--begin::Card-->
                              <div class="card card-flush card-slush">
                                <div class="card-body p-5">
                                  <!--begin::Loader-->
                                  <div class="d-flex" data-kt-filemanger-table="copy_link_generator">
                                    <!--begin::Spinner-->
                                    <div class="me-5" data-kt-indicator="on">
                                      <span class="indicator-progress">
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
                                      <a href="../../demo1/dist/apps/file-manager/settings/.html" class="ms-2">Change
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
                            <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                              data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                              <i class="ki-duotone ki-dots-square fs-5 m-0">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                              </i>
                            </button>
                            <!--begin::Menu-->
                            <div
                              class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                              data-kt-menu="true">
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Download File</a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-filemanager-table="rename">Rename</a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-filemanager-table-filter="move_row"
                                  data-bs-toggle="modal" data-bs-target="#kt_modal_move_to_folder">Move to
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
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                                  <div class="dropzone dropzone-queue mb-2" id="kt_modal_upload_dropzone">
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
                                          <div class="dropzone-filename text-dark" title="some_image_file_name.jpg">
                                            <span data-dz-name="">some_image_file_name.jpg</span>
                                            <strong>(
                                              <span data-dz-size="">340kb</span>)</strong>
                                          </div>
                                          <div class="dropzone-error mt-0" data-dz-errormessage=""></div>
                                        </div>
                                        <!--end::File-->
                                        <!--begin::Progress-->
                                        <div class="dropzone-progress">
                                          <div class="progress bg-gray-300">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0"
                                              aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                          </div>
                                        </div>
                                        <!--end::Progress-->
                                        <!--begin::Toolbar-->
                                        <div class="dropzone-toolbar">
                                          <span class="dropzone-start">
                                            <i class="ki-duotone ki-to-right fs-1"></i>
                                          </span>
                                          <span class="dropzone-cancel" data-dz-remove="" style="display: none;">
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
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                                      <input class="form-check-input me-3" name="move_to_folder" type="radio" value="0"
                                        id="kt_modal_move_to_folder_0" />
                                      <!--end::Input-->
                                      <!--begin::Label-->
                                      <label class="form-check-label" for="kt_modal_move_to_folder_0">
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
                                      <input class="form-check-input me-3" name="move_to_folder" type="radio" value="1"
                                        id="kt_modal_move_to_folder_1" />
                                      <!--end::Input-->
                                      <!--begin::Label-->
                                      <label class="form-check-label" for="kt_modal_move_to_folder_1">
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
                                      <input class="form-check-input me-3" name="move_to_folder" type="radio" value="2"
                                        id="kt_modal_move_to_folder_2" />
                                      <!--end::Input-->
                                      <!--begin::Label-->
                                      <label class="form-check-label" for="kt_modal_move_to_folder_2">
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
                                      <input class="form-check-input me-3" name="move_to_folder" type="radio" value="3"
                                        id="kt_modal_move_to_folder_3" />
                                      <!--end::Input-->
                                      <!--begin::Label-->
                                      <label class="form-check-label" for="kt_modal_move_to_folder_3">
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
                                      <input class="form-check-input me-3" name="move_to_folder" type="radio" value="4"
                                        id="kt_modal_move_to_folder_4" />
                                      <!--end::Input-->
                                      <!--begin::Label-->
                                      <label class="form-check-label" for="kt_modal_move_to_folder_4">
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
                                      <input class="form-check-input me-3" name="move_to_folder" type="radio" value="5"
                                        id="kt_modal_move_to_folder_5" />
                                      <!--end::Input-->
                                      <!--begin::Label-->
                                      <label class="form-check-label" for="kt_modal_move_to_folder_5">
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
                                      <input class="form-check-input me-3" name="move_to_folder" type="radio" value="6"
                                        id="kt_modal_move_to_folder_6" />
                                      <!--end::Input-->
                                      <!--begin::Label-->
                                      <label class="form-check-label" for="kt_modal_move_to_folder_6">
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
                                      <input class="form-check-input me-3" name="move_to_folder" type="radio" value="7"
                                        id="kt_modal_move_to_folder_7" />
                                      <!--end::Input-->
                                      <!--begin::Label-->
                                      <label class="form-check-label" for="kt_modal_move_to_folder_7">
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
                                      <input class="form-check-input me-3" name="move_to_folder" type="radio" value="8"
                                        id="kt_modal_move_to_folder_8" />
                                      <!--end::Input-->
                                      <!--begin::Label-->
                                      <label class="form-check-label" for="kt_modal_move_to_folder_8">
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
                                      <input class="form-check-input me-3" name="move_to_folder" type="radio" value="9"
                                        id="kt_modal_move_to_folder_9" />
                                      <!--end::Input-->
                                      <!--begin::Label-->
                                      <label class="form-check-label" for="kt_modal_move_to_folder_9">
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
                                  <button type="button" class="btn btn-primary" id="kt_modal_move_to_folder_submit">
                                    <span class="indicator-label">Save</span>
                                    <span class="indicator-progress">Please wait...
                                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
});
  </script>
@endsection
