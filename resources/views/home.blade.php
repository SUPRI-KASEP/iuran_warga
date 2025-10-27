<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iuran Warga Online</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      background-color: #1e1e2f;
      color: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    header {
      background-color: rgba(17, 24, 39, 0.9);
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

    /* Tab Styles */
    .tab-button {
      padding: 12px 16px;
      background-color: #2c2c3c;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      margin: 0 4px;
      font-size: 14px;
      white-space: nowrap;
    }
    .tab-button.active {
      background-color: #e63946;
      color: white;
    }
    .tab-content {
      display: none;
      padding: 20px;
      border-radius: 16px;
      background-color: #2c2c3c;
      margin-top: 16px;
    }
    .tab-content.active {
      display: block;
    }

    /* Feature Card Styles */
    .feature-card {
      background-color: #2c2c3c;
      border-radius: 16px;
      padding: 20px;
      transition: all 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 15px rgba(230, 57, 70, 0.3);
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 1000;
      justify-content: center;
      align-items: center;
      padding: 16px;
    }
    .modal-content {
      background-color: #2c2c3c;
      border-radius: 16px;
      padding: 24px;
      width: 100%;
      max-width: 500px;
      position: relative;
      animation: fadeInUp 0.5s ease;
      max-height: 90vh;
      overflow-y: auto;
    }
    .close-modal {
      position: absolute;
      top: 16px;
      right: 16px;
      font-size: 24px;
      cursor: pointer;
      color: #9ca3af;
    }

    /* Form Styles */
    .form-group {
      margin-bottom: 16px;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #d1d5db;
      font-size: 14px;
    }
    .form-group input, .form-group select, .form-group textarea {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      background-color: #1e1e2f;
      border: 1px solid #4b5563;
      color: white;
      font-size: 14px;
    }
    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
      outline: none;
      border-color: #e63946;
    }

    /* Animasi untuk tombol */
    @keyframes buttonPulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    .pulse-button {
      animation: buttonPulse 2s infinite;
    }

    /* Testimonial Styles */
    .testimonial-card {
      background-color: #2c2c3c;
      border-radius: 16px;
      padding: 20px;
      transition: all 0.3s ease;
    }
    .testimonial-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 15px rgba(230, 57, 70, 0.3);
    }

    /* Mobile Menu */
    .mobile-menu {
      display: none;
      flex-direction: column;
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      background-color: rgba(17, 24, 39, 0.95);
      backdrop-filter: blur(12px);
      padding: 16px;
      border-top: 1px solid #2c2c3c;
    }
    .mobile-menu.active {
      display: flex;
    }
    .mobile-menu a {
      padding: 12px 0;
      border-bottom: 1px solid #2c2c3c;
      color: #d1d5db;
      transition: all 0.3s ease;
    }
    .mobile-menu a:hover {
      color: #e63946;
    }
    .mobile-menu a:last-child {
      border-bottom: none;
    }

    /* Hamburger Icon */
    .hamburger {
      display: none;
      flex-direction: column;
      cursor: pointer;
    }
    .hamburger span {
      width: 25px;
      height: 3px;
      background-color: #fff;
      margin: 3px 0;
      transition: 0.3s;
    }
    .hamburger.active span:nth-child(1) {
      transform: rotate(-45deg) translate(-5px, 6px);
    }
    .hamburger.active span:nth-child(2) {
      opacity: 0;
    }
    .hamburger.active span:nth-child(3) {
      transform: rotate(45deg) translate(-5px, -6px);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .hamburger {
        display: flex;
      }
      nav:not(.mobile-menu) {
        display: none;
      }
      .hero-gradient {
        padding-top: 120px;
        padding-bottom: 80px;
      }
      .container {
        padding-left: 16px;
        padding-right: 16px;
      }
      .grid-cols-1 {
        grid-template-columns: 1fr;
      }
      .grid-cols-3 {
        grid-template-columns: 1fr;
      }
      .gap-8 {
        gap: 24px;
      }
      .gap-6 {
        gap: 20px;
      }
      .py-24 {
        padding-top: 80px;
        padding-bottom: 80px;
      }
      .py-20 {
        padding-top: 60px;
        padding-bottom: 60px;
      }
      .text-4xl {
        font-size: 2rem;
      }
      .text-5xl {
        font-size: 2.5rem;
      }
      .text-3xl {
        font-size: 1.75rem;
      }
      .text-2xl {
        font-size: 1.5rem;
      }
      .text-xl {
        font-size: 1.25rem;
      }
      .px-8 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
      }
      .py-3 {
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
      }
      .w-80 {
        width: 280px;
      }
      .w-96 {
        width: 320px;
      }
      .tab-button {
        padding: 10px 12px;
        font-size: 12px;
        margin: 0 2px;
      }
      .feature-card, .testimonial-card, .card-dark {
        padding: 16px;
      }
    }

    @media (max-width: 480px) {
      .text-4xl {
        font-size: 1.75rem;
      }
      .text-5xl {
        font-size: 2rem;
      }
      .text-3xl {
        font-size: 1.5rem;
      }
      .w-80 {
        width: 240px;
      }
      .w-96 {
        width: 280px;
      }
      .tab-button {
        padding: 8px 10px;
        font-size: 11px;
      }
    }
  </style>
</head>
<body class="font-sans">

  <!-- Navbar -->
  <header class="fixed w-full shadow z-50">
    <div class="container mx-auto flex items-center justify-between px-4 md:px-6 py-4">
      <h1 class="text-xl md:text-2xl font-extrabold tracking-wide">IuranWarga</h1>
      <nav class="hidden md:flex items-center space-x-4 md:space-x-8 font-medium">
        <a href="#manfaat">Manfaat</a>
        <a href="#fitur">Fitur</a>
        <a href="#testimoni">Testimoni</a>
        <a href="{{ route('login') }}"
           class="btn-red px-4 md:px-5 py-2 rounded-xl shadow text-sm md:text-base">
           Login
        </a>
      </nav>

      <!-- Mobile Menu Button -->
      <div class="hamburger md:hidden" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <!-- Mobile Menu -->
    <nav class="mobile-menu" id="mobileMenu">
      <a href="#manfaat">Manfaat</a>
      <a href="#fitur">Fitur</a>
      <a href="#testimoni">Testimoni</a>
      <a href="{{ route('login') }}" class="btn-red px-4 py-2 rounded-xl shadow text-center mt-4">
        Login
      </a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero-gradient text-white pt-28 md:pt-32 pb-16 md:pb-24 overflow-hidden">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center px-4 md:px-6">
      <!-- Left -->
      <div class="animate-fadeInUp order-2 md:order-1">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold leading-tight mb-4 md:mb-6">
          Platform Iuran Warga <br> Mudah, Rapi, Transparan
        </h2>
        <p class="text-base md:text-lg mb-6 md:mb-8 opacity-90">
          Kelola iuran RT/RW secara profesional. Laporan kas real-time, transparan, dan bisa diakses semua warga.
        </p>
        <button onclick="openRegistrationModal()" class="btn-outline px-6 md:px-8 py-3 rounded-xl font-semibold shadow-lg pulse-button w-full md:w-auto text-center">
          🚀 Daftar Sekarang!
        </button>
      </div>

      <!-- Right -->
      <div class="flex justify-center relative order-1 md:order-2 mb-8 md:mb-0">
        <div class="absolute -top-10 -right-10 w-48 h-48 md:w-72 md:h-72 bg-red-500/10 rounded-full blur-3xl"></div>
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
             alt="Warga"
             class="w-64 md:w-80 lg:w-96 drop-shadow-2xl animate-float">
      </div>
    </div>
  </section>

  <!-- Manfaat Section -->
  <section id="manfaat" class="container mx-auto py-16 md:py-24 px-4 md:px-6">
    <h3 class="text-2xl md:text-3xl font-extrabold text-center mb-8 md:mb-12 text-white">
      Kenapa Harus Pakai <span class="text-red-500">IuranWarga</span>?
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">

      <div class="card-dark p-6 md:p-8">
        <h4 class="text-lg md:text-xl font-bold mb-4 md:mb-6 text-center text-red-400">❌ Sebelum Menggunakan</h4>
        <ul class="space-y-3 md:space-y-4 text-gray-300 text-sm md:text-base">
          <li>📄 Catatan manual mudah hilang.</li>
          <li>💰 Laporan kas tidak transparan.</li>
          <li>⏳ Sulit melacak warga menunggak.</li>
          <li>📢 Pengumuman via kertas manual.</li>
        </ul>
      </div>

      <div class="card-dark p-6 md:p-8 bg-gradient-to-r from-red-600 to-red-500">
        <h4 class="text-lg md:text-xl font-bold mb-4 md:mb-6 text-center text-white">✅ Setelah Menggunakan</h4>
        <ul class="space-y-3 md:space-y-4 text-white text-sm md:text-base">
          <li>⚡ Penagihan online, cepat, aman.</li>
          <li>📊 Laporan kas transparan & terpusat.</li>
          <li>📱 Bisa diakses via smartphone.</li>
          <li>🔔 Notifikasi pengumuman otomatis.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Fitur Section -->
  <section id="fitur" class="container mx-auto py-16 md:py-24 px-4 md:px-6">
    <h3 class="text-2xl md:text-3xl font-extrabold text-center mb-8 md:mb-12 text-white">
      Fitur Unggulan <span class="text-red-500">IuranWarga</span>
    </h3>

    <!-- Tab Navigation -->
    <div class="flex justify-center mb-6 md:mb-8 overflow-x-auto">
      <div class="flex space-x-2 md:space-x-4">
        <div class="tab-button active" data-tab="pengelolaan">Pengelolaan Iuran</div>
        <div class="tab-button" data-tab="laporan">Laporan & Analitik</div>
        <div class="tab-button" data-tab="komunikasi">Komunikasi</div>
      </div>
    </div>

    <!-- Tab Content -->
    <div class="tab-content active" id="pengelolaan-tab">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
        <div class="feature-card">
          <div class="text-red-500 text-3xl md:text-4xl mb-3 md:mb-4">💰</div>
          <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Pembayaran Digital</h4>
          <p class="text-gray-300 text-sm md:text-base">Warga dapat membayar iuran melalui berbagai metode pembayaran digital seperti transfer bank, e-wallet, dan QRIS.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-3xl md:text-4xl mb-3 md:mb-4">📅</div>
          <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Penagihan Otomatis</h4>
          <p class="text-gray-300 text-sm md:text-base">Sistem mengirimkan tagihan otomatis setiap bulan dan mengingatkan warga yang belum membayar.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-3xl md:text-4xl mb-3 md:mb-4">👥</div>
          <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Manajemen Warga</h4>
          <p class="text-gray-300 text-sm md:text-base">Kelola data warga dengan mudah, termasuk status pembayaran, riwayat, dan informasi kontak.</p>
        </div>
      </div>
    </div>

    <div class="tab-content" id="laporan-tab">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
        <div class="feature-card">
          <div class="text-red-500 text-3xl md:text-4xl mb-3 md:mb-4">📊</div>
          <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Dashboard Real-time</h4>
          <p class="text-gray-300 text-sm md:text-base">Pantau kondisi keuangan RT/RW secara real-time dengan dashboard yang mudah dipahami.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-3xl md:text-4xl mb-3 md:mb-4">📈</div>
          <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Laporan Keuangan</h4>
          <p class="text-gray-300 text-sm md:text-base">Buat laporan keuangan otomatis dengan grafik dan statistik untuk transparansi pengelolaan dana.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-3xl md:text-4xl mb-3 md:mb-4">📋</div>
          <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Ekspor Data</h4>
          <p class="text-gray-300 text-sm md:text-base">Ekspor data keuangan ke format Excel atau PDF untuk keperluan dokumentasi dan pelaporan.</p>
        </div>
      </div>
    </div>

    <div class="tab-content" id="komunikasi-tab">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
        <div class="feature-card">
          <div class="text-red-500 text-3xl md:text-4xl mb-3 md:mb-4">📢</div>
          <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Pengumuman</h4>
          <p class="text-gray-300 text-sm md:text-base">Bagikan pengumuman penting kepada seluruh warga melalui platform dengan jangkauan yang luas.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-3xl md:text-4xl mb-3 md:mb-4">🔔</div>
          <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Notifikasi</h4>
          <p class="text-gray-300 text-sm md:text-base">Kirim notifikasi otomatis melalui email, SMS, atau aplikasi untuk informasi penting.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-3xl md:text-4xl mb-3 md:mb-4">💬</div>
          <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Forum Diskusi</h4>
          <p class="text-gray-300 text-sm md:text-base">Fasilitasi discusi antar warga mengenai berbagai topik terkait lingkungan dan kegiatan RT/RW.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimoni Section -->
  <section id="testimoni" class="container mx-auto py-16 md:py-24 px-4 md:px-6">
    <h3 class="text-2xl md:text-3xl font-extrabold text-center mb-8 md:mb-12 text-white">
      Apa Kata <span class="text-red-500">Pengguna</span> Kami?
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
      <div class="testimonial-card">
        <div class="flex items-center mb-4">
          <div class="w-10 h-10 md:w-12 md:h-12 bg-red-500 rounded-full flex items-center justify-center text-white font-bold mr-3 md:mr-4 text-sm md:text-base">AS</div>
          <div>
            <h4 class="font-bold text-base md:text-lg">Ahmad Surya</h4>
            <p class="text-gray-400 text-xs md:text-sm">Ketua RT 05, Jakarta</p>
          </div>
        </div>
        <p class="text-gray-300 text-sm md:text-base">"Sejak menggunakan IuranWarga, pengelolaan keuangan RT jadi lebih transparan dan efisien. Warga juga lebih mudah membayar iuran."</p>
        <div class="flex text-yellow-400 mt-3 md:mt-4 text-sm md:text-base">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
      </div>

      <div class="testimonial-card">
        <div class="flex items-center mb-4">
          <div class="w-10 h-10 md:w-12 md:h-12 bg-red-500 rounded-full flex items-center justify-center text-white font-bold mr-3 md:mr-4 text-sm md:text-base">SD</div>
          <div>
            <h4 class="font-bold text-base md:text-lg">Sari Dewi</h4>
            <p class="text-gray-400 text-xs md:text-sm">Bendahara RW 12, Bandung</p>
          </div>
        </div>
        <p class="text-gray-300 text-sm md:text-base">"Laporan keuangan otomatis sangat membantu. Sekarang tidak perlu lagi menghitung manual, semua sudah tersedia di dashboard."</p>
        <div class="flex text-yellow-400 mt-3 md:mt-4 text-sm md:text-base">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
      </div>

      <div class="testimonial-card">
        <div class="flex items-center mb-4">
          <div class="w-10 h-10 md:w-12 md:h-12 bg-red-500 rounded-full flex items-center justify-center text-white font-bold mr-3 md:mr-4 text-sm md:text-base">RB</div>
          <div>
            <h4 class="font-bold text-base md:text-lg">Rina Budianto</h4>
            <p class="text-gray-400 text-xs md:text-sm">Warga, Surabaya</p>
          </div>
        </div>
        <p class="text-gray-300 text-sm md:text-base">"Sangat praktis! Bisa bayar iuran kapan saja lewat smartphone. Notifikasi juga mengingatkan kalau ada pengumuman penting."</p>
        <div class="flex text-yellow-400 mt-3 md:mt-4 text-sm md:text-base">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
      </div>
    </div>
  </section>

  <!-- Daftar Section -->
  <section class="bg-gradient-to-r from-red-700 to-red-500 text-white py-12 md:py-20 text-center">
    <h3 class="text-2xl md:text-3xl font-bold mb-4 md:mb-6">Mulai Sekarang!</h3>
    <p class="mb-6 md:mb-8 text-base md:text-lg opacity-90 px-4">Daftarkan RT/RW Anda dan nikmati kemudahan mengelola iuran warga.</p>
    <button onclick="openRegistrationModal()" class="btn-outline px-6 md:px-8 py-3 rounded-xl font-semibold shadow-lg mx-4 md:mx-0">
      💡 Daftar Gratis
    </button>
  </section>

  <!-- Footer -->
  <footer class="py-6 text-center px-4">
    <p class="text-sm md:text-base">© 2025 IuranWarga • Transparansi untuk semua warga</p>
  </footer>

  <!-- Registration Modal -->
  <div id="registrationModal" class="modal">
    <div class="modal-content">
      <span class="close-modal" onclick="closeRegistrationModal()">&times;</span>
      <h3 class="text-xl md:text-2xl font-bold mb-4 md:mb-6 text-center">Daftar <span class="text-red-500">IuranWarga</span></h3>
      <form id="registrationForm">
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" id="nama" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" required>
        </div>
        <div class="form-group">
          <label for="telepon">Nomor Telepon</label>
          <input type="tel" id="telepon" required>
        </div>
        <div class="form-group">
          <label for="rt">RT/RW</label>
          <input type="text" id="rt" placeholder="Contoh: 05/12" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat Lengkap</label>
          <textarea id="alamat" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label for="jumlahWarga">Perkiraan Jumlah Warga</label>
          <input type="number" id="jumlahWarga" min="1" required>
        </div>
        <button type="submit" class="btn-red w-full py-3 rounded-xl font-semibold mt-4 text-base md:text-lg">
          Kirim Pendaftaran
        </button>
      </form>
    </div>
  </div>

  <script>
    // Mobile Menu Toggle
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('active');
      mobileMenu.classList.toggle('active');
    });

    // Close mobile menu when clicking on a link
    document.querySelectorAll('.mobile-menu a').forEach(link => {
      link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        mobileMenu.classList.remove('active');
      });
    });

    // Tab functionality
    document.querySelectorAll('.tab-button').forEach(button => {
      button.addEventListener('click', () => {
        // Remove active class from all tabs
        document.querySelectorAll('.tab-button').forEach(btn => {
          btn.classList.remove('active');
        });

        // Hide all tab content
        document.querySelectorAll('.tab-content').forEach(content => {
          content.classList.remove('active');
        });

        // Add active class to clicked tab
        button.classList.add('active');

        // Show corresponding tab content
        const tabId = button.getAttribute('data-tab');
        document.getElementById(`${tabId}-tab`).classList.add('active');
      });
    });

    // Modal functionality
    function openRegistrationModal() {
      document.getElementById('registrationModal').style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }

    function closeRegistrationModal() {
      document.getElementById('registrationModal').style.display = 'none';
      document.body.style.overflow = 'auto';
    }

    // Form submission
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
      e.preventDefault();

      // Get form values
      const nama = document.getElementById('nama').value;
      const email = document.getElementById('email').value;
      const telepon = document.getElementById('telepon').value;
      const rt = document.getElementById('rt').value;
      const alamat = document.getElementById('alamat').value;
      const jumlahWarga = document.getElementById('jumlahWarga').value;

      // In a real application, you would send this data to a server
      // For this example, we'll just show an alert
      alert(`Terima kasih ${nama}! Pendaftaran untuk RT/RW ${rt} telah berhasil dikirim. Kami akan menghubungi Anda di ${email} atau ${telepon} dalam waktu 1x24 jam.`);

      // Reset form and close modal
      document.getElementById('registrationForm').reset();
      closeRegistrationModal();
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
      const modal = document.getElementById('registrationModal');
      if (e.target === modal) {
        closeRegistrationModal();
      }
    });
  </script>

</body>
</html>
