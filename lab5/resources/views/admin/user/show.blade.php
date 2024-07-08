@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>User Details</h2>
            <a href="{{ route('admin.user.index') }}" class="btn btn-purple">Back to List</a>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p> 
            <p><strong>Email:</strong> {{ $user->email }}</p> 
            <p><strong>Role:</strong> {{ $user->role }}</p>    
        </div>
    </div>
</div>
@endsection
