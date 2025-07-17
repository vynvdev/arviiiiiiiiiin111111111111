<x-app-layout>
    <x-slot name="header">
        <style>
            .edit-header {
                font-size: 1.5rem;
                font-weight: 600;
                color: #fcebd5;
                padding: 16px 32px 0;
            }
        </style>
        <h2 class="edit-header">Edit Booking</h2>
    </x-slot>

    <style>
        :root {
            --bg-main: #1f1a17;
            --bg-card: #2e1f1f;
            --border: #5e4238;
            --text-main: #fcebd5;
            --text-muted: #d9bfa9;
            --accent: #a96f52;
            --accent-hover: #935d43;
            --error-bg: rgba(255, 0, 0, 0.15);
            --error-text: #ffb3b3;
        }

        .edit-container {
            background-color: var(--bg-main);
            min-height: 100vh;
            padding: 48px 16px;
            font-family: 'Figtree', sans-serif;
            color: var(--text-main);
        }

        .edit-form-wrapper {
            background-color: var(--bg-card);
            max-width: 720px;
            margin: 0 auto;
            border-radius: 16px;
            border: 1px solid var(--border);
            padding: 40px 32px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 6px;
            color: var(--text-main);
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            background-color: #3b2c2c;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 1rem;
            color: var(--text-main);
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

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-footer a {
            color: var(--text-muted);
            font-size: 0.9rem;
            text-decoration: underline;
            transition: color 0.2s ease-in-out;
        }

        .form-footer a:hover {
            color: var(--text-main);
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
    </style>

    <div class="edit-container">
        <div class="edit-form-wrapper">
            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bookings.update', $booking) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $booking->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="booking_date">Booking Date</label>
                    <input type="date" name="booking_date" id="booking_date"
                           value="{{ old('booking_date', \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d')) }}" required>
                </div>

                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea name="notes" id="notes" rows="4">{{ old('notes', $booking->notes) }}</textarea>
                </div>

                <div class="form-footer">
                    <a href="{{ route('bookings.index') }}">← Back to list</a>
                    <button type="submit" class="submit-btn">Update Booking</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
