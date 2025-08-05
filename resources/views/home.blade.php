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

    <!-- HERO SECTION -->
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

</body>
</html>
