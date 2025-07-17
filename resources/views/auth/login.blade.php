<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #4b3832, #3c2f2f, #2e1f1f);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-container {
            background-color: rgba(46, 31, 31, 0.6);
            border: 1px solid rgba(94, 66, 56, 0.3);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        .login-container h2 {
            color: #fcebd5;
            text-align: center;
            margin-bottom: 0.5rem;
        }
        .login-container p {
            color: #d9bfa9;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        label {
            color: #fcebd5;
            font-size: 0.875rem;
            display: block;
            margin-bottom: 0.25rem;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #a68a7c;
            border-radius: 8px;
            background-color: #3b2c2c;
            color: #fcebd5;
        }
        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #a68a7c;
        }
        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .options label {
            color: #d9bfa9;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
        }
        .options input[type="checkbox"] {
            margin-right: 0.5rem;
            accent-color: #fcebd5;
        }
        .options a {
            color: #f4c69a;
            font-size: 0.85rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .options a:hover {
            color: #eab896;
        }
        button {
            width: 100%;
            padding: 0.75rem;
            background-color: #a96f52;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #935d43;
            box-shadow: 0 0 10px rgba(147, 93, 67, 0.6);
        }
        .register {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #d9bfa9;
        }
        .register a {
            color: #f4c69a;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .register a:hover {
            color: #eab896;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Welcome Back 👋</h2>
        <p>Login to your dashboard to manage bookings</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="you@example.com" value="{{ old('email') }}" required autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••" required>

            <div class="options">
                <label><input type="checkbox" name="remember">Remember me</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="register">
            Don’t have an account? <a href="{{ route('register') }}">Create one</a>
        </div>
    </div>
</body>
</html>