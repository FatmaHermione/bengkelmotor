<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - AXERA MOTOR</title>
    <link rel="icon" href="{{ asset('img/logo.png')}} ">
    <link rel="stylesheet" href="{{ asset('css/signups.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="form-card">
        <!-- Tab Navigasi -->
        <div class="tabs">
            <a href="{{ route('login.form') }}" class="tab-item">Login</a>
            <a href="{{ route('signup.form') }}" class="tab-item active">Sign Up</a>
        </div>

        <!-- Form Sign Up -->
        <form action="{{ route('signup') }}" method="POST" class="signup-form">
            @csrf
            <input type="text" name="username" placeholder="ENTER YOUR USERNAME" required>
            <input type="password" name="password" placeholder="ENTER YOUR PASSWORD" required>
            <input type="password" name="password_confirmation" placeholder="ENTER YOUR CONFIRM PASSWORD" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
