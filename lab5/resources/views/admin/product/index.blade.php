@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="details w-100">
            <div class="another-div w-100">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Products</h2>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create Product</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="table-responsive">
                            @if ($products->isEmpty())
                                <p>Chưa có dữ liệu.</p>
                            @else
                                <table class="table table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Stock</th>
                                            <th>Size</th>
                                            <th>Category</th>
                                            <th>Color</th>
                                            <th>Brand</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ implode(' ', array_slice(explode(' ', $product->description), 0, 5)) }}...
                                                </td>
                                                <td>{{ number_format($product->price, 0) }}đ</td>
                                                <td><img src="{{ asset('imgs/products/' . $product->img) }}"
                                                        alt="{{ $product->name }}" class="img-fluid" width="50"></td>
                                                <td>{{ $product->stock }}</td>
                                                <td>
                                                    @if ($product->sizes->isNotEmpty())
                                                        @foreach ($product->sizes as $size)
                                                            {{ $size->name }}@if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        None
                                                    @endif
                                                </td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>{{ $product->color->name ?? 'None' }}</td>
                                                <td>{{ $product->brand->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                                        class="btn btn-info">Show</a>
                                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
