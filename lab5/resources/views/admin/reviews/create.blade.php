@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Create Review</h2>
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
            <form action="{{ route('admin.reviews.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="review">Review:</label>
                    <textarea class="form-control" id="review" name="review"></textarea>
                </div>
                <div class="form-group">
                    <label for="product_id">ProductID:</label>
                    <select class="form-control" id="product_id" name="product_id">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->id }}-{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
