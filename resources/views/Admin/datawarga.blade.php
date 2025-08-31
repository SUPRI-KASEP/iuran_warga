<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Warga</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #1e1e2f;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    .sidebar {
      height: 100vh;
      background-color: #111827;
      padding: 20px;
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
    }
    .sidebar h3 {
      color: #e63946;
    }
    .content {
      margin-left: 240px;
      padding: 20px;
    }
    .table {
      background-color: #2c2c3c;
      border-radius: 10px;
      overflow: hidden;
    }
    .table th {
      background-color: #111827;
      color: #e63946;
    }
    .btn-create {
      background-color: #e63946;
      color: #fff;
    }
    .btn-update {
      background-color: #2563eb;
      color: #fff;
    }
    .btn-delete {
      background-color: #dc2626;
      color: #fff;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3>Data Warga</h3>
    <ul class="nav flex-column mt-4">
      <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link text-light">Dashboard</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-light">Data Warga</a></li>
    </ul>
  </div>

  <!-- Content -->
  <div class="content">
    <br>
    <!-- <button class="btn btn-create mb-3">+ Tambah Data</button> -->
     <a href="{{ route('admin.createdata') }}" class="btn btn-create mb-3">Tambah Data</a>
    <table class="table table-dark table-striped align-middle text-center">
      <thead>
        <tr>
          <th>No</th>
          <th>NIK</th>
          <th>Nama Lengkap</th>
          <th>Jenis Kelamin</th>
          <th>Kategori</th>
          <th>Alamat</th>
          <th>No.Rumah</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
    
      <tbody>
        @foreach($warga as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nik }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{ $item->kategori == 'Admin' ? 'Admin' : 'Warga' }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->no_rumah }}</td>
            <td>{{ $item->status }}</td>
            <td>
              <!-- <button class="btn btn-update">update</button> -->
              <a href="{{ route('admin.editwarga', $item->id) }}" class="btn btn-update">Update</a>
              <form action="{{ route('admin.delete', $item->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</body>
</html>
