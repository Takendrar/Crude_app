@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User List</h1>
        <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Add New User</a>
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th> 
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->contact_number }}</td>
                        <td>{{ ucfirst($user->gender) }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary"><span class="material-symbols-outlined" style="color: white;">visibility</span></a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><span class="material-symbols-outlined" style="color: white;">edit</span></a>
                            
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this user?')"><span class="material-symbols-outlined" style="color: white;">delete</span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-left">
                {{ $users->links('pagination::bootstrap-4') }} 
            </div>
    </div>
@endsection
