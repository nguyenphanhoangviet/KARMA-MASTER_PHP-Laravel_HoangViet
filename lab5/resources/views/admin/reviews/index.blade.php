@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Reviews</h2>
                <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">Create New Review</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Review</th>
                            <th>Star</th> <!-- Thêm cột Star -->
                            <th>Product ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->user->name }}</td>
                                <td>{{ $review->user->email }}</td>
                                <td>{{ $review->phone }}</td>
                                <td>{{ $review->review }}</td>
                                <td>{{ $review->star }}</td> <!-- Hiển thị giá trị của Star -->
                                <td>{{ $review->product_id }}</td>
                                <td>
                                    <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-info btn-sm">Show</a>
                                    <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
