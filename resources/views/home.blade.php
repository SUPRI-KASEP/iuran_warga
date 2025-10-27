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
      padding: 12px 24px;
      background-color: #2c2c3c;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      margin: 0 8px;
    }
    .tab-button.active {
      background-color: #e63946;
      color: white;
    }
    .tab-content {
      display: none;
      padding: 24px;
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
      padding: 24px;
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
    }
    .modal-content {
      background-color: #2c2c3c;
      border-radius: 16px;
      padding: 32px;
      width: 90%;
      max-width: 500px;
      position: relative;
      animation: fadeInUp 0.5s ease;
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
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #d1d5db;
    }
    .form-group input, .form-group select, .form-group textarea {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      background-color: #1e1e2f;
      border: 1px solid #4b5563;
      color: white;
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
      padding: 24px;
      transition: all 0.3s ease;
    }
    .testimonial-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 15px rgba(230, 57, 70, 0.3);
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
        <a href="#testimoni">Testimoni</a>
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
        <button onclick="openRegistrationModal()" class="btn-outline px-8 py-3 rounded-xl font-semibold shadow-lg pulse-button">
          🚀 Daftar Sekarang!
        </button>
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

  <!-- Fitur Section -->
  <section id="fitur" class="container mx-auto py-24 px-6">
    <h3 class="text-3xl font-extrabold text-center mb-12 text-white">
      Fitur Unggulan <span class="text-red-500">IuranWarga</span>
    </h3>

    <!-- Tab Navigation -->
    <div class="flex justify-center mb-8 overflow-x-auto">
      <div class="flex space-x-4">
        <div class="tab-button active" data-tab="pengelolaan">Pengelolaan Iuran</div>
        <div class="tab-button" data-tab="laporan">Laporan & Analitik</div>
        <div class="tab-button" data-tab="komunikasi">Komunikasi</div>
      </div>
    </div>

    <!-- Tab Content -->
    <div class="tab-content active" id="pengelolaan-tab">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="feature-card">
          <div class="text-red-500 text-4xl mb-4">💰</div>
          <h4 class="text-xl font-bold mb-4">Pembayaran Digital</h4>
          <p class="text-gray-300">Warga dapat membayar iuran melalui berbagai metode pembayaran digital seperti transfer bank, e-wallet, dan QRIS.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-4xl mb-4">📅</div>
          <h4 class="text-xl font-bold mb-4">Penagihan Otomatis</h4>
          <p class="text-gray-300">Sistem mengirimkan tagihan otomatis setiap bulan dan mengingatkan warga yang belum membayar.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-4xl mb-4">👥</div>
          <h4 class="text-xl font-bold mb-4">Manajemen Warga</h4>
          <p class="text-gray-300">Kelola data warga dengan mudah, termasuk status pembayaran, riwayat, dan informasi kontak.</p>
        </div>
      </div>
    </div>

    <div class="tab-content" id="laporan-tab">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="feature-card">
          <div class="text-red-500 text-4xl mb-4">📊</div>
          <h4 class="text-xl font-bold mb-4">Dashboard Real-time</h4>
          <p class="text-gray-300">Pantau kondisi keuangan RT/RW secara real-time dengan dashboard yang mudah dipahami.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-4xl mb-4">📈</div>
          <h4 class="text-xl font-bold mb-4">Laporan Keuangan</h4>
          <p class="text-gray-300">Buat laporan keuangan otomatis dengan grafik dan statistik untuk transparansi pengelolaan dana.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-4xl mb-4">📋</div>
          <h4 class="text-xl font-bold mb-4">Ekspor Data</h4>
          <p class="text-gray-300">Ekspor data keuangan ke format Excel atau PDF untuk keperluan dokumentasi dan pelaporan.</p>
        </div>
      </div>
    </div>

    <div class="tab-content" id="komunikasi-tab">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="feature-card">
          <div class="text-red-500 text-4xl mb-4">📢</div>
          <h4 class="text-xl font-bold mb-4">Pengumuman</h4>
          <p class="text-gray-300">Bagikan pengumuman penting kepada seluruh warga melalui platform dengan jangkauan yang luas.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-4xl mb-4">🔔</div>
          <h4 class="text-xl font-bold mb-4">Notifikasi</h4>
          <p class="text-gray-300">Kirim notifikasi otomatis melalui email, SMS, atau aplikasi untuk informasi penting.</p>
        </div>
        <div class="feature-card">
          <div class="text-red-500 text-4xl mb-4">💬</div>
          <h4 class="text-xl font-bold mb-4">Forum Diskusi</h4>
          <p class="text-gray-300">Fasilitasi discusi antar warga mengenai berbagai topik terkait lingkungan dan kegiatan RT/RW.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimoni Section -->
  <section id="testimoni" class="container mx-auto py-24 px-6">
    <h3 class="text-3xl font-extrabold text-center mb-12 text-white">
      Apa Kata <span class="text-red-500">Pengguna</span> Kami?
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="testimonial-card">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center text-white font-bold mr-4">AS</div>
          <div>
            <h4 class="font-bold">Ahmad Surya</h4>
            <p class="text-gray-400 text-sm">Ketua RT 05, Jakarta</p>
          </div>
        </div>
        <p class="text-gray-300">"Sejak menggunakan IuranWarga, pengelolaan keuangan RT jadi lebih transparan dan efisien. Warga juga lebih mudah membayar iuran."</p>
        <div class="flex text-yellow-400 mt-4">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
      </div>

      <div class="testimonial-card">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center text-white font-bold mr-4">SD</div>
          <div>
            <h4 class="font-bold">Sari Dewi</h4>
            <p class="text-gray-400 text-sm">Bendahara RW 12, Bandung</p>
          </div>
        </div>
        <p class="text-gray-300">"Laporan keuangan otomatis sangat membantu. Sekarang tidak perlu lagi menghitung manual, semua sudah tersedia di dashboard."</p>
        <div class="flex text-yellow-400 mt-4">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
      </div>

      <div class="testimonial-card">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center text-white font-bold mr-4">RB</div>
          <div>
            <h4 class="font-bold">Rina Budianto</h4>
            <p class="text-gray-400 text-sm">Warga, Surabaya</p>
          </div>
        </div>
        <p class="text-gray-300">"Sangat praktis! Bisa bayar iuran kapan saja lewat smartphone. Notifikasi juga mengingatkan kalau ada pengumuman penting."</p>
        <div class="flex text-yellow-400 mt-4">
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
  <section class="bg-gradient-to-r from-red-700 to-red-500 text-white py-20 text-center">
    <h3 class="text-3xl font-bold mb-6">Mulai Sekarang!</h3>
    <p class="mb-8 text-lg opacity-90">Daftarkan RT/RW Anda dan nikmati kemudahan mengelola iuran warga.</p>
    <button onclick="openRegistrationModal()" class="btn-outline px-8 py-3 rounded-xl font-semibold shadow-lg">
      💡 Daftar Gratis
    </button>
  </section>

  <!-- Footer -->
  <footer class="py-6 text-center">
    <p>© 2025 IuranWarga • Transparansi untuk semua warga</p>
  </footer>

  <!-- Registration Modal -->
  <div id="registrationModal" class="modal">
    <div class="modal-content">
      <span class="close-modal" onclick="closeRegistrationModal()">&times;</span>
      <h3 class="text-2xl font-bold mb-6 text-center">Daftar <span class="text-red-500">IuranWarga</span></h3>
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
        <button type="submit" class="btn-red w-full py-3 rounded-xl font-semibold mt-4">
          Kirim Pendaftaran
        </button>
      </form>
    </div>
  </div>

  <script>
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
    }

    function closeRegistrationModal() {
      document.getElementById('registrationModal').style.display = 'none';
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
