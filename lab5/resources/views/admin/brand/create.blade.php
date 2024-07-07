@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Create Brand</h2>
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
            <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="img">Image:</label>
                    <input type="file" class="form-control-file" id="img" name="img">
                </div>
                <button type="submit" class="btn btn-primary">Create Brand</button>
            </form>
        </div>
    </div>
</div>
@endsection
