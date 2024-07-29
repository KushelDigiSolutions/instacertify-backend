@extends('admin.layouts.cms.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        @isset($page_title)
                            {{ $page_title }}
                        @endisset
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            @isset($page_title)
                                {{ $page_title }}
                            @endisset
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid app-conjing das">
                <div>
                    <div class="modal fade" tabindex="-1" id="kt_modal_1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content modal-content11">
                                <div class="modal-header">
                                    <h3 class="modal-title modal-title11">Welcome!
                                        <img class=" m-lg-2"
                                            src="{{ asset('backend/admin/images/img/waving-hand 1.png') }}"
                                            alt="">
                                    </h3>

                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 cut-btn"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <img src="{{ asset('backend/admin/images/img/kat.png') }}" alt="">
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <div class="modal-con">
                                    <p>It's great to have you here. Add a new page or
                                        select a component to start building your site.</p>
                                   <a href="page-2"><button>Get Started</button></a>
                                </div>

                                <div class="modal-body modal-body11 position-relative">
                                    <!-- <p>Modal body text goes here.</p> -->
                                    <img src="{{ asset('backend/admin/images/img/Intersect.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script>
    $(window).on('load', function () {
      $('#kt_modal_1').modal('show');
    });
    
  </script>
 
@endsection

