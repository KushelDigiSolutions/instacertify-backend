@extends('admin.layouts.app')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
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
                        <a href="{{ route('admin.events.create') }}" class="btn btn-sm fw-bold btn-primary">
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
                    <div class="section-lists">

                        <div class="list-head">
                            <h2>Event List</h2>
                        </div>

                        <div class="event-lists">
                            @forelse ($events as $key=>$event)
                                <!--List 1-->
                                <div class="eve-list">
                                    <div class="inner">

                                        <div class="image">
                                            <img src="{{ asset('backend/admin/images/event_management/events/' . $event->images[0]) }}"
                                                alt="Indie Band Festivals Jakarta 2023" loading="lazy" width="128"
                                                height="95" />
                                        </div>

                                        <div class="content">
                                            <div class="content-inner">
                                                <h4>{{ $event->title }}</h4>
                                                <h5>
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M21.5 5H16.5V13.18C16.19 13.07 15.85 13 15.5 13C13.84 13 12.5 14.34 12.5 16C12.5 17.66 13.84 19 15.5 19C17.16 19 18.5 17.66 18.5 16V7H21.5V5ZM14.5 5H2.5V7H14.5V5ZM14.5 9H2.5V11H14.5V9ZM10.5 13H2.5V15H10.5V13Z"
                                                            fill="#3595F6" />
                                                    </svg>
                                                    {{ $event->location }}
                                                </h5>
                                                <p>{{ $event->short_description }}</p>
                                            </div>
                                        </div>

                                        <div class="event-action">

                                            <div class="evt-action event-date">
                                                <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="29.0002" cy="28.9884" r="28.9709"
                                                        fill="#DDF1F4" />
                                                    <path
                                                        d="M23.148 27.8179H25.4891V30.159H23.148V27.8179ZM39.5356 21.9652V38.3528C39.5356 39.6404 38.4821 40.6939 37.1945 40.6939H20.8069C19.5076 40.6939 18.4658 39.6404 18.4658 38.3528L18.4775 21.9652C18.4775 20.6776 19.5076 19.6241 20.8069 19.6241H21.9774V17.283H24.3185V19.6241H33.6829V17.283H36.024V19.6241H37.1945C38.4821 19.6241 39.5356 20.6776 39.5356 21.9652ZM20.8069 24.3063H37.1945V21.9652H20.8069V24.3063ZM37.1945 38.3528V26.6473H20.8069V38.3528H37.1945ZM32.5123 30.159H34.8534V27.8179H32.5123V30.159ZM27.8302 30.159H30.1712V27.8179H27.8302V30.159Z"
                                                        fill="#087990" />
                                                </svg>
                                                @if ($event->single_day == '1')
                                                    <span>{{ Carbon\Carbon::parse($event->date)->format('d M Y') }}</span>
                                                @else
                                                    <span>{{ Carbon\Carbon::parse($event->start_date)->format('d M Y') }}</span>
                                                @endif
                                            </div>

                                            <div class="evt-action tickets-sold">
                                                <svg width="59" height="58" viewBox="0 0 59 58" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="29.8723" cy="28.9884" r="28.9709"
                                                        fill="#CFE2FF" />
                                                    <path
                                                        d="M41.5783 26.6472V21.965C41.5783 20.6657 40.5248 19.6239 39.2372 19.6239H20.5086C19.221 19.6239 18.1792 20.6657 18.1792 21.965V26.6472C19.4668 26.6472 20.5086 27.7007 20.5086 28.9883C20.5086 30.2759 19.4668 31.3294 18.1675 31.3294V36.0115C18.1675 37.2991 19.221 38.3526 20.5086 38.3526H39.2372C40.5248 38.3526 41.5783 37.2991 41.5783 36.0115V31.3294C40.2907 31.3294 39.2372 30.2759 39.2372 28.9883C39.2372 27.7007 40.2907 26.6472 41.5783 26.6472ZM39.2372 24.9382C37.8443 25.7459 36.8962 27.2676 36.8962 28.9883C36.8962 30.709 37.8443 32.2307 39.2372 33.0384V36.0115H20.5086V33.0384C21.9015 32.2307 22.8497 30.709 22.8497 28.9883C22.8497 27.2559 21.9132 25.7459 20.5203 24.9382L20.5086 21.965H39.2372V24.9382ZM28.7024 32.4999H31.0435V34.841H28.7024V32.4999ZM28.7024 27.8177H31.0435V30.1588H28.7024V27.8177ZM28.7024 23.1356H31.0435V25.4766H28.7024V23.1356Z"
                                                        fill="#3595F6" />
                                                </svg>
                                                <span>0 Unsold</span>
                                            </div>

                                            <div class="evt-action event-more-details" data-kt-menu-trigger="click"
                                                data-kt-menu-placement="left-start">
                                                <svg width="59" height="58" viewBox="0 0 59 58" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="29.7444" cy="28.9884" r="28.9709"
                                                        fill="#E9EFF4" />
                                                    <path
                                                        d="M29.7444 24.3061C31.032 24.3061 32.0855 23.2526 32.0855 21.965C32.0855 20.6774 31.032 19.6239 29.7444 19.6239C28.4568 19.6239 27.4033 20.6774 27.4033 21.965C27.4033 23.2526 28.4568 24.3061 29.7444 24.3061ZM29.7444 26.6472C28.4568 26.6472 27.4033 27.7007 27.4033 28.9883C27.4033 30.2759 28.4568 31.3294 29.7444 31.3294C31.032 31.3294 32.0855 30.2759 32.0855 28.9883C32.0855 27.7007 31.032 26.6472 29.7444 26.6472ZM29.7444 33.6704C28.4568 33.6704 27.4033 34.7239 27.4033 36.0115C27.4033 37.2991 28.4568 38.3526 29.7444 38.3526C31.032 38.3526 32.0855 37.2991 32.0855 36.0115C32.0855 34.7239 31.032 33.6704 29.7444 33.6704Z"
                                                        fill="#7E8299" />
                                                </svg>
                                                <span>More Details</span>
                                            </div>


                                            <!--begin::Menu-->
                                            <div class="dropdown-more-details menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">

                                                    <a href="{{ route('admin.events.show', $event->id) }}"
                                                        class="menu-link px-3">
                                                        <svg width="20" height="20" viewBox="0 0 20 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.83333 9.16666H7.5V10.8333H5.83333V9.16666ZM17.5 5V16.6667C17.5 17.5833 16.75 18.3333 15.8333 18.3333H4.16667C3.24167 18.3333 2.5 17.5833 2.5 16.6667L2.50833 5C2.50833 4.08333 3.24167 3.33333 4.16667 3.33333H5V1.66666H6.66667V3.33333H13.3333V1.66666H15V3.33333H15.8333C16.75 3.33333 17.5 4.08333 17.5 5ZM4.16667 6.66666H15.8333V5H4.16667V6.66666ZM15.8333 16.6667V8.33333H4.16667V16.6667H15.8333ZM12.5 10.8333H14.1667V9.16666H12.5V10.8333ZM9.16667 10.8333H10.8333V9.16666H9.16667V10.8333Z"
                                                                fill="#5E6278" />
                                                        </svg>
                                                        View Event
                                                    </a>
                                                    @can('event-edit')
                                                        <a href="{{ route('admin.events.edit', $event->id) }}"
                                                            class="menu-link px-3">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.7157 7.51667L12.4824 8.28333L4.93236 15.8333H4.16569V15.0667L11.7157 7.51667ZM14.7157 2.5C14.5074 2.5 14.2907 2.58333 14.1324 2.74167L12.6074 4.26667L15.7324 7.39167L17.2574 5.86667C17.5824 5.54167 17.5824 5.01667 17.2574 4.69167L15.3074 2.74167C15.1407 2.575 14.9324 2.5 14.7157 2.5ZM11.7157 5.15833L2.49902 14.375V17.5H5.62402L14.8407 8.28333L11.7157 5.15833Z"
                                                                    fill="#5E6278" />
                                                            </svg>
                                                            Edit
                                                        </a>
                                                        {{-- <form action="{{route('admin.events.destroy',$event->id)}}" method="POST" id="delete-form">
                                                @method('DELETE')
                                                @csrf
											<a href="#" class="menu-link px-3"  onclick="event.preventDefault();document.getElementById('delete-form').submit();">
												<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M13.3337 7.5V15.8333H6.66699V7.5H13.3337ZM12.0837 2.5H7.91699L7.08366 3.33333H4.16699V5H15.8337V3.33333H12.917L12.0837 2.5ZM15.0003 5.83333H5.00033V15.8333C5.00033 16.75 5.75033 17.5 6.66699 17.5H13.3337C14.2503 17.5 15.0003 16.75 15.0003 15.8333V5.83333Z" fill="#5E6278"/>
												</svg>
												Delete Event
											</a>
                                        </form> --}}
                                                    @endcan
                                                    @can('event-delete')
                                                        <a class="menu-link px-3"
                                                            onclick="confirmDelete({{ $event->id }})">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M13.3337 7.5V15.8333H6.66699V7.5H13.3337ZM12.0837 2.5H7.91699L7.08366 3.33333H4.16699V5H15.8337V3.33333H12.917L12.0837 2.5ZM15.0003 5.83333H5.00033V15.8333C5.00033 16.75 5.75033 17.5 6.66699 17.5H13.3337C14.2503 17.5 15.0003 16.75 15.0003 15.8333V5.83333Z"
                                                                    fill="#5E6278" />
                                                            </svg>
                                                            Delete Event
                                                        </a>
                                                        <form action="{{ route('admin.events.destroy', $event->id) }}"
                                                            id="delete_form_{{ $event->id }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                        </form>
                                                    @endcan
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->

                                        </div>

                                    </div>
                                </div>
                            @empty
                            @endforelse


                        </div>

                    </div>


                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->

        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->

    <script>
        const ele_custom_range = document.querySelector(".ele-custom-range");
        const ele_custom_range_popup = document.querySelector(".popup-custom-range");
        if (ele_custom_range) {
            ele_custom_range.addEventListener('click', function(e) {
                e.stopPropagation();
                if (ele_custom_range_popup.classList.contains('is-open')) {
                    ele_custom_range_popup.classList.remove('is-open')
                } else {
                    ele_custom_range_popup.classList.add('is-open')
                }
                return false;
            })
        }
    </script>
    <script>
        $(function() {
            $('.page-link').on('click', function(event) {
                event.preventDefault()
                var url = $(this).attr('href');
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(data) {
                        $('#table').html(data)
                    }
                });
            });
        });

        function confirmDelete(form_id) {
            Swal.fire({
                title: 'Are you sure to delete this data?',
                text: 'All related data to this will be deleted',
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: 'Yes, Go Ahead!'
            }).then((result) => {
                if (result.value) {
                    $('#delete_form_' + form_id).submit()
                }
            })
            return false;
        }
    </script>
@endsection
