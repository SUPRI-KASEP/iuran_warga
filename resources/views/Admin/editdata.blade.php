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
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select name="jk" id="jk" class="form-select" required>
          <option value="L" {{ $warga->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
          <option value="P" {{ $warga->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $warga->alamat) }}</textarea>
      </div>

      <div class="mb-3">
        <label for="no_rumah" class="form-label">No. Rumah</label>
        <input type="text" class="form-control" id="no_rumah" name="no_rumah" value="{{ old('no_rumah', $warga->no_rumah) }}" required>
      </div>

      <div class="mb-3">
        <label for="id_dues_category" class="form-label">Kategori Iuran</label>
        <select name="id_dues_category" id="id_dues_category" class="form-select" required>
          @foreach ($duesCategories as $cat)
            <option value="{{ $cat->id }}" {{ $warga->id_dues_category == $cat->id ? 'selected' : '' }}>
              {{ $cat->name }} - Rp{{ number_format($cat->amount,0,',','.') }}/{{ $cat->periode }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $warga->username) }}" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password (kosongkan jika tidak diganti)</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

      <div class="mb-4">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select" required>
          <option value="aktif" {{ $warga->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
          <option value="nonaktif" {{ $warga->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>
      </div>

      {{-- level default warga, tidak perlu diedit --}}

      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary px-4">Update</button>
        <a href="{{ route('datawarga') }}" class="btn btn-secondary px-4">Kembali</a>
      </div>
    </form>
  </div>

</body>
</html>
