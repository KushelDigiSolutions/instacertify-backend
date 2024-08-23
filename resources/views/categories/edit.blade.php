@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Category</h2>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="number" name="position" id="position" class="form-control" value="{{ old('position', $category->position) }}">
            </div>
            <div class="form-group">
                <label for="visible_in_menu">Visible in Menu</label>
                <input type="checkbox" name="visible_in_menu" id="visible_in_menu" class="form-control" {{ old('visible_in_menu', $category->visible_in_menu) ? 'checked' : '' }}>
            </div>
            <div class="form-group">
                <label for="number_of_products">Number of Products</label>
                <input type="number" name="number_of_products" id="number_of_products" class="form-control" value="{{ old('number_of_products', $category->number_of_products) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
