<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dues Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">📂 Daftar Kategori Iuran</h4>
                <div>
                    <a href="{{ route('admin.dues_categories.create') }}" class="btn btn-light btn-sm">
                        ➕ Tambah Kategori
                    </a>
                </div>
            </div>
            <div class="card-body bg-white">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
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
                                        🗑️ Hapus
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
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

