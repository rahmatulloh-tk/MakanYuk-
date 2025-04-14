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
    $nama_makanan = $_POST['nama_makanan'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $lokasi = $_POST['lokasi'];
    $jumlah = $_POST['jumlah'];
    $kadaluarsa = $_POST['kadaluarsa'];
    $status_halal = $_POST['status_halal'];

    // Upload foto
    $foto = $_FILES['foto'];
    $foto_name = $foto['name'];
    $foto_tmp = $foto['tmp_name'];
    $foto_size = $foto['size'];
    $foto_ext = pathinfo($foto_name, PATHINFO_EXTENSION);
    $allowed_ext = ['png', 'jpg', 'jpeg'];
    $max_size = 4 * 1024 * 1024;

    if (!in_array($foto_ext, $allowed_ext) || $foto_size > $max_size) {
        $_SESSION['error'] = "Format foto tidak valid atau ukuran terlalu besar.";
    } else {
        $new_foto_name = time() . "." . $foto_ext;
        move_uploaded_file($foto_tmp, "uploads/" . $new_foto_name);

        $stmt = $conn->prepare("INSERT INTO form_donasi (nama_makanan, kategori, deskripsi, lokasi, jumlah, kadaluarsa, status_halal, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssisss", $nama_makanan, $kategori, $deskripsi, $lokasi, $jumlah, $kadaluarsa, $status_halal, $new_foto_name);
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
    <title>Form Donasi - Makanyuk!</title>
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
<body class="bg-[#FFFCF5] font-sans">

    <!-- Header -->
    <header class="bg-[#0C356A] py-4 px-6 flex items-center justify-between shadow">
        <div class="flex items-center space-x-4">
            <img src="<?php echo 'http://localhost/MakanYuk-/src/Images/LogoKuning.png'; ?>" alt= "Logo Makanyuk" class="h-10 w-10 object-cover">
            <h1 class="text-white font-bold text-xl">Makanyuk!</h1>
        </div>
    </header>

    <div class="max-w-4xl mx-auto py-10 px-6 bg-white rounded-xl shadow">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Mari Berbagi, Satu Porsi untuk Kebahagiaan</h1>
        <p class="text-gray-700 mb-8">Hai, terima kasih sudah mau berbagi! Dengan sedikit bantuan dari Anda, kita bisa membuat perbedaan besar bagi mereka yang membutuhkan. Yuk, isi informasi dengan lengkap supaya donasi ini bisa sampai ke tangan yang tepat!</p>

        <div id="notif" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center <?= $notif ? '' : 'hidden'; ?>">
            <div class="bg-white p-6 rounded shadow-lg text-center">
                <p class="text-xl font-bold mb-4"><?= $notif; ?></p>
                <button onclick="hideNotification()" class="bg-blue-900 text-white px-4 py-2 rounded">Isi Ulang Form</button>
                <a href="index.php" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            </div>
        </div>

        <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label class="block font-semibold mb-1">Nama Makanan</label>
                <input type="text" name="nama_makanan" placeholder="Masukkan Nama Makanan" class="w-full p-3 border rounded bg-gray-100" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Kategori</label>
                <select name="kategori" class="w-full p-3 border rounded bg-gray-100" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="Makanan Kering">Makanan Kering</option>
                    <option value="Makanan Basah">Makanan Basah</option>
                    <option value="Minuman">Minuman</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Deskripsi Makanan</label>
                <textarea name="deskripsi" placeholder="Masukkan Deskripsi Makanan" class="w-full p-3 border rounded bg-gray-100" required></textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Lokasi</label>
                <input type="text" name="lokasi" placeholder="Masukkan Lokasi Anda" class="w-full p-3 border rounded bg-gray-100" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Jumlah</label>
                    <input type="number" name="jumlah" placeholder="Masukkan Jumlah Makanan" class="w-full p-3 border rounded bg-gray-100" required min="1">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Tanggal Kadaluarsa</label>
                    <input type="date" name="kadaluarsa" class="w-full p-3 border rounded bg-gray-100" required>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <label class="font-semibold">Status:</label>
                <label class="inline-flex items-center">
                    <input type="radio" name="status_halal" value="Halal" class="mr-2" required> Halal
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="status_halal" value="Non Halal" class="mr-2"> Non Halal
                </label>
            </div>

            <div>
                <label class="block font-semibold mb-1">Masukkan Foto</label>
                <input type="file" name="foto" accept="image/png, image/jpg, image/jpeg" class="w-full p-3 border rounded bg-gray-100" required>
            </div>

            <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded text-lg hover:bg-blue-800 transition">Tambah Donasi</button>
        </form>
    </div>
</body>
</html>
