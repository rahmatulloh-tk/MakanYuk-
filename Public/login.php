<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - MakanYuk!</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-100 min-h-screen flex items-center justify-center">
  <div class="bg-white md:bg-yellow-100 shadow-md rounded-lg flex flex-col md:flex-row w-full max-w-5xl overflow-hidden">

    <!-- Kiri: Logo & Slogan -->
    <div class="md:w-1/2 bg-yellow-100 flex flex-col items-center justify-center p-10">
      <img src="src/Images/LogoBiru.png" alt="Logo MakanYuk" class="w-28 mb-4">
      <h1 class="text-3xl font-bold text-gray-800 mb-2">MakanYuk!</h1>
      <p class="text-gray-700 text-center font-medium">Berbagi Makanan, Peduli Sesama</p>
    </div>

    <!-- Kanan: Form Login -->
    <div class="md:w-1/2 p-10 bg-white rounded-lg">
      <h2 class="text-xl font-bold text-center mb-6">LOGIN</h2>
      <form action="proses_login.php" method="post" class="space-y-5">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Username / Email</label>
          <input type="text" name="email" required placeholder="Masukkan Email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input type="password" name="password" required placeholder="Masukkan Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex items-center justify-between text-sm text-gray-600">
          <label><input type="checkbox" class="mr-1"> Remember Me</label>
          <a href="#" class="text-blue-600 hover:underline">Lupa Password?</a>
        </div>
        <button type="submit" class="w-full bg-blue-800 hover:bg-blue-900 text-white py-2 rounded-md font-semibold">
          Login
        </button>
      </form>
      <p class="mt-4 text-sm text-center text-gray-600">
        Belum punya akun? <a href="register.php" class="text-orange-600 hover:underline font-semibold">Daftar</a>
      </p>
    </div>
  </div>
</body>
</html>
