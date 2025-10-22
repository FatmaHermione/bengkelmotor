<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AXERA MOTOR</title>
    <link rel="icon" href="{{ asset('img/logo.png')}} ">
    <link rel="stylesheet" href="{{ asset('css/logins.css') }}">
</head>
<body>
    <div class="form-card">
            <div class="tabs">
    <a href="{{ route('login.form') }}" class="tab-item active">Login</a>
    <a href="{{ route('signup.form') }}" class="tab-item">Sign Up</a>
    </div>

    <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf
        <input type="text" name="username" placeholder="ENTER YOUR USERNAME" required>
        <input type="password" name="password" placeholder="ENTER YOUR PASSWORD" required>
        <button type="submit">Login</button>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
    </form>
</div>

    </div>
</body>
</html>

