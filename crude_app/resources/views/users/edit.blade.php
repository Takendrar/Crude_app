@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" value="{{ $user->address }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" value="{{ $user->contact_number }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $user->gender === 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</a>
            </button>
            <a href="{{ route('users.index')}}" class="btn btn-secondary">Back</a>
            </a>
        </form>
    </div>
@endsection
