@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Comments</h2>
                <a href="{{ route('admin.comments.create') }}" class="btn btn-primary">Create New Comment</a>
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
                            <th>User</th>
                            <th>Product</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->product->name }}</td>
                                <td>{{ $comment->message }}</td>
                                <td>
                                    <a href="{{ route('admin.comments.show', $comment->id) }}" class="btn btn-info btn-sm">Show</a>
                                    <a href="{{ route('admin.comments.edit', $comment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" style="display:inline-block;">
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
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
