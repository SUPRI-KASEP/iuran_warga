{{-- resources/views/transaksi/index.blade.php --}}
@extends('layouts.app') <!-- Pastikan menggunakan layout aplikasi yang sesuai -->

@section('content')
<div class="container">
    <h1>Daftar Transaksi</h1>

    <!-- Menampilkan pesan jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel untuk menampilkan transaksi -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Transaksi</th>
                <th>Nama Pengguna</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_transaksi }}</td>
                    <td>{{ $item->user->name ?? 'Unknown' }}</td> <!-- Misal, relasi dengan model User -->
                    <td>{{ $item->tanggal_transaksi->format('d M Y') }}</td>
                    <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    <td>
                        <!-- Tindakan seperti Edit dan Hapus -->
                        <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tambah Transaksi -->
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
</div>
@endsection
