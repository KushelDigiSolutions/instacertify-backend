@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                       Category List
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                           Category List
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    @can('categories-create')
                        <a href="{{ route('admin.ecommerce.categories.create') }}" class="btn btn-sm fw-bold btn-primary">Create New Category</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                @include('admin.layouts.alert_message')
                <div class="card">
                    <div class="card-body pt-0">
                        <form id="search_form">
                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center position-relative mt-10 mb-10">
                                        <input type="text" class="form-control form-control-solid w-250px ps-13"
                                            name="search_key" placeholder="Search" onkeyup="fillter()">
                                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="table">
                            @include('admin.ecommerce.categories.table')  {{-- Update this line to point to your categories table --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fillter() {
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.categories.index') }}",  {{-- Update the route to categories index --}}
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('#table').html(data)
                }
            });
        }
    </script>
@endsection