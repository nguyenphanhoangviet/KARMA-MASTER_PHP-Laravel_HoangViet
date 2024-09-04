@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Brands</h2>
                <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Create Brand</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($brands->isEmpty())
                    <p>Chưa có dữ liệu.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if ($brand->img)
                                            <img src="{{ asset('imgs/brands/' . $brand->img) }}" alt="{{ $brand->name }}"
                                                class="img-fluid" width="100">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.brands.show', $brand->id) }}" class="btn btn-info">Show</a>
                                        <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $brands->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
