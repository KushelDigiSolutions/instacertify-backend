<table class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">SN.</th>
            <th class="min-w-125px">Image</th>
            <th class="min-w-125px">SKU</th>
            <th class="min-w-125px">Name</th>
            <th class="min-w-125px">Price</th>
            <th class="min-w-125px">Sale Price</th>
            <th class="min-w-125px">QTY</th>
            <th class="min-w-125px">Status</th>
            @canany(['products-edit', 'products-delete'])
                <th class="text-center min-w-70px">Actions</th>
            @endcanany
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $product)
            <tr>
                <td>{{$product->id}}}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-45px me-5">
                        <img src="{ asset('ecommerce/products/'.$product->images[0]) }}"
                        style="width: 120px; height: 90px; object-fit: cover;">
                        </div>
                    </div>
                </td>
                <td>{{ $product->sku_name }}</td>
                <td>{{ $product->product_name }}</td>
                <td>₹{{ $product->price }}</td>
                <td>₹{{ $product->sale_price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    @if ($product->is_active == '1')
                        <a href="{{ route('admin.products.show', $product->id) }}?status=0">
                            <div class="badge badge-light-success">Active</div>
                        </a>
                    @else
                        <a href="{{ route('admin.products.show', $product->id) }}?status=1">
                            <div class="badge badge-light-danger">Deactive</div>
                        </a>
                    @endif
                </td>
                @canany(['products-edit', 'products-delete'])
                    <td class="text-center">
                        <div class="dropdown">
                            <svg id="self_car_{{ $key }}" class="dropdown-toggle outline-none cursor-pointer"
                                width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg" data-toggle="dropdown" aria-expanded="false"
                                aria-haspopup="true">
                                <circle cx="15" cy="15" r="14.5" fill="white" stroke="#E1E3EA" />
                                <path
                                    d="M10.9993 13.6667C10.266 13.6667 9.66602 14.2667 9.66602 15C9.66602 15.7333 10.266 16.3333 10.9993 16.3333C11.7327 16.3333 12.3327 15.7333 12.3327 15C12.3327 14.2667 11.7327 13.6667 10.9993 13.6667ZM18.9993 13.6667C18.266 13.6667 17.666 14.2667 17.666 15C17.666 15.7333 18.266 16.3333 18.9993 16.3333C19.7327 16.3333 20.3327 15.7333 20.3327 15C20.3327 14.2667 19.7327 13.6667 18.9993 13.6667ZM14.9993 13.6667C14.266 13.6667 13.666 14.2667 13.666 15C13.666 15.7333 14.266 16.3333 14.9993 16.3333C15.7327 16.3333 16.3327 15.7333 16.3327 15C16.3327 14.2667 15.7327 13.6667 14.9993 13.6667Z"
                                    fill="#5E6278" />
                            </svg>

                            <div class="dropdown-more-details menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 mt-10 new-dp1 dropdown-menu"
                                id="sey_{{ $key }}" aria-labelledby="self_car_{{ $key }}">
                                <div class="menu-item px-3">
                                    @can('products-edit')
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                            class="menu-link px-3">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.7147 7.51667L12.4814 8.28333L4.93138 15.8333H4.16471V15.0667L11.7147 7.51667ZM14.7147 2.5C14.5064 2.5 14.2897 2.58333 14.1314 2.74167L12.6064 4.26667L15.7314 7.39167L17.2564 5.86667C17.5814 5.54167 17.5814 5.01667 17.2564 4.69167L15.3064 2.74167C15.1397 2.575 14.9314 2.5 14.7147 2.5ZM11.7147 5.15833L2.49805 14.375V17.5H5.62305L14.8397 8.28333L11.7147 5.15833Z"
                                                    fill="#5E6278" />
                                            </svg>
                                            Edit
                                        </a>
                                    @endcan
                                    @can('products-delete')
                                        <a class="menu-link px-3" onclick="confirmDelete({{ $product->id }})">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.3337 7.5V15.8333H6.66699V7.5H13.3337ZM12.0837 2.5H7.91699L7.08366 3.33333H4.16699V5H15.8337V3.33333H12.917L12.0837 2.5ZM15.0003 5.83333H5.00033V15.8333C5.00033 16.75 5.75033 17.5 6.66699 17.5H13.3337C14.2503 17.5 15.0003 16.75 15.0003 15.8333V5.83333Z"
                                                    fill="#5E6278" />
                                            </svg>
                                            Delete
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                            id="delete_form_{{ $product->id }}" method="POST">
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
    </tbody>
</table>
<hr>


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
