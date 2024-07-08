@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Review Details</h1>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">Back to Reviews</a>
    </div>
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $review->name }}</p>
            <p><strong>Email:</strong> {{ $review->email }}</p>
            <p><strong>Phone:</strong> {{ $review->phone }}</p>
            <p><strong>Review:</strong> {{ $review->review }}</p>
            <p><strong>Product ID:</strong> {{ $review->product_id }}</p>
        </div>
    </div>
@endsection
