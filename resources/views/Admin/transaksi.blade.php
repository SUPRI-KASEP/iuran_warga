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
            <th>Category</th>
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
        <td>{{ $item->dc->name ?? '-' }}</td>

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

<!-- Modal Bayar Iuran -->
<div class="modal fade" id="formBayar" tabindex="-1" aria-labelledby="formBayarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('transaksi.store') }}" method="POST">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="formBayarLabel">Bayar Iuran Warga</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        @csrf

        <div class="modal-body">
          <!-- Nama Warga -->
          <div class="mb-3">
            <label class="form-label">Nama Warga</label>
            <select name="warga_id" id="warga_id" class="form-select" required>
              <option value="">-- Pilih Warga --</option>
              @foreach($warga as $w)
                <option value="{{ $w->id }}" data-dues-category="{{ $w->id_dues_category }}">{{ $w->nama }}</option>
              @endforeach
            </select>
          </div>

          <!-- Jenis Category -->
          <div class="mb-3">
            <label class="form-label">Jenis Category</label>
            <select name="id_dc" id="id_dc" class="form-select" required>
              <option value="">-- Pilih Category --</option>
              @foreach ($dc as $item)
                <option value="{{ $item->id }}" data-periode="{{ $item->periode }}" data-amount="{{ $item->amount }}">{{ $item->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Jenis Iuran (Auto-filled) -->
          <div class="mb-3">
            <label class="form-label">Jenis Iuran</label>
            <input type="text" id="jenis_transaksi" class="form-control" readonly>
          </div>

          <!-- Jumlah Bayar (Auto-filled) -->
          <div class="mb-3">
            <label class="form-label">Total Bayar</label>
            <input type="number" id="jumlah" name="jumlah" class="form-control" readonly required>
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
<script>
document.getElementById('warga_id').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const duesCategoryId = selectedOption.getAttribute('data-dues-category');
    if (duesCategoryId) {
        document.getElementById('id_dc').value = duesCategoryId;
        // Trigger change event to auto-fill fields
        document.getElementById('id_dc').dispatchEvent(new Event('change'));
    }
});

document.getElementById('id_dc').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const periode = selectedOption.getAttribute('data-periode');
    const amount = selectedOption.getAttribute('data-amount');

    document.getElementById('jenis_transaksi').value = periode || '';
    document.getElementById('jumlah').value = amount || '';
});
</script>
</body>
</html>
