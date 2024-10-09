@extends('admin.layouts.app')
@section('content')
    <style>
        .lbl-eventMedia {
            background: #F3F6F8;
            border-radius: 6px;
            padding: 30px 10px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 150px;
            margin-top: 30px;
        }

        .lbl-eventMedia::before {
            content: '';
            position: absolute;
            width: 94%;
            height: 90%;
            z-index: 0;
            border: 1px dashed #3595F6;
            margin: 0 auto;
            left: 3.2%;
            top: 5%;
            border-radius: 6px;
        }

        .lbl-eventMedia>span {
            display: block;
            margin-top: 15px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 17px;
            text-align: center;
            color: #7E8299;
        }

        .lbl-eventMedia>span b {
            color: #2A78C5;
        }

        .lbl-eventMedia .eventMedia {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
    </style>


    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div class="custom-app-toolbar">
            <div class="left">
                <p>
                    @isset($page_title)
                        {{ $page_title }}
                    @endisset
                </p>
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">Add Event</a>
                    </li>
                </ul>
            </div>

        </div>
        <!--end::Toolbar-->

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <form id="form01" class="form d-flex flex-column flex-lg-row" action="{{ route('admin.events.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush">
                                        <div class="card-body">
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">Event Title</label>
                                                <input type="text" name="title"
                                                    class="form-control form-control11 mb-2"
                                                    oninput="validate(this, 'title-warn')" placeholder="Name of event"
                                                    required>
                                                <div id="title-warn" class="text-warning2 none fs-7">This event title is
                                                    already exists</div>
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <label class="form-label">Short Description</label>
                                                <textarea name="short_description" rows="4" class="form-control form-control11 mb-2"
                                                    placeholder="Short Details about event" required></textarea>
                                                <!-- <div class="text-muted fs-7">Set a short description to the event.</div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="mb-10 fv-row">
                                                        <label class="form-label">Long Description</label>
                                                        <!-- <textarea name="description" rows="4" class="form-control mb-2" required></textarea> -->
                                                        <textarea class="form-control11 form-control" id="editor" name="description"></textarea>
                                                        <!-- <div class="text-muted fs-7">Set a description to the event for better visibility.</div> -->
                                                    </div>
                                                </div>


                                                <div class="col-md-5">

                                                    <label class="lbl-eventMedia" for="eventMedia">
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            width="42px" height="42px"
                                                            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <g>
                                                                <path style="opacity:0.824" fill="#7e8199"
                                                                    d="M 6.5,1.5 C 12.8333,1.5 19.1667,1.5 25.5,1.5C 25.5,2.5 25.5,3.5 25.5,4.5C 19.8236,4.33391 14.1569,4.50058 8.5,5C 7.58377,5.37424 6.75044,5.87424 6,6.5C 4.41854,12.7226 4.0852,19.0559 5,25.5C 8.29738,19.836 12.2974,19.1693 17,23.5C 19.1988,20.4475 22.0322,18.4475 25.5,17.5C 29.6264,19.0988 33.1264,21.7655 36,25.5C 36.4983,22.1832 36.665,18.8499 36.5,15.5C 37.5,15.5 38.5,15.5 39.5,15.5C 39.6662,21.8421 39.4995,28.1754 39,34.5C 38.5348,35.9308 37.7014,37.0975 36.5,38C 26.5998,39.6154 16.5998,39.9487 6.5,39C 4.33333,38.1667 2.83333,36.6667 2,34.5C 1.33333,25.1667 1.33333,15.8333 2,6.5C 3.02496,4.31305 4.52496,2.64638 6.5,1.5 Z M 24.5,20.5 C 28.7681,22.9325 32.2681,26.2658 35,30.5C 35.7203,32.1124 35.5536,33.6124 34.5,35C 29.9445,36.1094 25.2778,36.6094 20.5,36.5C 16.5,36.3333 12.5,36.1667 8.5,36C 6.5,35.3333 5.16667,34 4.5,32C 6.45143,28.9105 8.95143,26.4105 12,24.5C 13.3695,26.2026 15.0362,27.536 17,28.5C 20.3695,26.6311 22.8695,23.9644 24.5,20.5 Z" />
                                                            </g>
                                                            <g>
                                                                <path style="opacity:0.804" fill="#7d8198"
                                                                    d="M 31.5,1.5 C 32.5,1.5 33.5,1.5 34.5,1.5C 34.5,3.16667 34.5,4.83333 34.5,6.5C 36.1667,6.5 37.8333,6.5 39.5,6.5C 39.6162,9.91032 37.9496,11.2436 34.5,10.5C 34.8841,12.6648 34.2174,14.3315 32.5,15.5C 30.7826,14.3315 30.1159,12.6648 30.5,10.5C 28.3352,10.8841 26.6685,10.2174 25.5,8.5C 26.6685,6.78256 28.3352,6.11589 30.5,6.5C 30.366,4.70848 30.6993,3.04181 31.5,1.5 Z" />
                                                            </g>
                                                            <g>
                                                                <path style="opacity:0.799" fill="#7f839a"
                                                                    d="M 9.5,6.5 C 16.4879,6.65355 18.4879,9.82022 15.5,16C 9.24917,18.2919 6.41584,16.1252 7,9.5C 7.69794,8.30943 8.53128,7.30943 9.5,6.5 Z M 10.5,10.5 C 13.9571,10.6672 14.2904,11.6672 11.5,13.5C 10.6143,12.675 10.281,11.675 10.5,10.5 Z" />
                                                            </g>
                                                        </svg>

                                                        <span>
                                                            <b>Click to upload</b> or drag and drop <br>PNG, JPG or GIF
                                                        </span>
                                                        <input type="file" id="eventMedia" name="images[]"
                                                            class="form-control eventMedia"
                                                            accept="image/jpeg,image/gif,image/png" multiple>
                                                    </label>
                                                    <div class="mediaFileList">
														<ul></ul>
													</div>
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-10 fv-row">
                                                    <label class="form-label">Location Map</label>
                                                    <input type="text" name="location_iframe"
                                                        class="form-control title_can form-control11 mb-2"
                                                        oninput="validate(this, 'title-warn')" placeholder="Embeded Map of this Location" required="">
                                                    <div id="title-warn" class="text-warning2 none fs-7">Please add the location map</div>
                                                </div>
                                            </div>

                                        </div>

                                            <div class="row">
                                                {{-- <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Event Location</label>
                                                        <input type="text" name="location" class="form-control mb-2" placeholder="An event venue" required>
                                                        <div class="text-muted fs-7">Set the Event Location.</div>
                                                    </div> --}}
                                                <div class="col-md-6 mb-10">
                                                    <label class="required form-label">Event Location</label>
                                                    <div class="input-group input-gt">
                                                        <input type="text" class="form-control form-control11"
                                                            name="location" placeholder="An event venue"
                                                            aria-describedby="basic-addon2" required>
                                                        <div class="input-group-append"><span
                                                                class="input-group-text input-group-text1"
                                                                id="basic-addon2"><svg width="20" height="24"
                                                                    viewBox="0 0 20 28" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M10.0003 0.666656C4.84033 0.666656 0.666992 4.83999 0.666992 9.99999C0.666992 17 10.0003 27.3333 10.0003 27.3333C10.0003 27.3333 19.3337 17 19.3337 9.99999C19.3337 4.83999 15.1603 0.666656 10.0003 0.666656ZM3.33366 9.99999C3.33366 6.31999 6.32033 3.33332 10.0003 3.33332C13.6803 3.33332 16.667 6.31999 16.667 9.99999C16.667 13.84 12.827 19.5867 10.0003 23.1733C7.22699 19.6133 3.33366 13.8 3.33366 9.99999Z"
                                                                        fill="#5E6278" />
                                                                    <path
                                                                        d="M10.0003 13.3333C11.8413 13.3333 13.3337 11.8409 13.3337 9.99999C13.3337 8.15904 11.8413 6.66666 10.0003 6.66666C8.15938 6.66666 6.66699 8.15904 6.66699 9.99999C6.66699 11.8409 8.15938 13.3333 10.0003 13.3333Z"
                                                                        fill="#5E6278" />
                                                                </svg>
                                                            </span></div>
                                                    </div>
                                                    <!-- <div class="text-muted fs-7">Set the Event Location.</div> -->
                                                </div>

                                                <div class="col-md-6 mb-10">
                                                    <label class="required form-label">Number of Ticket</label>
                                                    <input type="number" step="0.1" name="number_of_tickets"
                                                        class="form-control form-control11 mb-2"
                                                        placeholder="Number of Ticket" required>
                                                    <div class="text-muted fs-7">Set the Number of Ticket.</div>
                                                </div>
                                                {{-- <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Ticket Price</label>
                                                        <input type="number" step="0.01" name="ticket_price" class="form-control mb-2" placeholder="Ticket Price" required>
                                                    </div> --}}

                                            </div>
                                            <div id="type-0">

                                            </div>

                                            <button type="button" onclick="addType()"
                                                class="btn btn-outline btn-add-column btn-adds4 d-flex align-items-center justify-content-center float-end">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path
                                                        d="M11.8332 6.83366H6.83317V11.8337H5.1665V6.83366H0.166504V5.16699H5.1665V0.166992H6.83317V5.16699H11.8332V6.83366Z"
                                                        fill="#205A95"></path>
                                                </svg>
                                                &nbsp; Add Type
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card card-flush">
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div
                                                        class="col-md-12 d-flex gap-2 align-self-center justify-content-end">
                                                        <label for="single_day">Single day event</label>
                                                        <input type="checkbox" name="single_day" id="single_day"
                                                            onclick="showDateDiv()" checked>
                                                    </div>

                                                    <div class="col-md-12 mb-10 single_day">
                                                        <label class="required form-label">Date</label>

                                                            <input name="date" type="date"
                                                                class="form-control form-control11"
                                                                min=""
                                                               />

                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-6 mb-10 multiple_day d-none">
                                                            <label class="required form-label">Start Date</label>

                                                                <input name="start_date" type="date"
                                                                    class="form-control form-control11"
                                                                    min=""
                                                                   />

                                                        </div>
                                                        <div class="col-md-6 mb-10 multiple_day d-none">
                                                            <label class="required form-label">End Date</label>

                                                                <input name="end_date" type="date"
                                                                    class="form-control form-control11"
                                                                 />

                                                            <!-- <input type="date" name="end_date" class="form-control mb-2"> -->
                                                            <!-- <div class="text-muted fs-7">Select Event Date.</div> -->
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-md-12 d-flex gap-2 align-self-center justify-content-end">
                                                        <input type="checkbox" name="all_day" id="all_day" onclick="showTimeDiv()">
                                                        <label for="all_day">All Day Event</label>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-2 all_day">
                                                            <label class="required form-label">Start Time</label>
                                                            <input type="time" name="start_time"
                                                                class="form-control mb-2 form-control11">
                                                            <!-- <div class="text-muted fs-7">Select Event Start Time.</div> -->
                                                        </div>
                                                        <div class="col-md-6 mb-2 all_day">
                                                            <label class="required form-label">End Time</label>
                                                            <input type="time" name="end_time"
                                                                class="form-control mb-2 form-control11">
                                                            <!-- <div class="text-muted fs-7">Select Event End Time.</div> -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-10">
                                                    <label class="required form-label">Event Category</label>
                                                    <select class="form-select mb-2 form-control11" name="category_ids[]"
                                                        data-control="select2" data-placeholder="Select an option"
                                                        data-allow-clear="true" multiple="multiple" required>
                                                        @foreach ($event_categories as $event_categorie)
                                                            <option value="{{ $event_categorie->id }}">
                                                                {{ $event_categorie->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="text-muted fs-7">Select Event Categories.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-flush">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-5">
                                                    <label class="required form-label">Seo Title</label>
                                                    <input type="text" name="seo_title"
                                                        class="form-control mb-2 form-control11"
                                                        placeholder="Name of title">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Seo Description</label>
                                                    <textarea name="seo_description" class="form-control mb-2 form-control11" rows="4" placeholder="SEO Details"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-5 mb-20">
                            <a href="{{ route('admin.events.index') }}" class="btn btn-outline">
                                <span class="indicator-label">Cancel</span>
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Create Event</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.11/dist/js/tempus-dominus.min.js"
        crossorigin="anonymous"></script>
    <script>
        async function validate(e, id) {
            console.log(e.value);
            let resp = await fetch(`https://fcdev.madfishdev.com/admin/validate-event?title=${e.value}`);
            let data = await resp.json();
            // console.log(data);
            if (!data) {
                document.getElementById(id).classList.remove('none');
            } else {
                if (!document.getElementById(id).classList.contains('none')) {
                    document.getElementById(id).classList.add('none');
                }
            }
        }

        function showDateDiv() {
            var val = $('#single_day').prop('checked');
            if (val) {
                $('.single_day').removeClass('d-none')
                $('.multiple_day').addClass('d-none')
            } else {
                $('.single_day').addClass('d-none')
                $('.multiple_day').removeClass('d-none')
            }
        }

        function showTimeDiv() {
            var val = $('#all_day').prop('checked');
            if (val) {
                $('.all_day').addClass('d-none')
            } else {
                $('.all_day').removeClass('d-none')
            }
        }
    </script>


    <script>
        const addType = () => {
            let str = `<div class="row align-items-center">
            <div class="col-md-4 mb-10">
                <label class="required form-label">Types of Ticket</label>
                <input type="text" name="tickettype[]" class="form-control form-control11 mb-2 type-ticket" placeholder="Type ticket" required>
                <!-- <div class="text-muted fs-7">Set the Number of Ticket.</div> -->
            </div>
            <div class="col-md-4 mb-10">
                <label class="required form-label">Ticket Tag</label>
                <input type="text" name="ticket_tag[]" class="form-control form-control11 mb-2 type-ticket-tag" placeholder="Ticket Tag" required>
            </div>
            <div class="col-md-3 mb-10">
                <label class="required form-label">Ticket Price</label>
                <input type="number" name="ticket_price[]" class="form-control form-control11 mb-2 type-ticket-price" placeholder="Ticket Price" required>
            </div>

            <div class="col-md-1 mb-10 mt-4 cursor-pointer" onclick="closeType(this)">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.3337 2.54669L17.4537 0.666687L10.0003 8.12002L2.54699 0.666687L0.666992 2.54669L8.12033 10L0.666992 17.4534L2.54699 19.3334L10.0003 11.88L17.4537 19.3334L19.3337 17.4534L11.8803 10L19.3337 2.54669Z"
                        fill="#5E6278" />
                </svg>
            </div>
        </div>`;

            let nc = document.createElement('div');
            nc.innerHTML = str;

            document.getElementById('type-0').appendChild(nc);
        };

        const closeType = (e) => {
            // console.log(e);
            e.parentNode.remove();
        };

        const files = $("#eventMedia");
        const fileList = $(".mediaFileList ul");

        function getFileData() {
            var input = document.getElementById('eventMedia');
            var children = "";
            for (var i = 0; i < input.files.length; ++i) {

                children += '<li> <img src="' + window.URL.createObjectURL(input.files[i]) + '" alt="' + input.files.item(i)
                    .name + '" title="' + input.files.item(i).name + '" /><button type="button" class="rm-img-btn" onclick="removeFile(this)" ><span aria-hidden="true">×</span></button></li>';
            }
            fileList.append( children );
        }

        files.change(function() {
            const maxAllowedSize = 10 * 1024 * 1024;
            const fileValue = $(this).val();
            if (fileValue != "") {
                const idxDot = fileValue.lastIndexOf(".") + 1;
                const extFile = fileValue.substr(idxDot, fileValue.length).toLowerCase();
                if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
                    const imageSize = $(this).prop('files')[0]?.size;
                    const fileName = $(this).prop('files')[0]?.name;
                    if (imageSize <= maxAllowedSize) {
                        getFileData();
                    } else {
                        fileList.html('');
                        files.val('')
                        alert("Too big of a file. Uploads must be under 3 MB in size.")
                        return false;
                    }
                } else {
                    fileList.html('');
                    files.val('')
                    alert("Only images & documents files are allowed!")
                    return false;
                }
            } else {
                fileList.html('');
                files.val('')
            }
        });
		
			$(".rm-img-btn").on("click",function(){
			$(this).parent("li").remove();
		});
		function removeFile(e){
			console.log("fire");
			$(e).parent("li").remove();
		}
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'),{
            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
        })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_localization"), {
            localization: {
                locale: "day",
                startOfTheWeek: 1,
                format: "dd/MM/yyyy"
            }
        });
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_localization1"), {
            localization: {
                locale: "day",
                startOfTheWeek: 1,
                format: "dd/MM/yyyy"
            }
        });
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_localization2"), {
            localization: {
                locale: "day",
                startOfTheWeek: 1,
                format: "dd/MM/yyyy"
            }
        });
    </script>
@endsection
