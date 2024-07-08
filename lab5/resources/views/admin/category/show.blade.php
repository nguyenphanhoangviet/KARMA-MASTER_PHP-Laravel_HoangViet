@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Show Category</h2>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-purple">Back</a>
        </div>
        <div class="card-body">
            <div class="form-group">
                <p><strong>Name:</strong> {{ $category->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
