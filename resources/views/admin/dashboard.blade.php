@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    MWR Main Dashboard
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Dashboard</li>
                    </ul>
                </div>

            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row g-5 g-xl-10 mb-xl-10">
                    <div class="col-md-4">
                        <div class="card card-flush">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start"></span>
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{$admin}}</span>
                                        <span class="badge badge-light-success fs-base">
                                            {{-- <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.2% --}}
                                        </span>
                                    </div>
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Admin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-flush">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{$staff}}</span>
                                        <span class="badge badge-light-danger fs-base">
                                            {{-- <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.2% --}}
                                        </span>
                                    </div>
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Staff</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-flush">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{$roles}}</span>
                                        <span class="badge badge-light-danger fs-base">
                                            {{-- <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.2% --}}
                                        </span>
                                    </div>
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Roles</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-flush">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{$event_categories}}</span>
                                        <span class="badge badge-light-danger fs-base">
                                            {{-- <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.2% --}}
                                        </span>
                                    </div>
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Event Categories</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-flush">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{$events}}</span>
                                        <span class="badge badge-light-danger fs-base">
                                            {{-- <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.2% --}}
                                        </span>
                                    </div>
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Events</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-flush">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{$pages}}</span>
                                        <span class="badge badge-light-danger fs-base">
                                            {{-- <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.2% --}}
                                        </span>
                                    </div>
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Pages</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
