@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Visible in Menu</th>
                    <th>Number of Products</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->position }}</td>
                        <td>{{ $category->visible_in_menu ? 'Yes' : 'No' }}</td>
                        <td>{{ $category->number_of_products }}</td>
                        <td>
                            {{-- <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                            {{-- <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
