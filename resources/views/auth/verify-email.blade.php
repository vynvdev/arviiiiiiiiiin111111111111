<x-guest-layout>
    <style>
        :root {
            --bg-dark: #1f1a17;
            --text-main: #fcebd5;
            --text-muted: #d9bfa9;
            --green: #3cb371;
            --green-soft: rgba(60, 179, 113, 0.15);
            --accent: #a96f52;
            --accent-hover: #935d43;
        }

        .verify-container {
            max-width: 480px;
            margin: 40px auto 0;
            padding: 0 16px;
            font-family: 'Figtree', sans-serif;
            color: var(--text-main);
        }

        .info-text {
            font-size: 0.95rem;
            line-height: 1.6;
            color: var(--text-muted);
            margin-bottom: 16px;
        }

        .status-message {
            background-color: var(--green-soft);
            border-left: 4px solid var(--green);
            padding: 12px 16px;
            font-size: 0.9rem;
            border-radius: 8px;
            margin-bottom: 20px;
            color: var(--green);
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-top: 24px;
        }

        .btn {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 10px 16px;
            font-size: 0.9rem;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }

        .btn:hover {
            background-color: var(--accent-hover);
        }

        .link-button {
            font-size: 0.85rem;
            color: var(--text-muted);
            text-decoration: underline;
            background: none;
            border: none;
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        .link-button:hover {
            color: var(--text-main);
        }
    </style>

    <div class="verify-container">
        <div class="info-text">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="status-message">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="actions">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="link-button">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
