<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="logo1.png">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Sign In</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo-container">
                <a href="{{ url('/') }}">
                    <img src="logo.png" alt="Logo" class="logo">
                </a> 
            </div>
        </nav>
    </header>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="login-container">
                <h1>Sign In</h1>
                <input type="email" placeholder="E-mail" name="email">
                <input type="password" placeholder="Password" name="password">
                <button type="submit">Enter</button>
                <div class="footer-links">
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <div style="background-color: white !important; color: green !important">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</body>
</html>
        