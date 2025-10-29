<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Warga</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-bg: #1e1e2f;
      --secondary-bg: #111827;
      --table-bg: #2c2c3c;
      --accent-color: #e63946;
      --text-color: #fff;
    }

    body {
      background-color: var(--primary-bg);
      color: var(--text-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
    }

    /* Sidebar Styles */
    .sidebar {
      height: 100vh;
      background-color: var(--secondary-bg);
      padding: 20px;
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      transition: transform 0.3s ease;
      z-index: 1000;
      overflow-y: auto;
    }
    .sidebar h3 {
      color: var(--accent-color);
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
    }
    .sidebar .nav-link {
      color: var(--text-color);
      padding: 12px 15px;
      border-radius: 8px;
      margin-bottom: 5px;
      transition: all 0.3s ease;
    }
    .sidebar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      transform: translateX(5px);
    }

    /* Content Area */
    .content {
      margin-left: 240px;
      padding: 20px;
      transition: margin-left 0.3s ease;
      min-height: 100vh;
    }

    /* Table Styles */
    .table-container {
      background-color: var(--table-bg);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .table {
      margin: 0;
      color: var(--text-color);
    }
    .table th {
      background-color: var(--secondary-bg);
      color: var(--accent-color);
      font-weight: 600;
      padding: 15px 10px;
      border: none;
      white-space: nowrap;
    }
    .table td {
      padding: 12px 10px;
      border-color: rgba(255, 255, 255, 0.1);
      vertical-align: middle;
    }
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(255, 255, 255, 0.03);
    }

    /* Button Styles */
    .btn-create {
      background-color: var(--accent-color);
      color: var(--text-color);
      border: none;
      border-radius: 8px;
      padding: 10px 20px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    .btn-create:hover {
      background-color: #c1121f;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(230, 57, 70, 0.3);
    }
    .btn-update {
      background-color: #2563eb;
      color: var(--text-color);
      border: none;
      border-radius: 6px;
      transition: all 0.3s ease;
    }
    .btn-update:hover {
      background-color: #1d4ed8;
      transform: translateY(-1px);
    }
    .btn-delete {
      background-color: #dc2626;
      color: var(--text-color);
      border: none;
      border-radius: 6px;
      transition: all 0.3s ease;
    }
    .btn-delete:hover {
      background-color: #b91c1c;
      transform: translateY(-1px);
    }

    /* Mobile Header */
    .mobile-header {
      display: none;
      background-color: var(--secondary-bg);
      padding: 15px 20px;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 999;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    .mobile-header h3 {
      color: var(--accent-color);
      margin: 0;
      font-size: 1.3rem;
      font-weight: 700;
    }
    .mobile-menu-btn {
      background: none;
      border: none;
      color: var(--text-color);
      font-size: 1.5rem;
      padding: 5px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }
    .mobile-menu-btn:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    /* Overlay for mobile menu */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 998;
    }
    .overlay.active {
      display: block;
    }

    /* ========== RESPONSIVE STYLES ========== */

    /* Large devices (desktops, less than 1200px) */
    @media (max-width: 1199.98px) {
      .table th, .table td {
        padding: 12px 8px;
        font-size: 0.95rem;
      }
    }

    /* Medium devices (tablets, less than 992px) */
    @media (max-width: 991.98px) {
      .content {
        margin-left: 0;
        padding-top: 80px;
      }

      .sidebar {
        transform: translateX(-100%);
        width: 280px;
      }
      .sidebar.active {
        transform: translateX(0);
      }

      .mobile-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .table th, .table td {
        padding: 10px 6px;
        font-size: 0.9rem;
      }

      .btn {
        font-size: 0.85rem;
        padding: 8px 12px;
      }
    }

    /* Small devices (landscape phones, less than 768px) */
    @media (max-width: 767.98px) {
      .content {
        padding: 15px;
        padding-top: 80px;
      }

      .table th, .table td {
        padding: 8px 4px;
        font-size: 0.85rem;
      }

      .btn {
        font-size: 0.8rem;
        padding: 6px 10px;
      }

      /* Make action buttons stack vertically on very small screens */
      .action-buttons {
        flex-direction: column;
        gap: 5px !important;
      }

      .action-buttons .btn {
        width: 100%;
      }
    }

    /* Extra small devices (portrait phones, less than 576px) */
    @media (max-width: 575.98px) {
      .content {
        padding: 10px;
        padding-top: 70px;
      }

      .mobile-header {
        padding: 12px 15px;
      }

      .mobile-header h3 {
        font-size: 1.1rem;
      }

      .table th, .table td {
        padding: 6px 3px;
        font-size: 0.8rem;
      }

      .btn {
        font-size: 0.75rem;
        padding: 5px 8px;
      }

      /* Hide less important columns on very small screens */
      .table thead th:nth-child(4),  /* Jenis Kelamin */
      .table tbody td:nth-child(4),
      .table thead th:nth-child(7),  /* No.Rumah */
      .table tbody td:nth-child(7) {
        display: none;
      }
    }

    /* Ultra small devices (very small phones) */
    @media (max-width: 400px) {
      .table thead th:nth-child(5),  /* Kategori */
      .table tbody td:nth-child(5) {
        display: none;
      }

      .table th, .table td {
        font-size: 0.75rem;
      }
    }

    /* Text truncation for table cells */
    .table td {
      max-width: 150px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    /* Tooltip styles */
    .table td[title] {
      cursor: help;
      position: relative;
    }

    /* Loading state */
    .loading {
      opacity: 0.7;
      pointer-events: none;
    }

    /* No data message */
    .no-data {
      text-align: center;
      padding: 40px;
      color: #888;
      font-style: italic;
    }
  </style>
</head>
<body>

  <!-- Mobile Header -->
  <div class="mobile-header">
    <h3>Data Warga</h3>
    <button class="mobile-menu-btn" id="menuToggle">
      <i class="fas fa-bars"></i>
    </button>
  </div>

  <!-- Overlay for mobile menu -->
  <div class="overlay" id="overlay"></div>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <h3 class="d-none d-md-block">Data Warga</h3>
    <ul class="nav flex-column mt-4">
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link text-light">
          <i class="fas fa-tachometer-alt me-2"></i>Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('transaksi.index') }}" class="nav-link text-light">
          <i class="fas fa-exchange-alt me-2"></i>Transaksi
        </a>
      </li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="content" id="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3 d-none d-md-block">Data Warga</h1>
      <a href="{{ route('admin.createdata') }}" class="btn btn-create">
        <i class="fas fa-plus me-2"></i>Tambah Data
      </a>
    </div>

    <!-- Table Container -->
    <div class="table-container">
      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">NIK</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col" class="jenis-kelamin-col">Jenis Kelamin</th>
              <th scope="col" class="kategori-col">Kategori</th>
              <th scope="col">Alamat</th>
              <th scope="col" class="no-rumah-col">No.Rumah</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

          <tbody>
            @if(count($warga) > 0)
              @foreach($warga as $index => $item)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td title="{{ $item->nik }}">{{ $item->nik }}</td>
                  <td title="{{ $item->nama }}">{{ $item->nama }}</td>
                  <td class="jenis-kelamin-col">{{ $item->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                  <td class="kategori-col">{{ $item->kategori == 'Admin' ? 'Admin' : 'Warga' }}</td>
                  <td title="{{ $item->alamat }}">{{ $item->alamat }}</td>
                  <td class="no-rumah-col">{{ $item->no_rumah }}</td>
                  <td>
                    <span class="badge
                      @if($item->status == 'Aktif') bg-success
                      @elseif($item->status == 'Non-Aktif') bg-danger
                      @else bg-secondary @endif">
                      {{ $item->status }}
                    </span>
                  </td>
                  <td>
                    <div class="d-flex action-buttons gap-2 justify-content-center">
                      <a href="{{ route('admin.editwarga', $item->id) }}" class="btn btn-update btn-sm">
                        <i class="fas fa-edit me-1"></i>Edit
                      </a>
                      <form action="{{ route('admin.delete', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                          <i class="fas fa-trash me-1"></i>Hapus
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="9" class="no-data">Tidak ada data warga</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuToggle = document.getElementById('menuToggle');
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      const content = document.getElementById('content');

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
      const sidebarLinks = document.querySelectorAll('.sidebar .nav-link');
      sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
          if (window.innerWidth <= 991.98) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
          }
        });
      });

      // Handle window resize
      window.addEventListener('resize', function() {
        if (window.innerWidth > 991.98) {
          sidebar.classList.remove('active');
          overlay.classList.remove('active');
          document.body.style.overflow = '';
        }
      });

      // Initialize tooltips for truncated text
      const initTooltips = () => {
        const tableCells = document.querySelectorAll('.table td[title]');
        tableCells.forEach(cell => {
          // Only add tooltip if text is truncated
          if (cell.offsetWidth < cell.scrollWidth) {
            cell.setAttribute('data-bs-toggle', 'tooltip');
            cell.setAttribute('data-bs-placement', 'top');
            cell.setAttribute('data-bs-title', cell.getAttribute('title'));
          }
        });

        // Initialize Bootstrap tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl);
        });
      };

      // Initialize tooltips after a short delay to ensure DOM is ready
      setTimeout(initTooltips, 100);

      // Re-initialize tooltips on window resize
      window.addEventListener('resize', initTooltips);
    });
  </script>

  <!-- Bootstrap JS for tooltips -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
