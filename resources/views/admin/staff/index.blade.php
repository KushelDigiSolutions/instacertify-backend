@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <div class="custom-app-toolbar">
            <div class="left">
                <p>Staff Management</p>
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">Staff</a>
                    </li>
                </ul>
            </div>
            <div class="right">
                @can('staff-create')
                    <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
                        Create Staff
                    </a>
                @endcan
            </div>
        </div>
        <div class="alert-fanding">
            <div class="alert-siding">
                <div class="alert-sining">
                    <img src="{{ asset('backend/admin/images/crissing.png') }}" alt="">
                </div>
                <div class="alert-sining1">
                    <img src="{{ asset('backend/admin/images/editing.png') }}" alt="">
                    <h3 class="text-center">Delete Account</h3>
                    <p class="text-center">You want to delete this account!!!</p>
                </div>
                <div class="alert-sining2">
                    <button>
                        <img src="{{ asset('backend/admin/images/deleting.png') }}" alt="">
                        <p>Yes, Delete Account</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">

                @include('admin.layouts.alert_message')
                <div class="card">
                    <form id="search_form">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">

                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" class="form-control form-control-solid w-250px ps-13"
                                        name="search_key" placeholder="Search Staff" onkeyup="fillter()">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body pt-0" id="table">
                        @include('admin.staff.table')
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function fillter() {
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.staff.index') }}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('#table').html(data)
                }
            });
        }

        function dismismodal(id) {
            $('#' + id).modal('hide');
        }
    </script>
@endsection
