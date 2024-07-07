@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Show Color</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <p class="form-control" id="name">{{ $color->name }}</p>
            </div>
            <div class="form-group">
                <label for="hex_code">Hex Code:</label>
                <p class="form-control" id="hex_code">{{ $color->hex_code }}</p>
            </div>
            <a href="{{ route('admin.colors.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
