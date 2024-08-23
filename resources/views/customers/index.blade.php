@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h1>Customer List</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-sm fw-bold text-white" style="background-color: rgb(236, 105, 31); ">Add Customer</a>

    {{-- <a href="{{ route('customers.export') }}" class="btn btn-success">Export Customers</a> --}}

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table id="myDataTable" class="table table-responsive align-middle fs-6 gy-5" >
        <thead style="background-color: rgb(6, 81, 117); color: white; border-bottom: 2px solid #004761;">
            <tr>
                <th style="padding: 12px 20px;">Id</th>
                <th style="padding: 12px 20px;">Name</th>
                <th style="padding: 12px 20px;">Email</th>
                <th style="padding: 12px 20px;">Group</th>
                <th style="padding: 12px 20px;">Phone</th>
                <th style="padding: 12px 20px;">Gender</th>
                <th style="padding: 12px 20px;">Status</th>
                <th style="padding: 12px 20px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->group }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        {{-- @if(auth()->check() && auth()->user()->role === 'admin') --}}
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        {{-- @endif --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection




