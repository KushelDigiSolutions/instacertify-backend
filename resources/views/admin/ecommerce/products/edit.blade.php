@extends('admin.layouts.app')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div class="custom-app-toolbar">
            <div class="left">
                <p>Products</p>
                <ul>
                    <li>
                        <a href="{{ route('admin.products.index') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">Edit Product</a>
                    </li>
                </ul>
            </div>
            <div class="right">
                <a href="{{ route('admin.products.index') }}" class="btn btn-sm fw-bold btn-primary">
                    <i class="ki-duotone ki-arrow-left fs-1"></i>
                    Back to Products List
                </a>
            </div>
        </div>
        <!--end::Toolbar-->

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                @include('admin.layouts.alert_message')

                <div class="card">
                    <div class="card-body pt-0" id="page-section-body">
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updates -->

                            <div class="mb-4">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" value="{{ $product->slug }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="images" class="form-label">Images (Upload New Images)</label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                                @if($product->images)
                                    <div class="mt-2">
                                        <h5>Current Images:</h5>
                                        @foreach($product->images as $image)
                                            <img src="{{ asset('storage/' . $image) }}" alt="Product Image" class="img-thumbnail" style="max-width: 100px;">
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="shipment_time" class="form-label">Shipment Time (days)</label>
                                <input type="number" name="shipment_time" id="shipment_time" class="form-control" value="{{ $product->shipment_time }}" min="1">
                            </div>

                            <div class="mb-4">
                                <label for="sku_name" class="form-label">SKU Name</label>
                                <input type="text" name="sku_name" id="sku_name" class="form-control" value="{{ $product->sku_name }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" min="0">
                            </div>

                            <div class="mb-4">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="sale_price" class="form-label">Sale Price (Optional)</label>
                                <input type="text" name="sale_price" id="sale_price" class="form-control" value="{{ $product->sale_price }}">
                            </div>

                            <div class="mb-4">
                                <label for="additional_tax" class="form-label">Additional Tax (%)</label>
                                <input type="text" name="additional_tax" id="additional_tax" class="form-control" value="{{ $product->additional_tax }}">
                            </div>

                            <div class="mb-4">
                                <label for="return_days" class="form-label">Return Days</label>
                                <input type="number" name="return_days" id="return_days" class="form-control" value="{{ $product->return_days }}" min="0">
                            </div>

                            <div class="mb-4">
                                <label for="product_detail" class="form-label">Product Detail</label>
                                <textarea name="product_detail" id="product_detail" class="form-control" rows="4">{{ $product->product_detail }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="product_specification" class="form-label">Product Specification</label>
                                <textarea name="product_specification" id="product_specification" class="form-control" rows="4">{{ $product->product_specification }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="tags" class="form-label">Tags (comma separated)</label>
                                <input type="text" name="tags" id="tags" class="form-control" value="{{ $product->tags }}">
                            </div>

                            <div class="mb-4">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn btn-sm fw-bold btn-primary">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('product_detail');
            CKEDITOR.replace('product_specification');
        </script>
    @endsection
@endsection
