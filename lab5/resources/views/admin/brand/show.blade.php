@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Show Brand</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <p class="form-control" id="name">{{ $brand->name }}</p>
            </div>
            <div class="form-group">
                <label for="img">Image:</label>
                @if($brand->img)
                    <img src="{{ asset('imgs/brands/' . $brand->img) }}" alt="{{ $brand->name }}" class="img-fluid">
                @else
                    <p>No image available</p>
                @endif
            </div>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
