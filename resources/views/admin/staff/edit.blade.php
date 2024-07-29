@extends('admin.layouts.app')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">

            <!--begin::Toolbar-->
            <div class="flex flex-col">
                <div class="custom-app-toolbar ">
                    <div class="left">
                        <p>Staff Management</p>
                        <ul>
                            <li>
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li>
                                <a href="#">New staff</a>
                            </li>
                        </ul>
                    </div>



                </div>




                <!--end::Toolbar-->
            </div>


            <!--begin::Content -->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column ">
                        <form class="form-example" action="{{ route('admin.staff.update', $data->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="basic_information1">
                                <h3 class="ml-3">Basic Information</h3>
                                <div class="form_section rounded mt-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_section_input">
                                                <label for="">First Name</label>
                                                <input class="form-control mt-2" placeholder="Enter tha first name"
                                                    type="text" name="first_name" value="{{ $data->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form_section_input">
                                                <label for="">Last Name</label>
                                                <input class="form-control mt-2" placeholder="Enter tha last name"
                                                    type="text" name="last_name" value="{{ $data->last_name }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-6">
                                        <div class="col-md-12">
                                            <div class="form_section_input">
                                                <label for="">E-mail</label>
                                                <input class="form-control mt-2" placeholder="Enter tha Email"
                                                    type="email" name="email" value="{{ $data->email }}" disabled>
                                            </div>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-6">
                                        <div class="col-md-6">
                                            <div class="form_section_input">
                                                <label for="">Timezone</label>
                                                <input class="form-control mt-2" placeholder="Timezone" type="text"
                                                    name="timezone" value="{{ $data->timezone }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form_section_input">
                                                <label for="">Language</label>
                                                <input class="form-control mt-2" placeholder="Language" type="text"
                                                    name="language" value="{{ $data->language }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="roles_password basic_information1 mt-10">
                                <h3 class="ml-3">Password</h3>
                                <div class="form_section roles_password  rounded mt-8">

                                    <div class="row mt-6">
                                        <div class="col-md-6">
                                            <label class="block label1" for="">New Password</label>
                                            <div
                                                class=" form_section_input form_section_input1 rounded input-group align-items-center mb-5 mt-2">
                                                <!-- <p class="hides hides1">Hide</p> -->
                                                <input type="password" class="form-control" placeholder="New Password"
                                                    aria-label="Username" aria-describedby="basic-addon1" name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="block label1" for="">Confirm Password</label>
                                            <div
                                                class=" form_section_input form_section_input1 rounded input-group align-items-center mb-5 mt-2">
                                                <!-- <p class="hides hides1">Hide</p> -->
                                                <input type="password" class="form-control" placeholder="Confirm password"
                                                    aria-label="Username" aria-describedby="basic-addon1"
                                                    name="password_confirmation">
                                            </div>
                                        </div>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="basic_information1 contact_information mt-10">
                                <h3 class="ml-3">Contact Information</h3>
                                <div class="form_section form_contact_section h-auto  rounded mt-8">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_section_input">
                                                <label for="">Address</label>
                                                <input class="form-control mt-2" placeholder="Enter the Address"
                                                    name="address" type="text" value="{{ $data->address }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form_section_input">
                                                <label for="">Enter the mobile</label>
                                                <input class="form-control mt-2" placeholder="Enter the mobile"
                                                    name="mobile_number" type="number"
                                                    value="{{ $data->mobile_number }}" required>
                                            </div>
                                            @error('mobile_number')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="save_cancel mt-20 mr-5 d-flex align-items-center justify-content-end">
                                <div class="cancel22">
                                    <button>Cancel</button>
                                </div>
                                <div class="saved_user">
                                    <button type="submit">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.8002 15.8998L4.6002 11.6998L3.2002 13.0998L8.8002 18.6998L20.8002 6.6998L19.4002 5.2998L8.8002 15.8998Z"
                                                fill="white" />
                                        </svg>
                                        Update Staff
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->

        </div>
        <!--end::Content wrapper-->
    </div>
@endsection
