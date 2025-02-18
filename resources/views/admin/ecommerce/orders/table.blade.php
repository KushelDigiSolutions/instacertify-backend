<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th>#</th>
            <th>User Name</th>
            <th>Order Amount</th>
            <th>Order Status</th>
            <th>Razor Order ID</th>
            <th>City</th>
            <th>State</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @foreach ($orders as $order)
        <tr>
            <!-- Order ID -->
            <td>{{ $order->id }}</td>

            <!-- User Name -->
            <td>{{ $order->user->name ?? 'N/A' }}</td>

            <!-- Order Amount -->
            <td>{{ number_format($order->order_amount, 2) }}</td>

            <!-- Order Status with Dropdown -->
            <td>
                <select class="form-select form-select-sm" onchange="updateOrderStatus({{ $order->id }}, this.value)">
                    @php
                    $statuses = [
                    0 => 'Created',
                    1 => 'Payment Done',
                    2 => 'Order Accept',
                    3 => 'Order Preparing',
                    4 => 'Order Shipped',
                    5 => 'Order Delivered',
                    6 => 'Order Completed',
                    7 => 'Order Rejected',
                    8 => 'Order Returned',
                    9 => 'Order Cancelled'
                    ];
                    @endphp
                    @foreach ($statuses as $key => $status)
                    <option value="{{ $key }}" {{ $order->order_status == $key ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                    @endforeach
                </select>
            </td>

            <!-- Razor Order ID -->
            <td>{{ $order->razor_order_id }}</td>

            <!-- Address City -->
            <td>{{ $order->address->city ?? 'N/A' }}</td>

            <!-- Address State -->
            <td>{{ $order->address->state ?? 'N/A' }}</td>

            <!-- Actions -->
            <td>
                {{-- View Details Button --}}
                <button class="btn btn-sm btn-light-info" onclick="showOrderDetails({{ $order }})">
                    View Details
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if ($orders->isEmpty())
<p class="text-center">No orders found.</p>
@endif

<!-- Modal for Order Details -->
<div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Order Information -->
                <h6>Order Information</h6>
                <table class="table table-bordered">
                    <tbody id="order-info-content">
                        {{-- Order information will be dynamically inserted here --}}
                    </tbody>
                </table>

                <!-- User Address -->
                <h6>User Address</h6>
                <table class="table table-bordered">
                    <tbody id="user-address-content">
                        {{-- User address will be dynamically inserted here --}}
                    </tbody>
                </table>

                <!-- Order Items -->
                <h6>Order Items</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Sale Price</th>
                            <th>Total Price</th>
                            <th>Tax</th>
                        </tr>
                    </thead>
                    <tbody id="order-items-content">
                        {{-- Order items will be dynamically inserted here --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to show order details in the modal
    function showOrderDetails(order) {
        // Populate Order Information Content
        let orderInfoContent = `
            <tr><th>Order ID</th><td>#${order.id}</td></tr>
            <tr><th>User Name</th><td>${order.user?.name || 'N/A'}</td></tr>
            <tr><th>Total Price</th><td>${parseFloat(order.total_price).toFixed(2)}</td></tr>
            <tr><th>Total Tax</th><td>${parseFloat(order.total_tax).toFixed(2)}</td></tr>
            <tr><th>Sale Price</th><td>${parseFloat(order.sale_price).toFixed(2)}</td></tr>
            <tr><th>Sale Tax</th><td>${parseFloat(order.sale_tax).toFixed(2)}</td></tr>
            <tr><th>Order Amount</th><td>${parseFloat(order.order_amount).toFixed(2)}</td></tr>
            <tr><th>Order Status</th><td>${getOrderStatusText(order.order_status)}</td></tr>
            <tr><th>Razor Order ID</th><td>${order.razor_order_id || 'N/A'}</td></tr>
            <tr><th>Payment ID</th><td>${order.payment_id || 'N/A'}</td></tr>`;
        if (order.order_delevered_date) {
            orderInfoContent += `<tr><th>Delivered Date</th><td>${new Date(order.order_delevered_date).toLocaleString()}</td></tr>`;
        }
        if (order.order_cancelled_date) {
            orderInfoContent += `<tr><th>Cancelled Date</th><td>${new Date(order.order_cancelled_date).toLocaleString()}</td></tr>`;
        }
        document.getElementById('order-info-content').innerHTML = orderInfoContent;

        // Populate User Address Content
        let address = order.address;
        let addressContent = `
            <tr><th>Name</th><td>${address?.name || 'N/A'}</td></tr>
            <tr><th>Phone</th><td>${address?.phone || 'N/A'}</td></tr>
            <tr><th>Address Line 1</th><td>${address?.address1 || 'N/A'}</td></tr>
            <tr><th>Address Line 2</th><td>${address?.address2 || 'N/A'}</td></tr>
            <tr><th>Landmark</th><td>${address?.landmark || 'N/A'}</td></tr>
            <tr><th>City</th><td>${address?.city || 'N/A'}</td></tr>
            <tr><th>State</th><td>${address?.state || 'N/A'}</td></tr>
            <tr><th>Pincode</th><td>${address?.pincode || 'N/A'}</td></tr>`;
        document.getElementById('user-address-content').innerHTML = addressContent;

        // Populate Order Items Content
        let itemsContent = '';
        order.order_items.forEach(item => {
            itemsContent += `
                <tr>
                    <td>${item.product?.name || 'N/A'}</td>
                    <td>${item.qty}</td>
                    <td>${parseFloat(item.sale_price).toFixed(2)}</td>
                    <td>${parseFloat(item.total_price).toFixed(2)}</td>
                    <td>${parseFloat(item.tax).toFixed(2)}</td>
                </tr>`;
        });
        document.getElementById('order-items-content').innerHTML = itemsContent;

        // Show the modal
        const modal = new bootstrap.Modal(document.getElementById('orderDetailsModal'));
        modal.show();
    }

    // Function to get order status text from status code
    function getOrderStatusText(status) {
        const statuses = [
            'Created',
            'Payment Done',
            'Order Accept',
            'Order Preparing',
            'Order Shipped',
            'Order Delivered',
            'Order Completed',
            'Order Rejected',
            'Order Returned',
            'Order Cancelled'
        ];
        return statuses[status] || 'Unknown';
    }

    // Function to get delivery status text from status code
    function getDeliveryStatusText(status) {
        const statuses = {
            0: 'Cancelled',
            1: 'Delivered'
        };
        return statuses[status] || 'Unknown';
    }
</script>

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
<script>
    $(".column-add, #popup-btn-cancel, .drawer-overlay-back, #crit").on('click', function() {
        popup_open_close();
    })
</script>
<script>
    $("#kt_datatable_zero_configuration").DataTable({
        "paging": true,
        "searching": false,
        "info": true,
        "lengthChange": true,
        "pageLength": 10,
 "order": [[0, 'desc']],
        "pagingType": "simple_numbers", // or "full_numbers" depending on your preference
        "language": {
            "paginate": {
                "previous": "Previous",
                "next": "Next"
            }
        }
    });
</script>