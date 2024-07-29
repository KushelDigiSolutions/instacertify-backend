@if (Session::has('success') || Session::has('error'))
    <div
        class="alert alert-dismissible  @if (Session::has('success')) bg-light-primary @elseif(Session::has('error')) bg-light-danger @endif d-flex flex-column flex-sm-row p-5 mb-10">
        <div class="d-flex flex-column pe-0 pe-sm-10" style="margin-top: 15px;">
            <h4>{{ Session::get('success') }} {{ Session::get('error') }}</h4>
        </div>
        <button type="button"
            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
            data-bs-dismiss="alert">
            <i class="ki-duotone ki-cross fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i>
        </button>
    </div>
@endif
