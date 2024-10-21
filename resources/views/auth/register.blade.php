<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="icon" type="image/png" href="logo1.png">
    <title>Register</title>
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

    <div class="login-container">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h1>Register</h1>
            <input name="email" type="text" placeholder="E-mail">
            <input name="password" type="password" placeholder="Password">
            <input name="password_confirmation" type="password" placeholder="Confirmar senha">
            <input name="telefone" type="text" placeholder="Telephone">
            <button type="submit">Enter</button>
            <div class="footer-links">
                <a href="{{ url('/login') }}">Sign In</a>
            </div>
        </form>
    </div>
</body>
</html>
