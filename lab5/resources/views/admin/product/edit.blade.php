@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Edit Product</h2>
                <a href="{{ route('admin.products.index') }}" class="btn btn-purple">Back</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price"
                            value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="img">Image:</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category:</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color_id">Color:</label>
                        <select class="form-control" id="color_id" name="color_id">
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}"
                                    {{ $color->id == $product->color_id ? 'selected' : '' }}>{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Brand:</label>
                        <select class="form-control" id="brand_id" name="brand_id">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock"
                            value="{{ $product->stock }}">
                    </div>
                    <div class="form-group">
                        <label for="sizes">Sizes:</label>
                        <select class="form-control" id="sizes" name="sizes[]" multiple>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
