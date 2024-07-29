@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
		
		<!--begin::Toolbar-->
            <div class="custom-app-toolbar">
                <div class="left">
                    <p>Equipment Management</p>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Equipment List</a>
                        </li>
                    </ul>
                </div>
                <div class="right">

                   

                    <!--end::Menu This Week-->
                        <a href="{{ route('admin.equipment.create') }}" class="btn btn-sm fw-bold btn-primary">
                            <i class="ki-duotone ki-plus-square fs-1"><span class="path3"></span></i>
                            Add Product 
                        </a>
                </div>
            </div>
            <!--end::Toolbar-->
		
		 <!--begin::Content -->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">


                    <!--Status-->
                  


                    <!--Lists-->
                  


                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
		
        
        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                @include('admin.layouts.alert_message')
                <div class="card">
                    <div class="card-body" id="page-section-body">
                        
                        <form id="search_form">

                            <div class="page-section-head">
                                <div class="psh-left">
                                    <p>Products</p>
                                </div>
                                <div class="psh-right d-flex gap-5">
                                    
                                    <div class="d-flex align-items-center position-relative">
                                        <input type="text" class="form-control form-control-solid w-350px ps-13"
                                            name="search_key" placeholder="Search.." onkeyup="fillter()">
                                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                            </div>
                         
                        </form>
                        
                        <div id="table" class="table-responsive-1">
                            @include('admin.equipment_rental.equipment.table')
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
                url: "{{ route('admin.equipment.index') }}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('#table').html(data)
                }
            });
        }
    </script>
@endsection
