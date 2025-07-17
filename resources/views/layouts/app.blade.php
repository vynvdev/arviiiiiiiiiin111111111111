<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Custom CSS -->
    <style>
        :root {
            --bg-body: #1f1a17;
            --bg-header: #2e1f1f;
            --bg-content: #3a2d2b;
            --border-color: #5e4238;
            --text-main: #fcebd5;
            --text-muted: #d9bfa9;
            --accent: #a96f52;
            --accent-hover: #935d43;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
        }

        header {
            background-color: var(--bg-header);
            border-bottom: 1px solid var(--border-color);
            padding: 24px 32px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        header h1 {
            font-size: 1.5rem;
            color: var(--text-main);
        }

        nav {
            background: linear-gradient(to right, #3b2b28, #2e1f1f);
            border-bottom: 1px solid var(--border-color);
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-left a, .nav-right a {
            color: var(--text-main);
            text-decoration: none;
            margin-right: 20px;
            transition: color 0.2s ease;
            font-weight: 500;
        }

        .nav-left a:hover, .nav-right a:hover {
            color: var(--accent-hover);
        }

        .main {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 32px;
        }

        .content {
            background-color: var(--bg-content);
            padding: 32px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-left, .nav-right {
                margin-top: 10px;
            }

            .main {
                padding: 0 16px;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav>
        <div class="nav-left">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <!-- Add more links here -->
        </div>
        <div class="nav-right">
            <span>{{ Auth::user()->name }}</span>
            <a href="{{ route('profile.edit') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
            </form>
        </div>
    </nav>

    <!-- Header -->
    @isset($header)
        <header>
            <h1>{{ $header }}</h1>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="main">
        <div class="content">
            {{ $slot }}
        </div>
    </main>

</body>
</html>
