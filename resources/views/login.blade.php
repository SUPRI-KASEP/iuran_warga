<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      background-color: #1e1e2f;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    /* Efek blob modern */
    .animate-blob {
      animation: blob 8s infinite ease-in-out;
    }
    .animation-delay-2000 {
      animation-delay: 2s;
    }
    .animation-delay-4000 {
      animation-delay: 4s;
    }
    @keyframes blob {
      0% { transform: translate(0px, 0px) scale(1); }
      33% { transform: translate(30px, -40px) scale(1.1); }
      66% { transform: translate(-20px, 20px) scale(0.9); }
      100% { transform: translate(0px, 0px) scale(1); }
    }

    /* Style kartu login */
    .card-dark {
      background: rgba(17, 24, 39, 0.9);
      border: 1px solid rgba(230, 57, 70, 0.3);
      box-shadow: 0 0 30px rgba(230, 57, 70, 0.15);
      backdrop-filter: blur(20px);
    }
    .btn-red {
      background-color: #e63946;
      transition: all 0.3s ease;
    }
    .btn-red:hover {
      background-color: #b71c1c;
      transform: scale(1.05);
    }
    label {
      color: #ddd;
    }
    input {
      background-color: rgba(44, 44, 60, 0.7);
      border: 1px solid #444;
      color: #fff;
    }
    input:focus {
      border-color: #e63946;
      outline: none;
      box-shadow: 0 0 5px #e63946;
    }
  </style>
</head>
<body class="h-screen w-screen flex items-center justify-center overflow-hidden">

  <!-- Container utama -->
  <div class="relative w-full h-full flex items-center justify-center">

    <!-- Efek blob merah -->
    <div class="absolute w-72 h-72 bg-red-500/30 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
    <div class="absolute w-72 h-72 bg-red-700/30 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
    <div class="absolute w-72 h-72 bg-red-400/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>

    <!-- Card Login -->
    <div class="relative card-dark rounded-2xl p-8 w-96">
      <h2 class="text-3xl font-extrabold text-center text-red-500 mb-6">Login</h2>

      @if(session('error'))
        <p class="text-red-400 mb-3 text-center">{{ session('error') }}</p>
      @endif

      <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
        @csrf

        <div>
          <label class="block font-medium mb-1">Username</label>
          <input type="text" name="username"
                 class="w-full rounded-lg px-3 py-2 placeholder-gray-400"
                 placeholder="Masukkan username" required>
        </div>

        <div>
          <label class="block font-medium mb-1">Password</label>
          <input type="password" name="password"
                 class="w-full rounded-lg px-3 py-2 placeholder-gray-400"
                 placeholder="Masukkan password" required>
        </div>

        <button type="submit"
                class="w-full btn-red text-white font-bold py-2 rounded-lg shadow-lg">
          Login
        </button>
      </form>
    </div>
  </div>
</body>
</html>
