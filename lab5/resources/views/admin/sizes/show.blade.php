@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Show Size</h2>
            <a href="{{ route('admin.sizes.index') }}" class="btn btn-purple">Back</a>
        </div>
        <div class="card-body">
            <div class="form-group">
                <p><strong>Name:</strong> {{ $size->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
