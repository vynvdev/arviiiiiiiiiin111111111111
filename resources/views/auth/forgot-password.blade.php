<x-guest-layout>
    <style>
        :root {
            --bg-card: #2e1f1f;
            --text-main: #fcebd5;
            --text-muted: #d9bfa9;
            --accent: #a96f52;
            --accent-hover: #935d43;
            --border: #5e4238;
        }

        form {
            max-width: 420px;
            margin: 40px auto;
            background-color: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 32px;
            color: var(--text-main);
            font-family: 'Figtree', sans-serif;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .info-text {
            font-size: 0.95rem;
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px 12px;
            background-color: #3b2c2c;
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text-main);
            font-size: 1rem;
            margin-bottom: 16px;
        }

        input[type="email"]:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(169, 111, 82, 0.3);
        }

        .submit-btn {
            background-color: var(--accent);
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background-color: var(--accent-hover);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
    </style>

    <div class="info-text">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Submit Button -->
        <div class="form-actions">
            <button type="submit" class="submit-btn">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>
