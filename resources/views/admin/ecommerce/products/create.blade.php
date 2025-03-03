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
                    <a href="#">Create New Product</a>
                </li>
            </ul>
        </div>
        <div class="right">
            @can('products-list')
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm fw-bold btn-primary">
                <i class="ki-duotone ki-arrow-back fs-1"><span class="path3"></span></i>
                Back to Product List
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
                    <form id="create_product_form" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="images" class="form-label">Images</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple>
                        </div>

                        <div class="mb-3">
                            <label for="shipment_time" class="form-label">Shipment Time (Days)</label>
                            <input type="number" name="shipment_time" id="shipment_time" class="form-control" value="7" min="1">
                        </div>

                        <div class="mb-3">
                            <label for="sku_name" class="form-label">SKU Name</label>
                            <input type="text" name="sku_name" id="sku_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="0" min="0">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="sale_price" class="form-label">Sale Price</label>
                            <input type="text" name="sale_price" id="sale_price" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="additional_tax" class="form-label ">Additional Tax (%)</label>
                            <input type="text" name="additional_tax" id="additional_tax" class="form-control" value="0.00">
                        </div>

                        <div class="mb-3">
                            <label for="return_days" class="form-label">Return Days</label>
                            <input type="number" name="return_days" id="return_days" class="form-control" value="30" min="1">
                        </div>

                        <div class="mb-3">
                            <label for="product_detail" class="form-label ">Product Detail</label>
                            <textarea name="product_detail" id="product_detail" class="form-control summernote" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="product_specification" class="form-label">Product Specification</label>
                            <textarea name="product_specification" id="product_specification" class="form-control summernote" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags (comma-separated)</label>
                            <input type="text" name="tags" id="tags" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200, // Increase editor height
            placeholder: 'Write your content here...',
            tabsize: 2,
            focus: true,

            // Full toolbar with all functionalities
            toolbar: [
                ['style', ['style']], // Heading styles
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']], // Font styles
                ['fontname', ['fontname']], // Font selection
                ['fontsize', ['fontsize']], // Font size
                ['color', ['color']], // Text color
                ['para', ['ul', 'ol', 'paragraph']], // Lists & paragraph settings
                ['height', ['height']], // Line height
                ['table', ['table']], // Insert tables
                ['insert', ['link', 'picture']], // Media: link, image, video
                ['view', ['fullscreen', 'codeview', 'help']], // Fullscreen, HTML view, and help
                ['history', ['undo', 'redo']] // Undo/Redo
            ],

            // Image upload restrictions (optional)
            callbacks: {
                onImageUpload: function(files) {
                    if (files[0].size > 1024 * 1024) { // 1MB limit
                        alert('Image size should be less than 1MB');
                        return;
                    }
                    // You can implement an AJAX image upload function here
                }
            }
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select all textarea elements
        const textareas = document.querySelectorAll('textarea');

        // Loop through each textarea and initialize CKEditor
        textareas.forEach(textarea => {
            ClassicEditor
                .create(textarea, {
                    removePlugins: [
                        'CKFinderUploadAdapter',
                        'CKFinder',
                        'EasyImage',
                        'Image',
                        'ImageCaption',
                        'ImageStyle',
                        'ImageToolbar',
                        'ImageUpload',
                        'MediaEmbed'
                    ],
                })
                .then(editor => {
                    console.log(`CKEditor initialized for ${textarea.id}`);
                })
                .catch(error => {
                    console.error(`Error initializing CKEditor for ${textarea.id}:`, error);
                });
        });
    });
</script>


@endsection