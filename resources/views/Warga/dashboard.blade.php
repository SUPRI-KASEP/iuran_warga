<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Warga</title>
  <script src="https://cdn.tailwindcss.com"></script>


  <style>
    body {
      background-color: #1e1e2f;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    .sidebar {
      background-color: #111827;
    }
    .sidebar h1 {
      color: #e63946;
    }
    .sidebar a {
      background-color: #1f2937;
      color: #fff;
      transition: all 0.3s ease;
    }
    .sidebar a:hover {
      background-color: #e63946;
      color: #fff;
    }
    .btn-logout {
      background-color: #e63946;
    }
    .card {
      background-color: #2c2c3c;
      border-radius: 12px;
      transition: 0.3s;
    }
    .card:hover {
      box-shadow: 0 0 15px rgba(230, 57, 70, 0.3);
    }
    canvas {
      background-color: #2c2c3c;
      border-radius: 10px;
      padding: 20px;
    }
  </style>
</head>
<body>

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="sidebar w-64 text-white flex flex-col">
      <div class="p-6 text-center border-b border-gray-700">
        <h1 class="text-2xl font-extrabold">WargaApp</h1>
      </div>

      <!-- Navigasi -->
      <nav class="flex-1 p-6 space-y-3">
        <a href="{{ route('warga.dashboard') }}"
           class="block py-2 px-4 rounded-lg">
          🏠 Dashboard
        </a>
      </nav>

      <!-- Tombol Logout -->
      <div class="p-6 border-t border-gray-700">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit"
                  class="w-full py-2 rounded-lg shadow btn-logout hover:bg-red-700 transition">
            🚪 Logout
          </button>
        </form>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
      <!-- Header -->
      <div class="flex justify-between items-center mb-10">
        <h2 class="text-3xl font-bold text-red-500">Dashboard Warga</h2>
        <span class="px-4 py-2 bg-gray-800 text-gray-200 rounded-full text-sm">
          Selamat datang, {{ Auth::user()->nama ?? 'Pengguna' }}
        </span>
      </div>

      <!-- Statistik Cards -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="card p-6">
          <p class="text-gray-400">Jumlah Warga</p>
          <h3 class="text-2xl font-bold text-red-400 mt-2">{{ $jumlah_warga ?? 0 }}</h3>
        </div>

        <div class="card p-6">
          <p class="text-gray-400">Total Pemasukan Bulan Ini</p>
          <h3 class="text-2xl font-bold text-blue-400 mt-2">
            Rp {{ number_format($bulan_ini ?? 0, 0, ',', '.') }}
          </h3>
        </div>

        <div class="card p-6">
          <p class="text-gray-400">Total Pemasukan Tahun Ini</p>
          <h3 class="text-2xl font-bold text-green-400 mt-2">
            Rp {{ number_format($tahun_ini ?? 0, 0, ',', '.') }}
          </h3>
        </div>

        <div class="card p-6">
          <p class="text-gray-400">Jumlah Transaksi</p>
          <h3 class="text-2xl font-bold text-purple-400 mt-2">{{ $jumlah_transaksi ?? 0 }}</h3>
        </div>
      </div>

      <!-- Histori Transaksi -->
      <div class="card p-8">
        <h3 class="text-xl font-semibold text-white mb-6">
          📋 Histori Transaksi Anda
        </h3>
        <div class="overflow-x-auto">
          <table class="w-full text-left text-gray-300">
            <thead>
              <tr class="border-b border-gray-600">
                <th class="py-2 px-4">Kode Transaksi</th>
                <th class="py-2 px-4">Tanggal</th>
                <th class="py-2 px-4">Jenis</th>
                <th class="py-2 px-4">Kategori</th>
                <th class="py-2 px-4">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              @forelse($histori_transaksi ?? [] as $transaksi)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                  <td class="py-2 px-4">{{ $transaksi->kode_transaksi }}</td>
                  <td class="py-2 px-4">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y') }}</td>
                  <td class="py-2 px-4">
                    @if($transaksi->jenis_transaksi === 'bulanan')
                      <span class="badge bg-info px-3 py-1">Bulanan</span>
                    @elseif($transaksi->jenis_transaksi === 'tahunan')
                      <span class="badge bg-success px-3 py-1">Tahunan</span>
                    @else
                      <span class="badge bg-secondary px-3 py-1">{{ ucfirst($transaksi->jenis_transaksi) }}</span>
                    @endif
                  </td>
                  <td class="py-2 px-4">{{ $transaksi->kategori->name ?? '-' }}</td>
                  <td class="py-2 px-4">Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="py-4 px-4 text-center text-gray-500">Belum ada transaksi.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>


</body>
</html>
