    <style>
.mySlides {
    display: none
}

/* .mySlides img {vertical-align: middle;} */

/* Slideshow container */
.slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
}

.fade:not(.show) {
    opacity: 1 !important;
}

/* Next & previous buttons */
.slideshow-container .prev,
.slideshow-container .next {
    cursor: pointer;
    position: absolute;
    top: 50%;

    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    /* border-radius: 0 3px 3px 0; */
    user-select: none;
    transform: translateY(-15%) !important;
}

/* Position the "next button" to the right */
.slideshow-container .next {
    right: -20px;
    border-radius: 3px 0 0 3px;
}

.slideshow-container .prev {
    left: -20px;
    border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.slideshow-container .prev:hover,
.slideshow-container .next:hover {
    /* background-color: rgba(0, 0, 0, 0.8); */
}

/* Caption text */
.text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

/* The dots/bullets/indicators */
.dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}

.active,
.dot:hover {
    background-color: #717171;
}

/* Fading animation */
.fade {
    animation-name: fade;
    animation-duration: 1.5s;
}

@keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {

    .prev,
    .next,
    .text {
        font-size: 11px
    }
}
</style>
	<table class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10">ID</th>    
            <th class="w-20">Equipment Name</th>
            <th class="w-20">Category</th>
            <th class="w-30">Date</th>
            <th class="w-30">Price</th>
            <th class="w-30">Stock</th>
            <th class="w-30">On Rent</th>
            <th class="w-30">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($equipment as $key=>$equip)
		<tr>
		  {{-- <td>{{ $key + 1 + ($equipment->currentPage() - 1) * $equipment->perPage() }}</td> --}}
          <td>
            @if (!empty($equip->images))
                <img class="img_gen11" src="{{ asset('backend/admin/images/equipment_management/equipments/' . $equip->images[0]) }}" style="height:20px !important;width:20px; border-radius:50%;">
            @endif
          </td>

		  <td>
			  {{ $equip->title }}
			</td>
		  <td>
			 Camping Tents
			</td>
		 <td>
			{{ $equip->created_at }}
			</td>
			<td>
			${{ $equip->price }}
			</td>
			
			<td>
			{{ $equip->stock }}
			</td>
			<td>
			{{ $equip->on_rent }}
			</td>
		  <td>
			
			  
			 <div class="equip-lists">
                    <div class="eve-list">
                            <div class="inner">
                                <div class="equip-action">

                                   

									<div class="dropdown">
                                    <div class="evt-action equip-more-details cursor-pointer" id="self_car_{{$key}}" data-toggle="dropdown"
                aria-expanded="false" aria-haspopup="true">
                                        <svg width="59" height="58" viewBox="0 0 59 58" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="29.7444" cy="28.9884" r="28.9709"
                                                fill="#E9EFF4" />
                                            <path
                                                d="M29.7444 24.3061C31.032 24.3061 32.0855 23.2526 32.0855 21.965C32.0855 20.6774 31.032 19.6239 29.7444 19.6239C28.4568 19.6239 27.4033 20.6774 27.4033 21.965C27.4033 23.2526 28.4568 24.3061 29.7444 24.3061ZM29.7444 26.6472C28.4568 26.6472 27.4033 27.7007 27.4033 28.9883C27.4033 30.2759 28.4568 31.3294 29.7444 31.3294C31.032 31.3294 32.0855 30.2759 32.0855 28.9883C32.0855 27.7007 31.032 26.6472 29.7444 26.6472ZM29.7444 33.6704C28.4568 33.6704 27.4033 34.7239 27.4033 36.0115C27.4033 37.2991 28.4568 38.3526 29.7444 38.3526C31.032 38.3526 32.0855 37.2991 32.0855 36.0115C32.0855 34.7239 31.032 33.6704 29.7444 33.6704Z"
                                                fill="#7E8299" />
                                        </svg>
                                    </div>


                                    <!--begin::Menu-->
                                    <div class="dropdown-more-details menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10 new-dp1 dropdown-menu"
                id="sey_{{$key}}" aria-labelledby="self_car_{{$key}}">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">

                                            <a href="{{ route('admin.equipment.edit', $equip->id) }}"
                                                class="menu-link px-3">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.7157 7.51667L12.4824 8.28333L4.93236 15.8333H4.16569V15.0667L11.7157 7.51667ZM14.7157 2.5C14.5074 2.5 14.2907 2.58333 14.1324 2.74167L12.6074 4.26667L15.7324 7.39167L17.2574 5.86667C17.5824 5.54167 17.5824 5.01667 17.2574 4.69167L15.3074 2.74167C15.1407 2.575 14.9324 2.5 14.7157 2.5ZM11.7157 5.15833L2.49902 14.375V17.5H5.62402L14.8407 8.28333L11.7157 5.15833Z"
                                                    fill="#5E6278"></path>
                                            </svg>
                                                Edit Equipment
                                            </a>
                                            <a href="{{ route('admin.equipment.show', $equip->id) }}"
                                                class="menu-link px-3">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.83333 9.16666H7.5V10.8333H5.83333V9.16666ZM17.5 5V16.6667C17.5 17.5833 16.75 18.3333 15.8333 18.3333H4.16667C3.24167 18.3333 2.5 17.5833 2.5 16.6667L2.50833 5C2.50833 4.08333 3.24167 3.33333 4.16667 3.33333H5V1.66666H6.66667V3.33333H13.3333V1.66666H15V3.33333H15.8333C16.75 3.33333 17.5 4.08333 17.5 5ZM4.16667 6.66666H15.8333V5H4.16667V6.66666ZM15.8333 16.6667V8.33333H4.16667V16.6667H15.8333ZM12.5 10.8333H14.1667V9.16666H12.5V10.8333ZM9.16667 10.8333H10.8333V9.16666H9.16667V10.8333Z"
                                                        fill="#5E6278" />
                                                </svg>
                                                View Equipment
                                            </a>
											<?php /* <a href="{{ route('admin.equipment.show', $equip->id) }}"
                                                class="menu-link px-3">
                                                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.83333 9.16666H7.5V10.8333H5.83333V9.16666ZM17.5 5V16.6667C17.5 17.5833 16.75 18.3333 15.8333 18.3333H4.16667C3.24167 18.3333 2.5 17.5833 2.5 16.6667L2.50833 5C2.50833 4.08333 3.24167 3.33333 4.16667 3.33333H5V1.66666H6.66667V3.33333H13.3333V1.66666H15V3.33333H15.8333C16.75 3.33333 17.5 4.08333 17.5 5ZM4.16667 6.66666H15.8333V5H4.16667V6.66666ZM15.8333 16.6667V8.33333H4.16667V16.6667H15.8333ZM12.5 10.8333H14.1667V9.16666H12.5V10.8333ZM9.16667 10.8333H10.8333V9.16666H9.16667V10.8333Z"
                                                    fill="#5E6278"></path>
                                            </svg>
                                                 Duplicate Equipment
                                            </a> */?>
											
											
											@can('equipment-delete')
                                        <a class="menu-link px-3" onclick="confirmDelete({{ $equip->id }})">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.3337 7.5V15.8333H6.66699V7.5H13.3337ZM12.0837 2.5H7.91699L7.08366 3.33333H4.16699V5H15.8337V3.33333H12.917L12.0837 2.5ZM15.0003 5.83333H5.00033V15.8333C5.00033 16.75 5.75033 17.5 6.66699 17.5H13.3337C14.2503 17.5 15.0003 16.75 15.0003 15.8333V5.83333Z"
                                                    fill="#5E6278" />
                                            </svg>
                                            Delete
                                        </a>
                                        <form action="{{ route('admin.equipment.destroy', $equip->id) }}"
                                            id="delete_form_{{ $equip->id }}" method="POST">
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
			
			</td>
		</tr>
        @endforeach
    </tbody>
</table>

<hr>
<div class="row mt-5">
    <div class="col-md-4">
        <p>
            <b>Showing {{ ($equipment->currentpage() - 1) * $equipment->perpage() + 1 }} to
                {{ ($equipment->currentpage() - 1) * $equipment->perpage() + $equipment->count() }} of
                {{ $equipment->total() }} enteries
            </b>
        </p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $equipment->links() !!}
    </div>
</div>



<script>
    $(function() {
        $('.page-link').on('click', function(equip) {
            equip.prvclassDefault()
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
	
	let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}
</script>

