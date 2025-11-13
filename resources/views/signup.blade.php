<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - AXERA MOTOR</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <div class="login-wrapper">
        <!-- Bagian Kiri Background -->
        <div class="left-section" 
            style="
                background-image: url('{{ asset('img/axera login 1.png') }}');
                background-size: cover;
                background-position: center right;
            ">
            <div class="overlay"></div>
            <div class="brand-text">
                <h1>AXERA MOTOR</h1>
                <p>Solusi terpercaya untuk motor Anda.</p>
            </div>
        </div>

        <!-- Bagian Kanan Form -->
        <div class="right-section">
            <div class="form-card">
                <!-- Navigasi Tab -->
                <div class="tabs">
                    <a href="{{ route('login.form') }}" class="tab-item">Login</a>
                    <a href="{{ route('signup.form') }}" class="tab-item active">Sign Up</a>
                </div>

                <!-- Form Sign Up -->
                <form action="{{ route('signup') }}" method="POST" class="login-form">
                    @csrf
                    <input type="text" name="username" placeholder="ENTER YOUR USERNAME" required>
                    <input type="password" name="password" placeholder="ENTER YOUR PASSWORD" required>
                    <input type="password" name="password_confirmation" placeholder="CONFIRM YOUR PASSWORD" required>
                    <button type="submit">Sign Up</button>

                    @if ($errors->any())
                        <div class="error">{{ $errors->first() }}</div>
                    @endif
                </form>
            </div>
        </div>
    </div>

</body>
</html>
