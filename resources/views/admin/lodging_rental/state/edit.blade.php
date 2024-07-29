@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        @isset($page_title)
                            {{ $page_title }}
                        @endisset
                    </h1>
                </div>
            </div>
        </div>
        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <form action="{{ route('admin.states.update', $state->id) }}"
                    class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Status</h2>
                                </div>
                                <div class="card-toolbar">
                                    <div
                                        class="rounded-circle @if ($state->is_active == '1') bg-success @else bg-danger @endif w-15px h-15px">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <select class="form-select mb-2" name="is_active" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select an option">
                                    <option value="1" @if ($state->is_active == '1') selected @endif>Active</option>
                                    <option value="0" @if ($state->is_active == '0') selected @endif>Deactive</option>
                                </select>
                                <div class="text-muted fs-7">Set the category status.</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-body pt-0">
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">Location Code</label>
                                                <input type="text" name="code" class="form-control mb-2"
                                                    placeholder="State Code..." value="{{ $state->code }}"
                                                    required>
                                                <div class="fs-7" style="color:red">A Location code is required and
                                                    recommended to be unique.</div>
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">Location Name</label>
                                                <input type="text" name="name" class="form-control mb-2"
                                                    placeholder="State Name..." value="{{ $state->name }}"
                                                    required>
                                                <div class="fs-7" style="color:red">A Location name is required and
                                                    recommended to be unique.</div>
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">Country Name</label>
                                                <input type="text" name="country" class="form-control mb-2"
                                                    placeholder="Country Name..." value="{{ $state->country }}"
                                                    required>
                                                <div class="fs-7" style="color:red">A Country name is required and
                                                    recommended to be unique.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Update</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
