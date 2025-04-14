<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar - MakanYuk!</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-100 min-h-screen flex items-center justify-center">
  <div class="bg-white shadow-md rounded-lg flex flex-col md:flex-row w-full max-w-5xl overflow-hidden">


    <div class="md:w-1/2 bg-yellow-100 flex flex-col items-center justify-center p-10">
      <img src="src/Images/LogoBiru.png" alt="Logo MakanYuk" class="w-28 mb-4">
      <h1 class="text-3xl font-bold text-gray-800 mb-2">MakanYuk!</h1>
      <p class="text-gray-700 text-center font-medium">Berbagi Makanan, Peduli Sesama</p>
    </div>


    <div class="md:w-1/2 p-10">
      <h2 class="text-xl font-semibold mb-6">Daftar</h2>


      <form action="register.php" method="post" class="space-y-5">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
          <input type="text" name="nama" required placeholder="Masukkan Nama" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input type="password" name="password" required placeholder="Masukkan Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit" class="w-full bg-blue-800 hover:bg-blue-900 text-white py-2 rounded-md font-semibold">
          DAFTAR
        </button>
      </form>

      <p class="mt-4 text-sm text-gray-600">
        Sudah Punya Akun? <a href="login.html" class="text-orange-600 hover:underline font-semibold">Masuk</a>
      </p>
    </div>
  </div>
</body>
</html>
