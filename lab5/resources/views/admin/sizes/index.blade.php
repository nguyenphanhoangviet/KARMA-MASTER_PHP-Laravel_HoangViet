@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Sizes</h2>
            <a href="{{ route('admin.sizes.create') }}" class="btn btn-primary">Create Size</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sizes as $size)
                    <tr>
                        <td>{{ $size->name }}</td>
                        <td>
                            <a href="{{ route('admin.sizes.show', $size->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('admin.sizes.edit', $size->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.sizes.destroy', $size->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $sizes->links() }}
        </div>
    </div>
</div>
@endsection
