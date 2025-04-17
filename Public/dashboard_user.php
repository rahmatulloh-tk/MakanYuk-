<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "db_makanyuk";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$query =    "SELECT donasi.*, pengguna.nama_user
            FROM donasi
            JOIN pengguna ON donasi.id_user = pengguna.id_user";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Donasi | MakanYuk!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

   <!-- Header -->
<header class="bg-[#0C356A] py-4 px-6 flex items-center justify-between shadow-md">
    <div class="flex items-center space-x-4">
        <img src="http://localhost/MakanYuk/src/Images/LogoKuning.png" alt="Logo Makanyuk" class="h-10 w-10 object-cover">
        <h1 class="text-white font-bold text-2xl">MakanYuk!</h1>
    </div>
    <div class="flex items-center space-x-4">
        <!-- Tombol Donasi -->
        <a href="CRUD.php" class="bg-yellow-400 hover:bg-yellow-500 text-[#0C356A] font-semibold px-4 py-2 rounded-full shadow">
             Donasi
        </a>
        <!-- Logout -->
        <a href="#" class="text-white hover:underline">Logout</a>
    </div>
</header>

    <!-- Main Content -->
    <main class="p-6 max-w-7xl mx-auto">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 border-b-2 border-blue-900 pb-2">🍱 Donasi Makanan</h2>

        <?php if ($result->num_rows > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition cursor-pointer" onclick='showDetail(<?= json_encode($row); ?>)'>
                        <img src="src/uploads/<?= htmlspecialchars($row['foto']); ?>" alt="Foto Makanan" class="w-full h-40 object-cover rounded-t-xl">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold"><?= htmlspecialchars($row['nama_makanan']); ?></h3>
                            <p class="text-gray-600 text-sm mt-1"><?= htmlspecialchars($row['alamat']); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="bg-white p-6 rounded shadow text-center text-gray-600 mt-6">
                <p>Belum ada data donasi makanan yang tersedia.</p>
            </div>
        <?php endif; ?>
    </main>

    <!-- Modal -->
    <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg relative">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-xl">&times;</button>
            <h3 id="modalNama" class="text-xl font-bold mb-4"></h3>
            <img id="modalFoto" src="" alt="Foto Makanan" class="w-full h-48 object-cover rounded mb-4">
            <p><strong>Deskripsi:</strong> <span id="modalDeskripsi"></span></p>
            <p><strong>Jumlah:</strong> <span id="modalJumlah"></span></p>
            <p><strong>Status:</strong> <span id="modalHalal"></span></p>
            <p><strong>Kadaluarsa:</strong> <span id="modalKadaluarsa"></span></p>
            <p><strong>Donatur:</strong> <span id="modalDonatur"></span></p>
            <p><strong>Alamat:</strong> <span id="modalAlamat"></span></p>
        </div>
    </div>

    <script>
        function showDetail(data) {
            document.getElementById("modalNama").innerText = data.nama_makanan;
            document.getElementById("modalDeskripsi").innerText = data.deskripsi_makanan;
            document.getElementById("modalJumlah").innerText = data.jumlah;
            const halalValue = data.halal ? data.halal.trim().toLowerCase() : "";
            document.getElementById("modalHalal").innerText =
                halalValue === "halal" ? "✅ Halal" : "❗ Non-Halal";
            document.getElementById("modalKadaluarsa").innerText = new Date(data.kadaluwarsa).toLocaleDateString();
            document.getElementById("modalDonatur").innerText = data.nama_user;
            document.getElementById("modalAlamat").innerText = data.alamat;
            document.getElementById("modalFoto").src = "src/uploads/" + data.foto;

            document.getElementById("detailModal").classList.remove("hidden");
            document.getElementById("detailModal").classList.add("flex");
        }

        function closeModal() {
            document.getElementById("detailModal").classList.add("hidden");
            document.getElementById("detailModal").classList.remove("flex");
        }
    </script>

</body>
</html>
