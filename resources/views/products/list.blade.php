@extends('admin.layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.create') }}" class="btn btn-dark">Create</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>    
            @endif            
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Products</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Name</th>
                                <th>Sku</th>
                                <th>Price</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if ($product->image != "")
                                        <img width="50" src="{{ asset('uploads/products/'.$product->image) }}" alt="">
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>${{ $product->price }}</td>
                                <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-dark">Edit</a>
                                    <a href="#" onclick="deleteProduct({{ $product->id  }});" class="btn btn-danger">Delete</a>
                                    <form id="delete-product-from-{{ $product->id  }}" action="{{ route('products.destroy',$product->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>   
                            @endforeach
                            
                            @endif
                            
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    @endsection

<script>
    function deleteProduct(id) {
        if (confirm("Are you sure you want to delete product?")) {
            document.getElementById("delete-product-from-"+id).submit();
        }
    }
</script>