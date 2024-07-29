@extends('admin.layouts.app')
@section('content')
<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div class="custom-app-toolbar">
        <div class="left">
            <p>Location Rentals</p>
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Booking</a>
                </li>
            </ul>
        </div>

    </div>

    <!--end::Toolbar-->

    <!--begin::Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card card-flush">
                <div class="card-body card-bfg11">

                    <div class="row">

                        <div class="col-md-3">

                            <div class="img_nt">
                                <img class="event-image"
                                    src="https://res.cloudinary.com/dt2lhechn/image/upload/v1696916172/Rectangle_38_1_fsu6vw.png">
                            </div>

                            <div class="see_loging">
                                 <button>See lodging details</button>
                            </div>

                        </div>

                        <div class="col-md-5 event_coniy">
                            <div class="event-content event-content11">

                                <h1>Mr. Graha Caesara</h1>
                                 <span>Order ID: #23456YLS23 </span>
                                <div class="room_ment row mt-6">
                                    <div class="col-md-6">
                                        <div class="room_left">
                                            <h2>Check In</h2>
                                            <p>Thu, 24 Mar 2023</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="room_right">
                                            <h2>Check Out</h2>
                                            <p>Thu, 26 Mar 2023</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="room_ment row">
                                    <div class="col-md-6">
                                        <div class="room_left">
                                            <h2>Guest</h2>
                                            <p>2 Adult</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="room_right">
                                            <h2>Room Type</h2>
                                            <p>Deluxe Suites</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="booking_summary">
                                <h2>Booking Summery</h2>
                                <div class="book_sum mt-8">
                                     <div class="books_sum d-flex align-items-center justify-content-between">
                                         <div class="book_sum_left">
                                              <h3>$65 x 1 night</h3>
                                         </div>
                                         <div class="book_sun">
                                             <h3>$65</h3>
                                         </div>
                                     </div>
                                     <div class="books_sum d-flex align-items-center justify-content-between">
                                         <div class="book_sum_left">
                                              <h3>$65 x 1 night</h3>
                                         </div>
                                         <div class="book_sun">
                                             <h3>$65</h3>
                                         </div>
                                     </div>
                                     <div class="totals_sum d-flex align-items-center justify-content-between">
                                        <div class="totals_sum_left">
                                            <h3>Total before taxes</h3>
                                        </div>
                                        <div class="totals_sum_right">
                                              <h3>$74.75</h3>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>

                    </div>

                   <div class="rows d-flex align-items-center justify-content-between mt-20">
                      <div class="rows1">
                          <div class="tulu">
                              <h3>Staus Update</h3>
                          </div>
                      </div>
                      <div class="rows2">
                         <div class="cancel_bool d-flex align-items-center">
                              <button class="can_book">Cancel booking</button>
                              <button class="send_book">Send booking reminder</button>
                         </div>
                      </div>
                   </div>






                    <!-- ===============drawer about instructor=========== -->

                    <!--begin::Trigger button-->
                    <!-- <button id="kt_drawer_example_basic_button" class="btn btn-primary">Toggle basic drawer</button> -->
                    <!--end::Trigger button-->

                    <!--begin::View component-->
                    <div id="kt_drawer_example_basic" class="bg-white instructor-pop" data-kt-drawer="true"
                        data-kt-drawer-activate="true" data-kt-drawer-toggle="#kt_drawer_example_basic_button"
                        data-kt-drawer-close="#kt_drawer_example_basic_close" data-kt-drawer-width="480px">

                        <div class="card carf">
                            <div class="card-header card_healing">
                                <h3 class="card-title card-title55">ABOUT OWNER</h3>
                                <div class="card-toolbar">

                                    <svg class="cursor-pointer" id="kt_drawer_example_basic_button" width="20"
                                        height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.3346 2.5465L17.4546 0.666504L10.0013 8.11984L2.54797 0.666504L0.667969 2.5465L8.1213 9.99984L0.667969 17.4532L2.54797 19.3332L10.0013 11.8798L17.4546 19.3332L19.3346 17.4532L11.8813 9.99984L19.3346 2.5465Z"
                                            fill="#5E6278" />
                                    </svg>


                                </div>
                            </div>
                            <div class="card-body">
                                <div class="owner_detail">
                                    <div class="owner_inf d-flex">
                                        <img src="https://res.cloudinary.com/dt2lhechn/image/upload/v1697007440/Ellipse_126_1_ngbnws.png"
                                            alt="">
                                        <div class="det_ownk">
                                            <h4>Hosted by Srujan</h4>
                                            <p>Joined in March 2019</p>
                                        </div>
                                    </div>
                                    <div class="owner_verify d-flex mt-4">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22 10.99L19.56 8.2L19.9 4.51L16.29 3.69L14.4 0.5L11 1.96L7.6 0.5L5.71 3.69L2.1 4.5L2.44 8.2L0 10.99L2.44 13.78L2.1 17.48L5.71 18.3L7.6 21.5L11 20.03L14.4 21.49L16.29 18.3L19.9 17.48L19.56 13.79L22 10.99ZM18.05 12.47L17.49 13.12L17.57 13.97L17.75 15.92L15.01 16.54L14.57 17.28L13.58 18.96L11.8 18.19L11 17.85L10.21 18.19L8.43 18.96L7.44 17.29L7 16.55L4.26 15.93L4.44 13.97L4.52 13.12L3.96 12.47L2.67 11L3.96 9.52L4.52 8.87L4.43 8.01L4.25 6.07L6.99 5.45L7.43 4.71L8.42 3.03L10.2 3.8L11 4.14L11.79 3.8L13.57 3.03L14.56 4.71L15 5.45L17.74 6.07L17.56 8.02L17.48 8.87L18.04 9.52L19.33 10.99L18.05 12.47Z"
                                                fill="#3595F6" />
                                            <path
                                                d="M9.09 12.75L6.77 10.42L5.29 11.91L9.09 15.72L16.43 8.36L14.95 6.87L9.09 12.75Z"
                                                fill="#3595F6" />
                                        </svg>
                                        <p>Identity verified</p>
                                    </div>
                                    <div class="owner_mobile d-flex mt-4">
                                        <svg width="14" height="22" viewBox="0 0 14 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 0H3C1.34 0 0 1.34 0 3V19C0 20.66 1.34 22 3 22H11C12.66 22 14 20.66 14 19V3C14 1.34 12.66 0 11 0ZM12 17H2V3H12V17ZM9 20H5V19H9V20Z"
                                                fill="#3595F6" />
                                        </svg>
                                        <p>(684) 555-0102</p>

                                    </div>
                                    <div class="ownner_location d-flex mt-4">
                                        <svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7 0C3.13 0 0 3.13 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 3.13 10.87 0 7 0ZM2 7C2 4.24 4.24 2 7 2C9.76 2 12 4.24 12 7C12 9.88 9.12 14.19 7 16.88C4.92 14.21 2 9.85 2 7Z"
                                                fill="#3595F6" />
                                            <path
                                                d="M7 9.5C8.38071 9.5 9.5 8.38071 9.5 7C9.5 5.61929 8.38071 4.5 7 4.5C5.61929 4.5 4.5 5.61929 4.5 7C4.5 8.38071 5.61929 9.5 7 9.5Z"
                                                fill="#3595F6" />
                                        </svg>

                                        <p>2118 Thornridge Cir. Syracuse, Connecticut 35624</p>

                                    </div>

                                    <div class="response_rate mt-4">
                                        <span>Response rate: 27%</span>
                                    </div>
                                    <div class="response_time mt-8">
                                        <span>Response time: a few days or more</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!-- Footer -->
                            </div>
                        </div>

                    </div>
                    <!--end::View component-->


                    <!-- ==========================instructor list drawer============ -->







                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>


    <!--end::Content-->



</div>

<script>
// function fillter() {
//     $.ajax({
//         type: 'GET',
//         url: "{{ route('admin.events.index') }}",
//         data: $('#search_form').serialize(),
//         success: function(data) {
//             $('#table').html(data)
//         }
//     });
// }

function confirmAlert() {
    const sent = document.getElementById("sent");

    sent.classList.add("sag");
}
</script>
@endsection