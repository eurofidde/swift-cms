@extends('base.admin-auth')

@section('title')
    Login
@endsection

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group">
            @error('email')
                <span class="msg error">{{ $message }}</span>
            @enderror
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>

        <div class="form-group">
            @error('password')
                <span class="msg error">{{ $message }}</span>
            @enderror
            <label for="password">Password</label>
            <input type="password" name="password" required autocomplete="current-password">
        </div>

        <div class="form-group auth__rememeber-me">
            <input type="checkbox" name="remember">
            <label for="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary">Login</button>
        </div>
    </form>
@endsection