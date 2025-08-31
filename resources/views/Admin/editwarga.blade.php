@section('content')
<div class="container mt-5">
  <h3 class="mb-4">Edit Data Warga</h3>

  <form action="{{ route('warga.update', $warga->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nik" class="form-label">NIK</label>
      <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $warga->nik) }}">
      @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $warga->nama) }}">
      @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label for="jk" class="form-label">Jenis Kelamin</label>
      <select class="form-select @error('jk') is-invalid @enderror" id="jk" name="jk">
        <option value="">-- Pilih --</option>
        <option value="L" {{ old('jk', $warga->jk) == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ old('jk', $warga->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
      </select>
      @error('jk') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $warga->alamat) }}">
      @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label for="no_rumah" class="form-label">No. Rumah</label>
      <input type="text" class="form-control @error('no_rumah') is-invalid @enderror" id="no_rumah" name="no_rumah" value="{{ old('no_rumah', $warga->no_rumah) }}">
      @error('no_rumah') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
        <option value="">-- Pilih --</option>
        <option value="Aktif" {{ old('status', $warga->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
        <option value="Menunggu" {{ old('status', $warga->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
      </select>
      @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('datawarga') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
