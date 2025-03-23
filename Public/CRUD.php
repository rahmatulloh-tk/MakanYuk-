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

$notif = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_donatur = $_POST['nama_donatur'];
    $kategori_makanan = $_POST['kategori_makanan'];
    $nama_makanan = $_POST['nama_makanan'];
    $deskripsi_makanan = $_POST['deskripsi_makanan'];
    $jumlah = $_POST['jumlah'];
    $lokasi = $_POST['lokasi'];
    
    // Handle file upload 
    $foto = $_FILES['foto'];
    $foto_name = $foto['name'];
    $foto_tmp = $foto['tmp_name'];
    $foto_size = $foto['size'];
    $foto_ext = pathinfo($foto_name, PATHINFO_EXTENSION);
    $allowed_ext = ['png', 'jpg', 'jpeg'];
    $max_size = 4 * 1024 * 1024; // 4MB
    
    if (!in_array($foto_ext, $allowed_ext) || $foto_size > $max_size) {
        $_SESSION['error'] = "Format foto tidak valid atau ukuran terlalu besar.";
    } else {
        $new_foto_name = time() . "." . $foto_ext;
        move_uploaded_file($foto_tmp, "uploads/" . $new_foto_name);
        
        $stmt = $conn->prepare("INSERT INTO form_donasi (nama_donatur, kategori_makanan, nama_makanan, deskripsi_makanan, jumlah, lokasi, foto) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $nama_donatur, $kategori_makanan, $nama_makanan, $deskripsi_makanan, $jumlah, $lokasi, $new_foto_name);
        $stmt->execute();
        $stmt->close();
        $_SESSION['success'] = "Donasi berhasil ditambahkan.";
    }
    header("Location: crud.php");
    exit();
}

if (isset($_SESSION['success'])) {
    $notif = $_SESSION['success'];
    unset($_SESSION['success']);
} elseif (isset($_SESSION['error'])) {
    $notif = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Donasi Makanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function showNotification() {
            document.getElementById("notif").classList.remove("hidden");
        }
        function hideNotification() {
            document.getElementById("notif").classList.add("hidden");
        }
        window.onload = function() {
            <?php if ($notif !== ""): ?>
                showNotification();
            <?php endif; ?>
        };
    </script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Tambah Donasi Makanan</h2>

        <div id="notif" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center <?= $notif ? '' : 'hidden'; ?>">
            <div class="bg-white p-6 rounded shadow-lg text-center">
                <p class="text-xl font-bold mb-4"><?= $notif; ?></p>
                <button onclick="hideNotification()" class="bg-blue-900 text-white px-4 py-2 rounded">Isi Ulang Form</button>
                <a href="index.php" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            </div>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <label class="block mb-2">Nama</label>
            <input type="text" name="nama_donatur" class="w-full p-2 border rounded mb-4" required>
            
            <label class="block mb-2">Kategori Makanan</label>
            <select name="kategori_makanan" class="w-full p-2 border rounded mb-4" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="Makanan Kering">Makanan Kering</option>
                <option value="Makanan Basah">Makanan Basah</option>
                <option value="Minuman">Minuman</option>
            </select>
            
            <label class="block mb-2">Nama Makanan</label>
            <input type="text" name="nama_makanan" class="w-full p-2 border rounded mb-4" required>
            
            <label class="block mb-2">Deskripsi Makanan</label>
            <textarea name="deskripsi_makanan" class="w-full p-2 border rounded mb-4" required></textarea>
            
            <label class="block mb-2">Jumlah</label>
            <input type="number" name="jumlah" class="w-full p-2 border rounded mb-4" min="1" required>
            
            <label class="block mb-2">Lokasi</label>
            <input type="text" name="lokasi" class="w-full p-2 border rounded mb-4" required>
            
            <label class="block mb-2">Foto Makanan (PNG/JPG, maks 4MB)</label>
            <input type="file" name="foto" class="w-full p-2 border rounded mb-4" accept="image/png, image/jpg, image/jpeg" required>
            
            <button type="submit" class="w-full bg-blue-900 text-white p-2 rounded">Tambah Donasi</button>
        </form>
    </div>
</body>
</html>
