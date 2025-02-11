@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Edit Review</h2>
            <a href="{{ route('admin.reviews.index') }}" class="btn btn-purple">Back</a>
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
            <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $review->phone }}">
                </div>
                <div class="form-group">
                    <label for="review">Review:</label>
                    <textarea class="form-control" id="review" name="review">{{ $review->review }}</textarea>
                </div>
                <div class="form-group">
                    <label for="product_id">ProductID:</label>
                    <select class="form-control" id="product_id" name="product_id">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @if ($product->id == $review->product_id) selected @endif>
                                {{ $product->id }} - {{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="user_id">UserID:</label>
                    <select class="form-control" id="user_id" name="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if ($user->id == $review->user_id) selected @endif>
                                {{ $user->id }} - {{ $user->name }} - {{$user->email}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
