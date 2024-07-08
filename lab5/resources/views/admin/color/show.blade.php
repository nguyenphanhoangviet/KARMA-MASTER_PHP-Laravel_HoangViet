@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Show Color</h2>
            <a href="{{ route('admin.colors.index') }}" class="btn btn-purple">Back</a>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $color->name }}</p> 
            <p><strong>Hex Code:</strong> {{ $color->hex_code }}</p> 
        </div>
    </div>
</div>
@endsection
