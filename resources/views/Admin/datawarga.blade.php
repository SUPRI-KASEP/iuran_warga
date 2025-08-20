<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Warga - Iuran Kas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .badge-status {
      font-size: 0.85rem;
    }
    .action-btn {
      margin-right: 5px;
    }
    body {
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Aplikasi Iuran Kas</a>
    <div class="d-flex">
      <a class="btn btn-outline-light" href="route{{ "/logout" }}">Logout</a>
    </div>
  </div>
</nav>

<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Warga</h3>
    <button class="btn btn-primary">+ Tambah Warga</button>
  </div>

  <div class="table-responsive shadow-sm rounded bg-white p-3">
    <table class="table table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>NIK</th>
          <th>Nama Warga</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>No. Rumah</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>0000000000000123</td>
          <td>DOLLAR RHMY HESRANA</td>
          <td><span class="badge bg-primary">Laki-laki</span></td>
          <td>Perumahan CodaJoglo</td>
          <td>Blok A 137</td>
          <td><span class="badge bg-warning text-dark badge-status">Menunggu</span></td>
          <td>
            <button class="btn btn-sm btn-warning action-btn">📝</button>
            <button class="btn btn-sm btn-danger">🗑️</button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>0000000000000121</td>
          <td>JIHAN RHEEMAH</td>
          <td><span class="badge bg-danger">Perempuan</span></td>
          <td>Perumahan CodaJoglo</td>
          <td>Blok A 123</td>
          <td><span class="badge bg-success badge-status">Aktif</span></td>
          <td>
            <button class="btn btn-sm btn-warning action-btn">📝</button>
            <button class="btn btn-sm btn-danger">🗑️</button>
          </td>
        </tr>
        <!-- Tambahkan baris lain sesuai kebutuhan -->
      </tbody>
    </table>
  </div>
</div>

<footer class="text-center text-muted mt-5 mb-3">
  <small>Copyright © 2025 Aplikasi Iuran Kas. All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
