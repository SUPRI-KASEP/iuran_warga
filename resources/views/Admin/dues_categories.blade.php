<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dues Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            background-color: #1e1e2d;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }

        .card-header {
            background-color: #e11d48;
            border-bottom: none;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .card-header h4 {
            color: #fff;
            margin: 0;
        }

        .btn-light {
            background-color: #f5f5f5;
            color: #1e1e2d;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-light:hover {
            background-color: #d1d5db;
        }

        .btn-danger {
            background-color: #b91c1c;
            border: none;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .btn-secondary {
            background-color: #374151;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }

        table {
            color: #f5f5f5;
        }

        thead {
            background-color: #27293d;
        }

        tbody tr:hover {
            background-color: rgba(225, 29, 72, 0.15);
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
        }

        .btn-close {
            filter: invert(1);
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>📂 Daftar Kategori Iuran</h4>
                <a href="{{ route('admin.dues_categories.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
                </a>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <table class="table table-hover align-middle text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Periode</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $cat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ ucfirst($cat->periode) }}</td>
                            <td>Rp {{ number_format($cat->amount, 0, ',', '.') }}</td>
                            <td>
                                @if($cat->status === 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('dues_categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-muted">Belum ada kategori iuran.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
