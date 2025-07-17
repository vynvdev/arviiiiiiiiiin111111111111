<x-app-layout>
    <div class="dashboard-wrapper">
        <div class="dashboard-container">
            <!-- Welcome Banner -->
            <div class="dashboard-header">
                <h1 class="dashboard-title">📆 Booking Dashboard</h1>
                <p class="dashboard-subtitle">
                    Manage your reservations effortlessly and keep track of your schedules with ease.
                </p>
            </div>

            <!-- Cards Section -->
            <div class="dashboard-cards">
                <!-- New Booking Card -->
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <div class="card-icon bg-blue">➕</div>
                        <h2 class="card-title">Create a Booking</h2>
                    </div>
                    <p class="card-description">Start a new reservation or appointment.</p>
                    <a href="{{ url('/bookings/create') }}" class="card-button bg-blue">New Booking</a>
                </div>

                <!-- View Bookings Card -->
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <div class="card-icon bg-green">📋</div>
                        <h2 class="card-title">My Bookings</h2>
                    </div>
                    <p class="card-description">See your upcoming and past bookings.</p>
                    <a href="{{ url('/bookings') }}" class="card-button bg-green">View Bookings</a>
                </div>

                <!-- Notifications Card -->
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <div class="card-icon bg-yellow">🔔</div>
                        <h2 class="card-title">Notifications</h2>
                    </div>
                    <p class="card-description">Check recent booking activity or alerts.</p>
                    <a href="#" class="card-button bg-yellow">View Activity</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dashboard-wrapper {
            min-height: 100vh;
            background: linear-gradient(to bottom right, #3c2f2f, #2e1f1f);
            padding: 3rem 1rem;
            color: #fcebd5;
        }
        .dashboard-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        .dashboard-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        .dashboard-title {
            font-size: 3rem;
            font-weight: 800;
            color: #fcebd5;
        }
        .dashboard-subtitle {
            color: #d9bfa9;
            font-size: 1.125rem;
            max-width: 600px;
            margin: 0 auto;
        }
        .dashboard-cards {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        @media (min-width: 768px) {
            .dashboard-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (min-width: 1024px) {
            .dashboard-cards {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        .dashboard-card {
            background-color: rgba(46, 31, 31, 0.8);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            border: 1px solid #5e4238;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.6);
        }
        .dashboard-card-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        .card-icon {
            padding: 0.75rem;
            border-radius: 9999px;
            color: white;
            font-size: 1.25rem;
        }
        .bg-blue {
            background-color: #6b4b3e;
        }
        .bg-green {
            background-color: #7a6f4d;
        }
        .bg-yellow {
            background-color: #b58855;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-left: 1rem;
        }
        .card-description {
            color: #d9bfa9;
            margin-bottom: 1.5rem;
        }
        .card-button {
            display: block;
            text-align: center;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            color: white;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .bg-blue:hover {
            background-color: #5a3f36;
        }
        .bg-green:hover {
            background-color: #6a6145;
        }
        .bg-yellow:hover {
            background-color: #a4734d;
        }
    </style>
</x-app-layout>
