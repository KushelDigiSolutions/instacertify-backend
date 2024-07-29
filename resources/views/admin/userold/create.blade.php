@extends('admin.layouts.app')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="custom-app-toolbar">
                <div class="left">
                    <p>User Management</p>
                    <ul>
                        <li>
                            <a href="./">Home</a>
                        </li>
                        <li>
                            <a href="#">Create</a>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div id="kt_app_content_container" class="app-container container-xxl">
                        <div class="d-flex flex-column flex-xl-row">
                            <div class=" d-flex flex-column ">
                                <div id="profile-craetion" class="um-sidebar flight flex-column flex-lg-row-auto w-100 w-xl-350px">
                                    <div class="card mb-5 mb-xl-8">
                                        <div class="card-body pt-15">
                                            <style>
                                                .image-input-placeholder {
                                                    background-image: url({{ asset('backend/admin/images/blank-image.svg') }});
                                                }

                                                [data-bs-theme="dark"] .image-input-placeholder {
                                                    background-image: url({{ asset('backend/admin/images/blank-image-dark.svg') }});
                                                }
                                            </style>
                                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                                data-kt-image-input="true">
                                                <div class="image-input-wrapper w-150px h-150px"></div>
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change image">
                                                    <i class="ki-duotone ki-pencil fs-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="image_remove" />
                                                </label>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel image">
                                                    <i class="ki-duotone ki-cross fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove image">
                                                    <i class="ki-duotone ki-cross fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                            </div>
                                            <div class="text-muted fs-7">Set the category image. Only *.png, *.jpg and
                                                *.jpeg image files are accepted</div>
                                        </div>
                                    </div>
                                </div>
                                <div id="second-prof1"
                                    class="um-sidebar flight1 flex-column flex-lg-row-auto w-100 w-xl-350px">
                                    <div class="card mb-5 mb-xl-8">
                                        <div class="card-body ">
                                            <div class="um-user-detials d-flex  flex-column mb-5">
                                                <p class="gs">Group:</p>
                                                <div class="input-group mb-5  yuyu">
                                                    <span class="input-group-text stan" id="basic-addon1"><img
                                                            src="{{ asset('backend/admin/images/smilie.png') }}"
                                                            alt=""></span>
                                                    <select class="form-control form-select" aria-label="Select example"
                                                        name="" id="">
                                                        <option value="">Group</option>
                                                        <option value="">Group</option>
                                                    </select>
                                                </div>
                                                <p class="us-gp">Set the user group.</p>
                                            </div>
                                            <div class=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="third-prof1"
                                    class="um-sidebar flight1 flex-column flex-lg-row-auto w-100 w-xl-350px">
                                    <div class="card mb-5 mb-xl-8">
                                        <div class="card-body ">
                                            <div class="um-user-detials d-flex  flex-column mb-5">
                                                <div class="status">
                                                    <p class="gs">Status:</p>
                                                    <img src="{{ asset('backend/admin/images/green.png') }}" alt="">
                                                </div>
                                                <div class="input-group mb-5  yuyu">
                                                    <span class="input-group-text stan" id="basic-addon1"><img
                                                            src="{{ asset('backend/admin/images/smilie.png') }}"
                                                            alt=""></span>
                                                    <select class="form-control form-select" aria-label="Select example"
                                                        name="status">
                                                        <option value="">Status</option>
                                                        <option value="unblock">Active</option>
                                                        <option value="block">Block</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="um-content flex-lg-row-fluid ms-lg-10">
                                <ul class="nav um-nav-tabs">
                                    <li id="first-net" class="nav-item">
                                        <a id="serf" class="nav-link active" data-bs-toggle="tab"
                                            href="#kt_customer_view_overview_tab">Profile</a>
                                    </li>
                                    <li id="second-net" class="nav-item">
                                        <a id="serf1" class="nav-link" data-bs-toggle="tab"
                                            href="#kt_customer_view_overview_activity_tab">Password</a>
                                    </li>
                                    <li id="third-net" class="nav-item">
                                        <a id="serf2" class="nav-link" data-kt-countup-tabs="true"
                                            data-bs-toggle="tab" href="#kt_customer_view_overview_security">Connection</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active activity1" id="kt_customer_view_overview_tab"
                                        role="tabpanel">
                                        <div>
                                            <div class="tb-overview">
                                                <h4 class="ps">Personal Information:</h4>
                                                <p class="ps1">
                                                    Following information is publicly displayed, be careful!
                                                </p>
                                            </div>
                                            <div class="input-user">
                                                <div class="input-groups-user mt-7">
                                                    <label class="namei" for="">Name</label>
                                                    <div class="input-group mb-5 mt-2">
                                                        <span class="input-group-text" id="basic-addon1"><img
                                                                src="{{ asset('backend/admin/images/log.png') }}"
                                                                alt=""></span>
                                                        <input type="text" class="form-control" placeholder="Name"
                                                            name="name" aria-label="Username"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                </div>
                                                <div class="input-groups-user mt-7">
                                                    <label class="namei" for="">Email</label>
                                                    <div class="input-group mb-5 mt-2">
                                                        <span class="input-group-text" id="basic-addon1"><img
                                                                src="{{ asset('backend/admin/images/log1.png') }}"
                                                                alt=""></span>
                                                        <input type="email" class="form-control" placeholder="Email"
                                                            name="email" aria-label="Username"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                </div>
                                                <div class="input-groups-user mt-7">
                                                    <label class="namei" for="">Phone</label>
                                                    <div class="input-group mb-5 mt-2">
                                                        <span class="input-group-text" id="basic-addon1"><img
                                                                src="{{ asset('backend/admin/images/log1.png') }}"
                                                                alt=""></span>
                                                        <input type="number" class="form-control" name="mobile_number"
                                                            placeholder="Phone" aria-label="Username"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tb-overview mt-16">
                                                <h4 class="ps">Additional Information:</h4>
                                                <p class="ps1">
                                                    Communication details in case we want to connect with you.
                                                </p>
                                            </div>
                                            <div class="input-user">
                                                <div class="input-groups-user mt-7">
                                                    <label class="namei" for="">Country</label>
                                                    <div class="input-group mb-5 mt-2 yuyu">
                                                        <span class="input-group-text stan stan1" id="basic-addon1"><img
                                                                src="{{ asset('backend/admin/images/country.png') }}"
                                                                alt=""></span>
                                                        <select class="form-control form-cont1 form-select"
                                                            aria-label="Select example" name="country" id=""
                                                            required>
                                                            <option value="United States">United States</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="input-groups-user mt-7">
                                                    <label class="namei" for="">State</label>
                                                    <div class="input-group mb-5 mt-2 yuyu">
                                                        <span class="input-group-text stan stan1" id="basic-addon1"><img
                                                                src="{{ asset('backend/admin/images/country.png') }}"
                                                                alt=""></span>
                                                        <select class="form-control form-cont1 form-select"
                                                            aria-label="Select example" name="state" id=""
                                                            required>
                                                            <option value="">State</option>
                                                            <option value="Massachusetts">Massachusetts</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="input-groups-user mt-7">
                                                    <label class="namei" for="">City</label>
                                                    <div class="input-group mb-5 mt-2 yuyu">
                                                        <select class="form-control  form-cont2 form-select"
                                                            aria-label="Select example" name="city" id=""
                                                            required>
                                                            <option value="">City</option>
                                                            <option value="North Falmouth">North Falmouth</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit </button>
                                    </div>
            </form>

            <div class="tab-pane fade activity2 " id="kt_customer_view_overview_activity_tab" role="tabpanel">
                <div class="tb-overview">
                    <h4 class="ps">Password Information:</h4>
                    <p class="ps1">
                        You can only change your password twice within 24 hours!
                    </p>
                </div>
                <div class="input-user">
                    <form>
                        <div class="input-groups-user mt-7">
                            <label class="namei" for="">Password</label>
                            <div class="input-group mb-5 mt-2">
                                <span class="input-group-text" id="basic-addon1"><img
                                        src="{{ asset('backend/admin/images/key.png') }}" alt=""></span>
                                <input type="password" class="form-control" placeholder="Password" aria-label="Username"
                                    aria-describedby="basic-addon1" />
                            </div>
                        </div>
                        <div class="input-groups-user input-pass mt-7">
                            <label class="namei" for="">Password Confirm</label>
                            <div class="input-group mb-5 mt-2">
                                <span class="input-group-text" id="basic-addon1"><img
                                        src="{{ asset('backend/admin/images/key.png') }}" alt=""></span>
                                <p class="hides">Hide</p>
                                <input type="email" class="form-control" placeholder="Password Confirm"
                                    aria-label="Username" aria-describedby="basic-addon1" />
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit </button>
                    </form>
                </div>
                <div class="password-overview mt-16">
                    <h3>Password Requirements:</h3>
                    <ul>
                        <li>At least one lowercase character</li>
                        <li>Minimum 8 characters long - the more, the better</li>
                        <li>At least one number, symbol, or whitespace character</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    <script>
        let firstNet = document.getElementById("first-net");
        let secondNet = document.getElementById("second-net");
        let thirdNet = document.getElementById("third-net");

        document.getElementById("third-prof1");
        firstNet.addEventListener("click", (e) => {
            e.preventDefault();
            document.getElementById("serf").classList.add("active");
            document.getElementById("serf1").classList.remove("active");
            document.getElementById("serf2").classList.remove("active");
            document.querySelector(".activity1").classList.add("show", "active");
            document.querySelector(".activity2").classList.remove("show", "active");
            document.getElementById("second-prof1").classList.remove("shows");
            document.getElementById("third-prof1").classList.remove("shows");
            document.getElementById("profile-craetion").classList.remove("ftp-users11");
        });

        secondNet.addEventListener("click", (e) => {
            e.preventDefault();
            document.getElementById("serf1").classList.add("active");
            document.getElementById("serf").classList.remove("active");
            document.getElementById("serf2").classList.remove("active");
            document.querySelector(".activity1").classList.remove("show", "active");
            document.querySelector(".activity2").classList.add("show", "active");
            document.getElementById("second-prof1").classList.add("shows");
            document.getElementById("third-prof1").classList.add("shows");
            document.getElementById("profile-craetion").classList.add("ftp-users11");
        })

        // thirdNet.addEventListener("click", (e) => {
        //     e.preventDefault();
        //     document.getElementById("serf1").classList.remove("active");
        //     document.getElementById("serf").classList.remove("active");
        //     document.getElementById("serf2").classList.add("active");
        // })
    </script>
@endsection
