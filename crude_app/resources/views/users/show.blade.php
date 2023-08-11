@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">User Details</h1>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">User Information</h5>
                <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
                <p class="card-text"><strong>Contact Number:</strong> {{ $user->contact_number }}</p>
                <p class="card-text"><strong>Gender:</strong> {{ ucfirst($user->gender) }}</p>
                <p class="card-text"><strong>Account Created_At:</strong> {{ $user->created_at }}</p>
                <p class="card-text"><strong>Account Updated_At:</strong> {{ $user->updated_at }}</p>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a href="{{ route('users.index')}}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
