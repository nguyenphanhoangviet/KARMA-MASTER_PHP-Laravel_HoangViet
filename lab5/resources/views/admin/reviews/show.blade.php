@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Review Details</h2>
            <a href="{{ route('admin.reviews.index') }}" class="btn btn-purple">Back</a>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $review->name }}</p>
            <p><strong>Email:</strong> {{ $review->email }}</p>
            <p><strong>Phone:</strong> {{ $review->phone }}</p>
            <p><strong>Review:</strong> {{ $review->review }}</p>
            <p><strong>Product ID:</strong> {{ $review->product_id }}</p>
        </div>
    </div>
@endsection
