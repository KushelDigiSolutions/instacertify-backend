@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
		
		<!--begin::Toolbar-->
            <div class="custom-app-toolbar">
                <div class="left">
                    <p>Events</p>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Event List </a>
                        </li>
                    </ul>
                </div>
                <div class="right">

                    <a href="#" class="btn btn-sm btn-cu-filter" data-kt-menu-trigger="click"
                        data-kt-menu-placement="top-end">
                        This Week
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M10 18.5H14V16.5H10V18.5ZM3 6.5V8.5H21V6.5H3ZM6 13.5H18V11.5H6V13.5Z" fill="#3F4254" />
                        </svg>
                    </a>

                    <!--begin::Menu This Week -->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px mt-0"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item p-0">
                            <a href="#" class="menu-link py-4 px-4 fs-5">
                                All
                            </a>
                            <a href="#" class="menu-link py-4 px-4 fs-5">
                                Today
                            </a>
                            <a href="#" class="menu-link py-4 px-4 fs-5">
                                This Week
                            </a>
                            <a href="#" class="menu-link py-4 px-4 fs-5">
                                Next Week
                            </a>
                            <a href="#" class="menu-link py-4 px-4 fs-5">
                                This Month
                            </a>
                            <a href="#" class="menu-link py-4 px-4 fs-5">
                                Next Month
                            </a>
                            <a href="javascript:void(0);" class="ele-custom-range menu-link py-4 px-4 fs-5"
                                data-kt-menu-trigger="click" data-kt-menu-placement="top-end">
                                Custom Range
                            </a>

                            <div class="popup-custom-range">
                                <div class="form-parent">
                                    <div class="form-filed">
                                        <label for="formDate">From</label>
                                        <input type="date" name="formDate" id="formDate" />
                                    </div>
                                    <div class="form-filed">
                                        <label for="toDate">To</label>
                                        <input type="date" name="toDate" id="toDate" />
                                    </div>
                                </div>
                                <div class="formAction">
                                    <input type="button" value="Submit" class="btn btn-sm fw-bold btn-primary">
                                </div>
                            </div>

                        </div>
                        <!--end::Menu item-->



                    </div>
                    <!--end::Menu This Week-->
                    @can('event-categories-create')
                        <a href="{{ route('admin.events.create') }}" class="btn btn-sm fw-bold text-white" style="background-color: rgb(236, 105, 31)">
                            <i class="ki-duotone ki-plus-square fs-1"><span class="path3"></span></i>
                            Create New Event
                        </a>
                    @endcan
                </div>
            </div>
            <!--end::Toolbar-->
		
		 <!--begin::Content -->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">


                    <!--Status-->
                    <div class="section-status">

                        <div class="box box-1">
                            <div class="inner">
                                <h5>New Events</h5>
                                <h3> {{ App\Models\Admin\Event::where('is_delete', '0')->get()->count() }}</h3>
                            </div>
                            <span class="with-icon">
                                <svg width="137" height="76" viewBox="0 0 137 76" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M136.282 76C136.37 74.2581 136.064 72.4728 135.314 70.7768L125.963 49.6432C120.151 52.2147 113.292 49.5636 110.721 43.7518C108.149 37.9401 110.8 31.0811 116.612 28.5096L107.261 7.37597C104.69 1.56424 97.8307 -1.08687 92.019 1.48462L7.48457 38.8882C1.67284 41.4597 -0.925439 48.2953 1.64606 54.107L10.9969 75.2406C14.5973 73.6476 18.5792 74.0679 21.6997 76H36.5344C32.9944 68.4583 25.8881 63.6973 18.1507 62.8514L12.16 49.455L96.6944 12.0514L102.632 25.4713C97.958 31.8987 96.7175 40.6607 100.154 48.4273C103.59 56.1939 110.909 61.1687 118.809 62.0324L124.747 75.4522L123.509 76H136.282ZM92.6937 76L80.7278 61.066L89.7972 43.1541L70.9729 50.1564L56.7649 36.0366L57.5825 56.0181L39.74 65.2395L59.0953 70.5745L59.9773 76H71.8602L73.4095 73.6544L88.5297 76H92.6937Z"
                                        fill="#D7EAFD" />
                                </svg>
                            </span>
                        </div>
                        <div class="box box-2">
                            <div class="inner">
                                <h5>Ticket Ordered</h5>
                                <h3>0 Tickets</h3>
                            </div>
                            <span class="with-icon">
                                <svg width="146" height="76" viewBox="0 0 146 76" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M145.04 75.4004C145.03 73.3697 144.514 71.3168 143.437 69.4387L131.33 48.3309C125.525 51.6603 118.052 49.6351 114.723 43.8304C111.393 38.0258 113.418 30.5525 119.223 27.2232L107.116 6.11541C103.757 0.258011 96.3136 -1.71444 90.509 1.61492L6.07797 50.042C0.273335 53.3714 -1.72938 60.7616 1.63025 66.619L6.66698 75.4004H27.9703C25.3793 74.4703 22.6389 73.982 19.8719 73.969L12.1314 60.5959L96.5624 12.1688L104.25 25.5722C100.059 32.8151 99.7194 42.1267 104.169 49.8838C108.618 57.6409 116.827 62.0493 125.195 62.0886L132.83 75.4004H145.04ZM71.9082 75.4004L80.8106 70.2942L74.7573 59.7403L64.2034 65.7937L69.7135 75.4004H71.9082ZM62.6505 38.6326L52.0966 44.686L58.15 55.2398L68.7039 49.1865L62.6505 38.6326Z"
                                        fill="#205A95" />
                                </svg>
                            </span>
                        </div>
                        <div class="box box-3">
                            <div class="inner">
                                <h5>Unsold Tickets</h5>
                                <h3> {{ App\Models\Admin\Event::where('is_delete', '0')->sum('number_of_tickets') }} Left
                                </h3>
                            </div>
                            <span class="with-icon">
                                <svg width="88" height="92" viewBox="0 0 88 92" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M75.463 91.367C73.7593 77.9176 61.7803 68.7099 49.9862 61.393C34.84 51.9965 30.916 45.9245 33.0564 39.0295C35.5121 31.1183 44.5549 27.8778 56.8208 31.6854C69.7399 35.6957 72.6151 43.352 70.2343 52.5596L86.2744 57.5387C89.6415 44.8973 85.5804 31.0642 71.5603 22.6539L76.4944 6.75899L54.7206 0L49.8541 15.6771C34.8275 14.3546 20.6664 19.985 16.3181 33.9928C11.1137 50.7586 22.3854 63.4084 41.1255 74.5571C52.0414 81.0491 56.5573 86.4958 57.8057 91.367H75.463ZM16.9119 91.367H0.43528C-0.262717 87.4755 -0.148356 83.2753 0.975481 78.8041L16.9429 83.7607C16.3957 86.3531 16.3389 88.9186 16.9119 91.367Z"
                                        fill="#1B1B1B" />
                                </svg>
                            </span>
                        </div>

                    </div>


                    <!--Lists-->
                  


                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
		
        
        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                @include('admin.layouts.alert_message')
                <div class="card">
                    <div class="card-body pt-0" id="page-section-body">
                        <form id="search_form">

                            <div class="page-section-head">
                                <div class="psh-left">
                                    <p>Event List </p>
                                </div>
                                <div class="psh-right">
                                    <div class="d-flex align-items-center position-relative">
                                        <input type="text" class="form-control form-control-solid w-250px ps-13"
                                            name="search_key" placeholder="Search" onkeyup="fillter()">
                                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="table">
                            @include('admin.event_management.event.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fillter() {
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.events.index') }}",
                data: $('#search_form').serialize(),
                success: function(data) {
                console.log(data)
                    $('#table').html(data)
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.toggleActiveBtn').on('click', function() {
                var vclassId = $(this).data('id');
                toggleActive(vclassId, $(this));
            });

            function toggleActive(id, button) {
               var csrfToken = "{{ csrf_token() }}";
				console.log(csrfToken);
                $.ajax({
                    url: '{{env('APP_URL') }}admin/event/toggle-active/' + id,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: csrfToken // Include the CSRF token in the data
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // Update the button text or style based on the new is_active state
                            console.log(response);
                            //alert('Toggle success! New is_active state: ' + response.is_active);
                            button.text(response.is_active ? 'Published' : 'Unpublished');
                            window.location.reload();
                        } else {
                            alert('Toggle failed!');
                        }
                    },
                    error: function() {
                        alert('Toggle failed! Server error.');
                    }
                });
            }
        });
    </script>
@endsection
