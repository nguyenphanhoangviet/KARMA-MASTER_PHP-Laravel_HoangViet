@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Create Color</h2>
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
            <form action="{{ route('admin.colors.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="hex_code">Hex Code:</label>
                    <input type="text" class="form-control" id="hex_code" name="hex_code" value="{{ old('hex_code') }}">
                </div>
                <button type="submit" class="btn btn-primary">Create Color</button>
            </form>
        </div>
    </div>
</div>
@endsection
