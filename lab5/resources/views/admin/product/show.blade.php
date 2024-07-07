@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Show Product</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <p class="form-control" id="name">{{ $product->name }}</p>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <p class="form-control" id="description">{{ $product->description }}</p>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <p class="form-control" id="price">{{ $product->price }}</p>
            </div>
            <div class="form-group">
                <label for="img">Image:</label>
                <img src="{{ asset('imgs/products/' . $product->img) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <p class="form-control" id="category">{{ $product->category->name }}</p>
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <p class="form-control" id="color">{{ $product->color->name ?? 'None' }}</p>
            </div>
            <div class="form-group">
                <label for="brand">Brand:</label>
                <p class="form-control" id="brand">{{ $product->brand->name }}</p>
            </div>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
