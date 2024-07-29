<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @isset($page_title)
            {{ $page_title }}
        @else
            {{ env('APP_NAME') }}
        @endisset
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('fab_icon.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('backend/admin/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/css/vis-timeline.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="{{ asset('backend/admin/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/css/event-list.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="{{ asset('backend/admin/css/asit.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('backend/admin/css/summernote-bs4.min.css') }}">
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

            @include('admin.layouts.nav')

            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

                @include('admin.layouts.sidebar')

                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

                    @yield('content')

                    <div id="kt_app_footer" class="app-footer">
                        <div
                            class="app-container container-fluid d-flex justify-content-center flex-column flex-md-row flex-center flex-md-stack py-3">
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">Copyright - &copy; {{date('Y')}} </span>
                                <a href="javascript:void(0);" class="text-gray-800 cursor-default">MadFish Solutions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <script src="{{ asset('backend/admin/js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/admin/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/admin/js/datatables.bundle.js') }}"></script>
    <script src="{{ asset('backend/admin/js/vis-timeline.bundle.js') }}"></script>
    <script src="{{ asset('backend/admin/js/save-product.js') }}"></script>
    <script src="{{ asset('backend/admin/js/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('backend/admin/js/summernote-bs4.min.js') }}"></script>

    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
        })
    </script>
</body>

</html>
