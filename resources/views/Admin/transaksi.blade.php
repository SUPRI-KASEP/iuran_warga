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
    :root {
      --primary-bg: #0f0f1a;
      --card-bg: linear-gradient(145deg, #1a1a2e, #1f1f35);
      --accent-color: #e11d48;
      --text-color: #f5f5f5;
    }

    body {
      background-color: var(--primary-bg);
      color: var(--text-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding-bottom: 20px;
    }

    .card-custom {
      background: var(--card-bg);
      border: none;
      border-radius: 18px;
      padding: 20px;
      color: #fff;
      transition: 0.3s ease;
      overflow: hidden;
    }

    .card-custom:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.45);
    }

    .table {
      color: #fff;
      margin-bottom: 0;
      width: 100%;
    }

    .table thead {
      background: var(--accent-color);
      color: #fff;
    }

    .table thead th {
      border: none;
      padding: 12px 8px;
      font-weight: 600;
      white-space: nowrap;
    }

    .table tbody td {
      padding: 10px 8px;
      vertical-align: middle;
      border-color: rgba(255, 255, 255, 0.1);
    }

    .table tbody tr:hover {
      background-color: rgba(225, 29, 72, 0.15);
    }

    .btn-primary {
      background-color: var(--accent-color);
      border: none;
      border-radius: 10px;
      padding: 8px 16px;
      font-weight: 500;
    }

    .btn-primary:hover {
      background-color: #c8103f;
      transform: translateY(-1px);
    }

    .btn-outline-light {
      border-radius: 10px;
    }

    .btn-danger {
      background-color: #dc3545;
      border: none;
      border-radius: 8px;
      font-size: 0.85rem;
      padding: 6px 12px;
    }

    .btn-danger:hover {
      background-color: #b52a35;
    }

    .btn-success {
      background-color: #198754;
      border: none;
      border-radius: 10px;
      padding: 8px 16px;
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
      padding: 10px 15px;
    }

    .form-control:focus,
    .form-select:focus {
      background-color: #2a2a3d;
      color: #fff;
      box-shadow: 0 0 0 2px var(--accent-color);
      border: none;
    }

    footer {
      text-align: center;
      margin-top: 30px;
      padding: 15px 0;
      color: #aaa;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Badge styles */
    .badge {
      font-size: 0.75rem;
      padding: 6px 10px;
      border-radius: 8px;
    }

    /* ========== RESPONSIVE STYLES ========== */

    /* Header mobile adjustments */
    @media (max-width: 768px) {
      .container {
        padding-left: 10px;
        padding-right: 10px;
      }

      .container.py-5 {
        padding-top: 15px !important;
        padding-bottom: 15px !important;
      }

      /* Header stack on mobile */
      .header-container {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start !important;
      }

      .button-container {
        width: 100%;
        display: flex;
        gap: 8px;
        flex-wrap: nowrap;
      }

      h1.fw-bold {
        font-size: 1.5rem;
        margin-bottom: 0;
      }

      .btn {
        flex: 1;
        min-width: auto;
        font-size: 0.85rem;
        padding: 8px 12px;
      }
    }

    /* Table responsive adjustments - TAMPILKAN SEMUA KOLOM */
    @media (max-width: 1200px) {
      .table thead th,
      .table tbody td {
        padding: 10px 6px;
        font-size: 0.9rem;
      }

      .table th:nth-child(1), .table td:nth-child(1) { width: 5%; }  /* No */
      .table th:nth-child(2), .table td:nth-child(2) { width: 12%; } /* Kode */
      .table th:nth-child(3), .table td:nth-child(3) { width: 15%; } /* Nama */
      .table th:nth-child(4), .table td:nth-child(4) { width: 10%; } /* Tanggal */
      .table th:nth-child(5), .table td:nth-child(5) { width: 10%; } /* Jenis */
      .table th:nth-child(6), .table td:nth-child(6) { width: 12%; } /* Category */
      .table th:nth-child(7), .table td:nth-child(7) { width: 12%; } /* Jumlah */
      .table th:nth-child(8), .table td:nth-child(8) { width: 14%; } /* Aksi */
    }

    @media (max-width: 992px) {
      .table thead th,
      .table tbody td {
        padding: 8px 5px;
        font-size: 0.85rem;
      }

      .badge {
        font-size: 0.7rem;
        padding: 4px 8px;
      }

      .btn-danger {
        font-size: 0.8rem;
        padding: 5px 8px;
      }
    }

    @media (max-width: 768px) {
      .card-custom {
        padding: 15px 10px;
        border-radius: 12px;
      }

      .table thead th,
      .table tbody td {
        padding: 6px 4px;
        font-size: 0.8rem;
      }

      .table th:nth-child(1), .table td:nth-child(1) { width: 6%; }
      .table th:nth-child(2), .table td:nth-child(2) { width: 13%; }
      .table th:nth-child(3), .table td:nth-child(3) { width: 16%; }
      .table th:nth-child(4), .table td:nth-child(4) { width: 11%; }
      .table th:nth-child(5), .table td:nth-child(5) { width: 11%; }
      .table th:nth-child(6), .table td:nth-child(6) { width: 13%; }
      .table th:nth-child(7), .table td:nth-child(7) { width: 13%; }
      .table th:nth-child(8), .table td:nth-child(8) { width: 17%; }

      /* Compact text for small screens */
      .compact-date {
        font-size: 0.75rem;
      }
    }

    @media (max-width: 576px) {
      .table thead th,
      .table tbody td {
        padding: 5px 3px;
        font-size: 0.75rem;
      }

      .btn-danger {
        font-size: 0.75rem;
        padding: 4px 6px;
      }

      .badge {
        font-size: 0.65rem;
        padding: 3px 6px;
      }

      /* Even more compact layout for very small screens */
      .table th:nth-child(1), .table td:nth-child(1) { width: 7%; }
      .table th:nth-child(2), .table td:nth-child(2) { width: 14%; }
      .table th:nth-child(3), .table td:nth-child(3) { width: 18%; }
      .table th:nth-child(4), .table td:nth-child(4) { width: 12%; }
      .table th:nth-child(5), .table td:nth-child(5) { width: 12%; }
      .table th:nth-child(6), .table td:nth-child(6) { width: 14%; }
      .table th:nth-child(7), .table td:nth-child(7) { width: 14%; }
      .table th:nth-child(8), .table td:nth-child(8) { width: 19%; }
    }

    /* Modal responsive adjustments */
    @media (max-width: 576px) {
      .modal-dialog {
        margin: 10px;
      }

      .modal-content {
        border-radius: 12px;
      }

      .modal-body {
        padding: 15px;
      }

      .modal-footer {
        padding: 15px;
      }
    }

    /* Text truncation for table cells - SEMUA KOLOM DITAMPILKAN */
    .table td {
      max-width: 0;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    /* Tooltip for truncated content */
    .table td[title]:hover::after {
      content: attr(title);
      position: absolute;
      background: rgba(0, 0, 0, 0.8);
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      z-index: 1000;
      white-space: normal;
      max-width: 300px;
    }

    /* Alert responsive */
    .alert {
      border-radius: 10px;
      border: none;
    }

    /* Empty state styling */
    .text-muted {
      opacity: 0.7;
      padding: 30px !important;
    }

    /* Horizontal scroll indicator for mobile */
    .table-container {
      position: relative;
    }

    .scroll-hint {
      display: none;
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(225, 29, 72, 0.8);
      color: white;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      z-index: 10;
      animation: bounce 2s infinite;
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {transform: translateY(-50%);}
      40% {transform: translateY(-60%);}
      60% {transform: translateY(-40%);}
    }

    @media (max-width: 768px) {
      .scroll-hint {
        display: block;
      }
    }
  </style>
</head>
<body>

<div class="container py-5">
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4 header-container">
    <h1 class="fw-bold">Transaksi Kas</h1>
    <div class="button-container">
      <a href="{{ route('dashboard') }}" class="btn btn-outline-light">
        <i class="bi bi-arrow-left-circle"></i> <span class="d-none d-sm-inline">Kembali</span>
      </a>
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formBayar">
        <i class="bi bi-cash-coin"></i> <span class="d-none d-sm-inline">Bayar</span>
      </button>
    </div>
  </div>

  <!-- Alert -->
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow mb-4" role="alert">
      <div class="d-flex align-items-center">
        <i class="bi bi-check-circle-fill me-2"></i>
        <span>{{ session('success') }}</span>
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <!-- Table - SEMUA KOLOM DITAMPILKAN -->
  <div class="card-custom shadow">
    <div class="table-responsive table-container">
      <div class="scroll-hint">
        <i class="bi bi-arrow-left-right"></i> Geser
      </div>
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
            <td title="{{ $item->kode_transaksi }}">{{ $item->kode_transaksi }}</td>
            <td title="{{ $item->nama_pengguna ?? 'Unknown' }}">{{ $item->nama_pengguna ?? 'Unknown' }}</td>
            <td class="compact-date" title="{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d M Y') }}">
              {{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d/m/Y') }}
            </td>
            <td>
              @if($item->jenis_transaksi === 'bulanan')
                <span class="badge bg-info" title="Iuran Bulanan">Bln</span>
              @elseif($item->jenis_transaksi === 'tahunan')
                <span class="badge bg-success" title="Iuran Tahunan">Thn</span>
              @else
                <span class="badge bg-secondary" title="{{ ucfirst($item->jenis_transaksi) }}">{{ substr(ucfirst($item->jenis_transaksi), 0, 3) }}</span>
              @endif
            </td>
            <td title="{{ $item->dc->name ?? '-' }}">{{ $item->dc->name ?? '-' }}</td>
            <td><strong>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</strong></td>
            <td>
              <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST"
                    class="d-inline"
                    onsubmit="return confirm('Hapus transaksi ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i> <span class="d-none d-sm-inline">Hapus</span>
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center text-muted py-4">
              <i class="bi bi-receipt display-4 d-block mb-2"></i>
              Tidak ada transaksi.
            </td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Bayar Iuran -->
<div class="modal fade" id="formBayar" tabindex="-1" aria-labelledby="formBayarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('transaksi.store') }}" method="POST">
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title fw-bold" id="formBayarLabel">Bayar Iuran Warga</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        @csrf

        <div class="modal-body pt-0">
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
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success px-4">
            <i class="bi bi-cash-stack"></i> Bayar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container">
  <small>© 2025 <strong>Iuran Warga</strong>. All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Auto-fill functionality
  document.getElementById('warga_id').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const duesCategoryId = selectedOption.getAttribute('data-dues-category');
    if (duesCategoryId) {
      document.getElementById('id_dc').value = duesCategoryId;
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

  // Remove scroll hint after first scroll
  const tableContainer = document.querySelector('.table-container');
  const scrollHint = document.querySelector('.scroll-hint');

  tableContainer.addEventListener('scroll', function() {
    if (scrollHint) {
      scrollHint.style.display = 'none';
    }
  });
});
</script>
</body>
</html>
