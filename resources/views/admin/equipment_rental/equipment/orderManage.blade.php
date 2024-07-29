@extends('admin.layouts.app')
@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div class="custom-app-toolbar">
        <div class="left">
            <p>Order Management</p>
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Orders</a>
                </li>
            </ul>
        </div>
        <div class="right">
        </div>
    </div>
    <!-- um-content -->
    <!-- flex-lg-row-fluid -->

    <div style="padding:0px 20px;" class="umi d-flex align-items-center justify-content-between">
        <ul class="nav um-nav-tabs" role="tablist">
            <li id="first-net" class="nav-item" role="presentation">
                <a id="serf" class="nav-link active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab"
                    aria-selected="true" role="tab">
                    All Orders
                </a>
            </li>

            <li id="second-net" class="nav-item" role="presentation">
                <a id="serf1" class="nav-link" data-bs-toggle="tab" href="#kt_customer_view_overview_activity_tab"
                    aria-selected="false" tabIndex={-1} role="tab">
                    Pending
                </a>
            </li>

            <li id="third-net" class="nav-item" role="presentation">
                <a id="serf2" class="nav-link" data-kt-countup-tabs="true" data-bs-toggle="tab"
                    href="#kt_customer_view_overview_security" data-kt-initialized={1} aria-selected="false"
                    tabIndex={-1} role="tab">
                    Complete
                </a>
            </li>


        </ul>

        <div class="mant_btn">
            <button>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.9987 9.50065V12.0007H1.9987V9.50065H0.332031V12.0007C0.332031 12.9173 1.08203 13.6673 1.9987 13.6673H11.9987C12.9154 13.6673 13.6654 12.9173 13.6654 12.0007V9.50065H11.9987ZM11.1654 6.16732L9.99036 4.99232L7.83203 7.14232V0.333984H6.16536V7.14232L4.00703 4.99232L2.83203 6.16732L6.9987 10.334L11.1654 6.16732Z"
                        fill="#205A95" />
                </svg>
                <span>Export</span>
            </button>
        </div>


    </div>


    <!--end::Toolbar-->

    <!--begin::Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">


            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active activity1" id="kt_customer_view_overview_tab" role="tabpanel"
                    aria-labelledby="#serf">

                    <div class="card card-flush card-body2 card-slush mt-6">

                        <!--begin::Card header-->
                        <div class="card-header pt-8">
                            <!--begin::Search-->
                            <div class="all_order all_order1">
                                <h3>All Orders</h3>
                            </div>
                            <div class="d-flex align-items-center search-das1 position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-filemanager-table-filter="search"
                                    class="form-control form-control-solid back_trans  search-fas1 w-250px ps-15"
                                    placeholder="Search.." />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!-- <div class="site-sel">
                         </div> -->
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body card-body4 card-si">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table id="kt_file_manager_list" data-kt-filemanager-table="files"
                                    class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead class="suching">
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0  tr-fash1">
                                            <th class="w-10px pe-2">
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-3 sights">
                                                    <input class="checking" type="checkbox" />
                                                </div>
                                            </th>
                                            <th class=" name45">ID</th>
                                            <th class=" name45">Product Name</th>
                                            <th class=" name45">Date/Time</th>
                                            <th class=" name45">Status</th>
                                            <th class=" name45">Payment</th>
                                            <th class=" name45">Total</th>
                                            <th class=" name45">Item</th>
                                            <th class="name45">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr class="tri11 tr4353">
                                            <td>
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                    <input class="checking" type="checkbox">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <a href="#" class="text-gray-800 text-hover-primary">1</a>
                                                </div>
                                            </td>
                                            <td>Camping Tent 2 Seconds - 2-Person</td>
                                            <td>5/30/14</td>
                                            <td>
                                                <button class="cmp_button">Complete</button>
                                            </td>
                                            <td>
                                                <span class="okline">Online</span>
                                            </td>
                                            <td>
                                                $65.00
                                            </td>
                                            <td>
                                                <span>2</span>
                                            </td>

                                            <td>
                                                <svg data-kt-menu-trigger="click" width="32" height="32"
                                                    viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                                    <path
                                                        d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                                        fill="#7E8299" />
                                                </svg>




                                                <!-- <p>hi</p> -->


                                                <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                                    data-kt-menu="true"
                                                    style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                                    data-popper-placement="left-start">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="http://127.0.0.1:8000/admin/footers/1/edit"
                                                            class="menu-link px-3">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                                    fill="#2A78C5" />
                                                            </svg>

                                                            <span style="color: #2A78C5;">Edit</span>
                                                        </a>
                                                        <hr class="hr-fag">
                                                        <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                                    fill="#FF5449" />
                                                            </svg>

                                                            <span style="color: #FF5449;">Delete</span>
                                                        </a>
                                                        <form action="http://127.0.0.1:8000/admin/footers/1"
                                                            id="delete_form_1" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE"> <input
                                                                type="hidden" name="_token"
                                                                value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="tri11 tr4353">
                                            <td>
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                    <input class="checking" type="checkbox">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <a href="#" class="text-gray-800 text-hover-primary">2</a>
                                                </div>
                                            </td>
                                            <td>Back Pack 50 L</td>
                                            <td>5/30/14</td>
                                            <td>
                                                <button class="cmp_button cmp_pending">Pending</button>
                                            </td>
                                            <td>
                                                <span class="okline">Online</span>
                                            </td>
                                            <td>
                                                $65.00
                                            </td>
                                            <td>
                                                <span>2</span>
                                            </td>

                                            <td>
                                                <svg data-kt-menu-trigger="click" width="32" height="32"
                                                    viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                                    <path
                                                        d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                                        fill="#7E8299" />
                                                </svg>




                                                <!-- <p>hi</p> -->


                                                <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                                    data-kt-menu="true"
                                                    style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                                    data-popper-placement="left-start">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="http://127.0.0.1:8000/admin/footers/1/edit"
                                                            class="menu-link px-3">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                                    fill="#2A78C5" />
                                                            </svg>

                                                            <span style="color: #2A78C5;">Edit</span>
                                                        </a>
                                                        <hr class="hr-fag">
                                                        <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                                    fill="#FF5449" />
                                                            </svg>

                                                            <span style="color: #FF5449;">Delete</span>
                                                        </a>
                                                        <form action="http://127.0.0.1:8000/admin/footers/1"
                                                            id="delete_form_1" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE"> <input
                                                                type="hidden" name="_token"
                                                                value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="tri11 tr4353">
                                            <td>
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                    <input class="checking" type="checkbox">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <a href="#" class="text-gray-800 text-hover-primary">3</a>
                                                </div>
                                            </td>
                                            <td>Quechua Arpenaz Camping 2-Person Tent</td>
                                            <td>5/30/14</td>
                                            <td>
                                                <button class="cmp_button cmp_cancel">Cancelled</button>
                                            </td>
                                            <td>
                                                <span class="okline">Online</span>
                                            </td>
                                            <td>
                                                $65.00
                                            </td>
                                            <td>
                                                <span>2</span>
                                            </td>

                                            <td>
                                                <svg data-kt-menu-trigger="click" width="32" height="32"
                                                    viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                                    <path
                                                        d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                                        fill="#7E8299" />
                                                </svg>




                                                <!-- <p>hi</p> -->


                                                <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                                    data-kt-menu="true"
                                                    style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                                    data-popper-placement="left-start">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="http://127.0.0.1:8000/admin/footers/1/edit"
                                                            class="menu-link px-3">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                                    fill="#2A78C5" />
                                                            </svg>

                                                            <span style="color: #2A78C5;">Edit</span>
                                                        </a>
                                                        <hr class="hr-fag">
                                                        <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                                    fill="#FF5449" />
                                                            </svg>

                                                            <span style="color: #FF5449;">Delete</span>
                                                        </a>
                                                        <form action="http://127.0.0.1:8000/admin/footers/1"
                                                            id="delete_form_1" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE"> <input
                                                                type="hidden" name="_token"
                                                                value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="next-prev next_prev1">
                                    <div class="pty_next1 d-flex align-items-center justify-content-between">
                                        <div class="gji">
                                            <p>Showing 1 to 06 of 10 entries</p>
                                        </div>
                                        <div class="pty_next d-flex align-items-center justify-content-center">
                                            <button class="prev">Previous</button>
                                            <div class="topo">
                                                <span>1</span>
                                            </div>
                                            <button class="nxt">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>

                    </div>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show" id='kt_customer_view_overview_activity_tab' role="tabpanel"
                        aria-labelledby="#serf1">
                        <div class="card card-flush card-body2 card-slush mt-6">

                            <!--begin::Card header-->
                            <div class="card-header pt-8">
                                <!--begin::Search-->
                                <div class="all_order all_order1">
                                    <h3>Pending</h3>
                                </div>
                                <div class="d-flex align-items-center search-das1 position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" data-kt-filemanager-table-filter="search"
                                        class="form-control form-control-solid back_trans  search-fas1 w-250px ps-15"
                                        placeholder="Search.." />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!-- <div class="site-sel">

</div> -->
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body card-body4 card-si ">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table id="kt_file_manager_list" data-kt-filemanager-table="files"
                                        class="table  align-middle table-row-dashed fs-6 gy-5">
                                        <thead class="suching">
                                            <tr
                                                class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0  tr-fash1">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3 sights">
                                                        <input class="checking" type="checkbox" />
                                                    </div>
                                                </th>
                                                <th class=" name45">ID</th>
                                                <th class=" name45">Product Name</th>
                                                <th class=" name45">Date/Time</th>
                                                <th class=" name45">Status</th>
                                                <th class=" name45">Payment</th>
                                                <th class=" name45">Total</th>
                                                <th class=" name45">Item</th>
                                                <th class="name45">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            <tr class="tri11 tr4353">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                        <input class="checking" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <a href="#" class="text-gray-800 text-hover-primary">1</a>
                                                    </div>
                                                </td>
                                                <td>Heavyweight T-Shirt</td>
                                                <td>5/30/14</td>
                                                <td>
                                                    <button class="cmp_button">Complete</button>
                                                </td>
                                                <td>
                                                    <span class="okline">Online</span>
                                                </td>
                                                <td>
                                                    $65.00
                                                </td>
                                                <td>
                                                    <span>2</span>
                                                </td>

                                                <td>
                                                    <svg data-kt-menu-trigger="click" width="32" height="32"
                                                        viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                                        <path
                                                            d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                                            fill="#7E8299" />
                                                    </svg>




                                                    <!-- <p>hi</p> -->


                                                    <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                                        data-kt-menu="true"
                                                        style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                                        data-popper-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="http://127.0.0.1:8000/admin/footers/1/edit"
                                                                class="menu-link px-3">
                                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                                        fill="#2A78C5" />
                                                                </svg>

                                                                <span style="color: #2A78C5;">Edit</span>
                                                            </a>
                                                            <hr class="hr-fag">
                                                            <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                <svg width="12" height="16" viewBox="0 0 12 16"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                                        fill="#FF5449" />
                                                                </svg>

                                                                <span style="color: #FF5449;">Delete</span>
                                                            </a>
                                                            <form action="http://127.0.0.1:8000/admin/footers/1"
                                                                id="delete_form_1" method="POST">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="tri11 tr4353">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                        <input class="checking" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <a href="#" class="text-gray-800 text-hover-primary">1</a>
                                                    </div>
                                                </td>
                                                <td>Heavyweight T-Shirt</td>
                                                <td>5/30/14</td>
                                                <td>
                                                    <button class="cmp_button cmp_pending">Pending</button>
                                                </td>
                                                <td>
                                                    <span class="okline">Online</span>
                                                </td>
                                                <td>
                                                    $65.00
                                                </td>
                                                <td>
                                                    <span>2</span>
                                                </td>

                                                <td>
                                                    <svg data-kt-menu-trigger="click" width="32" height="32"
                                                        viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                                        <path
                                                            d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                                            fill="#7E8299" />
                                                    </svg>




                                                    <!-- <p>hi</p> -->


                                                    <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                                        data-kt-menu="true"
                                                        style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                                        data-popper-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="http://127.0.0.1:8000/admin/footers/1/edit"
                                                                class="menu-link px-3">
                                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                                        fill="#2A78C5" />
                                                                </svg>

                                                                <span style="color: #2A78C5;">Edit</span>
                                                            </a>
                                                            <hr class="hr-fag">
                                                            <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                <svg width="12" height="16" viewBox="0 0 12 16"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                                        fill="#FF5449" />
                                                                </svg>

                                                                <span style="color: #FF5449;">Delete</span>
                                                            </a>
                                                            <form action="http://127.0.0.1:8000/admin/footers/1"
                                                                id="delete_form_1" method="POST">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="tri11 tr4353">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                        <input class="checking" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <a href="#" class="text-gray-800 text-hover-primary">1</a>
                                                    </div>
                                                </td>
                                                <td>Heavyweight T-Shirt</td>
                                                <td>5/30/14</td>
                                                <td>
                                                    <button class="cmp_button cmp_cancel">Cancelled</button>
                                                </td>
                                                <td>
                                                    <span class="okline">Online</span>
                                                </td>
                                                <td>
                                                    $65.00
                                                </td>
                                                <td>
                                                    <span>2</span>
                                                </td>

                                                <td>
                                                    <svg data-kt-menu-trigger="click" width="32" height="32"
                                                        viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                                        <path
                                                            d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                                            fill="#7E8299" />
                                                    </svg>




                                                    <!-- <p>hi</p> -->


                                                    <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                                        data-kt-menu="true"
                                                        style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                                        data-popper-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="http://127.0.0.1:8000/admin/footers/1/edit"
                                                                class="menu-link px-3">
                                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                                        fill="#2A78C5" />
                                                                </svg>

                                                                <span style="color: #2A78C5;">Edit</span>
                                                            </a>
                                                            <hr class="hr-fag">
                                                            <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                <svg width="12" height="16" viewBox="0 0 12 16"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                                        fill="#FF5449" />
                                                                </svg>

                                                                <span style="color: #FF5449;">Delete</span>
                                                            </a>
                                                            <form action="http://127.0.0.1:8000/admin/footers/1"
                                                                id="delete_form_1" method="POST">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="next-prev next_prev1">
                                        <div class="pty_next1 d-flex align-items-center justify-content-between">
                                            <div class="gji">
                                                <p>Showing 1 to 06 of 10 entries</p>
                                            </div>
                                            <div class="pty_next d-flex align-items-center justify-content-center">
                                                <button class="prev">Previous</button>
                                                <div class="topo">
                                                    <span>1</span>
                                                </div>
                                                <button class="nxt">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Table-->
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show" id='kt_customer_view_overview_security' role="tabpanel"
                            aria-labelledby="#serf2">
                            <div class="card card-flush card-body2 card-slush mt-6">

                                <!--begin::Card header-->
                                <div class="card-header pt-8">
                                    <!--begin::Search-->
                                    <div class="all_order all_order1">
                                        <h3>Complete</h3>
                                    </div>
                                    <div class="d-flex align-items-center search-das1 position-relative my-1">
                                        <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="text" data-kt-filemanager-table-filter="search"
                                            class="form-control form-control-solid back_trans  search-fas1 w-250px ps-15"
                                            placeholder="Search.." />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!-- <div class="site-sel">

</div> -->
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body card-body4 card-si">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table id="kt_file_manager_list" data-kt-filemanager-table="files"
                                            class="table align-middle table-row-dashed fs-6 gy-5">
                                            <thead class="suching">
                                                <tr
                                                    class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0  tr-fash1">
                                                    <th class="w-10px pe-2">
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-3 sights">
                                                            <input class="checking" type="checkbox" />
                                                        </div>
                                                    </th>
                                                    <th class=" name45">ID</th>
                                                    <th class=" name45">Product Name</th>
                                                    <th class=" name45">Date/Time</th>
                                                    <th class=" name45">Status</th>
                                                    <th class=" name45">Payment</th>
                                                    <th class=" name45">Total</th>
                                                    <th class=" name45">Item</th>
                                                    <th class="name45">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                                <tr class="tri11 tr4353">
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                            <input class="checking" type="checkbox">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <a href="#" class="text-gray-800 text-hover-primary">1</a>
                                                        </div>
                                                    </td>
                                                    <td>Heavyweight T-Shirt</td>
                                                    <td>5/30/14</td>
                                                    <td>
                                                        <button class="cmp_button">Complete</button>
                                                    </td>
                                                    <td>
                                                        <span class="okline">Online</span>
                                                    </td>
                                                    <td>
                                                        $65.00
                                                    </td>
                                                    <td>
                                                        <span>2</span>
                                                    </td>

                                                    <td>
                                                        <svg data-kt-menu-trigger="click" width="32" height="32"
                                                            viewBox="0 0 32 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                                            <path
                                                                d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                                                fill="#7E8299" />
                                                        </svg>




                                                        <!-- <p>hi</p> -->


                                                        <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                                            data-kt-menu="true"
                                                            style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                                            data-popper-placement="left-start">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="http://127.0.0.1:8000/admin/footers/1/edit"
                                                                    class="menu-link px-3">
                                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                                            fill="#2A78C5" />
                                                                    </svg>

                                                                    <span style="color: #2A78C5;">Edit</span>
                                                                </a>
                                                                <hr class="hr-fag">
                                                                <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                    <svg width="12" height="16" viewBox="0 0 12 16"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                                            fill="#FF5449" />
                                                                    </svg>

                                                                    <span style="color: #FF5449;">Delete</span>
                                                                </a>
                                                                <form action="http://127.0.0.1:8000/admin/footers/1"
                                                                    id="delete_form_1" method="POST">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token"
                                                                        value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="tri11 tr4353">
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                            <input class="checking" type="checkbox">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <a href="#" class="text-gray-800 text-hover-primary">1</a>
                                                        </div>
                                                    </td>
                                                    <td>Heavyweight T-Shirt</td>
                                                    <td>5/30/14</td>
                                                    <td>
                                                        <button class="cmp_button cmp_pending">Pending</button>
                                                    </td>
                                                    <td>
                                                        <span class="okline">Online</span>
                                                    </td>
                                                    <td>
                                                        $65.00
                                                    </td>
                                                    <td>
                                                        <span>2</span>
                                                    </td>

                                                    <td>
                                                        <svg data-kt-menu-trigger="click" width="32" height="32"
                                                            viewBox="0 0 32 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                                            <path
                                                                d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                                                fill="#7E8299" />
                                                        </svg>




                                                        <!-- <p>hi</p> -->


                                                        <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                                            data-kt-menu="true"
                                                            style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                                            data-popper-placement="left-start">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="http://127.0.0.1:8000/admin/footers/1/edit"
                                                                    class="menu-link px-3">
                                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                                            fill="#2A78C5" />
                                                                    </svg>

                                                                    <span style="color: #2A78C5;">Edit</span>
                                                                </a>
                                                                <hr class="hr-fag">
                                                                <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                    <svg width="12" height="16" viewBox="0 0 12 16"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                                            fill="#FF5449" />
                                                                    </svg>

                                                                    <span style="color: #FF5449;">Delete</span>
                                                                </a>
                                                                <form action="http://127.0.0.1:8000/admin/footers/1"
                                                                    id="delete_form_1" method="POST">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token"
                                                                        value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="tri11 tr4353">
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid sights">
                                                            <input class="checking" type="checkbox">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <a href="#" class="text-gray-800 text-hover-primary">1</a>
                                                        </div>
                                                    </td>
                                                    <td>Heavyweight T-Shirt</td>
                                                    <td>5/30/14</td>
                                                    <td>
                                                        <button class="cmp_button cmp_cancel">Cancelled</button>
                                                    </td>
                                                    <td>
                                                        <span class="okline">Online</span>
                                                    </td>
                                                    <td>
                                                        $65.00
                                                    </td>
                                                    <td>
                                                        <span>2</span>
                                                    </td>

                                                    <td>
                                                        <svg data-kt-menu-trigger="click" width="32" height="32"
                                                            viewBox="0 0 32 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="16" cy="16" r="16" fill="#E9EFF4" />
                                                            <path
                                                                d="M16 13.414C16.7111 13.414 17.2929 12.8322 17.2929 12.1211C17.2929 11.4099 16.7111 10.8281 16 10.8281C15.2888 10.8281 14.707 11.4099 14.707 12.1211C14.707 12.8322 15.2888 13.414 16 13.414ZM16 14.7069C15.2888 14.7069 14.707 15.2887 14.707 15.9998C14.707 16.711 15.2888 17.2928 16 17.2928C16.7111 17.2928 17.2929 16.711 17.2929 15.9998C17.2929 15.2887 16.7111 14.7069 16 14.7069ZM16 18.5857C15.2888 18.5857 14.707 19.1675 14.707 19.8786C14.707 20.5897 15.2888 21.1716 16 21.1716C16.7111 21.1716 17.2929 20.5897 17.2929 19.8786C17.2929 19.1675 16.7111 18.5857 16 18.5857Z"
                                                                fill="#7E8299" />
                                                        </svg>




                                                        <!-- <p>hi</p> -->


                                                        <div class="dropdown-more-details hidden menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                                            data-kt-menu="true"
                                                            style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-210px, 438px, 0px);"
                                                            data-popper-placement="left-start">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="http://127.0.0.1:8000/admin/footers/1/edit"
                                                                    class="menu-link px-3">
                                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                                                            fill="#2A78C5" />
                                                                    </svg>

                                                                    <span style="color: #2A78C5;">Edit</span>
                                                                </a>
                                                                <hr class="hr-fag">
                                                                <a class="menu-link px-3" onclick="confirmDelete(1)">
                                                                    <svg width="12" height="16" viewBox="0 0 12 16"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                                                            fill="#FF5449" />
                                                                    </svg>

                                                                    <span style="color: #FF5449;">Delete</span>
                                                                </a>
                                                                <form action="http://127.0.0.1:8000/admin/footers/1"
                                                                    id="delete_form_1" method="POST">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token"
                                                                        value="Hcm6BdWZZ9HjFM1V55aL8OstTak873O2RRboqAxb">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="next-prev next_prev1">
                                            <div class="pty_next1 d-flex align-items-center justify-content-between">
                                                <div class="gji">
                                                    <p>Showing 1 to 06 of 10 entries</p>
                                                </div>
                                                <div class="pty_next d-flex align-items-center justify-content-center">
                                                    <button class="prev">Previous</button>
                                                    <div class="topo">
                                                        <span>1</span>
                                                    </div>
                                                    <button class="nxt">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Table-->
                                </div>

                            </div>
                        </div>

                    </div>

                    <!--end::Content container-->
                </div>


                <!--end::Content-->



            </div>

            <script>
            function confirmAlert() {
                const sent = document.getElementById("sent");

                sent.classList.add("sag");
            }
            </script>
            @endsection