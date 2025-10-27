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
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 240px;
            background-color: #1e1e2d;
            position: fixed;
            top: 0;
            bottom: 0;
            padding-top: 60px;
            z-index: 1000;
            transition: transform 0.3s ease;
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

        /* Navbar Styles */
        .navbar {
            margin-left: 240px;
            background-color: #1e1e2d;
            box-shadow: 0 2px 8px rgba(0,0,0,0.5);
            transition: margin-left 0.3s ease;
            padding: 10px 20px;
        }

        /* Content Styles */
        .content {
            margin-left: 260px;
            padding: 30px;
            transition: margin-left 0.3s ease;
        }

        .card-box {
            background-color: #1e1e2d;
            border: none;
            border-radius: 15px;
            padding: 20px;
            color: #fff;
            transition: 0.3s;
            height: 100%;
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

        /* Mobile Styles */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .navbar {
                margin-left: 0;
                padding: 10px 15px;
            }

            .content {
                margin-left: 0;
                padding: 20px 15px;
            }

            .card-box {
                padding: 15px;
                margin-bottom: 15px;
            }

            .chart-card {
                height: 250px;
                margin-bottom: 20px;
            }

            .card-icon {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            h6 {
                font-size: 0.9rem;
            }

            /* Mobile Menu Button */
            .mobile-menu-btn {
                background: none;
                border: none;
                color: #fff;
                font-size: 1.5rem;
                padding: 5px 10px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Overlay for mobile menu */
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .content {
                padding: 15px 10px;
            }

            .card-box {
                padding: 12px;
            }

            .chart-card {
                height: 220px;
            }

            .card-icon {
                font-size: 1.8rem;
            }

            h2 {
                font-size: 1.3rem;
            }

            .navbar {
                padding: 8px 10px;
            }
        }

        /* Chart responsive adjustments */
        .chart-container {
            position: relative;
            height: 100%;
            width: 100%;
        }

        /* Navbar Flex Container */
        .navbar-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Desktop - hide hamburger */
        @media (min-width: 769px) {
            .mobile-menu-btn {
                display: none !important;
            }
        }

        /* Mobile - adjust navbar layout */
        @media (max-width: 768px) {
            .navbar-container {
                flex-wrap: nowrap;
            }

            .navbar-left {
                flex: 1;
            }

            .navbar-right {
                flex-shrink: 0;
            }

            .mobile-menu-btn {
                margin-right: 0;
            }
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

    <!-- Mobile Menu Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
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
    <nav class="navbar navbar-dark">
        <div class="navbar-container">
            <div class="navbar-left">
                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="bi bi-list"></i>
                </button>

                <!-- Logo/Brand (optional) -->
                <span class="text-white fw-bold d-none d-sm-block">Dashboard</span>
            </div>

            <div class="navbar-right">
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">

        <!-- Summary Cards -->
        <div class="row g-3 g-md-4">
            <div class="col-6 col-md-6 col-lg-3">
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

            <div class="col-6 col-md-6 col-lg-3">
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

            <div class="col-6 col-md-6 col-lg-3">
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

            <div class="col-6 col-md-6 col-lg-3">
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
        <div class="row mt-3 mt-md-4">
            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <div class="card-box chart-card">
                    <h6>Pemasukan Bulanan</h6>
                    <div class="chart-container">
                        <canvas id="monthlyIncomeChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <div class="card-box chart-card">
                    <h6>Pemasukan Kumulatif</h6>
                    <div class="chart-container">
                        <canvas id="cumulativeIncomeChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card-box chart-card">
                    <h6>Pemasukan Tahunan</h6>
                    <div class="chart-container">
                        <canvas id="annualIncomeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-4 mt-md-5">
            <small>© 2025 <strong>Iuran Warga</strong>. All rights reserved.</small>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile Menu Functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function toggleMobileMenu() {
            sidebar.classList.toggle('mobile-open');
            sidebarOverlay.classList.toggle('active');
            document.body.style.overflow = sidebar.classList.contains('mobile-open') ? 'hidden' : '';
        }

        mobileMenuBtn.addEventListener('click', toggleMobileMenu);
        sidebarOverlay.addEventListener('click', toggleMobileMenu);

        // Close menu when clicking on a link (mobile)
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    toggleMobileMenu();
                }
            });
        });

        // Chart Data
        const labels           = @json($labels);
        const monthlyIncome    = @json($monthlyIncome);
        const cumulativeIncome = @json($totalCumulative);
        const yearLabels       = @json($yearLabels);
        const annualIncome     = @json($annualIncome);

        // Function to create responsive charts
        function createCharts() {
            // Destroy existing charts if they exist
            if (window.monthlyChart) window.monthlyChart.destroy();
            if (window.cumulativeChart) window.cumulativeChart.destroy();
            if (window.annualChart) window.annualChart.destroy();

            // Chart Bulanan
            window.monthlyChart = new Chart(document.getElementById('monthlyIncomeChart'), {
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
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#f5f5f5',
                                maxRotation: 45,
                                minRotation: 45
                            }
                        },
                        y: {
                            ticks: {
                                color: '#f5f5f5'
                            }
                        }
                    }
                }
            });

            // Chart Kumulatif
            window.cumulativeChart = new Chart(document.getElementById('cumulativeIncomeChart'), {
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
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#f5f5f5'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#f5f5f5',
                                maxRotation: 45,
                                minRotation: 45
                            }
                        },
                        y: {
                            ticks: {
                                color: '#f5f5f5'
                            }
                        }
                    }
                }
            });

            // Chart Tahunan
            window.annualChart = new Chart(document.getElementById('annualIncomeChart'), {
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
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#f5f5f5'
                            }
                        },
                        y: {
                            ticks: {
                                color: '#f5f5f5'
                            }
                        }
                    }
                }
            });
        }

        // Initialize charts
        createCharts();

        // Recreate charts on window resize
        window.addEventListener('resize', function() {
            createCharts();
        });
    </script>
</body>
</html>
