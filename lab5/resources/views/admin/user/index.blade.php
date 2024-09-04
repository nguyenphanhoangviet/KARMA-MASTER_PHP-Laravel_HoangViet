@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Users</h2>
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Create User</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($users->isEmpty())
                    <p>Chưa có dữ liệu.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.show', $user->id) }}"
                                            class="btn btn-success mb-2">Show</a>
                                        <a href="{{ route('admin.user.edit', $user->id) }}"
                                            class="btn btn-warning mb-2">Edit</a>
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mb-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
