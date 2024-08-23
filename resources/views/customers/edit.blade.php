@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1>Edit Customer</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required>
        </div>
        <div class="mb-3">
            <label for="group" class="form-label">Group</label>
            <input type="text" class="form-control" id="group" name="group" value="{{ $customer->group }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="">Select Gender</option>
                <option value="Male" {{ $customer->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $customer->gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $customer->gender == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $customer->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$customer->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection