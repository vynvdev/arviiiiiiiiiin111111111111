<x-app-layout>
    <style>
        :root {
            --bg-main: #1f1a17;
            --bg-card: #2e1f1f;
            --text-main: #fcebd5;
            --text-muted: #d9bfa9;
            --border: #5e4238;
            --accent: #a96f52;
            --accent-hover: #935d43;
            --error-bg: rgba(255, 0, 0, 0.1);
            --error-text: #ffb3b3;
        }

        .booking-wrapper {
            background-color: var(--bg-main);
            min-height: 100vh;
            padding: 48px 16px;
            color: var(--text-main);
            font-family: 'Figtree', sans-serif;
        }

        .booking-card {
            background-color: var(--bg-card);
            max-width: 600px;
            margin: 0 auto;
            border-radius: 16px;
            border: 1px solid var(--border);
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
            padding: 40px 32px;
        }

        .booking-card h1 {
            font-size: 28px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 6px;
            color: var(--text-main);
        }

        input[type="text"],
        input[type="datetime-local"],
        textarea {
            width: 100%;
            background-color: #3b2c2c;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 14px;
            color: var(--text-main);
            font-size: 1rem;
            resize: vertical;
        }

        input[type="datetime-local"] {
            color-scheme: dark;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(169, 111, 82, 0.3);
        }

        .error-box {
            background-color: var(--error-bg);
            border: 1px solid red;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 24px;
            color: var(--error-text);
        }

        .error-box ul {
            padding-left: 20px;
            list-style: disc;
            font-size: 0.9rem;
        }

        .submit-btn {
            background-color: var(--accent);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background-color: var(--accent-hover);
        }

        .submit-wrapper {
            text-align: right;
        }
    </style>

    <div class="booking-wrapper">
        <div class="booking-card">
            <h1>📅 Create Booking</h1>

            <!-- Show Errors -->
            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Booking Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="e.g. Conference Room">
                </div>

                <!-- Booking Date -->
                <div class="form-group">
                    <label for="booking_date">Booking Date & Time</label>
                    <input type="datetime-local" name="booking_date" id="booking_date" value="{{ old('booking_date') }}" required>
                </div>

                <!-- Notes -->
                <div class="form-group">
                    <label for="notes">Notes (Optional)</label>
                    <textarea name="notes" id="notes" rows="4" placeholder="Add any extra notes...">{{ old('notes') }}</textarea>
                </div>

                <!-- Submit -->
                <div class="submit-wrapper">
                    <button type="submit" class="submit-btn">➕ Submit Booking</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
