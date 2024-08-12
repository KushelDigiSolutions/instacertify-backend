@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content content123">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12">
                        <div class="card card-outline6 card-outline card-primary mt-4">
                            <div class="card-header card-heading22 align-content-center">
                                <h5 class="mb-0">
                                    @isset($page_title)
                                        {{ $page_title }}
                                    @endisset
                                </h5>
                            </div>
                            <div class="card-body priter mt-4">
                                <div class="modal-body">
                                    <form class="form-example" action="{{ route('admin.roles.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 form_div">
                                                <div class="form-group">
                                                    <label for="Name" class="form-label">Name</label>
                                                    <input id="Name" class="form-control" type="text" name="name"
                                                        required placeholder="Enter Role">
                                                </div>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            @foreach ($permissionParent as $parent)
                                                <div class="col-md-4 ">
                                                    <div class="card card-outline  card-outline6 card-primary mt-4">
                                                        <div
                                                            class="card-header card-heading22 align-items-center justify-content-center text-center">
                                                            <input type="checkbox" id="all_{{ $parent->parent_name }}"
                                                                class="form-check-input checkboxing">
                                                            <label for="all_{{ $parent->parent_name }}">
                                                                <h5 class="card-title card-tit1">
                                                                    {{ ucwords(str_replace('-', ' ', ucwords(str_replace('_', ' ', $parent->parent_name)))) }}
                                                                </h5>
                                                            </label>
                                                        </div>
                                                        <div class="card-body ml-4"
                                                            style="height: 170px; overflow-x: hidden;">
                                                            @php $permission = Spatie\Permission\Models\Permission::where('parent_name', $parent->parent_name)->get(); @endphp
                                                            @foreach ($permission as $value)
                                                                <div class="row mt-3">
                                                                    <div class="col-md-2">
                                                                        <input type="checkbox" name="permission[]"
                                                                            id="roles_{{ $value->name }}"
                                                                            class="checkboxing roles_{{ $parent->parent_name }} form-check-input"
                                                                            value="{{ $value->id }}">
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <label class="labelY"
                                                                            for="roles_{{ $value->name }}">{{ ucwords(str_replace('-', ' ', ucwords(str_replace('_', ' ', $value->name)))) }}</label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $('#all_{{ $parent->parent_name }}').change(function() {
                                                        $('.roles_{{ $parent->parent_name }}').prop('checked', this.checked);
                                                    });
                                                    $('.roles_{{ $parent->parent_name }}').change(function() {
                                                        if ($('.roles_{{ $parent->parent_name }}:checked').length == $('.roles_{{ $parent->parent_name }}')
                                                            .length) {
                                                            $('#all_{{ $parent->parent_name }}').prop('checked', true);
                                                        } else {
                                                            $('#all_{{ $parent->parent_name }}').prop('checked', false);
                                                        }
                                                    });
                                                </script>
                                            @endforeach
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-sm fw-bold text-white save-btn" style="background-color:rgb(236, 105,31)">Save</button>

                    {{--
                                            class="btn btn-sm fw-bold text-white" style="background-color: rgb(236, 105, 31);"
                                            <a href="{{ route('admin.roles.create') }}"  class="btn btn-sm fw-bold text-white" style="background-color: rgb(236, 105, 31);">Add New Role</a>
                   --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
