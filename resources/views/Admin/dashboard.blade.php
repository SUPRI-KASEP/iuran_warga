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

    <!-- Custom Style -->
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
            box-shadow: 0 2px 8px rgba(0,0,0,0.5);
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
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }
        .card-icon {
            font-size: 2.5rem;
            color: #e11d48;
        }
        .chart-card {
            height: 300px;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            color: #aaa;
        }
    </style>
</head>
<body>

    @php
        $jumlahWarga      = $jumlahWarga ?? 0;
        $jumlahTransaksi  = $jumlahTransaksi ?? 0;
        $todaySale        = $todaySale ?? 0;
        $totalRevenue     = $totalRevenue ?? 0;

        $labels           = $labels ?? [];
        $monthlyIncome    = $monthlyIncome ?? [];
        $totalCumulative  = $totalCumulative ?? [];

        $yearLabels       = $yearLabels ?? [];
        $annualIncome     = $annualIncome ?? [];
    @endphp

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
                <i class="bi bi-cash-coin me-2"></i> Transaksi
            </a>
            <a class="nav-link" href="{{ route('admin.dues_categories') }}">
                <i class="bi bi-graph-up me-2"></i> Dues Category
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

        <!-- Summary Cards -->
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Data Warga</h6>
                            <h2>{{ $jumlahWarga }}</h2>
                        </div>
                        <i class="bi bi-people-fill card-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Transaksi Kas</h6>
                            <h2>{{ $jumlahTransaksi }}</h2>
                        </div>
                        <i class="bi bi-cash-coin card-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Pemasukan Bulan Ini</h6>
                            <h2>Rp {{ number_format($todaySale, 0, ',', '.') }}</h2>
                        </div>
                        <i class="bi bi-bar-chart-line-fill card-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Total Pemasukan</h6>
                            <h2>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h2>
                        </div>
                        <i class="bi bi-pie-chart-fill card-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card-box chart-card">
                    <h6>Pemasukan Bulanan</h6>
                    <canvas id="monthlyIncomeChart"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box chart-card">
                    <h6>Pemasukan Kumulatif</h6>
                    <canvas id="cumulativeIncomeChart"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box chart-card">
                    <h6>Pemasukan Tahunan</h6>
                    <canvas id="annualIncomeChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5">
            <small>© 2025 <strong>Iuran Warga</strong>. All rights reserved.</small>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const labels           = @json($labels);
        const monthlyIncome    = @json($monthlyIncome);
        const cumulativeIncome = @json($totalCumulative);
        const yearLabels       = @json($yearLabels);
        const annualIncome     = @json($annualIncome);

        // Chart Bulanan
        new Chart(document.getElementById('monthlyIncomeChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pemasukan Bulanan (Rp)',
                    data: monthlyIncome,
                    backgroundColor: '#e11d48'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    x: { ticks: { color: '#f5f5f5' } },
                    y: { ticks: { color: '#f5f5f5' } }
                }
            }
        });

        // Chart Kumulatif
        new Chart(document.getElementById('cumulativeIncomeChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pemasukan Kumulatif (Rp)',
                    data: cumulativeIncome,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59,130,246,0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { labels: { color: '#f5f5f5' } } },
                scales: {
                    x: { ticks: { color: '#f5f5f5' } },
                    y: { ticks: { color: '#f5f5f5' } }
                }
            }
        });

        // Chart Tahunan
        new Chart(document.getElementById('annualIncomeChart'), {
            type: 'bar',
            data: {
                labels: yearLabels,
                datasets: [{
                    label: 'Pemasukan Tahunan (Rp)',
                    data: annualIncome,
                    backgroundColor: '#10b981'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    x: { ticks: { color: '#f5f5f5' } },
                    y: { ticks: { color: '#f5f5f5' } }
                }
            }
        });
    </script>
</body>
</html>
