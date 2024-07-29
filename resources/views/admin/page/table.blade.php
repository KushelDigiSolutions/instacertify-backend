@foreach ($lists as $key => $item)
<tr>

    <td>{{ $item->title }}</td>
    <td>{{ $item->custom_url }}</td>
    <td>{{ App\Models\Admin\Admin::where('id', $item->created_by)->first()->name }}</td>
    <td>{{ $item->created_at }}</td>
    @canany(['pages-edit', 'pages-delete'])
    @can('pages-edit')
    <td>
        @if ($item->is_published == '1')
        <a href="{{ route('admin.page.status', [$item->id, '0']) }}">
            <div class="badge badge-light-success">Published</div>
        </a>
        @else
        <a href="{{ route('admin.page.status', [$item->id, '1']) }}">
            <div class="badge badge-light-danger">Draft</div>
        </a>
        @endif
    </td>
	  <td>
            @if ($item->is_homepage == '1')
                <a href="{{ route('admin.pages.status.home', [$item->id, '0']) }}">
                    <div class="badge badge-light-success">Homepage</div>
                </a>
            @else
                <a href="{{ route('admin.pages.status.home', [$item->id, '1']) }}">
                    <div class="badge badge-light-danger">No</div>
                </a>
            @endif
        </td>
    <td>
        @endcan

        <div class="dropdown">
            <svg id="self_car_{{$key}}" class="dropdown-toggle outline-none cursor-pointer" width="30" height="30"
                viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" data-toggle="dropdown"
                aria-expanded="false" aria-haspopup="true">
                <circle cx="15" cy="15" r="14.5" fill="white" stroke="#E1E3EA" />
                <path
                    d="M10.9993 13.6667C10.266 13.6667 9.66602 14.2667 9.66602 15C9.66602 15.7333 10.266 16.3333 10.9993 16.3333C11.7327 16.3333 12.3327 15.7333 12.3327 15C12.3327 14.2667 11.7327 13.6667 10.9993 13.6667ZM18.9993 13.6667C18.266 13.6667 17.666 14.2667 17.666 15C17.666 15.7333 18.266 16.3333 18.9993 16.3333C19.7327 16.3333 20.3327 15.7333 20.3327 15C20.3327 14.2667 19.7327 13.6667 18.9993 13.6667ZM14.9993 13.6667C14.266 13.6667 13.666 14.2667 13.666 15C13.666 15.7333 14.266 16.3333 14.9993 16.3333C15.7327 16.3333 16.3327 15.7333 16.3327 15C16.3327 14.2667 15.7327 13.6667 14.9993 13.6667Z"
                    fill="#5E6278" />
            </svg>

            <div class="dropdown-more-details menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10 new-dp1 dropdown-menu"
                id="sey_{{$key}}" aria-labelledby="self_car_{{$key}}">
                <div class="menu-item px-3">
                    @can('pages-edit')
                    <a class="menu-link column-add px-3" onclick="editPage({{ $item->id }})">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.71569 5.51667L10.4824 6.28333L2.93236 13.8333H2.16569V13.0667L9.71569 5.51667ZM12.7157 0.5C12.5074 0.5 12.2907 0.583333 12.1324 0.741667L10.6074 2.26667L13.7324 5.39167L15.2574 3.86667C15.5824 3.54167 15.5824 3.01667 15.2574 2.69167L13.3074 0.741667C13.1407 0.575 12.9324 0.5 12.7157 0.5ZM9.71569 3.15833L0.499023 12.375V15.5H3.62402L12.8407 6.28333L9.71569 3.15833Z"
                                fill="#2A78C5" />
                        </svg>

                        <span style="color: #2A78C5;">Edit Properties</span>
                    </a>
                    <hr class="hr-fag">
                    <a class="menu-link  px-3" href="{{ route('admin.pages.pagebuilder') }}?id={{ $item->id }}">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.8787 5.71436C14.4854 5.71436 16.0921 5.71436 17.6988 5.71436C19.0841 5.71436 19.9839 6.59301 19.991 7.97884C19.9982 11.2291 19.9982 14.4794 19.991 17.7297C19.9839 19.1084 19.0841 19.9942 17.6988 20.0013C14.4711 20.0085 11.2505 20.0085 8.02282 20.0013C6.61605 20.0013 5.71629 19.1156 5.71629 17.7083C5.70915 14.4723 5.70915 11.2291 5.71629 7.99313C5.71629 6.60015 6.60891 5.71436 7.99425 5.71436C9.61525 5.71436 11.2505 5.71436 12.8787 5.71436ZM7.14448 12.8721C7.14448 14.4794 7.14448 16.0867 7.14448 17.694C7.14448 18.3155 7.39442 18.5726 8.00854 18.5726C11.2362 18.5726 14.4568 18.5726 17.6845 18.5726C18.3129 18.5726 18.57 18.3155 18.57 17.6797C18.57 14.4651 18.57 11.2506 18.57 8.03599C18.57 7.39308 18.3272 7.1502 17.6845 7.1502C14.4711 7.1502 11.2577 7.1502 8.04424 7.1502C7.38013 7.1502 7.15162 7.37879 7.14448 8.05742C7.13734 9.65756 7.14448 11.2649 7.14448 12.8721Z"
                                fill="#33475B" />
                            <path
                                d="M7.16951 0C8.77622 0 10.3829 0 11.9896 0C13.3821 0 14.2676 0.87865 14.2819 2.26449C14.289 2.67881 14.289 3.10028 14.2819 3.5146C14.2676 3.97893 13.9677 4.2861 13.5607 4.2861C13.1536 4.27895 12.8608 3.97178 12.8537 3.50746C12.8466 3.07885 12.8608 2.65024 12.8466 2.22163C12.8323 1.69301 12.5752 1.43584 12.0396 1.43584C8.76908 1.43584 5.49853 1.43584 2.22083 1.43584C1.6924 1.43584 1.42819 1.69301 1.42819 2.22877C1.42105 5.50049 1.42105 8.77221 1.42819 12.0511C1.42819 12.594 1.6924 12.8511 2.24226 12.8654C2.67071 12.8726 3.09917 12.8583 3.52763 12.8726C3.97037 12.8797 4.27028 13.1726 4.27743 13.5726C4.28457 13.9584 3.99893 14.2798 3.58475 14.287C2.99206 14.3013 2.39222 14.3084 1.80666 14.2441C0.842631 14.137 0.0999732 13.3226 0.0142819 12.3582C0.00714094 12.2368 0 12.1225 0 12.0011C0 8.76507 0 5.52906 0 2.28592C0.00714094 1.11439 0.656967 0.264309 1.71383 0.0500045C1.90663 0.00714349 2.11372 0 2.31367 0C3.93466 0 5.54851 0 7.16951 0Z"
                                fill="#33475B" />
                            <path
                                d="M12.1626 13.5869C11.1986 13.5869 10.2845 13.594 9.37049 13.5869C8.8492 13.5797 8.51358 13.2011 8.59927 12.7439C8.67068 12.3796 8.94917 12.1653 9.38477 12.1653C10.1846 12.1582 10.9772 12.1653 11.777 12.1653C11.8912 12.1653 12.0126 12.1653 12.1626 12.1653C12.1626 11.3152 12.1626 10.5009 12.1626 9.67938C12.1626 9.55794 12.1555 9.44365 12.1626 9.32221C12.184 8.87931 12.4697 8.58643 12.8767 8.58643C13.2766 8.58643 13.5836 8.88645 13.5908 9.32221C13.5979 10.2509 13.5908 11.1795 13.5908 12.1367C13.705 12.1439 13.805 12.1582 13.905 12.1582C14.6405 12.1582 15.3832 12.1582 16.1187 12.1582C16.8042 12.1582 17.147 12.3939 17.1541 12.8654C17.1613 13.3369 16.8114 13.5869 16.1401 13.5869C15.3118 13.5869 14.4763 13.5869 13.5908 13.5869C13.5908 13.7797 13.5908 13.9512 13.5908 14.1226C13.5908 14.8727 13.5979 15.6228 13.5908 16.3728C13.5836 16.83 13.2837 17.1443 12.8838 17.1515C12.4768 17.1515 12.1697 16.8372 12.1697 16.38C12.1555 15.4656 12.1626 14.5441 12.1626 13.5869Z"
                                fill="#33475B" />
                        </svg>


                        <span style="color: #2A78C5;">Page Builder</span>
                    </a>
                    <hr class="hr-fag">
                    <a id="sec44" class="menu-link duplicated-items-btn px-3" data="{{ $item->id }}">
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.0014 12.0537C20.0014 13.6506 19.9937 15.2475 20.0014 16.8521C20.0091 18.6026 18.6194 19.9999 16.8689 19.9999C13.6444 19.9999 10.4198 19.9999 7.19524 19.9999C5.45244 19.9999 4.07048 18.5719 4.07816 16.8368C4.08583 13.6506 4.09351 10.4644 4.07816 7.2859C4.07048 5.49704 5.51386 4.06901 7.29505 4.07669C10.4659 4.09205 13.6367 4.09205 16.8152 4.07669C18.5734 4.06901 20.0014 5.45865 20.0014 7.21681C20.0014 8.82909 20.0014 10.4414 20.0014 12.0537ZM18.4505 12.0613C18.4505 10.8483 18.4582 9.62755 18.4505 8.4145C18.4428 7.90778 18.4428 7.39339 18.3814 6.88667C18.297 6.21873 17.8286 5.78111 17.1607 5.70433C16.8459 5.66594 16.5235 5.64291 16.2087 5.64291C13.4448 5.63523 10.6808 5.63523 7.91693 5.64291C7.59447 5.64291 7.27969 5.66594 6.96491 5.70433C6.26626 5.78878 5.79793 6.25711 5.71347 6.94809C5.67509 7.26287 5.65205 7.58533 5.65205 7.90011C5.64437 10.664 5.64437 13.4279 5.65205 16.1842C5.65205 16.499 5.67509 16.8214 5.71347 17.1362C5.79025 17.8041 6.22787 18.2571 6.89581 18.3646C7.15685 18.403 7.42556 18.426 7.69428 18.4337C8.79217 18.4414 9.89773 18.4337 10.9956 18.4337C12.8766 18.4337 14.7576 18.4414 16.6386 18.426C17.8901 18.4183 18.4275 17.8656 18.4582 16.6141C18.4582 16.4836 18.4582 16.3608 18.4582 16.2302C18.4505 14.8483 18.4505 13.4586 18.4505 12.0613Z"
                                fill="#0026E6" />
                            <path
                                d="M3.09786e-05 7.92325C3.09786e-05 6.334 0.00770852 4.75243 3.09786e-05 3.16318C-0.00764656 1.38967 1.4127 -0.00764605 3.19389 3.14863e-05C6.35703 0.0153866 9.52018 0.00770903 12.6756 0.00770903C13.7275 0.00770903 14.5874 0.414619 15.2399 1.23612C15.5778 1.6507 15.547 2.14207 15.1708 2.42613C14.81 2.69485 14.357 2.6104 14.0422 2.18813C13.62 1.61999 13.0135 1.56625 12.3916 1.56625C9.42037 1.55857 6.45684 1.55857 3.48563 1.56625C3.24763 1.56625 3.00195 1.59696 2.76395 1.63535C2.14206 1.74283 1.72748 2.14974 1.61999 2.76395C1.57393 3.02498 1.55089 3.2937 1.55089 3.56241C1.54322 6.49523 1.55089 9.42037 1.55089 12.3532C1.55089 13.0672 1.6507 13.7198 2.30329 14.1804C2.63343 14.4108 2.62575 14.9021 2.36471 15.2169C2.11135 15.524 1.66606 15.5854 1.32825 15.3398C0.460683 14.6718 0.00770852 13.8042 0.00770852 12.7217C3.09784e-05 11.1248 0.00770852 9.52786 3.09786e-05 7.92325Z"
                                fill="#0026E6" />
                        </svg>



                        <span style="color: #2A78C5;">Duplicate</span>
                    </a>
                    @endcan
                    @can('pages-delete')
                    <hr class="hr-fag">
                    <a class="menu-link px-3" onclick="confirmDelete({{ $item->id }})">
                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.33366 5.5V13.8333H2.66699V5.5H9.33366ZM8.08366 0.5H3.91699L3.08366 1.33333H0.166992V3H11.8337V1.33333H8.91699L8.08366 0.5ZM11.0003 3.83333H1.00033V13.8333C1.00033 14.75 1.75033 15.5 2.66699 15.5H9.33366C10.2503 15.5 11.0003 14.75 11.0003 13.8333V3.83333Z"
                                fill="#FF5449" />
                        </svg>

                        <span style="color: #FF5449;">Delete</span>
                    </a>
                    <form action="{{ route('admin.pages.destroy', $item->id) }}" id="delete_form_{{ $item->id }}"
                        method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                    @endcan
                </div>
            </div>
        </div>


    </td>
    @endcanany
</tr>
@endforeach

<div style="z-index: 109;" class="drawer-overlay-back"></div>
<div class="popup-render-items popreb bg-body flex-column drawer drawer-end w-xl-400px w-lg-450px">

    <form id="form-render-items" method="post" action="{{ route('admin.pages.update', 1) }}"
        class="card w-100 border-0 rounded-0">
        @method('PUT')
        @csrf
        <input type="hidden" name="edit_page_id" id="edit_page_id">
        <!-- head -->
        <div class="card-header card-header1 pe-5 rounded-0">
            <div class="d-flex flex22 justify-content-between align-items-center flex-row me-3">
                <h2>Edit</h2>
                <svg class=" cursor-pointer" id="crit" width="33" height="32" viewBox="0 0 33 32" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" width="32" height="32" rx="16" fill="#F3F6F8" />
                    <path
                        d="M22.3327 11.341L21.1577 10.166L16.4993 14.8243L11.841 10.166L10.666 11.341L15.3243 15.9993L10.666 20.6577L11.841 21.8327L16.4993 17.1743L21.1577 21.8327L22.3327 20.6577L17.6743 15.9993L22.3327 11.341Z"
                        fill="#5E6278" />
                </svg>

            </div>
        </div>

        <!-- popup body -->
        <div class="card-body">
			
            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Page Status</label>
                <select class="form-select form-sel44  form-control3 form-select-solid fw-bold" data-kt-select2="true"
                    data-placeholder="Select" data-allow-clear="true" data-kt-user-table-filter="status"
                    data-hide-search="true" id="is_published" name="is_published">
					<option>Draft</option>
					<option>Published</option>
                </select>
            </div>
            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Set Publish Date</label>
				<div class="row">
                	<input name="end_date" type="date"  class="mt-6 form-control form-control11"  />
                	<input name="end_date" type="time"  class="mt-6 form-control form-control11"  />
				</div>
            </div>
            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Set Page Expiry</label>
				<div class="row">
                	<input name="end_date" type="date"  class="mt-6 form-control form-control11"  />
                	<input name="end_date" type="time"  class="mt-6 form-control form-control11"  />
				</div>
            </div>

            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Page Name</label>
                <input type="text" name="title" id="title" class="form-control seo-title111" placeholder="Page Name" required />
            </div>
            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Header</label>
                <select class="form-select form-sel44  form-control3 form-select-solid fw-bold" data-kt-select2="true"
                    data-placeholder="Select" data-allow-clear="true" data-kt-user-table-filter="role"
                    data-hide-search="true" required id="header_id" name="header_id">
                </select>
            </div>

            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Footer</label>
                <select class="form-select form-sel44  form-control3 form-select-solid fw-bold" data-kt-select2="true"
                    data-placeholder="Select" data-allow-clear="true" data-kt-user-table-filter="role"
                    data-hide-search="true" required id="footer_id" name="footer_id">
                </select>
            </div>

            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Navigation</label>
                <select class="form-select form-sel44  form-control3 form-select-solid fw-bold" data-kt-select2="true"
                    data-placeholder="Select" data-allow-clear="true" data-kt-user-table-filter="role"
                    data-hide-search="true" required id="navigation_id" name="navigation_id">
                </select>
            </div>
            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Url</label>
                <input type="text" name="custom_url" id="custom_url" class="form-control seo-title111"
                    placeholder="Custom Url" />
            </div>
            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Seo Title</label>
                <input type="text" name="seo_title" id="seo_title" class="form-control seo-title111"
                    placeholder="Seo Title" />
            </div>
            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Seo Description</label>
                <textarea name="seo_description" id="seo_description" class="form-control seo-title111"
                    placeholder="Description"></textarea>
            </div>
            <div class=" mt-6">
                <label class="form-label fs-6 fw-semibold">Keyword</label>
                <input type="text" name="seo_keywords" id="seo_keywords" class="form-control seo-title111"
                    placeholder="Keyword" />
            </div>

        </div>

        <!-- popup footer -->
        <div class="card-footer p-5 d-flex justify-content-between align-items-center">
            <button class="btn btn-primary w-100px" id="popup-btn-save" type="submit">SAVE</button>
            <button class="btn btn-outline w-100px" id="popup-btn-cancel" type="button">Cancel</button>

            <a id="pageBuilderButton" href="{{ route('admin.pages.pagebuilder') }}"><button
                    class="btn btn-primary w-101px" id="popup-btn-cancel" type="button">Page
                    Builder</button></a>

        </div>

    </form>

</div>

<script>
//popup open & close
function popup_open_close() {
    $(".drawer-overlay-back").toggleClass('drawer-overlay')
    $(".popup-render-items").toggleClass("drawer-on")
    $("#popup_text").val('').focus();
    $("#popup_link").val('');
    $("#popup_link_type").prop('checked', false);
    $("#popup_type").val('parent');
    $("#popup_action").val('add');
    $("#popup_content_id").val('0');
}

//open popup
$(".column-add, #popup-btn-cancel, .drawer-overlay-back, #crit").on('click', function() {
    popup_open_close();
})
</script>
