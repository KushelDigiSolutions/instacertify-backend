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
                <p>Classes</p>
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">Edit Classes</a>
                    </li>
                </ul>
            </div>

        </div>
        <!--end::Toolbar-->

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <form id="form01" class="form d-flex flex-column flex-lg-row" action="{{ route('admin.vclasses.update', $vclass->id) }}"
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
                                                <label class="required form-label">Class Title</label>
                                                <input type="text" name="title"
                                                    class="form-control form-control11 title_can mb-2"
                                                    oninput="validate(this, 'title-warn')" value="{{ $vclass->title }}" placeholder="Title of Class"
                                                    required>
                                                <div id="title-warn" class="text-warning2 none fs-7">This Class title is
                                                    already exists</div>
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <label class="form-label required">Description</label>
							<textarea name="description" rows="4" id="editor" class="form-control form-control11 mb-2" placeholder="Text here">{{ $vclass->description }}</textarea>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-10 fv-row">
                                                        <label class="form-label required">Class prerequisites</label>
                                                      
                                                        <textarea class="form-control11 form-control" placeholder="Text here"  id="editor1" name="prerequisites">{{ $vclass->prerequisites }}</textarea>
                                                       
                                                    </div>
                                                </div>
   </div>
											<div class="row mb-5">
                                                <div class="col-md-6">
													<label class="form-label required">Class Banner Image</label>
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
                                                        <input type="file" id="eventMedia" name="banner[]"
                                                            class="form-control eventMedia"
                                                            accept="image/jpeg,image/gif,image/png" >
                                                    </label>
                                                    <div class="mediaFileList">
														<ul>
                                                        @if ($vclass->banner)
                                                            
                                                                @foreach ($vclass->banner as $key => $item)
                                                                    <li> <img
                                                                            src="{{ asset('backend/admin/images/vclass_management/vclass/' . $vclass->banner[$key]) }}" /><button type="button" class="rm-img-btn" ><span aria-hidden="true">×</span></button>
                                                                            <input type="hidden" name="oldBanner[]" value="{{$vclass->banner[$key]}}">
                                                                        </li>
                                                                @endforeach
                                                            
                                                        @endif
															</ul>
                                                    </div>
                                                </div>
												
												<div class="col-md-6">
													<label class="form-label required">Class Image Gallery</label>
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
                                                        <input type="file" id="eventMedia1" name="images[]"
                                                            class="form-control eventMedia"
                                                            accept="image/jpeg,image/gif,image/png" multiple>
                                                    </label>
                                                    <div class="mediaFileList1">
														 <ul>
                                                        @if ($vclass->images)
                                                           
                                                                @foreach ($vclass->images as $key => $item)
                                                                    <li> <img
                                                                            src="{{ asset('backend/admin/images/vclass_management/vclass/' . $vclass->images[$key]) }}" alt="{{$vclass->images[$key]}}" title="{{$vclass->images[$key]}}" /><button type="button" class="rm-img-btn" ><span aria-hidden="true">×</span></button>
                                                                            <input type="hidden" name="oldImages[]" value="{{$vclass->images[$key]}}">
                                                                        </li>
                                                                @endforeach
                                                            
                                                        @endif
															 </ul>
                                                    </div>
                                                </div>
											</div>
												<div class="row">
													<div class="col-md-12">
														<label class=" form-label">Video Embeded URL</label>
														<input type="text" name="video" value="{{ $vclass->video }}"
															class="form-control form-control11 title_can mb-2"
															oninput="validate(this, 'title-warn')" placeholder="Youtube embedded URL"
															>
													</div>
												</div>

                                           
                                        </div>
                                    </div>

                                    <div class="card card-flush">
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-md-6">
													 <div class="col-md-12 mb-2 all_day">
                                                            <label class="required form-label">Class Length</label>
                                                            <input type="text" name="class_length"  value="{{ $vclass->class_length }}" placeholder="Duration in hour or minutes" class="form-control mb-2 form-control11 required">
                                                            <!-- <div class="text-muted fs-7">Select Class Start Time.</div> -->
                                                        </div>

                                                    
													<div class="row  mb-2 singleday">
                                                    <div class="col-md-6 single_day">
                                                        <label class="required form-label">Start Day</label>

                                                            <input name="start_date" type="date"
                                                            value="{{ $vclass->start_date }}"
                                                                class="form-control form-control11"
                                                                min="{{ date('Y-m-d') }}"
                                                               />

                                                    </div>
														 <div class="col-md-6 single_day">
															<label class="required form-label">End Day</label>

																<input name="end_date" type="date"  value="{{ $vclass->end_date }}"
																	class="form-control form-control11"
																	min="{{ date('Y-m-d') }}"
																   />

														</div>
													</div>
													<div class="row">
														<div class="col-md-12 d-flex mb-5 gap-2 align-self-center justify-content-end">
															<label for="single_day">Single day class</label>
															<input type="checkbox" name="single_day"  value="{{ $vclass->single_day }}" id="single_day"
																onclick="showDateDiv()" >
														</div>
														<div class="col-md-12 freeClass">
															<label class="required form-label">Price</label>
															<input type="text" name="price" value="{{ $vclass->price }}"
																class="form-control title_can form-control11 mb-2"
																oninput="validate(this, 'title-warn')" placeholder="Price"
																required>
														</div>
														
													</div>
													
													



                                                    <div
                                                        class="col-md-12 d-flex gap-2 align-self-center justify-content-start">
                                                        
                                                        <input type="checkbox" name="free_class"  value="{{ $vclass->free_class }}" id="free_class"
                                                            onclick="showTimeDiv()">
														<label for="all_day">This is a FREE class</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-10">
                                                    <label class="required form-label">Classes Category</label>
                                                    <select class="form-select mb-2 form-control11" name="category_ids[]"
                                                        data-control="select2" data-placeholder="Select an option"
                                                        data-allow-clear="true" multiple="multiple" required>
                                                        @foreach ($vclass_categories as $vclass_category)
														 <option value="{{ $vclass_category->id }}"
                                                                @if (in_array($vclass_category->id, $vclass->category_ids)) selected @endif>
                                                                {{ $vclass_category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="text-muted fs-7">Select Class Categories.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="card card-flush">
                                        <div class="card-body">
                                            <div class="row">
												<div class="col-md-7 mb-12">
                                                <div class="col-md-12 mb-5">
                                                    <label class=" form-label">Instructor Name</label>
                                                    <input type="text" name="instruct_name"  value="{{ $vclass->instruct_name }}"
                                                        class="form-control mb-2 form-control11 title_can"
                                                        placeholder="Name">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Bio</label>
                                                    <textarea name="instruct_bio" class="form-control title_can1  mb-2 form-control11" rows="4" placeholder="Bio here">{{ $vclass->instruct_bio }}</textarea>
                                                </div>
												 </div>
												<div class="col-md-5 mb-12">
													<label class="form-label">Instructor Pic</label>
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
                                                        <input type="file" id="eventMedia2" name="instruct_pic[]"
                                                            class="form-control eventMedia"
                                                            accept="image/jpeg,image/gif,image/png">
                                                    </label>
                                                    <div class="mediaFileList2">
														<ul>
                                                        @if ($vclass->instruct_pic)
                                                            
                                                                @foreach ($vclass->instruct_pic as $key => $item)
                                                                    <li> <img
                                                                            src="{{ asset('backend/admin/images/vclass_management/instructors/' . $vclass->instruct_pic[$key]) }}" alt="{{$vclass->instruct_pic[$key]}}" title="{{$vclass->instruct_pic[$key]}}" /><button type="button" class="rm-img-btn" ><span aria-hidden="true">×</span></button>
                                                                            <input type="hidden" name="oldInstructor[]" value="{{$vclass->instruct_pic[$key]}}">
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
                                                <div class="col-md-12 mb-12">
                                                    <label class="required form-label">Class location</label>
                                                    <input type="text" name="location"   value="{{ $vclass->location }}"
                                                        class="form-control title_can mb-2 form-control11 required"
                                                        placeholder="Location"  required>
                                                </div>
													<div class="col-md-12">
														<label class="form-label">MAP Embeded Code</label>
														<input type="text" name="iframe"  value="{{ $vclass->iframe }}"
															class="form-control form-control11 title_can mb-2"
															oninput="validate(this, 'title-warn')" placeholder="MAP embedded code"
															>
													</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-flush">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-5">
                                                    <label class="required form-label">Seo Title</label>
                                                    <input type="text" name="seo_title" value="{{ $vclass->seo_title }}"
                                                        class="form-control title_can mb-2 form-control11"
                                                        placeholder="Name of title">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Seo Description</label>
                                                    <textarea name="seo_description" class="form-control mb-2 form-control11 title_can1" rows="4" placeholder="SEO Details">{{ $vclass->seo_title }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									
									
									
									
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-5 mb-20">
                            <a href="{{ route('admin.vclasses.index') }}" class="btn btn-outline">
                                <span class="indicator-label">Cancel</span>
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Update Class</span>
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
            $('.singleday').addClass('d-none')
        } else {
            $('.singleday').removeClass('d-none')
        }
    }

    function showTimeDiv() {
        var val = $('#free_class').prop('checked');
        if (val) {
            $('.freeClass').addClass('d-none')
        } else {
            $('.freeClass').removeClass('d-none')
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
                .name + '" title="' + input.files.item(i).name +
                '" /><button type="button" class="rm-img-btn" onclick="removeFile(this)" ><span aria-hidden="true">×</span></button></li>';
        }
        fileList.append(children);
    }

    files.change(function () {
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

    $(".rm-img-btn").on("click", function () {
        $(this).parent("li").remove();
    });

    function removeFile(e) {
        console.log("fire");
        $(e).parent("li").remove();
    }

    // ===================== class image gallary=================

    const files1 = $("#eventMedia1");
    const fileList1 = $(".mediaFileList1 ul");

    function getFileData1() {
        var input = document.getElementById('eventMedia1');
        var children = "";
        for (var i = 0; i < input.files.length; ++i) {

            children += '<li> <img src="' + window.URL.createObjectURL(input.files[i]) + '" alt="' + input.files.item(i)
                .name + '" title="' + input.files.item(i).name +
                '" /><button type="button" class="rm-img-btn1" onclick="removeFile1(this)" ><span aria-hidden="true">×</span></button></li>';
        }
        fileList1.append(children);
    }

    files1.change(function () {
        const maxAllowedSize1 = 10 * 1024 * 1024;
        const fileValue1 = $(this).val();
        if (fileValue1 != "") {
            const idxDot1 = fileValue1.lastIndexOf(".") + 1;
            const extFile1 = fileValue1.substr(idxDot1, fileValue1.length).toLowerCase();
            if (extFile1 == "jpg" || extFile1 == "jpeg" || extFile1 == "png") {
                const imageSize1 = $(this).prop('files')[0]?.size;
                const fileName1 = $(this).prop('files')[0]?.name;
                if (imageSize1 <= maxAllowedSize1) {
                    getFileData1();
                } else {
                    fileList1.html('');
                    files1.val('')
                    alert("Too big of a file. Uploads must be under 3 MB in size.")
                    return false;
                }
            } else {
                fileList1.html('');
                files1.val('')
                alert("Only images & documents files are allowed!")
                return false;
            }
        } else {
            fileList1.html('');
            files1.val('')
        }
    });

    $(".rm-img-btn1").on("click", function () {
        $(this).parent("li").remove();
    });

    function removeFile1(e) {
        console.log("fire");
        $(e).parent("li").remove();
    }

    // =========================== instructor image pic================

    const files2 = $("#eventMedia2");
    const fileList2 = $(".mediaFileList2 ul");

    function getFileData2() {
        var input = document.getElementById('eventMedia2');
        var children = "";
        for (var i = 0; i < input.files.length; ++i) {

            children += '<li> <img src="' + window.URL.createObjectURL(input.files[i]) + '" alt="' + input.files.item(i)
                .name + '" title="' + input.files.item(i).name +
                '" /><button type="button" class="rm-img-btn2" onclick="removeFile2(this)" ><span aria-hidden="true">×</span></button></li>';
        }
        fileList2.append(children);
    }

    files2.change(function () {
        const maxAllowedSize2 = 10 * 1024 * 1024;
        const fileValue2 = $(this).val();
        if (fileValue2 != "") {
            const idxDot2 = fileValue2.lastIndexOf(".") + 1;
            const extFile2 = fileValue2.substr(idxDot2, fileValue2.length).toLowerCase();
            if (extFile2 == "jpg" || extFile2 == "jpeg" || extFile2 == "png") {
                const imageSize2 = $(this).prop('files')[0]?.size;
                const fileName2 = $(this).prop('files')[0]?.name;
                if (imageSize2 <= maxAllowedSize2) {
                    getFileData2();
                } else {
                    fileList2.html('');
                    files2.val('')
                    alert("Too big of a file. Uploads must be under 3 MB in size.")
                    return false;
                }
            } else {
                fileList2.html('');
                files2.val('')
                alert("Only images & documents files are allowed!")
                return false;
            }
        } else {
            fileList2.html('');
            files2.val('')
        }
    });

    $(".rm-img-btn2").on("click", function () {
        $(this).parent("li").remove();
    });

    function removeFile2(e) {
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
    ClassicEditor
        .create(document.querySelector('#editor1'),{
            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
        })
        .then(editor1 => {
            console.log(editor1);
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
