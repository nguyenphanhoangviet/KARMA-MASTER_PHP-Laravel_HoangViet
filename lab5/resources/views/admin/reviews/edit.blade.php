@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Review</h1>
    </div>
    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $review->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $review->email }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $review->phone }}">
        </div>
        <div class="form-group">
            <label for="review">Review:</label>
            <textarea class="form-control" id="review" name="review">{{ $review->review }}</textarea>
        </div>
        <div class="form-group">
            <label for="product_id">Product ID:</label>
            <input type="text" class="form-control" id="product_id" name="product_id" value="{{ $review->product_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
