<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Warga</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #1f2937;
      color: #e5e7eb;
      font-family: 'Segoe UI', sans-serif;
      padding: 30px;
    }

    .form-card {
      background-color: #111827;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      max-width: 700px;
      margin: auto;
    }

    .form-label {
      font-weight: 500;
      color: #f3f4f6;
    }

    .form-control, .form-select {
      background-color: #374151;
      color: #fff;
      border: 1px solid #4b5563;
    }

    .form-control:focus, .form-select:focus {
      border-color: #2563eb;
      box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.3);
    }

    .btn-primary {
      background-color: #2563eb;
      border: none;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      background-color: #1d4ed8;
    }

    .btn-secondary {
      background-color: #6b7280;
      border: none;
      transition: all 0.3s;
    }

    .btn-secondary:hover {
      background-color: #4b5563;
    }

    .form-title {
      text-align: center;
      margin-bottom: 25px;
      color: #facc15;
    }
  </style>
</head>
<body>

  <div class="form-card">
    <h3 class="form-title">Edit Data Warga</h3>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.updatewarga', $warga->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $warga->nik) }}" required>
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $warga->nama) }}" required>
      </div>

      <div class="mb-3">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
          <option value="L" {{ $warga->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
          <option value="P" {{ $warga->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select" required>
          <option value="Admin" {{ $warga->kategori == 'Admin' ? 'selected' : '' }}>Admin</option>
          <option value="Warga" {{ $warga->kategori == 'Warga' ? 'selected' : '' }}>Warga</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $warga->alamat) }}" required>
      </div>

      <div class="mb-3">
        <label for="no_rumah" class="form-label">No Rumah</label>
        <input type="text" class="form-control" id="no_rumah" name="no_rumah" value="{{ old('no_rumah', $warga->no_rumah) }}" required>
      </div>

      <div class="mb-4">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select" required>
          <option value="Aktif" {{ $warga->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
          <option value="Menunggu" {{ $warga->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
        </select>
      </div>

      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary px-4">Update</button>
        <a href="{{ route('datawarga') }}" class="btn btn-secondary px-4">Kembali</a>
      </div>
    </form>
  </div>

</body>
</html>
