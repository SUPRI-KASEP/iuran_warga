<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iuran Warga Online</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <header class="fixed w-full bg-white/60 backdrop-blur-md shadow z-50">
    <div class="container mx-auto flex items-center justify-between px-6 py-4">
      <h1 class="text-2xl font-extrabold text-blue-600 tracking-wide">IuranWarga</h1>
      <nav class="hidden md:flex items-center space-x-8 text-gray-700 font-medium">
        <a href="#manfaat" class="hover:text-blue-600 transition">Manfaat</a>
        <a href="#fitur" class="hover:text-blue-600 transition">Fitur</a>
        <a href="#harga" class="hover:text-blue-600 transition">Pricelist</a>
        <a href="{{ route('login') }}"
           class="bg-blue-600 text-white px-5 py-2 rounded-xl shadow hover:bg-blue-700 transition">
           Login
        </a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-r from-blue-700 to-blue-500 text-white pt-32 pb-24 overflow-hidden">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-6">
      <!-- Left -->
      <div class="animate-fadeInUp">
        <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6 drop-shadow-lg">
          Platform Iuran Warga <br> Mudah, Rapi, Transparan
        </h2>
        <p class="text-lg mb-8 opacity-90">
          Kelola iuran RT/RW dengan lebih profesional. Laporan kas real-time, transparan, dan mudah diakses semua warga.
        </p>
        <a href="#daftar" class="bg-white text-blue-700 font-semibold px-8 py-3 rounded-xl shadow-lg hover:bg-gray-100 transition">
          🚀 Daftarkan Diri Anda Sekarang!
        </a>
      </div>
      <!-- Right -->
      <div class="flex justify-center relative">
        <div class="absolute -top-10 -right-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Warga"
             class="w-80 md:w-96 drop-shadow-2xl animate-float">
      </div>
    </div>
  </section>

  <!-- Manfaat Section -->
  <section id="manfaat" class="container mx-auto py-24 px-6">
    <h3 class="text-3xl font-extrabold text-center mb-12 text-gray-800">Kenapa Harus Pakai <span class="text-blue-600">IuranWarga</span>?</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

      <div class="p-8 rounded-2xl shadow-lg bg-white hover:shadow-2xl transition transform hover:-translate-y-1">
        <h4 class="text-xl font-bold text-gray-800 mb-6 text-center">❌ Sebelum Menggunakan</h4>
        <ul class="space-y-4 text-gray-700">
          <li>📄 Catatan manual mudah hilang.</li>
          <li>💰 Laporan kas tidak transparan.</li>
          <li>⏳ Sulit melacak warga menunggak.</li>
          <li>📢 Pengumuman via kertas manual.</li>
        </ul>
      </div>
      <div class="p-8 rounded-2xl shadow-lg bg-gradient-to-r from-blue-600 to-blue-400 text-white hover:shadow-2xl transition transform hover:-translate-y-1">
        <h4 class="text-xl font-bold mb-6 text-center">✅ Setelah Menggunakan</h4>
        <ul class="space-y-4">
          <li>⚡ Penagihan online, cepat, aman.</li>
          <li>📊 Laporan kas transparan & terpusat.</li>
          <li>📱 Bisa diakses via smartphone.</li>
          <li>🔔 Notifikasi pengumuman otomatis.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Daftar Section -->
  <section id="daftar" class="bg-gradient-to-r from-blue-600 to-blue-500 text-white py-20 text-center">
    <h3 class="text-3xl font-bold mb-6">Mulai Sekarang!</h3>
    <p class="mb-8 text-lg opacity-90">Daftarkan Diri anda dan rasakan kemudahan mengelola iuran warga.</p>
    <a href="{{ route('login') }}" class="bg-white text-blue-600 px-8 py-3 rounded-xl font-semibold shadow-lg hover:bg-gray-100 transition">
      💡 Daftar Gratis
    </a>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-400 py-6 text-center">
    <p>© 2025 IuranWarga • Transparansi untuk semua warga</p>
  </footer>

  <!-- Animations -->
  <style>
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-15px); }
      100% { transform: translateY(0px); }
    }
    .animate-float {
      animation: float 4s ease-in-out infinite;
    }
    .animate-fadeInUp {
      animation: fadeInUp 1s ease forwards;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>

</body>
</html>
