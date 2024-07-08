@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Edit Color</h2>
            <a href="{{ route('admin.colors.index') }}" class="btn btn-purple">Back</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.colors.update', $color->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $color->name) }}">
                </div>
                <div class="form-group">
                    <label for="hex_code">Hex Code:</label>
                    <input type="text" class="form-control" id="hex_code" name="hex_code" value="{{ old('hex_code', $color->hex_code) }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Color</button>
            </form>
        </div>
    </div>
</div>
@endsection
