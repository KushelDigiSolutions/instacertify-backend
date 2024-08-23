@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="number" name="position" id="position" class="form-control" value="{{ old('position') }}">
            </div>
            <div class="form-group">
                <label for="visible_in_menu">Visible in Menu</label>
                <input type="hidden" name="visible_in_menu" value="0"> <!-- Default hidden input for unchecked state -->
                <input type="checkbox" name="visible_in_menu" id="visible_in_menu" class="form-control" value="1" {{ old('visible_in_menu', 0) ? 'checked' : '' }}>
            </div>
            <div class="form-group">
                <label for="number_of_products">Number of Products</label>
                <input type="number" name="number_of_products" id="number_of_products" class="form-control" value="{{ old('number_of_products') }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
