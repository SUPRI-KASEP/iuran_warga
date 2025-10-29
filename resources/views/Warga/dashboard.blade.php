<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Warga</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --primary-bg: #1e1e2f;
      --sidebar-bg: #111827;
      --card-bg: #2c2c3c;
      --accent-color: #e63946;
      --text-color: #fff;
    }

    body {
      background-color: var(--primary-bg);
      color: var(--text-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .sidebar {
      background-color: var(--sidebar-bg);
      transition: all 0.3s ease;
      z-index: 1000;
    }

    .sidebar h1 {
      color: var(--accent-color);
    }

    .sidebar a {
      background-color: #1f2937;
      color: var(--text-color);
      transition: all 0.3s ease;
      border-radius: 8px;
    }

    .sidebar a:hover {
      background-color: var(--accent-color);
      color: var(--text-color);
      transform: translateX(5px);
    }

    .btn-logout {
      background-color: var(--accent-color);
      border: none;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .btn-logout:hover {
      background-color: #c1121f;
      transform: translateY(-2px);
    }

    .card {
      background-color: var(--card-bg);
      border-radius: 12px;
      transition: 0.3s;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .card:hover {
      box-shadow: 0 0 15px rgba(230, 57, 70, 0.3);
      transform: translateY(-2px);
    }

    .badge {
      border-radius: 6px;
      font-size: 0.75rem;
      padding: 4px 8px;
    }

    .bg-info { background-color: #0ea5e9 !important; }
    .bg-success { background-color: #10b981 !important; }
    .bg-secondary { background-color: #6b7280 !important; }

    /* Mobile Header */
    .mobile-header {
      display: none;
      background-color: var(--sidebar-bg);
      padding: 15px 20px;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 999;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .mobile-menu-btn {
      background: none;
      border: none;
      color: var(--text-color);
      font-size: 1.5rem;
    }

    /* Overlay for mobile menu */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }

    .overlay.active {
      display: block;
    }

    /* ========== RESPONSIVE STYLES ========== */

    /* Default sidebar hidden on mobile */
    @media (max-width: 768px) {
      .sidebar {
        position: fixed;
        left: -100%;
        top: 0;
        bottom: 0;
        width: 280px;
        z-index: 1000;
      }

      .sidebar.active {
        left: 0;
      }

      .mobile-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      main {
        margin-left: 0 !important;
        padding-top: 80px !important;
        padding-left: 15px !important;
        padding-right: 15px !important;
      }

      /* Grid adjustments for mobile */
      .grid.grid-cols-1.md\:grid-cols-4 {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
      }

      .card.p-6 {
        padding: 15px !important;
      }

      h3.text-2xl {
        font-size: 1.25rem !important;
      }

      p.text-gray-400 {
        font-size: 0.85rem;
      }
    }

    @media (max-width: 640px) {
      .grid.grid-cols-1.md\:grid-cols-4 {
        grid-template-columns: 1fr;
        gap: 10px;
      }

      .card.p-6 {
        padding: 12px !important;
      }

      h2.text-3xl {
        font-size: 1.5rem !important;
      }

      h3.text-xl {
        font-size: 1.1rem !important;
      }

      /* Table adjustments for mobile */
      .overflow-x-auto {
        border-radius: 8px;
        overflow: hidden;
      }

      table.w-full {
        font-size: 0.8rem;
      }

      table th, table td {
        padding: 8px 6px !important;
      }

      /* Hide less important columns on mobile */
      table th:nth-child(1), /* Kode Transaksi */
      table td:nth-child(1),
      table th:nth-child(4), /* Kategori */
      table td:nth-child(4) {
        display: none;
      }

      .badge {
        font-size: 0.7rem;
        padding: 3px 6px;
      }
    }

    @media (max-width: 480px) {
      main {
        padding: 10px !important;
        padding-top: 70px !important;
      }

      .mobile-header {
        padding: 12px 15px;
      }

      table th:nth-child(3), /* Jenis */
      table td:nth-child(3) {
        display: none;
      }

      table th, table td {
        padding: 6px 4px !important;
        font-size: 0.75rem;
      }

      .card.p-8 {
        padding: 15px !important;
      }
    }

    /* Text truncation for table cells */
    table td {
      max-width: 0;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    /* Loading animation */
    .loading {
      opacity: 0.7;
      pointer-events: none;
    }

    /* Scroll hint for mobile tables */
    .scroll-hint {
      display: none;
      text-align: center;
      padding: 8px;
      background: rgba(230, 57, 70, 0.1);
      color: var(--accent-color);
      font-size: 0.8rem;
      border-radius: 6px;
      margin-bottom: 10px;
    }

    @media (max-width: 768px) {
      .scroll-hint {
        display: block;
      }
    }
  </style>
</head>
<body>

  <!-- Mobile Header -->
  <div class="mobile-header">
    <h1 class="text-xl font-bold text-red-500">WargaApp</h1>
    <button class="mobile-menu-btn" id="menuToggle">
      <i class="fas fa-bars"></i>
    </button>
  </div>

  <!-- Overlay for mobile menu -->
  <div class="overlay" id="overlay"></div>

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="sidebar w-64 text-white flex flex-col" id="sidebar">
      <div class="p-6 text-center border-b border-gray-700">
        <h1 class="text-2xl font-extrabold">WargaApp</h1>
      </div>

      <!-- Navigasi -->
      <nav class="flex-1 p-6 space-y-3">
        <a href="{{ route('warga.dashboard') }}"
           class="block py-2 px-4 rounded-lg transition-all duration-300">
          <i class="fas fa-home mr-2"></i> Dashboard
        </a>
      </nav>

      <!-- Tombol Logout -->
      <div class="p-6 border-t border-gray-700">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit"
                  class="w-full py-2 rounded-lg shadow btn-logout hover:bg-red-700 transition flex items-center justify-center">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </button>
        </form>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10 ml-0 transition-all duration-300" id="mainContent">
      <!-- Header -->
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-red-500">Dashboard Warga</h2>
      </div>

      <!-- Statistik Cards -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="card p-6">
          <div class="flex items-center">
            <i class="fas fa-users text-red-400 text-xl mr-3"></i>
            <div>
              <p class="text-gray-400 text-sm">Jumlah Warga</p>
              <h3 class="text-2xl font-bold text-red-400 mt-1">{{ $jumlah_warga ?? 0 }}</h3>
            </div>
          </div>
        </div>

        <div class="card p-6">
          <div class="flex items-center">
            <i class="fas fa-wallet text-blue-400 text-xl mr-3"></i>
            <div>
              <p class="text-gray-400 text-sm">Pemasukan Bulan Ini</p>
              <h3 class="text-2xl font-bold text-blue-400 mt-1">
                Rp {{ number_format($bulan_ini ?? 0, 0, ',', '.') }}
              </h3>
            </div>
          </div>
        </div>

        <div class="card p-6">
          <div class="flex items-center">
            <i class="fas fa-chart-line text-green-400 text-xl mr-3"></i>
            <div>
              <p class="text-gray-400 text-sm">Pemasukan Tahun Ini</p>
              <h3 class="text-2xl font-bold text-green-400 mt-1">
                Rp {{ number_format($tahun_ini ?? 0, 0, ',', '.') }}
              </h3>
            </div>
          </div>
        </div>

        <div class="card p-6">
          <div class="flex items-center">
            <i class="fas fa-exchange-alt text-purple-400 text-xl mr-3"></i>
            <div>
              <p class="text-gray-400 text-sm">Jumlah Transaksi</p>
              <h3 class="text-2xl font-bold text-purple-400 mt-1">{{ $jumlah_transaksi ?? 0 }}</h3>
            </div>
          </div>
        </div>
      </div>

      <!-- Histori Transaksi -->
      <div class="card p-8">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-semibold text-white">
            <i class="fas fa-history mr-2"></i> Histori Transaksi Anda
          </h3>
        </div>

        <!-- Scroll hint for mobile -->
        <div class="scroll-hint">
          <i class="fas fa-arrow-left-right mr-1"></i> Geser untuk melihat lebih banyak
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left text-gray-300">
            <thead>
              <tr class="border-b border-gray-600">
                <th class="py-3 px-4 font-semibold">Kode Transaksi</th>
                <th class="py-3 px-4 font-semibold">Tanggal</th>
                <th class="py-3 px-4 font-semibold">Jenis</th>
                <th class="py-3 px-4 font-semibold">Kategori</th>
                <th class="py-3 px-4 font-semibold">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              @forelse($histori_transaksi ?? [] as $transaksi)
                <tr class="border-b border-gray-700 hover:bg-gray-700 transition-colors">
                  <td class="py-3 px-4" title="{{ $transaksi->kode_transaksi }}">{{ $transaksi->kode_transaksi }}</td>
                  <td class="py-3 px-4">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y') }}</td>
                  <td class="py-3 px-4">
                    @if($transaksi->jenis_transaksi === 'bulanan')
                      <span class="badge bg-info">Bulanan</span>
                    @elseif($transaksi->jenis_transaksi === 'tahunan')
                      <span class="badge bg-success">Tahunan</span>
                    @else
                      <span class="badge bg-secondary">{{ ucfirst($transaksi->jenis_transaksi) }}</span>
                    @endif
                  </td>
                  <td class="py-3 px-4" title="{{ $transaksi->dc->name ?? '-' }}">{{ $transaksi->dc->name ?? '-' }}</td>
                  <td class="py-3 px-4 font-semibold">Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="py-6 px-4 text-center text-gray-500">
                    <i class="fas fa-receipt text-3xl mb-2 block"></i>
                    Belum ada transaksi.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuToggle = document.getElementById('menuToggle');
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      const mainContent = document.getElementById('mainContent');

      // Toggle mobile menu
      menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
        document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
      });

      // Close sidebar when clicking overlay
      overlay.addEventListener('click', function() {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
      });

      // Close sidebar when clicking on a link (for mobile)
      const sidebarLinks = document.querySelectorAll('.sidebar a');
      sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
          if (window.innerWidth <= 768) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
          }
        });
      });

      // Handle window resize
      window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
          sidebar.classList.remove('active');
          overlay.classList.remove('active');
          document.body.style.overflow = '';
        }
      });

      // Remove scroll hint after first scroll
      const tableContainer = document.querySelector('.overflow-x-auto');
      const scrollHint = document.querySelector('.scroll-hint');

      if (tableContainer && scrollHint) {
        tableContainer.addEventListener('scroll', function() {
          scrollHint.style.opacity = '0';
          setTimeout(() => {
            scrollHint.style.display = 'none';
          }, 300);
        });
      }
    });
  </script>
</body>
</html>
