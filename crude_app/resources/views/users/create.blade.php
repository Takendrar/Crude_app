@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create User</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
                @error('address')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ old('contact_number') }}" required>
                @error('contact_number')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('users.index')}}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
