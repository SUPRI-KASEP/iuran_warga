<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Kas</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background-color: #121212;
            color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            width: 240px;
            background-color: #1e1e2d;
            position: fixed;
            top: 0;
            bottom: 0;
            padding-top: 60px;
        }
        .sidebar .nav-link {
            color: #aaa;
            padding: 12px 20px;
            border-radius: 10px;
            margin: 4px 12px;
            transition: 0.3s;
        }
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #e11d48;
            color: #fff;
        }
        .navbar {
            margin-left: 240px;
            background-color: #1e1e2d;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }
        .content {
            margin-left: 260px;
            padding: 30px;
        }
        .card-box {
            background-color: #1e1e2d;
            border: none;
            border-radius: 15px;
            padding: 20px;
            color: #fff;
            transition: 0.3s;
        }
        .card-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }
        .card-icon {
            font-size: 2.5rem;
            color: #e11d48;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            color: #aaa;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <h3 class="text-white text-center mb-4">Iuran Warga</h3>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('datawarga') ? 'active' : '' }}" href="{{ route('datawarga') }}">
                <i class="bi bi-people-fill me-2"></i> Data Warga
            </a>
            <a class="nav-link {{ request()->routeIs('transaksi.index') ? 'active' : '' }}" href="{{ route('transaksi.index') }}">
                <i class="bi bi-cash-coin me-2"></i> Transaksi Kas
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-graph-up me-2"></i> Laporan
            </a>
        </nav>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-dark px-4">
        <div class="container-fluid justify-content-end">
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        <div class="row g-4">
            <!-- Data Warga -->
            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Data Warga</h6>
                            <h2>{{ $jumlahWarga ?? 0 }}</h2>
                        </div>
                        <i class="bi bi-people-fill card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Transaksi Kas -->
            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Transaksi Kas</h6>
                            <h2>{{ $jumlahTransaksi ?? 0 }}</h2>
                        </div>
                        <i class="bi bi-cash-coin card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Today Sale -->
            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Today Sale</h6>
                            <h2>Rp {{ number_format($todaySale ?? 0, 0, ',', '.') }}</h2>
                        </div>
                        <i class="bi bi-bar-chart-line-fill card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Total Revenue</h6>
                            <h2>Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</h2>
                        </div>
                        <i class="bi bi-pie-chart-fill card-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card-box" style="height:300px;">
                    <h6>Worldwide Sales</h6>
                    <canvas id="worldwideChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-box" style="height:300px;">
                    <h6>Sales & Revenue</h6>
                    <canvas id="salesRevenueChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5">
            <small>© 2025 <strong>Iuran Wargah</strong>. All rights reserved.</small>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Worldwide Sales (Bar Chart)
        const ctx1 = document.getElementById('worldwideChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Sales',
                    data: [120, 150, 180, 90, 200, 170],
                    backgroundColor: '#e11d48'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { ticks: { color: '#f5f5f5' } },
                    y: { ticks: { color: '#f5f5f5' } }
                }
            }
        });

        // Sales & Revenue (Line Chart)
        const ctx2 = document.getElementById('salesRevenueChart').getContext('2d');
        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Sales',
                        data: [100, 140, 160, 120, 190, 210],
                        borderColor: '#e11d48',
                        backgroundColor: 'rgba(225, 29, 72, 0.2)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Revenue',
                        data: [80, 130, 150, 100, 180, 200],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { labels: { color: '#f5f5f5' } }
                },
                scales: {
                    x: { ticks: { color: '#f5f5f5' } },
                    y: { ticks: { color: '#f5f5f5' } }
                }
            }
        });
    </script>
</body>
</html>
