@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <div class="custom-app-toolbar">
            <div class="left">
                <p>Admin Management</p>
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                </ul>
            </div>
            <div class="right">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="47" height="47" rx="5.5" stroke="#E1E3EA" />
                    <path d="M22 30H26V28H22V30ZM15 18V20H33V18H15ZM18 25H30V23H18V25Z" fill="#3F4254" />
                </svg>
                @can('user-create')
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-design">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 8H8V14H6V8H0V6H6V0H8V6H14V8Z" fill="white" />
                        </svg>
                        <span>Create User</span>
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
                {{-- <div class="row row2">
                <div class="col-md-4">
                    <div class="card card4 mb-2">

                        <div class="card-title text-center">
                            <img src="{{ asset('backend/admin/images/user1.png') }}" alt="image" />
                        </div>
                        <div class=" card-body11 text-center">
                            <h4>Total Users</h4>
                            <h2>100</h2>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card4 mb-2">
                        <div class="card-title text-center">
                            <img src="{{ asset('backend/admin/images/user3.png') }}" alt="image" />
                        </div>
                        <div class="card-body11 text-center">
                            <h4>Active Users</h4>
                            <h2>120</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card4 mb-2">
                        <div class="card-title text-center">
                            <img src="{{ asset('backend/admin/images/user2.png') }}" alt="image" />
                        </div>
                        <div class="card-body11 text-center">
                            <h4>Inactive Users</h4>
                            <h2>130</h2>
                        </div>
                    </div>
                </div>
            </div> --}}
                @include('admin.layouts.alert_message')
                <div class="card cardist">
                    @include('admin.user.table')
                </div>
            </div>
        </div>
    @endsection
