<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Warga</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
          Selamat datang, {{ Auth::user()->name ?? 'Tamu' }}
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

      <!-- Grafik Pemasukan -->
      <div class="card p-8 mb-10">
        <h3 class="text-xl font-semibold text-white mb-6">
          📊 Grafik Pemasukan Per Bulan
        </h3>
        <canvas id="chartPemasukan"></canvas>
      </div>
    </main>
  </div>

  <!-- Chart JS -->
  <script>
    const ctx = document.getElementById('chartPemasukan').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($bulan ?? ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des']) !!},
        datasets: [{
          label: 'Pemasukan (Rp)',
          data: {!! json_encode($data_pemasukan ?? array_fill(0, 12, 0)) !!},
          backgroundColor: 'rgba(230, 57, 70, 0.8)',
          borderRadius: 6
        }]
      },
      options: {
        responsive: true,
        scales: {
          x: {
            ticks: { color: '#ccc' },
            grid: { color: '#333' }
          },
          y: {
            beginAtZero: true,
            ticks: { color: '#ccc' },
            grid: { color: '#333' }
          }
        },
        plugins: {
          legend: {
            labels: { color: '#fff' }
          }
        }
      }
    });
  </script>
</body>
</html>
