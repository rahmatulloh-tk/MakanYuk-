<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pembeli</title>git add .

</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-blue-700 text-center">Form Pembeli</h2>
        <form action="proses_pembeli.php" method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 font-medium">Nama Lengkap</label>
                <input type="text" name="nama" required class="w-full border border-gray-300 px-3 py-2 rounded-lg">
            </div>
            <div>
                <label class="block mb-1 font-medium">Alamat</label>
                <textarea name="alamat" required class="w-full border border-gray-300 px-3 py-2 rounded-lg"></textarea>
            </div>
            <div>
                <label class="block mb-1 font-medium">Nomor HP</label>
                <input type="text" name="nohp" required class="w-full border border-gray-300 px-3 py-2 rounded-lg">
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
