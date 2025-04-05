@extends("layouts.app")

@section("content")
<div class="card mt-5">
  <div class="bg-primary py-3">
    <h3 class="text-white text-center">Laravel 12 CRUD with Search & Pagination</h3>
  </div>
  <div class="card-header">
    <h4>Product List</h4>
  </div>
  <div class="card-body">
    @session('success')
    <div class="alert alert-success">{{ $value }}</div>
    @endsession

    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm mb-3"><i class="fa fa-plus"></i> Create Prodct</a>
    <form action="{{ url('/products/search') }}" method="get">
        <div class="input-group" style="margin-right:5px;">
            <div class="form-outline" data-mdb-input-init>
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request()->input('search') ? request()->input('search') : '' }}">
            </div>
            <button type="submit" class="btn btn-success">Search</button>
        </div>

    </form>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="50px">ID</th>
                <th>Name</th>
                <th>Details</th>
                <th width="250px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->details }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex custom-pagination">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
  </div>
</div>
@endsection