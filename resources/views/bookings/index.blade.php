<x-app-layout>
    <x-slot name="header">
        <style>
            .page-header {
                font-size: 1.5rem;
                font-weight: 600;
                color: #fcebd5;
                padding: 16px 32px 0;
            }
        </style>
        <h2 class="page-header">My Bookings</h2>
    </x-slot>

    <style>
        :root {
            --bg: #1f1a17;
            --card-bg: #2e1f1f;
            --border: #5e4238;
            --text: #fcebd5;
            --text-muted: #d9bfa9;
            --green: #3cb371;
            --yellow: #f4c542;
            --red: #e74c3c;
            --blue: #3490dc;
        }

        .bookings-wrapper {
            max-width: 1200px;
            margin: 32px auto;
            padding: 0 16px;
            color: var(--text);
            font-family: 'Figtree', sans-serif;
        }

        .alert {
            background-color: rgba(60, 179, 113, 0.2);
            border-left: 4px solid var(--green);
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            color: var(--text-muted);
        }

        .empty-message {
            color: var(--text-muted);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
            font-size: 0.95rem;
            border: 1px solid var(--border);
        }

        th, td {
            text-align: left;
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
        }

        thead {
            background-color: var(--card-bg);
            color: var(--text);
        }

        tr:nth-child(even) {
            background-color: #2e1f1f;
        }

        tr:hover {
            background-color: #3b2c2c;
        }

        .btn {
            display: inline-block;
            padding: 6px 14px;
            font-size: 0.9rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }

        .btn-yellow {
            background-color: var(--yellow);
            color: #1a1a1a;
        }

        .btn-yellow:hover {
            background-color: #d4b02d;
        }

        .btn-red {
            background-color: var(--red);
            color: #fff;
        }

        .btn-red:hover {
            background-color: #c0392b;
        }

        .btn-blue {
            background-color: var(--blue);
            color: white;
            margin-top: 24px;
        }

        .btn-blue:hover {
            background-color: #2779bd;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .form-inline {
            display: inline-block;
            margin: 0;
        }
    </style>

    <div class="bookings-wrapper">
        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($bookings->isEmpty())
            <p class="empty-message">You have no bookings yet.</p>
        @else
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y') }}</td>
                                <td>{{ $booking->notes ?? '-' }}</td>
                                <td class="actions">
                                    <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-yellow">Edit</a>

                                    <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="form-inline" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-red">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <a href="{{ route('bookings.create') }}" class="btn btn-blue">
            + New Booking
        </a>
    </div>
</x-app-layout>
