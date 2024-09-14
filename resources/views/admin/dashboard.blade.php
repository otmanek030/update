<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styleA.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashA.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>



        .home-content {
            margin-bottom: 30px;
            margin-left: 270px;
            padding: 3px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            background: linear-gradient(to right, #759b83, #054102);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 5px;
            border-radius: 4px;
            margin-right: 67px;
        }


        .overview-boxes {
            display: flex;
            justify-content: space-around;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .stat-box {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 20%;
            margin: 10px;
        }

        .stat-box h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #495057;
        }

        .stat-box p {
            font-size: 24px;
            font-weight: bold;
            color: #0dbd45;
        }

        .stat-box i {
            font-size: 40px;
            margin-bottom: 10px;
            color: #0f5515;
        }

        .chart-container {
            background-color: #ffffff;
            padding: 10px;
            /* Adjust padding if needed */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            flex: 1;
            margin: 10px;
            /* Ensure proper sizing */
            max-width: 100%;
            /* Prevents overflow */
        }

        .charts-row {
            display: flex;
            justify-content: flex-start;
            /* Aligns charts to the start */
            gap: 20px;
            /* Adds spacing between charts */
        }

        .chart-container canvas {
            height: 370px;
            /* Adjust height to make it smaller */
            width: 100%;
            max-width: 100%;
            /* Prevents canvas from overflowing */
        }
    </style>
</head>

<body>

        @php
        include public_path('assets/php/myphp.php');
        @endphp

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="home-content">

        <div class="title">
            <h1>Welcome back Othmane</h1>
            <hr>
        </div>

        <div class="charts-row">
            <div class="chart-container">
                <canvas id="ordersByDayChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <div class="overview-boxes">
            <div class="stat-box">
                <i class='bx bx-cube-alt'></i>
                <h3>Total Products</h3>
                <p>{{ $totalProducts }}</p>
            </div>
            <div class="stat-box">
                <i class='bx bx-cart'></i>
                <h3>Total Orders</h3>
                <p>{{ $totalOrders }}</p>
            </div>
            <div class="stat-box">
                <i class='bx bx-user'></i>
                <h3>Total Users</h3>
                <p>{{ $totalUsers }}</p>
            </div>
            <div class="stat-box">
                <i class='bx bx-dollar'></i>
                <h3>Total Sales</h3>
                <p>${{ number_format($totalSales, 2) }}</p>
            </div>
            <div class="stat-box">
                <i class='bx bx-money'></i>
                <h3>Total Profit</h3>
                <p>${{ number_format($totalProfit, 2) }}</p>
            </div>
            <div class="stat-box">
                <i class='bx bx-undo'></i>
                <h3>Total Return</h3>
                <p>${{ number_format($totalReturn, 2) }}</p>
            </div>
        </div>
    </div>

    <script>
        // Orders by Day Chart
        const ordersByDayCtx = document.getElementById('ordersByDayChart').getContext('2d');
        new Chart(ordersByDayCtx, {
            type: 'line',
            data: {
                labels: @json($ordersByDay->keys()),
                datasets: [{
                    label: 'Orders by Day',
                    data: @json($ordersByDay->values()),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });

        // Sales Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: @json($salesData->keys()),
                datasets: [{
                    label: 'Total Sales',
                    data: @json($salesData->values()),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    </script>
</body>

</html>
