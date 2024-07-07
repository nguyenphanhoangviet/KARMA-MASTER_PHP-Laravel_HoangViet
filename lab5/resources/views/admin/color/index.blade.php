@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Colors</h2>
            <a href="{{ route('admin.colors.create') }}" class="btn btn-primary">Create Color</a>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Hex Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colors as $color)
                    <tr>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->hex_code }}</td>
                        <td>
                            <a href="{{ route('admin.colors.show', $color->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('admin.colors.edit', $color->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.colors.destroy', $color->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $colors->links() }}
        </div>
    </div>
</div>
@endsection
