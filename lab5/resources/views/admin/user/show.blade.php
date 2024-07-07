@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>User Details</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <p class="form-control-plaintext">{{ $user->name }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <p class="form-control-plaintext">{{ $user->email }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Role:</label>
                <p class="form-control-plaintext">{{ $user->role }}</p>
            </div>
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
