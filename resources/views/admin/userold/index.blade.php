@extends('admin.layouts.app')
@section('content')
        <div class="d-flex flex-column flex-column-fluid">

        <div class="custom-app-toolbar">
                <div class="left">
                    <p>User Management</p>
                    <ul>
                        <li>
                            <a href="{{route('admin.dashboard')}}">Home</a>
                        </li>
                        <li>
                            <a href="#">Users</a>
                        </li>
                    </ul>
                </div>
                <div class="right">
                    @can('staff-create')
                    <a href="{{route('admin.users.create')}}" class="btn btn-primary">
                        Create User
                    </a>
                    @endcan
                </div>
            </div>
           <div  class="alert-fanding">
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
                    <div class="row row2">
                        <div class="col-md-4">
                            <div class="card card4 mb-2">

                                <div class="card-title text-center">
                                    <img src="{{ asset('backend/admin/images/user1.png') }}" alt="image" />
                                </div>
                                <div class=" card-body11 text-center">
                                    <h4>Total Users</h4>
                                    <h2>{{App\Models\Admin\Admin::count()}}</h2>
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
                                    <h2>{{App\Models\Admin\Admin::where('status','unblock')->count()}}</h2>
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
                                    <h2>{{App\Models\Admin\Admin::where('status','block')->count()}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('admin.layouts.alert_message')
                    <div class="card">
                        <form id="search_form">
                            <div class="card-header border-0 pt-6">
                                <div class="card-title">
                                    {{-- <div class="d-flex align-items-center position-relative my-1">
                                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="text" class="form-control form-control-solid w-250px ps-13" name="search_key" placeholder="Search Customers" onkeyup="fillter()">
                                    </div> --}}
                                </div>
                                <div class="card-toolbar">
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="text" class="form-control form-control-solid w-250px ps-13" name="search_key" placeholder="Search Customers" onkeyup="fillter()">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-body pt-0" id="table">
                            @include('admin.user.table')
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            function fillter(){
                $.ajax({
                    type: 'GET',
                    url: "{{route('admin.users.index')}}",
                    data: $('#search_form').serialize(),
                    success: function(data) {
                        $('#table').html(data)
                    }
                });
            }

            function dismismodal(id){
                $('#'+id).modal('hide');
            }
        </script>
@endsection


