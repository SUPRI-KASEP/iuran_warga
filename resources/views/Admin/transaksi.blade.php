<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaksi Kas</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #0f0f1a;
      color: #f5f5f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card-custom {
      background: linear-gradient(145deg, #1a1a2e, #1f1f35);
      border: none;
      border-radius: 18px;
      padding: 25px;
      color: #fff;
      transition: 0.3s ease;
    }
    .card-custom:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.45);
    }
    .table {
      color: #fff;
      margin-bottom: 0;
    }
    .table thead {
      background: #e11d48;
      color: #fff;
    }
    .table tbody tr:hover {
      background-color: rgba(225, 29, 72, 0.15);
    }
    .btn-primary {
      background-color: #e11d48;
      border: none;
      border-radius: 10px;
      padding: 8px 16px;
    }
    .btn-primary:hover {
      background-color: #c8103f;
    }
    .btn-outline-light {
      border-radius: 10px;
    }
    .btn-danger {
      background-color: #dc3545;
      border: none;
      border-radius: 8px;
    }
    .btn-danger:hover {
      background-color: #b52a35;
    }
    .modal-content {
      background: #1e1e2d;
      color: #fff;
      border-radius: 16px;
      border: none;
    }
    .form-control,
    .form-select {
      background-color: #2a2a3d;
      border: none;
      color: #fff;
      border-radius: 10px;
    }
    .form-control:focus,
    .form-select:focus {
      background-color: #2a2a3d;
      color: #fff;
      box-shadow: 0 0 0 2px #e11d48;
    }
    footer {
      text-align: center;
      margin-top: 50px;
      padding: 15px 0;
      color: #aaa;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
  </style>
</head>
<body>

<div class="container py-5">
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-5">
    <h1 class="fw-bold">Transaksi Kas</h1>
    <div>
      <a href="{{ route('dashboard') }}" class="btn btn-outline-light me-2">
        <i class="bi bi-arrow-left-circle"></i> Kembali
      </a>
      <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#formBayar">
        <i class="bi bi-cash-coin"></i> Bayar Iuran
      </button>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formTambah">
        <i class="bi bi-plus-circle"></i> Tambah Transaksi
      </button>
    </div>
  </div>

  <!-- Alert -->
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <!-- Table -->
  <div class="card-custom shadow">
    <div class="table-responsive">
      <table class="table align-middle table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode Transaksi</th>
            <th>Nama Pengguna</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        @forelse($transaksi as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kode_transaksi }}</td>
            <td>{{ $item->nama_pengguna ?? 'Unknown' }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d M Y') }}</td>
            <td>
              @if($item->jenis_transaksi === 'bulanan')
                <span class="badge bg-info px-3 py-2">Bulanan</span>
              @elseif($item->jenis_transaksi === 'tahunan')
                <span class="badge bg-success px-3 py-2">Tahunan</span>
              @else
                <span class="badge bg-secondary px-3 py-2">{{ ucfirst($item->jenis_transaksi) }}</span>
              @endif
            </td>
            <td><strong>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</strong></td>
            <td>
              <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST"
                    class="d-inline"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i> Hapus
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center text-muted">Tidak ada transaksi.</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Tambah Transaksi -->
<div class="modal fade" id="formTambah" tabindex="-1" aria-labelledby="formTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="formTambahLabel">Tambah Transaksi Manual</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Kode Transaksi</label>
            <input type="text" name="kode_transaksi" class="form-control"
                   value="TRX{{ time() }}" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Nama Pengguna</label>
            <input type="text" name="nama_pengguna" class="form-control" value="{{ old('nama_pengguna') }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" class="form-control" value="{{ old('tanggal_transaksi', date('Y-m-d')) }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Transaksi</label>
            <select name="jenis_transaksi" class="form-select" required>
              <option value="bulanan" {{ old('jenis_transaksi')=='bulanan'?'selected':'' }}>Bulanan</option>
              <option value="tahunan" {{ old('jenis_transaksi')=='tahunan'?'selected':'' }}>Tahunan</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-check-circle"></i> Simpan Transaksi
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Bayar Iuran -->
<div class="modal fade" id="formBayar" tabindex="-1" aria-labelledby="formBayarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="formBayarLabel">Bayar Iuran Warga</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <!-- Nama Warga -->
          <div class="mb-3">
            <label class="form-label">Nama Warga</label>
            <select name="warga_id" class="form-select" required>
              <option value="">-- Pilih Warga --</option>
              @foreach($warga as $w)
                <option value="{{ $w->id }}">{{ $w->nama }}</option>
              @endforeach
            </select>
          </div>

          <!-- Jenis Iuran -->
          <div class="mb-3">
            <label class="form-label">Jenis Iuran</label>
            <select name="jenis_transaksi" class="form-select" required>
              <option value="bulanan">Bulanan</option>
              <option value="tahunan">Tahunan</option>
            </select>
          </div>

          <!-- Jumlah Bayar -->
          <div class="mb-3">
            <label class="form-label">Total Bayar</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', 50000) }}" required>
            <small class="text-muted">Contoh: 50000 untuk iuran bulanan</small>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-success px-4">
            <i class="bi bi-cash-stack"></i> Bayar Sekarang
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <small>© 2025 <strong>Iuran Wargah</strong>. All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
