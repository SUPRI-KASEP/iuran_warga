<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Warga</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-700 text-white flex flex-col">
      <div class="p-6 text-center border-b border-blue-600">
        <h1 class="text-2xl font-extrabold">WargaApp</h1>
      </div>
      <nav class="flex-1 p-6 space-y-4">
        <a href="{{ route('warga.dashboard') }}" class="block py-2 px-4 rounded-lg bg-blue-600 hover:bg-blue-500 transition">🏠 Dashboard</a>
        <a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-500 transition">📋 Data Warga</a>
        <a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-500 transition">💰 Iuran</a>
        <a href="#" class="block py-2 px-4 rounded-lg hover:bg-blue-500 transition">📊 Laporan</a>
      </nav>
      <form action="{{ route('logout') }}" method="POST" class="p-6">
        @csrf
        <button type="submit" class="w-full py-2 bg-red-600 rounded-lg shadow hover:bg-red-700 transition">
          🚪 Logout
        </button>
      </form>
    </aside>

    
    <main class="flex-1 p-10">
      <!-- Header -->
      <div class="flex justify-between items-center mb-10">
        <h2 class="text-3xl font-bold text-gray-700">Dashboard Warga</h2>
        <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm">Selamat datang, {{ Auth::user()->name }}</span>
      </div>

      <!-- Statistik Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <p class="text-gray-500">Total Pemasukan Bulan Ini</p>
          <h3 class="text-2xl font-bold text-blue-600 mt-2">Rp {{ number_format($bulan_ini ?? 0) }}</h3>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <p class="text-gray-500">Total Pemasukan Tahun Ini</p>
          <h3 class="text-2xl font-bold text-green-600 mt-2">Rp {{ number_format($tahun_ini ?? 0) }}</h3>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <p class="text-gray-500">Jumlah Transaksi</p>
          <h3 class="text-2xl font-bold text-purple-600 mt-2">{{ $jumlah_transaksi ?? 0 }}</h3>
        </div>
      </div>

      <!-- Grafik Pemasukan -->
      <div class="bg-white p-8 rounded-2xl shadow-md mb-10">
        <h3 class="text-xl font-semibold text-gray-800 mb-6">📊 Grafik Pemasukan Per Bulan</h3>
        <canvas id="chartPemasukan"></canvas>
      </div>

      <!-- Form Data Warga -->
      <div class="bg-white p-8 rounded-2xl shadow-md">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6">📝 Form Data Warga</h3>
        <form action="{{ route('warga.store') }}" method="POST" class="space-y-6">
          @csrf
          <div>
            <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Masukkan nama lengkap"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
          </div>
          <div>
            <label class="block text-gray-700 font-medium mb-2">Alamat</label>
            <textarea name="alamat" placeholder="Masukkan alamat lengkap"
                      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-gray-700 font-medium mb-2">No. HP</label>
              <input type="text" name="no_hp" placeholder="Contoh: 08123456789"
                     class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label class="block text-gray-700 font-medium mb-2">Email</label>
              <input type="email" name="email" placeholder="contoh@email.com"
                     class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
          </div>
          <div class="flex justify-end">
            <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
              💾 Simpan Data
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>

  <script>
    const ctx = document.getElementById('chartPemasukan').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($bulan ?? ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des']) !!},
        datasets: [{
          label: 'Pemasukan (Rp)',
          data: {!! json_encode($data_pemasukan ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!},
          backgroundColor: 'rgba(37, 99, 235, 0.7)',
          borderRadius: 6
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  </script>
</body>
</html>
