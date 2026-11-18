@extends('layouts.app')

@section('title', 'Log in')

@section('content')
    <h2>Log in</h2>

    <form method="POST" action="{{ route('login.store') }}" style="max-width: 28rem;">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" autocomplete="current-password">
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
@endsection