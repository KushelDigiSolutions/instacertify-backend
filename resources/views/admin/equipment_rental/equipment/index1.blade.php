<!-- <iframe src="http://localhost:8000/master/editor.html"
    frameborder="0" 
    marginheight="0" 
    marginwidth="0" 
    width="100%" 
    height="100%" 
    scrolling="auto"></iframe > -->

@extends('admin.layouts.app')
@section('content')

<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div class="custom-app-toolbar">
        <div class="left">
            <p>
                Order Management
            </p>
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">#258694</a>
                </li>
            </ul>
        </div>

    </div>
    <!--end::Toolbar-->

    <div class="app-content flex-column-fluid">
        <div class="app-container container-xxl">
            <div class="card card-flush card_flushj">
                <div style="border-bottom:1px solid #D9E0E6 !important;" class="card-header card-head121">
                    <div class="header_sas d-flex align-items-center">
                        <h1>Billing Details</h1>
                    </div>
                </div>
                <div class="card-body p-9 ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tangent">
                                <h2>Shipping address</h2>
                                <div class="row mb-7 mt-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-6 fw-semibold text-muted">Full Name</label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <span class="fw-bold fs-6 text-gray-800">Jane Cooper</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-6 fw-semibold text-muted">Contact Phone</label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">(307) 555-0133</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-6 fw-semibold text-muted">
                                        Country
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6 d-flex align-items-center">
                                        <span class="fw-bold fs-6 text-gray-800 me-2">USA</span>
                                        <!-- <span class="badge badge-success">Verified</span> -->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-6 fw-semibold text-muted">Communication</label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6 d-flex align-items-center">
                                        <span class="fw-bold fs-6 text-gray-800 me-2">Phone</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-6 fw-semibold text-muted">
                                        Address
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <span class="fw-bold fs-6 text-gray-800">2972 Westheimer Rd. Santa Ana, Illinois
                                            85486 </span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tangent tangent12">
                                <h2>Invoice</h2>
                                <div class="row mb-7 mt-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-6 fw-semibold text-muted">Invoive id</label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <span class="fw-bold fs-6 text-gray-800">#24589</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-6 fw-semibold text-muted">Payment date</label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">5/30/14</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-6 fw-semibold text-muted">
                                        Payment mode
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6 d-flex align-items-center">
                                        <span class="fw-bold fs-6 text-gray-800 me-2">Online</span>
                                        <!-- <span class="badge badge-success">Verified</span> -->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-6 fw-semibold text-muted">Order Status</label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6 d-flex align-items-center">
                                        <button class="me-2 Complete_me">Complete</button>
                                    </div>
                                    <!--end::Col-->
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table_resp1 mt-4">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_customers_table">
                            <thead class="treats">
                                <tr class="text-start tickna fw-bold fs-7  gs-0">
                                    <th class="min-w-125px sorting fory" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Customer Name: activate to sort column ascending">ID</th>
                                    <th class="min-w-125px sorting fory" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
                                        PRODUCT NAME</th>
                                    <th class="min-w-125px sorting fory" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
                                        DATE</th>
                                    <th class="min-w-125px sorting fory" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Payment Method: activate to sort column ascending">Time</th>
                                    <th class="min-w-125px sorting fory" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1" aria-label="Company: activate to sort column ascending">
                                        ITEM</th>
                                    <th class="min-w-125px sorting fory" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1" aria-label="Company: activate to sort column ascending">
                                        PAYMENT</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600 rtoi">
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td class="heavy_weight">Heavyweight T-Shirt</td>
                                    <td>
                                        5/30/14
                                    </td>
                                    <td data-filter="mastercard">
                                        12:47:16
                                    </td>
                                    <td>
                                        <p>2</p>
                                        <p class="sub_t mt-2">Subtotal</p>
                                        <p class="sub_t mt-2">Total</p>
                                    </td>
                                    <td>
                                        <p>Payment</p>
                                        <p class="sub_t mt-2">$130.00</p>
                                        <p class="sub_t mt-2">$130.00</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>


@endsection