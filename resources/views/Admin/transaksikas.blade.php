<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Transaksi Kas Warga</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      background-color: #343a40;
      color: #fff;
      padding-top: 1rem;
    }
    .sidebar a {
      color: #adb5bd;
      text-decoration: none;
      padding: 10px 20px;
      display: block;
    }
    .sidebar a.active, .sidebar a:hover {
      background-color: #495057;
      color: #fff;
    }
    .table thead {
      background-color: #212529;
      color: #fff;
    }
    .btn-action {
      margin: 0 2px;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-2 sidebar">
      <h5 class="text-center">KasApp</h5>
      <a href="#">Dashboard</a>
      <a href="#">Data Warga</a>
      <a href="#" class="active">Transaksi Kas</a>
      <a href="#">Laporan</a>
      <a href="#">Pengaturan</a>
      <a href="#">Logout</a>
    </nav>

    <!-- Main Content -->
    <main class="col-md-10 ms-sm-auto px-md-4 mt-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Transaksi Kas</h2>
        <a href="#" class="btn btn-primary">+ Tambah Transaksi</a>
      </div>

      <div class="card shadow-sm">
        <div class="card-body table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Warga</th>
                <th>Tanggal</th>
                <th>Jenis Transaksi</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Ahmad Fauzi</td>
                <td>2025-08-01</td>
                <td><span class="badge bg-success">Pemasukan</span></td>
                <td>Rp 100.000</td>
                <td>Iuran Bulanan</td>
                <td><span class="badge bg-success">Lunas</span></td>
                <td>
                  <button class="btn btn-sm btn-warning btn-action">📝</button>
                  <button class="btn btn-sm btn-danger btn-action">🗑️</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Siti Mariam</td>
                <td>2025-08-01</td>
                <td><span class="badge bg-danger">Pengeluaran</span></td>
                <td>Rp 50.000</td>
                <td>Biaya Kebersihan</td>
                <td><span class="badge bg-secondary">Selesai</span></td>
                <td>
                  <button class="btn btn-sm btn-warning btn-action">📝</button>
                  <button class="btn btn-sm btn-danger btn-action">🗑️</button>
                </td>
              </tr>
              <!-- Tambah data lain sesuai kebutuhan -->
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
