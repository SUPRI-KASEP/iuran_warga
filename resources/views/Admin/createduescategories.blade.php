<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori Iuran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">➕ Tambah Kategori Iuran</h4>
                <a href="{{ route('admin.dues_categories') }}" class="btn btn-light btn-sm">⬅️ Kembali</a>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.dues_categories.store') }}" method="POST">
                    @csrf

                    <!-- Nama Kategori -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Kategori</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name') }}"
                               placeholder="Contoh: Iuran Kebersihan" required>
                    </div>

                    <!-- Periode -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Periode</label>
                        <select name="periode" id="periode" class="form-select" required>
                            <option value="" disabled {{ old('periode') ? '' : 'selected' }}>-- Pilih Periode --</option>
                            <option value="mingguan" {{ old('periode') == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                            <option value="bulanan" {{ old('periode') == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                            <option value="tahunan" {{ old('periode') == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                        </select>
                    </div>

                    <!-- Nominal -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nominal (Rp)</label>
                        <input type="number" name="amount" id="amount" class="form-control"
                            value="{{ old('amount') }}"
                            placeholder="Masukkan nominal iuran..." required>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="" disabled {{ old('status') ? '' : 'selected' }}>-- Pilih Status --</option>
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi (Opsional)</label>
                        <textarea name="description" class="form-control" rows="3"
                                  placeholder="Tuliskan keterangan tambahan...">{{ old('description') }}</textarea>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success px-4">💾 Simpan</button>
                        <a href="{{ route('admin.dues_categories') }}" class="btn btn-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script otomatis nominal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const periodeSelect = document.getElementById('periode');
            const nominalInput = document.getElementById('amount');

            periodeSelect.addEventListener('change', function () {
                const value = this.value;
                if (value === 'mingguan') {
                    nominalInput.value = 5000;
                } else if (value === 'bulanan') {
                    nominalInput.value = 20000;
                } else if (value === 'tahunan') {
                    nominalInput.value = 260000;
                } else {
                    nominalInput.value = '';
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
