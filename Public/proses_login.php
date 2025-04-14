<?php
// Mulai session
session_start();

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data email dan password dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Koneksi ke database
    $host = 'localhost'; // sesuaikan dengan host MySQL Anda
    $db = 'db_makanyuk'; // nama database Anda
    $username = 'root';  // sesuaikan dengan username MySQL Anda
    $pass = '';          // sesuaikan dengan password MySQL Anda

    // Membuat koneksi
    $conn = new mysqli($host, $username, $pass, $db);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menyiapkan query untuk mengambil data pengguna berdasarkan email
    $query = "SELECT * FROM pengguna WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah email ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        // Jika password belum di-hash, Anda bisa langsung membandingkan password dengan plaintext
        if ($password == $user['password']) {
            // Jika berhasil, simpan informasi pengguna di session
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nama_user'] = $user['nama_user']; // Menambahkan nama pengguna

            // Arahkan ke dashboard_user.php
            header("Location: dashboard_user.php");
            exit();
        } else {
            // Jika password salah
            echo "Password salah.";
        }
    } else {
        // Jika email tidak ditemukan
        echo "Email tidak ditemukan.";
    }

    // Tutup koneksi
    $conn->close();
}
?>
