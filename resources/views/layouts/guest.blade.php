<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Alpine.js (for dropdowns, optional) -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Custom CSS -->
    <style>
        :root {
            --bg-dark: #1f1a17;
            --bg-card: #2e1f1f;
            --border-color: #5e4238;
            --text-main: #fcebd5;
            --text-muted: #d9bfa9;
            --accent: #a96f52;
            --accent-hover: #935d43;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 16px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 32px;
        }

        .logo {
            width: 80px;
            height: 80px;
            fill: #aaa;
            transition: fill 0.3s ease;
        }

        .logo:hover {
            fill: var(--accent);
        }

        .auth-card {
            background-color: var(--bg-card);
            padding: 32px 24px;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
            width: 100%;
            max-width: 420px;
        }

        @media (min-width: 640px) {
            .auth-card {
                padding: 40px 32px;
            }
        }

        a {
            color: var(--accent);
            text-decoration: none;
            transition: color 0.2s ease-in-out;
        }

        a:hover {
            color: var(--accent-hover);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <a href="/">
                {{-- Replace with your logo image if needed --}}
                <!-- <img src="/logo.png" alt="App Logo" class="logo"> -->
                <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                </svg>
            </a>
        </div>

        <!-- Card Content Slot -->
        <div class="auth-card">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
