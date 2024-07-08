@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Show Brand</h2>
                <a href="{{ route('admin.brands.index') }}" class="btn btn-purple">Back</a>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $brand->name }}</p>
                <p>
                    <strong>Image:</strong>
                    <hr>
                    @if ($brand->img)
                        <img src="{{ asset('imgs/brands/' . $brand->img) }}" alt="{{ $brand->name }}" width="100" height="100">
                    @else
                        <p>No image available</p>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
