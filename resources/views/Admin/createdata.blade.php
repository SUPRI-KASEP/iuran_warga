<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Warga</title>
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
  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Terjadi kesalahan!</strong>
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="form-card">
    <h3 class="form-title">Tambah Data Warga</h3>

    <form action="{{ route('admin.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}">
        @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select class="form-select @error('jk') is-invalid @enderror" id="jk" name="jk">
          <option value="">-- Pilih --</option>
          <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
          <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jk') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="no_rumah" class="form-label">No. Rumah</label>
        <input type="text" class="form-control @error('no_rumah') is-invalid @enderror" id="no_rumah" name="no_rumah" value="{{ old('no_rumah') }}">
        @error('no_rumah') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="id_dues_category" class="form-label">Kategori Iuran</label>
        <select class="form-select @error('id_dues_category') is-invalid @enderror" id="id_dues_category" name="id_dues_category">
          <option value="">-- Pilih Kategori --</option>
          @foreach ($duesCategories as $cat)
            <option value="{{ $cat->id }}" {{ old('id_dues_category') == $cat->id ? 'selected' : '' }}>
              {{ $cat->name }} - Rp{{ number_format($cat->amount,0,',','.') }}/{{ $cat->periode }}
            </option>
          @endforeach
        </select>
        @error('id_dues_category') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
        @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-4">
        <label for="status" class="form-label">Status</label>
        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
          <option value="">-- Pilih --</option>
          <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
          <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      {{-- level default warga, jadi tidak ditampilkan --}}

      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary px-4">Simpan</button>
        <a href="{{ route('datawarga') }}" class="btn btn-secondary px-4">Batal</a>
      </div>
    </form>
  </div>

</body>
</html>
