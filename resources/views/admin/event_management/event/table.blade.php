@foreach ($events as $key => $event)
    <div class="event-lists">
        <div class="eve-list">
            <div class="inner @if($loop->last) inner-last @endif">

                <div class="inner-content">
                    <div class="image">
                        <img src="{{ asset('backend/admin/images/event_management/events/' . $event->images[0]) }}"
                            alt="Indie Band Festivals Jakarta 2023" loading="lazy" width="128" height="95" />
                    </div>

                    <div class="content">
                        <div class="content-inner">
                            <h4>{{ $event->title }}</h4>
                            <h5>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.5 5H16.5V13.18C16.19 13.07 15.85 13 15.5 13C13.84 13 12.5 14.34 12.5 16C12.5 17.66 13.84 19 15.5 19C17.16 19 18.5 17.66 18.5 16V7H21.5V5ZM14.5 5H2.5V7H14.5V5ZM14.5 9H2.5V11H14.5V9ZM10.5 13H2.5V15H10.5V13Z"
                                        fill="#3595F6" />
                                </svg>
                                {{ $event->location }}
                            </h5>
                            <p>{{ $event->short_description }}</p>

                            

                            <div class="dropdown status-dropdown">
                                <button type="button"
                                    class="@if ($event->is_active == '1') status-active @else status-deactive @endif"
                                    id="dropdownMenuOffset{{ $key }}" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                    @if ($event->is_active)
                                        Publish
                                    @else
                                        Unpublished
                                    @endif
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M11.06 5.52979L8 8.58312L4.94 5.52979L4 6.46979L8 10.4698L12 6.46979L11.06 5.52979Z"
                                            fill="#7E8299" />
                                    </svg>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset{{ $key }}">
                                    <a class="toggleActiveBtn dropdown-item" href="javascript:void(0)" data-id="{{ $event->id }}">
                                        Publish
                                    </a>
                                    <a class="toggleActiveBtn dropdown-item" href="javascript:void(0)" data-id="{{ $event->id }}">
                                        Unpublished
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="event-action">

                    <div class="evt-action event-date">
                        <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="29.0002" cy="28.9884" r="28.9709" fill="#DDF1F4" />
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
                            <circle cx="29.8723" cy="28.9884" r="28.9709" fill="#CFE2FF" />
                            <path
                                d="M41.5783 26.6472V21.965C41.5783 20.6657 40.5248 19.6239 39.2372 19.6239H20.5086C19.221 19.6239 18.1792 20.6657 18.1792 21.965V26.6472C19.4668 26.6472 20.5086 27.7007 20.5086 28.9883C20.5086 30.2759 19.4668 31.3294 18.1675 31.3294V36.0115C18.1675 37.2991 19.221 38.3526 20.5086 38.3526H39.2372C40.5248 38.3526 41.5783 37.2991 41.5783 36.0115V31.3294C40.2907 31.3294 39.2372 30.2759 39.2372 28.9883C39.2372 27.7007 40.2907 26.6472 41.5783 26.6472ZM39.2372 24.9382C37.8443 25.7459 36.8962 27.2676 36.8962 28.9883C36.8962 30.709 37.8443 32.2307 39.2372 33.0384V36.0115H20.5086V33.0384C21.9015 32.2307 22.8497 30.709 22.8497 28.9883C22.8497 27.2559 21.9132 25.7459 20.5203 24.9382L20.5086 21.965H39.2372V24.9382ZM28.7024 32.4999H31.0435V34.841H28.7024V32.4999ZM28.7024 27.8177H31.0435V30.1588H28.7024V27.8177ZM28.7024 23.1356H31.0435V25.4766H28.7024V23.1356Z"
                                fill="#3595F6" />
                        </svg>
                        <span>0 Unsold</span>
                    </div>
                    <div class="dropdown">
                        <div class="evt-action event-more-details" id="self_car_{{ $key }}"
                            data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                            <svg width="59" height="58" viewBox="0 0 59 58" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="29.7444" cy="28.9884" r="28.9709" fill="#E9EFF4" />
                                <path
                                    d="M29.7444 24.3061C31.032 24.3061 32.0855 23.2526 32.0855 21.965C32.0855 20.6774 31.032 19.6239 29.7444 19.6239C28.4568 19.6239 27.4033 20.6774 27.4033 21.965C27.4033 23.2526 28.4568 24.3061 29.7444 24.3061ZM29.7444 26.6472C28.4568 26.6472 27.4033 27.7007 27.4033 28.9883C27.4033 30.2759 28.4568 31.3294 29.7444 31.3294C31.032 31.3294 32.0855 30.2759 32.0855 28.9883C32.0855 27.7007 31.032 26.6472 29.7444 26.6472ZM29.7444 33.6704C28.4568 33.6704 27.4033 34.7239 27.4033 36.0115C27.4033 37.2991 28.4568 38.3526 29.7444 38.3526C31.032 38.3526 32.0855 37.2991 32.0855 36.0115C32.0855 34.7239 31.032 33.6704 29.7444 33.6704Z"
                                    fill="#7E8299" />
                            </svg>
                            <span>More Details</span>
                        </div>


                        <!--begin::Menu-->
                        <div class="dropdown-more-details menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10 new-dp1 dropdown-menu"
                            id="sey_{{ $key }}" aria-labelledby="self_car_{{ $key }}">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">

                                <a href="{{ route('admin.events.show', $event->id) }}" class="menu-link px-3">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.83333 9.16666H7.5V10.8333H5.83333V9.16666ZM17.5 5V16.6667C17.5 17.5833 16.75 18.3333 15.8333 18.3333H4.16667C3.24167 18.3333 2.5 17.5833 2.5 16.6667L2.50833 5C2.50833 4.08333 3.24167 3.33333 4.16667 3.33333H5V1.66666H6.66667V3.33333H13.3333V1.66666H15V3.33333H15.8333C16.75 3.33333 17.5 4.08333 17.5 5ZM4.16667 6.66666H15.8333V5H4.16667V6.66666ZM15.8333 16.6667V8.33333H4.16667V16.6667H15.8333ZM12.5 10.8333H14.1667V9.16666H12.5V10.8333ZM9.16667 10.8333H10.8333V9.16666H9.16667V10.8333Z"
                                            fill="#5E6278" />
                                    </svg>
                                    View Event
                                </a>
                                @can('event-edit')
                                    <a href="{{ route('admin.events.edit', $event->id) }}" class="menu-link px-3">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
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
                                    <a class="menu-link px-3" onclick="confirmDelete({{ $event->id }})">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
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
                    </div>
                    <!--end::Menu-->

                </div>

            </div>
        </div>
    </div>
@endforeach


<div class="row">
    {{-- <div class="col-md-4">
        <p>
            <b>Showing {{ ($events->currentpage() - 1) * $events->perpage() + 1 }} to
                {{ ($events->currentpage() - 1) * $events->perpage() + $events->count() }} of
                {{ $events->total() }} events
            </b>
        </p>
    </div> --}}
    <div class="col-md-12 d-flex justify-content-center">
        {!! $events->links() !!}
    </div>
</div>

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
