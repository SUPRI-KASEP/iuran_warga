<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Kas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .card-box {
      border-radius: 15px;
      transition: transform 0.2s;
    }
    .card-box:hover {
      transform: scale(1.03);
    }
    .card-icon {
      font-size: 2.5rem;
    }
    footer {
      margin-top: auto;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Kas Warga</a>
    <div class="d-flex">
      <a class="btn btn-outline-light" href="{{ route('logout') }}">Logout</a>
    </div>
  </div>
</nav>

<div class="container my-5">
  <div class="row g-4">

    <!-- Data Warga -->
    <div class="col-md-6">
      <div class="card text-white bg-success card-box shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h5 class="card-title">Data Warga</h5>
            <h1>{{ $jumlahWarga ?? 0 }}</h1>
            <a href="{{ route('datawarga') }}" class="btn btn-outline-light btn-sm mt-2">Lihat Data</a>
          </div>
          <div class="card-icon">
            <i class="bi bi-people-fill"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Transaksi Kas -->
    <div class="col-md-6">
      <div class="card text-white bg-primary card-box shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h5 class="card-title">Transaksi Kas Warga</h5>
            <h1>{{ $jumlahTransaksi ?? 0 }}</h1>
            <a href="" class="btn btn-outline-light btn-sm mt-2">Lihat Data</a>
          </div>
          <div class="card-icon">
            <i class="bi bi-cash-coin"></i>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<footer class="text-center text-muted py-3">
  <small>Copyright © 2025 <strong>Versi Revisi</strong>. All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
