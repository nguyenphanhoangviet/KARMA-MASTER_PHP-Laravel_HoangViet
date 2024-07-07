@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Show Category</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <p class="form-control" id="name">{{ $category->name }}</p>
            </div>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
