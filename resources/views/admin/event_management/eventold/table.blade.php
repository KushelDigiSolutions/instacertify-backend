<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
    <tbody>
        @forelse ($events as $key=>$event)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-45px me-5">
                            <img src="{{ asset('backend/admin/images/event_management/events/' . $event->images[0]) }}"
                                alt="" style="width: 120px;height: 90px;">
                        </div>
                        <div class="d-flex justify-content-start flex-column">
                            <a href="#" class="text-dark fw-bold text-hover-primary fs-6">{{ $event->title }}</a>
                            <span
                                class="text-muted fw-semibold text-muted d-block fs-7">{{ $event->short_description }}</span>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-end flex-shrink-0">
                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-dots-vertical fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <a href="{{ route('admin.events.show', $event->id) }}" class="menu-link px-3">
                                    <i class="ki-duotone ki-eye fs-2">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                    </i> View Event
                                </a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="menu-link px-3">
                                    <i class="ki-duotone ki-notepad-edit fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i> Edit Event
                                </a>
                            </div>
                            <div class="menu-item px-3">
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="menu-link px-3" style="border: 0px;width: 100%;">
                                        <i class="ki-duotone ki-trash fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i> Delete Event
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
<hr>
<div class="row">
    <div class="col-md-4">
        <p>
            <b>Showing {{ ($events->currentpage() - 1) * $events->perpage() + 1 }} to
                {{ ($events->currentpage() - 1) * $events->perpage() + $events->count() }} of
                {{ $events->total() }} Events
            </b>
        </p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
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
</script>
