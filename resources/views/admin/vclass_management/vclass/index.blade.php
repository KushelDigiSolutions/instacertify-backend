@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div class="custom-app-toolbar">
            <div class="left">
                <p>Classes</p>
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Classes List </a>
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
                @can('vclasses-categories-create')
                    <a href="{{ route('admin.vclasses.create') }}" class="btn btn-sm fw-bold btn-primary">
                        <i class="ki-duotone ki-plus-square fs-1"><span class="path3"></span></i>
                        Create New Class
                    </a>
                @endcan
            </div>
        </div>
        <!--end::Toolbar-->


        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                @include('admin.layouts.alert_message')
                <div class="card">
                    <div class="card-body pt-0" id="page-section-body">
                        <form id="search_form">

                            <div class="page-section-head">
                                <div class="psh-left">
                                    <p>Classes List </p>
                                </div>
                                <div class="psh-right">
                                    
                                    {{-- <button class="paste"><span>Paste</span> <svg width="18" height="20"
                                            viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.5 0H6.5C5.4 0 4.5 0.9 4.5 2V14C4.5 15.1 5.4 16 6.5 16H15.5C16.6 16 17.5 15.1 17.5 14V2C17.5 0.9 16.6 0 15.5 0ZM15.5 14H6.5V2H15.5V14ZM0.5 13V11H2.5V13H0.5ZM0.5 7.5H2.5V9.5H0.5V7.5ZM7.5 18H9.5V20H7.5V18ZM0.5 16.5V14.5H2.5V16.5H0.5ZM2.5 20C1.4 20 0.5 19.1 0.5 18H2.5V20ZM6 20H4V18H6V20ZM11 20V18H13C13 19.1 12.1 20 11 20ZM2.5 4V6H0.5C0.5 4.9 1.4 4 2.5 4Z"
                                                fill="white" />
                                        </svg>
                                    </button> --}}

                                    <div class="d-flex align-items-center position-relative">
                                        <input type="text" class="form-control form-control-solid w-350px ps-13"
                                            name="search_key" placeholder="Search videos by name or Instructor" onkeyup="fillter()">
                                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div id="table">
                            @include('admin.vclass_management.vclass.table')
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
                url: "{{ route('admin.vclasses.index') }}",
                data: $('#search_form').serialize(),
                success: function(data) {
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
                    url: '{{env('APP_URL') }}admin/vclass/toggle-active/' + id,
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
