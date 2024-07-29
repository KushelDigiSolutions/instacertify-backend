@extends('admin.layouts.app')
@section('content')
    <style>
        .lbl-backImage {
            background: #D7EAFD;
            border: 1px dashed #3595F6;
            border-radius: 6px;
            padding: 30px 10px;
            position: relative;
            width: 213px;
            height: 151px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .lbl-backImage span.read-btn {
            width: 89px;
            height: 37px;
            background: #FFFFFF;
            border-radius: 4px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 14px;
            line-height: 17px;
            color: #A1A5B7;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .lbl-backImage span.content {
            display: block;
            margin-top: 15px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 15px;
            line-height: 18px;
            color: #2A78C5;
            margin-top: 15px;
        }

        .lbl-backImage>span b {
            color: #2A78C5;
        }

        .lbl-backImage .backImage {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
        }

        .mediaFileList {
            width: 100%;
            display: flex;
            align-items: flex-end;
        }

        .mediaFileList ul {
            width: auto;
            padding: 0;
            gap: 10px;
            list-style: none;
            flex-wrap: wrap;
            margin: 0;
        }

        .mediaFileList ul img {
            object-fit: cover;
            border-radius: 10px;
            width: 213px;
            height: 151px;
            object-position: center top;
        }

        .mediaFileList-d-logo ul {
            background: #E1E3EA;
            border-radius: 6px;
            padding: 10px;
        }

        .mediaFileList-d-logo ul img {
            object-fit: contain;
            object-position: center center;
        }

        .mediaFileList .clearBackImage {
            width: 93px;
            height: 36px;
            background: #F4F4F4;
            border-radius: 4px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 14px;
            line-height: 17px;
            color: #7E8299;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            margin-left: 10px;
            cursor: pointer;
        }

        .mediaFileList .clearBackImage:hover {
            background: #D7EAFD;
        }

        .pb-btn {
            min-width: 110px;
            min-height: 44px;
            background: #FFFFFF;
            border: 1px solid #E1E3EA;
            border-radius: 6px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 0 10px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 17px;
            color: #5E6278;
            transition: all 0.4s;
        }

        .pb-btn svg {
            transition: all 0.4s;
        }

        .pb-btn:hover {
            border-color: #000;
            background: #000;
            color: #fff;
        }

        .pb-btn:hover path {
            fill: #fff;
        }

        .btn-save {
            background: #3595F6;
            border-color: #3595F6;
            color: #FFFFFF;
        }

        .status-orange {
            position: relative;
        }

        .colorPicker {
            width: 258px;
            height: 62px;
            background: #FFFFFF;
            border: 1px solid #E1E3EA;
            border-radius: 6px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 15px;
            line-height: 18px;
            color: #3F4254;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .colorPicker input {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            border: none;
            overflow: hidden;
            cursor: pointer;
            padding: 0;
        }
    </style>


    <div class="d-flex flex-column flex-column-fluid">
        <div class="custom-app-toolbar">
            <div class="left">
                <p>
                    Content Management
                </p>
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">Header</a>
                    </li>
                </ul>
            </div>
            <div class="right">
                <a href="{{ route('admin.header.preview', $header->id) }}" class="pb-btn btn-prev">
                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.5 3.64L7.77 7L2.5 10.36V3.64ZM0.5 0V14L11.5 7L0.5 0Z" fill="#5E6278" />
                    </svg>
                    Preview
                </a>
                <a class="pb-btn btn-save" onclick="$('#submit_form').submit()">
                    <svg width="24" height="20" viewBox="0 0 24 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.77 2.9301L21.17 4.3301L8.43 17.0701L2.83 11.4701L4.23 10.0701L8.43 14.2701L19.77 2.9301ZM19.77 0.100098L8.43 11.4401L4.23 7.2401L0 11.4701L8.43 19.9001L24 4.3301L19.77 0.100098Z"
                            fill="white" />
                    </svg>
                    Save
                </a>
            </div>
        </div>
        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <form class="form" action="{{ route('admin.headers.update', $header->id) }}" method="POST"
                    enctype="multipart/form-data" id="submit_form">
                    @method('PUT')
                    @csrf
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100">
                        <div class="card card-flush">
                            <div class="card-body">
                                <div class="mb-10 fv-row">
                                    <label class="form-label">Header Name</label>
                                    <input type="text" name="title" class="form-control mb-2"
                                        value="{{ $header->title }}" placeholder="Title" required>
                                </div>
                                <div class="w-150px">
                                    <select class="form-select px-5" data-control="select2" name="is_published"
                                        data-hide-search="true" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="1" @if ($header->is_published == '1') selected @endif>Publish
                                        </option>
                                        <option value="0" @if ($header->is_published == '0') selected @endif>Unpublish
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush">
                            <div class="card-body">
                                <div class="fv-row">
                                    <div class="d-flex fv-row mb-10">
                                        <div class="w-100">
                                            <input class="form-check-input me-3 radio-accordion"
                                                data-content="background-image-content" name="background_type"
                                                value="image" type="radio" id="background_type_image"
                                                @if ($header->background_image) checked @endif>
                                            <label class="form-check-label cursor-pointer" for="background_type_image">
                                                <div class="fw-bold text-gray-800">Background Image</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex fv-row mb-10 px-11  @if (!$header->background_image) d-none @endif radio-accordion-content background-image-content">
                                        <div class="w-100">
                                            <p class="fw-bold text-gray-800 mb-1 fs-5">Enabled featured image</p>
                                            <p class="text-gray-500 mb-10">Choose or upload an image to be used when sharing
                                                your page on header background</p>
                                            <label class="lbl-backImage lbl-backImage-back-img" for="backImage">
                                                <span class="read-btn">Upload</span>
                                                <span class="content"><b>Browse images</b></span>
                                                <input type="file" id="backImage" name="background_image"
                                                    class="form-control backImage" accept="image/jpeg,image/gif,image/png">
                                            </label>
                                            <div class="mediaFileList mediaFileList-backimg">
                                                <ul>
                                                    <li> <img
                                                            src="{{ asset($header->background_image) }}"
                                                            alt="admin.png" title="admin.png"></li>
                                                </ul>
                                                <span class="clearBackImage clearBackImageEvent">Clear <svg width="20"
                                                        height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.8337 5.34199L14.6587 4.16699L10.0003 8.82533L5.34199 4.16699L4.16699 5.34199L8.82533 10.0003L4.16699 14.6587L5.34199 15.8337L10.0003 11.1753L14.6587 15.8337L15.8337 14.6587L11.1753 10.0003L15.8337 5.34199Z"
                                                            fill="#7E8299"></path>
                                                    </svg></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex fv-row">
                                        <div class="w-100">
                                            <input class="form-check-input me-3 radio-accordion"
                                                data-content="background-color-content" name="background_type"
                                                value="color" type="radio" id="background_type_color"
                                                @if ($header->background_color) checked @endif>
                                            <label class="form-check-label cursor-pointer" for="background_type_color">
                                                <div class="fw-bold text-gray-800">Background color</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex fv-row mb-10 px-11 mt-10 @if (!$header->background_color) d-none @endif radio-accordion-content background-color-content">
                                        <div class="w-100">
                                            <p class="fw-bold text-gray-800 mb-1 fs-5">Enabled featured image</p>
                                            <p class="text-gray-500 mb-10">Choose or upload an image to be used when
                                                sharing your page on header background</p>
                                            <div class="colorPicker">
                                                <label for="txtColorCode" class="colorCode">#5750CB</label>
                                                <input type="color" name="background_color" id="txtColorCode"
                                                    value="{{ $header->background_color }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush">
                            <div class="card-body">
                                <div class="fv-row">
                                    <label class="form-label">Text</label>
                                    <textarea id="editor" name="text">{!! $header->text !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush mb-20">
                            <div class="card-body">
                                <div class="fv-row">
                                    <div class="d-flex fv-row">
                                        <div class="w-100">
                                            <input class="form-check-input me-3" name="default_logo_radio"
                                                type="checkbox" id="default_logo"
                                                @if (!$header->default_logo) checked @endif>
                                            <label class="form-check-label cursor-pointer" for="default_logo">
                                                <div class="fw-bold text-gray-800">Default logo</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex fv-row px-11 mt-10 @if (!$header->default_logo) d-none @endif default_logo-content">
                                        <div class="w-100">
                                            <p class="fw-bold text-gray-800 mb-1 fs-5">Logo image</p>
                                            <p class="text-gray-500 mb-10">Choose or upload an image to be used when
                                                sharing your page header</p>

                                            <label class="lbl-backImage lbl-defualtLogo" for="txtDefualtLogo">
                                                <svg width="63" height="43" viewBox="0 0 63 43" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M30.0431 32.2895V10.71H32.9578V32.2895H30.0431ZM20.7021 22.9486V20.0509H42.2987V22.9486H20.7021Z"
                                                        fill="#3595F6" />
                                                </svg>
                                                <input type="file" id="txtDefualtLogo" name="default_logo"
                                                    class="form-control backImage"
                                                    accept="image/jpeg,image/gif,image/png">
                                            </label>
                                            <div class="mediaFileList mediaFileList-d-logo">
                                                <ul>
                                                    <li> <img
                                                            src="{{ asset($header->default_logo) }}"
                                                            alt="admin.png" title="admin.png"></li>
                                                </ul>
                                                <span class="clearBackImage clearBackImageEvent">Clear <svg width="20"
                                                        height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.8337 5.34199L14.6587 4.16699L10.0003 8.82533L5.34199 4.16699L4.16699 5.34199L8.82533 10.0003L4.16699 14.6587L5.34199 15.8337L10.0003 11.1753L14.6587 15.8337L15.8337 14.6587L11.1753 10.0003L15.8337 5.34199Z"
                                                            fill="#7E8299"></path>
                                                    </svg></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(".radio-accordion").on('change', function() {
            const data_content = $(this).attr('data-content');
            $(".radio-accordion-content").hide();
            $("." + data_content).attr('style', "display:flex !important;");
        });

        $("#txtColorCode").on('change', function() {
            const colorCode = $(this).val()
            $('label[for="txtColorCode"]').text(colorCode)
        })

        $("#default_logo").on('change', function() {
            const is_checked = $(this).prop('checked')
            if (is_checked) {
                $(".default_logo-content").attr('style', "display:none !important;");
            } else {
                $(".default_logo-content").attr('style', "display:flex !important;");
            }
        })
    </script>


    <script>
        const files = $("#backImage");
        const fileList = $(".mediaFileList-backimg");
        const labelImage = $(".lbl-backImage-back-img");

        function getFileData() {
            const closeBtnHtml =
                `<span class="clearBackImage clearBackImageEvent">Clear <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.8337 5.34199L14.6587 4.16699L10.0003 8.82533L5.34199 4.16699L4.16699 5.34199L8.82533 10.0003L4.16699 14.6587L5.34199 15.8337L10.0003 11.1753L14.6587 15.8337L15.8337 14.6587L11.1753 10.0003L15.8337 5.34199Z" fill="#7E8299"/></svg></span>`
            var input = document.getElementById('backImage');
            var children = "";
            for (var i = 0; i < input.files.length; ++i) {

                children += '<li> <img src="' + window.URL.createObjectURL(input.files[i]) + '" alt="' + input.files.item(i)
                    .name + '" title="' + input.files.item(i).name + '" /></li>';
            }
            fileList.html('<ul>' + children + '</ul>' + closeBtnHtml);
        }

        files.change(function() {
            const maxAllowedSize = 10 * 1024 * 1024;
            const fileValue = $(this).val();
            if (fileValue != "") {
                labelImage.hide();
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
                labelImage.show();
            }
        });

        fileList.on('click', '.clearBackImageEvent', function() {
            labelImage.show();
            fileList.html('');
            files.val('')
        })
    </script>


    <script>
        const files_logo = $("#txtDefualtLogo");
        const fileList_logo = $(".mediaFileList-d-logo");
        const labelImage_logo = $(".lbl-defualtLogo");

        function getFileData_logo() {
            const closeBtnHtml =
                `<span class="clearBackImage clearBackImagedLogo">Clear <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.8337 5.34199L14.6587 4.16699L10.0003 8.82533L5.34199 4.16699L4.16699 5.34199L8.82533 10.0003L4.16699 14.6587L5.34199 15.8337L10.0003 11.1753L14.6587 15.8337L15.8337 14.6587L11.1753 10.0003L15.8337 5.34199Z" fill="#7E8299"/></svg></span>`
            var input = document.getElementById('txtDefualtLogo');
            var children = "";
            console.log(input)
            for (var i = 0; i < input.files.length; ++i) {

                children += '<li> <img src="' + window.URL.createObjectURL(input.files[i]) + '" alt="' + input.files.item(i)
                    .name + '" title="' + input.files.item(i).name + '" /></li>';
            }
            fileList_logo.html('<ul>' + children + '</ul>' + closeBtnHtml);
        }

        files_logo.change(function() {
            const maxAllowedSize = 10 * 1024 * 1024;
            const fileValue = $(this).val();
            if (fileValue != "") {
                labelImage_logo.hide();
                const idxDot = fileValue.lastIndexOf(".") + 1;
                const extFile = fileValue.substr(idxDot, fileValue.length).toLowerCase();
                if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
                    const imageSize = $(this).prop('files')[0]?.size;
                    const fileName = $(this).prop('files')[0]?.name;
                    if (imageSize <= maxAllowedSize) {
                        console.log(1111111)
                        getFileData_logo();
                    } else {
                        fileList_logo.html('');
                        files_logo.val('')
                        alert("Too big of a file. Uploads must be under 3 MB in size.")
                        return false;
                    }
                } else {
                    fileList_logo.html('');
                    files_logo.val('')
                    alert("Only images & documents files are allowed!")
                    return false;
                }
            } else {
                fileList_logo.html('');
                files_logo.val('')
                labelImage_logo.show();
            }
        });

        fileList_logo.on('click', '.clearBackImagedLogo', function() {
            labelImage_logo.show();
            fileList_logo.html('');
            files_logo.val('')
        })
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
