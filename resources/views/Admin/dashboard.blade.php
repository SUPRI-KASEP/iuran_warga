<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Kas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
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
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Aplikasi Iuran Kas</a>
    <div class="d-flex">
      <a class="btn btn-outline-light" href="#">Logout</a>
    </div>
  </div>
</nav>

<div class="container my-5">
  <div class="row g-4">

    <div class="col-md-6">
      <div class="card text-white bg-success card-box shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h5 class="card-title">Data Warga</h5>
            <h1>15</h1>
            <a href="{{ route('datawarga') }}" class="btn btn-outline-light btn-sm mt-2">Lihat Data</a>
          </div>
          <div class="card-icon">
            👥
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card text-white bg-primary card-box shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h5 class="card-title">Transaksi Kas Warga</h5>
            <h1>6</h1>
            <a href="#" class="btn btn-outline-light btn-sm mt-2">Lihat Data</a>
          </div>
          <div class="card-icon">
            💰
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<footer class="text-center text-muted mt-5 mb-3">
  <small>Copyright © 2025 <strong>Versi Revisi</strong>. All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
