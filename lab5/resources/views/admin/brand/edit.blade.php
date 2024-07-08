@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Edit Brand</h2>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-purple">Back</a>
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
            <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $brand->name) }}">
                </div>
                <div class="form-group">
                    <label for="img">Image:</label>
                    <input type="file" class="form-control-file" id="img" name="img">
                    @if($brand->img)
                        <img src="{{ asset('imgs/brands/' . $brand->img) }}" alt="{{ $brand->name }}" class="img-fluid mt-2" width="150">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Brand</button>
            </form>
        </div>
    </div>
</div>
@endsection
