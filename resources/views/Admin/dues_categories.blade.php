<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dues Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-bg: #121212;
            --card-bg: #1e1e2d;
            --header-bg: #e11d48;
            --text-color: #f5f5f5;
            --hover-color: rgba(225, 29, 72, 0.15);
        }

        body {
            background-color: var(--primary-bg);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        .container {
            padding-left: 15px;
            padding-right: 15px;
        }

        .card {
            background-color: var(--card-bg);
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
            overflow: hidden;
        }

        .card-header {
            background-color: var(--header-bg);
            border-bottom: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 20px;
        }

        .card-header h4 {
            color: #fff;
            margin: 0;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 20px;
        }

        .btn-light {
            background-color: #f5f5f5;
            color: #1e1e2d;
            font-weight: 600;
            transition: 0.3s;
            border: none;
            border-radius: 8px;
        }

        .btn-light:hover {
            background-color: #d1d5db;
            transform: translateY(-1px);
        }

        .btn-danger {
            background-color: #b91c1c;
            border: none;
            border-radius: 6px;
        }

        .btn-danger:hover {
            background-color: #dc2626;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #374151;
            border: none;
            border-radius: 8px;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
            transform: translateY(-1px);
        }

        table {
            color: var(--text-color);
            width: 100%;
            margin-bottom: 0;
        }

        thead {
            background-color: #27293d;
        }

        thead th {
            border: none;
            padding: 15px 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        tbody td {
            padding: 12px 10px;
            vertical-align: middle;
            border-color: rgba(255, 255, 255, 0.1);
        }

        tbody tr:hover {
            background-color: var(--hover-color);
        }

        .badge.bg-success {
            background-color: #10b981 !important;
        }

        .badge.bg-secondary {
            background-color: #6b7280 !important;
        }

        .alert-success {
            background-color: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
            border-radius: 10px;
        }

        .btn-close {
            filter: invert(1);
        }

        a {
            text-decoration: none;
        }

        /* ========== RESPONSIVE STYLES ========== */

        /* Tablet and Mobile Adjustments */
        @media (max-width: 992px) {
            .container.py-5 {
                padding-top: 20px !important;
                padding-bottom: 20px !important;
            }

            .card-header {
                padding: 15px;
            }

            .card-body {
                padding: 15px;
            }

            .card-header h4 {
                font-size: 1.1rem;
            }

            thead th,
            tbody td {
                padding: 10px 8px;
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.85rem;
                padding: 6px 10px;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding-left: 10px;
                padding-right: 10px;
            }

            /* Header layout for mobile */
            .card-header {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start !important;
            }

            .card-header h4 {
                font-size: 1rem;
            }

            .btn-light {
                width: 100%;
                text-align: center;
            }

            /* Table adjustments */
            .table-responsive {
                border-radius: 10px;
                overflow: hidden;
            }

            thead th,
            tbody td {
                padding: 8px 6px;
                font-size: 0.85rem;
            }

            /* Hide less important columns on mobile */
            thead th:nth-child(3), /* Periode */
            tbody td:nth-child(3) {
                display: none;
            }

            .badge {
                font-size: 0.75rem;
                padding: 4px 8px;
            }
        }

        @media (max-width: 576px) {
            .container.py-5 {
                padding-top: 15px !important;
                padding-bottom: 15px !important;
            }

            .card {
                border-radius: 12px;
            }

            .card-header,
            .card-body {
                padding: 12px;
            }

            thead th,
            tbody td {
                padding: 6px 4px;
                font-size: 0.8rem;
            }

            /* Hide more columns on very small screens */
            thead th:nth-child(4), /* Nominal */
            tbody td:nth-child(4) {
                display: none;
            }

            .btn {
                font-size: 0.8rem;
                padding: 5px 8px;
            }

            /* Stack buttons in action column */
            tbody td:last-child .d-inline {
                display: flex !important;
                flex-direction: column;
                gap: 5px;
            }

            .btn-danger {
                width: 100%;
            }
        }

        @media (max-width: 400px) {
            thead th:nth-child(2), /* Nama */
            tbody td:nth-child(2) {
                display: none;
            }

            .card-header h4 {
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.75rem;
                padding: 4px 6px;
            }
        }

        /* Text truncation for table cells */
        .table td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Tooltip for truncated content */
        .table td[title] {
            cursor: help;
        }

        /* Loading state */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        /* Empty state styling */
        .text-muted {
            opacity: 0.7;
            padding: 30px !important;
            text-align: center;
        }

        /* Mobile menu indicator */
        .mobile-scroll-hint {
            display: none;
            text-align: center;
            padding: 8px;
            background: rgba(225, 29, 72, 0.1);
            color: #e11d48;
            font-size: 0.8rem;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .mobile-scroll-hint {
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-lg border-0">
            <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h4><i class="bi bi-folder me-2"></i>Daftar Kategori Iuran</h4>
                <a href="{{ route('admin.dues_categories.create') }}" class="btn btn-light btn-sm mt-2 mt-md-0">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
                </a>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Mobile scroll hint -->
                <div class="mobile-scroll-hint">
                    <i class="bi bi-arrow-left-right me-1"></i> Geser untuk melihat lebih banyak
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th width="8%">#</th>
                                <th width="22%">Nama</th>
                                <th width="15%" class="d-none d-sm-table-cell">Periode</th>
                                <th width="20%" class="d-none d-xs-table-cell">Nominal</th>
                                <th width="15%">Status</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $cat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td title="{{ $cat->name }}">{{ $cat->name }}</td>
                                <td class="d-none d-sm-table-cell">{{ ucfirst($cat->periode) }}</td>
                                <td class="d-none d-xs-table-cell" title="Rp {{ number_format($cat->amount, 0, ',', '.') }}">
                                    Rp {{ number_format($cat->amount, 0, ',', '.') }}
                                </td>
                                <td>
                                    @if($cat->status === 'aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('dues_categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                            <i class="bi bi-trash"></i> <span class="d-none d-sm-inline">Hapus</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-muted py-4">
                                    <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                    Belum ada kategori iuran.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add tooltip functionality for truncated text
            const tableCells = document.querySelectorAll('.table td[title]');
            tableCells.forEach(cell => {
                cell.addEventListener('mouseenter', function() {
                    if (this.offsetWidth < this.scrollWidth) {
                        this.setAttribute('data-bs-toggle', 'tooltip');
                        this.setAttribute('data-bs-placement', 'top');
                        this.setAttribute('data-bs-title', this.getAttribute('title'));
                    }
                });
            });

            // Initialize Bootstrap tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Remove mobile scroll hint after first scroll
            const tableContainer = document.querySelector('.table-responsive');
            const scrollHint = document.querySelector('.mobile-scroll-hint');

            if (tableContainer && scrollHint) {
                tableContainer.addEventListener('scroll', function() {
                    scrollHint.style.opacity = '0';
                    setTimeout(() => {
                        scrollHint.style.display = 'none';
                    }, 300);
                });
            }
        });
    </script>
</body>
</html>
