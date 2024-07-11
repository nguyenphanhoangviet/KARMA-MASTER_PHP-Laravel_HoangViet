@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Show Comment</h2>
                <a href="{{ route('admin.comments.index') }}" class="btn btn-purple">Back</a>
            </div>
            <div class="card-body">
                <p><strong>User:</strong> {{ $comment->user->name }} </p>
                <p><strong>Product:</strong> {{ $comment->product->name }}</p>
                <p><strong>Message:</strong> {{ $comment->message }}</p>
            </div>
        </div>
    </div>
@endsection
