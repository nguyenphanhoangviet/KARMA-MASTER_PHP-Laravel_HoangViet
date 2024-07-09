@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Show Product</h2>
            <a href="{{ route('admin.products.index') }}" class="btn btn-purple">Back</a>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Price:</strong> {{ $product->price }}</p>
            <p><strong>Image:</strong><br><img src="{{ asset('imgs/products/' . $product->img) }}" alt="{{ $product->name }}" class="img-fluid"></p>
            <p><strong>Category:</strong> {{ $product->category->name }}</p>
            <p><strong>Color:</strong> {{ $product->color->name ?? 'None' }}</p>
            <p><strong>Brand:</strong> {{ $product->brand->name }}</p>
        </div>
    </div>
@endsection
@endsection
