
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Iuran Warga</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

  <!-- NAVBAR -->
  <header class="flex justify-between items-center px-8 py-4 bg-gray-900">
    <h1 class="text-2xl font-bold">
      IURAN<span class="text-teal-400">WARGA</span>
    </h1>
    <nav class="space-x-6 text-sm">
      <a href="#" class="hover:text-teal-400">Home</a>
      <a href="#" class="hover:text-teal-400">About</a>
      <a href="#" class="hover:text-teal-400">Services</a>
      <a href="#" class="hover:text-teal-400">FAQ</a>
      <a href="#" class="hover:text-teal-400">Blog</a>
      <a href="#" class="hover:text-teal-400">Contact</a>
      <a href="#" class="hover:text-teal-400">
        <svg class="inline w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M21 21l-4.35-4.35M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16z"/>
        </svg>
      </a>
    </nav>
  </header>

  <section class="relative bg-cover bg-center h-screen" style="background-image: url('/storage/image/y.png');">
    <div class="absolute inset-0 bg-black opacity-70"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
      <h2 class="text-3xl sm:text-5xl font-bold leading-tight mb-4">
        Mencatat pemasukan,<br />pengeluaran, iuran dan Arisan
      </h2>
      <p class="text-sm sm:text-lg text-gray-300 max-w-xl mb-6">
        Aplikasi keuangan digital pribadi, mencatat pemasukan, biaya / pengeluaran,<br />
        kartu iuran dan arisan dengan <span class="font-semibold text-white">mudah</span>
      </p>
      <div class="flex space-x-4">
        <a href="#" target="_blank">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/512px-Google_Play_Store_badge_EN.svg.png" alt="Get on Google Play" class="h-12">
        </a>
        <a href="#" target="_blank">
          <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="Download on App Store" class="h-12">
        </a>
      </div>
    </div>
  </section>

  <!-- FITUR UTAMA -->
  <section class="bg-gray-100 text-gray-900 py-20">
    <div class="max-w-6xl mx-auto px-4">
      <div class="grid md:grid-cols-3 gap-10">
        <!-- Transaksi -->
        <div class="bg-white p-8 rounded shadow">
          <div class="flex items-center justify-center w-12 h-12 bg-yellow-400 rounded-full mb-4">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M21 21l-4.35-4.35M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16z"/>
            </svg>
          </div>
          <h3 class="text-sm font-bold uppercase text-gray-700 mb-2">Transaksi</h3>
          <p class="text-sm text-gray-600">Mencatat transaksi pemasukan dan pengeluaran</p>
        </div>

        <!-- Iuran -->
        <div class="bg-white p-8 rounded shadow">
          <div class="flex items-center justify-center w-12 h-12 bg-yellow-400 rounded-full mb-4">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M7 8h10M7 16h10M7 12h10" />
            </svg>
          </div>
          <h3 class="text-sm font-bold uppercase text-gray-700 mb-2">Iuran</h3>
          <p class="text-sm text-gray-600">Mencatat berbagai iuran, iuran IPL, sampah, keamanan, arisan, dll</p>
        </div>

        <!-- Multiuser -->
        <div class="bg-white p-8 rounded shadow">
          <div class="flex items-center justify-center w-12 h-12 bg-yellow-400 rounded-full mb-4">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M16 12a4 4 0 1 0-8 0 4 4 0 0 0 8 0zm4 0a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"/>
            </svg>
          </div>
          <h3 class="text-sm font-bold uppercase text-gray-700 mb-2">Multiuser</h3>
          <p class="text-sm text-gray-600">Mendukung multi user, transaksi dan iuran dapat dilihat secara real time</p>
        </div>
      </div>
    </div>
  </section>

  <!-- YOUR IDENTITY -->
  <section class="bg-gray-100 text-gray-900 py-20">
    <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
      <div>
        <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df" alt="Your Identity Image" class="rounded shadow w-full object-cover">
      </div>
      <div>
        <p class="text-xs uppercase tracking-wide text-gray-500 mb-2">Your Identity</p>
        <h2 class="text-4xl font-bold mb-4">Amet minim mollit non deserunt</h2>
        <p class="text-gray-600 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
        <a href="#" class="inline-block bg-yellow-400 text-black font-semibold px-6 py-3 rounded hover:bg-yellow-500 transition">Learn More</a>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-gray-900 text-gray-100 pt-12 pb-6">
    <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-3 gap-10 items-start">
      <!-- Logo -->
      <div>
        <h1 class="text-xl font-bold mb-4">IURAN<span class="text-teal-400">WARGA</span></h1>
        <p class="text-sm text-gray-400">© 2025 Iuran Warga, Buku Kas & Arisan.<br>
        Proudly powered by <a href="Bbn.com" class="text-yellow-300 hover:underline">Bbn.com</a><br>
        Theme: Sydney</p>
      </div>

      <!-- Policy -->
      <div>
        <h2 class="uppercase text-sm font-semibold mb-3">Policy</h2>
        <ul class="space-y-2 text-sm text-gray-400">
          <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
          <li><a href="#" class="hover:text-white">Terms & Conditions</a></li>
        </ul>
      </div>

      <!-- Social -->
      <div class="flex space-x-4 justify-start md:justify-end">
        <a href="#"><img src="https://img.icons8.com/ios-filled/24/ffffff/instagram-new.png" alt="Instagram" /></a>
        <a href="#"><img src="https://img.icons8.com/ios-filled/24/ffffff/twitterx.png" alt="X" /></a>
        <a href="#"><img src="https://img.icons8.com/ios-filled/24/ffffff/facebook-new.png" alt="Facebook" /></a>
      </div>
    </div>

    <!-- Scroll to Top Button -->
    <div class="text-right px-4 mt-8">
      <a href="#" class="inline-block bg-yellow-400 p-3 rounded-full hover:bg-yellow-500 transition">
        <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 3a1 1 0 01.894.553l5 10a1 1 0 01-1.788.894L10 5.618 5.894 14.447a1 1 0 01-1.788-.894l5-10A1 1 0 0110 3z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>
  </footer>

</body>
</html>
