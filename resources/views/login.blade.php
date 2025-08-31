<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">

    <!-- Container utama -->
    <div class="relative w-full h-full flex items-center justify-center">
        
        <!-- Efek animasi lingkaran -->
        <div class="absolute w-72 h-72 bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>

        <!-- Card login dengan efek glassmorphism -->
        <div class="relative bg-white/30 backdrop-blur-xl shadow-2xl rounded-2xl p-8 w-96 border border-white/20">
            <h2 class="text-2xl font-extrabold text-center text-white mb-6">Login</h2>

            @if(session('error'))
                <p class="text-red-300 mb-3 text-center">{{ session('error') }}</p>
            @endif

            <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-white font-medium">Username</label>
                    <input type="text" name="username" class="w-full border border-white/40 bg-white/20 text-white placeholder-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" placeholder="Masukkan username" required>
                </div>
                <div>
                    <label class="block text-white font-medium">Password</label>
                    <input type="password" name="password" class="w-full border border-white/40 bg-white/20 text-white placeholder-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 text-white font-bold py-2 rounded-lg shadow-lg hover:scale-105 transform transition">Login</button>
            </form>
        </div>
    </div>

    <!-- Animasi custom -->
    <style>
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
    </style>

</body>
</html>
