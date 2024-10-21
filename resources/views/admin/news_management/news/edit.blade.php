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
                        <a href="#">Edit News</a>
                    </li>
                </ul>
            </div>

        </div>
        <!--end::Toolbar-->

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <form class="form d-flex flex-column flex-lg-row" novalidate action="{{ route('admin.news.update', $news->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush">
                                        <div class="card-body">
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">News Title</label>
                                                <input type="text" name="title" class="form-control mb-2"
                                                    placeholder="Name of news" value="{{ $news->title }}" required>
                                                <!-- <div class="text-muted fs-7">A news title is required.</div> -->
                                            </div>
                                         

                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="mb-10 fv-row">
                                                        <label class="form-label">Long Description</label>
                                                        <!-- <textarea name="description" rows="4" class="form-control mb-2" required></textarea> -->
                                                        <textarea id="editor" name="description">{!! $news->description !!}</textarea>
                                                        <!-- <div class="text-muted fs-7">Set a description to the news for better visibility.</div> -->
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
														<ul>
                                                        @if ($news->images)
                                                                @foreach ($news->images as $key => $item)
                                                                    <li> <img
                                                                            src="{{ asset('backend/admin/images/news_management/news/' . $news->images[$key]) }}" /><button type="button" class="rm-img-btn" ><span aria-hidden="true">×</span></button>
                                                                            <input type="hidden" name="oldImages[]" value="{{$news->images[$key]}}">
                                                                        </li>
                                                                @endforeach
                                                        @endif
														</ul>
                                                    </div>
                                                </div>
                                            </div>

                                           

                                        </div>
                                    </div>

                                    <div class="card card-flush">
                                        <div class="card-body">

                                            <div class="row">

                                               

                                                <div class="col-md-12 mb-10">
                                                    <label class="required form-label">News Category</label>
                                                    <select class="form-select mb-2" name="category_ids[]"
                                                        data-control="select2" data-placeholder="Select an option"
                                                        data-allow-clear="true" multiple="multiple" required>
                                                        @foreach ($news_categories as $event_categorie)
                                                            <option value="{{ $event_categorie->id }}"
                                                                @if (in_array($event_categorie->id, $news->category_ids)) selected @endif>
                                                                {{ $event_categorie->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="text-muted fs-7">Select News Categories.</div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-flush">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-5">
                                                    <label class="required form-label">Seo Title</label>
                                                    <input type="text" name="seo_title" class="form-control mb-2"
                                                        value="{{ $news->seo_title }}" placeholder="Name of title">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Seo Description</label>
                                                    <textarea name="seo_description" class="form-control mb-2" rows="4" placeholder="SEO Details">{{ $news->seo_description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-5 mb-20">
                            <a href="{{ route('admin.news.index') }}" class="btn btn-outline">
                                <span class="indicator-label">Cancel</span>
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Update</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const addType = () => {
            let str = `<div class="row align-items-center">
            <div class="col-md-4 mb-10">
                <label class="required form-label">Types of Ticket</label>
                <input type="text" step="0.1" name="tickettype[]" class="form-control mb-2 type-ticket" placeholder="Type ticket" required>
                <!-- <div class="text-muted fs-7">Set the Number of Ticket.</div> -->
            </div>
            <div class="col-md-4 mb-10">
                <label class="required form-label">Ticket Tag</label>
                <input type="text" name="ticket_tag[]" class="form-control mb-2 type-ticket-tag" placeholder="Ticket Tag" required>
                <input type="hidden" name="bigcomm[]" value="0" required>
            </div>
            <div class="col-md-3 mb-10">
                <label class="required form-label">Ticket Price</label>
                <input type="number" step="0.01" name="ticket_price[]" class="form-control mb-2 type-ticket-price" placeholder="Ticket Price" required>
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

        $(showDateDiv())
        $(showTimeDiv())

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
        const files = $("#eventMedia");
        const fileList = $(".mediaFileList ul");

        function getFileData() {
            var input = document.getElementById('eventMedia');
            var children = "";
            for (var i = 0; i < input.files.length; ++i) {

                children += '<li> <img src="' + window.URL.createObjectURL(input.files[i]) + '" alt="' + input.files.item(i)
                    .name + '" title="' + input.files.item(i).name + '" /><button type="button" class="rm-img-btn" onclick="removeFile(this)" ><span aria-hidden="true">×</span></button></li>';
            }
            fileList.append(children);
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
@endsection
