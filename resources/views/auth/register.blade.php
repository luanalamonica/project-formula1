
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('/mclaren.png'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            background-color: #000; 
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            background: rgba(51, 51, 51, 0.8); 
            border-radius: 8px;
            padding: 20px;
            width: 350px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            color: #fff;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container h1 {
            color: #FFFFFF; /* Alterado para branco */
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 700;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #555;
            border-radius: 4px;
            background: #000;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container input::placeholder {
            color: #fff; /* Placeholder color alterado para branco */
        }
        .login-container button {
            width: calc(100% - 20px);
            padding: 10px;
            border: none;
            border-radius: 4px;
            background: #FFA500; /* Alterado para laranja */
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s, box-shadow 0.3s;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container button:hover {
            background: #ff8c00; /* Alterado para um tom mais escuro de laranja */
            box-shadow: 0 0 10px rgba(255, 165, 0, 0.5);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .footer-links {
            margin-top: 15px;
            font-size: 14px;
            color: #888;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .footer-links a {
            color: #FFFFFF; /* Alterado para branco */
            text-decoration: none;
            font-weight: 600;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .footer-links a:hover {
            text-decoration: underline;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            max-height: 40px;
            height: auto;
        }
    </style>
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
