<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iuran Warga Online</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      background-color: #1e1e2f;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    header {
      background-color: rgba(17, 24, 39, 0.8);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid #2c2c3c;
    }
    header h1 {
      color: #e63946;
    }
    nav a {
      color: #d1d5db;
      transition: all 0.3s ease;
    }
    nav a:hover {
      color: #e63946;
    }
    .hero-gradient {
      background: linear-gradient(135deg, #111827 0%, #1e1e2f 60%, #e63946 100%);
    }
    .card-dark {
      background-color: #2c2c3c;
      border-radius: 16px;
      transition: 0.3s;
    }
    .card-dark:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 15px rgba(230, 57, 70, 0.3);
    }
    .btn-red {
      background-color: #e63946;
      color: #fff;
      transition: 0.3s;
    }
    .btn-red:hover {
      background-color: #b71c1c;
    }
    .btn-outline {
      border: 2px solid #e63946;
      color: #e63946;
      transition: 0.3s;
    }
    .btn-outline:hover {
      background-color: #e63946;
      color: #fff;
    }
    footer {
      background-color: #111827;
      color: #9ca3af;
    }

    /* Animations */
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-15px); }
      100% { transform: translateY(0px); }
    }
    .animate-float {
      animation: float 4s ease-in-out infinite;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeInUp {
      animation: fadeInUp 1s ease forwards;
    }
  </style>
</head>
<body class="font-sans">

  <!-- Navbar -->
  <header class="fixed w-full shadow z-50">
    <div class="container mx-auto flex items-center justify-between px-6 py-4">
      <h1 class="text-2xl font-extrabold tracking-wide">IuranWarga</h1>
      <nav class="hidden md:flex items-center space-x-8 font-medium">
        <a href="#manfaat">Manfaat</a>
        <a href="#fitur">Fitur</a>
        <a href="#harga">Pricelist</a>
        <a href="{{ route('login') }}"
           class="btn-red px-5 py-2 rounded-xl shadow">
           Login
        </a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero-gradient text-white pt-32 pb-24 overflow-hidden">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-6">
      <!-- Left -->
      <div class="animate-fadeInUp">
        <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
          Platform Iuran Warga <br> Mudah, Rapi, Transparan
        </h2>
        <p class="text-lg mb-8 opacity-90">
          Kelola iuran RT/RW secara profesional. Laporan kas real-time, transparan, dan bisa diakses semua warga.
        </p>
        <a href="#daftar" class="btn-outline px-8 py-3 rounded-xl font-semibold shadow-lg">
          🚀 Daftarkan Diri Anda Sekarang!
        </a>
      </div>

      <!-- Right -->
      <div class="flex justify-center relative">
        <div class="absolute -top-10 -right-10 w-72 h-72 bg-red-500/10 rounded-full blur-3xl"></div>
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
             alt="Warga"
             class="w-80 md:w-96 drop-shadow-2xl animate-float">
      </div>
    </div>
  </section>

  <!-- Manfaat Section -->
  <section id="manfaat" class="container mx-auto py-24 px-6">
    <h3 class="text-3xl font-extrabold text-center mb-12 text-white">
      Kenapa Harus Pakai <span class="text-red-500">IuranWarga</span>?
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

      <div class="card-dark p-8">
        <h4 class="text-xl font-bold mb-6 text-center text-red-400">❌ Sebelum Menggunakan</h4>
        <ul class="space-y-4 text-gray-300">
          <li>📄 Catatan manual mudah hilang.</li>
          <li>💰 Laporan kas tidak transparan.</li>
          <li>⏳ Sulit melacak warga menunggak.</li>
          <li>📢 Pengumuman via kertas manual.</li>
        </ul>
      </div>

      <div class="card-dark p-8 bg-gradient-to-r from-red-600 to-red-500">
        <h4 class="text-xl font-bold mb-6 text-center text-white">✅ Setelah Menggunakan</h4>
        <ul class="space-y-4 text-white">
          <li>⚡ Penagihan online, cepat, aman.</li>
          <li>📊 Laporan kas transparan & terpusat.</li>
          <li>📱 Bisa diakses via smartphone.</li>
          <li>🔔 Notifikasi pengumuman otomatis.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Daftar Section -->
  <section id="daftar" class="bg-gradient-to-r from-red-700 to-red-500 text-white py-20 text-center">
    <h3 class="text-3xl font-bold mb-6">Mulai Sekarang!</h3>
    <p class="mb-8 text-lg opacity-90">Daftarkan diri Anda dan rasakan kemudahan mengelola iuran warga.</p>
    <a href="{{ route('login') }}" class="btn-outline px-8 py-3 rounded-xl font-semibold shadow-lg">
      💡 Daftar Gratis
    </a>
  </section>

  <!-- Footer -->
  <footer class="py-6 text-center">
    <p>© 2025 IuranWarga • Transparansi untuk semua warga</p>
  </footer>

</body>
</html>
