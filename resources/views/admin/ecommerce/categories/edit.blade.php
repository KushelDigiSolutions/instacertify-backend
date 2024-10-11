@extends('admin.layouts.app')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Category
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.categories.index') }}"
                                class="text-muted text-hover-primary">Category List</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Edit Category
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <form action="{{ route('admin.categories.update', $category->id) }}" class="form d-flex flex-column flex-lg-row"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Image</h2>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <style>
                                    .image-input-placeholder {
                                        background-image: url({{ asset('backend/admin/images/blank-image.svg') }});
                                    }
                                </style>
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px"
                                        style="background-image: url({{ asset('ecommerce/categories/' . $category->icon) }})"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
                                        <i class="ki-duotone ki-pencil fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="image_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel image">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove image">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </div>
                                <div class="text-muted fs-7">Set the category image. Only *.png, *.jpg and *.jpeg image
                                    files are accepted</div>
                            </div>
                        </div>
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Status</h2>
                                </div>
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-success w-15px h-15px"></div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <select class="form-select mb-2" name="is_active" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select an option">
                                    <option value="1" {{ $category->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$category->is_active ? 'selected' : '' }}>Deactive</option>
                                </select>
                                <div class="text-muted fs-7">Set the category status.</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-body pt-0">
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">Category Name</label>
                                                <input type="text" name="name" class="form-control mb-2"
                                                    placeholder="Category Name..." value="{{ $category->name }}" required>
                                                <div class="fs-7" style="color:red">A category name is required and
                                                    recommended to be unique.</div>
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">Slug</label>
                                                <input type="text" name="slug" class="form-control mb-2"
                                                    placeholder="Category Slug..." value="{{ $category->slug }}" required>
                                                <div class="fs-7" style="color:red">A category slug is required and
                                                    should be unique.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Update</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
