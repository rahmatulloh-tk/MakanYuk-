<?php
// ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$password = $_POST['password'];
$konfirmasi = $_POST['konfirmasi'];
$id_lokasi = $_POST['id_lokasi'];
$lokasi_detail = $_POST['lokasi_detail'];

include 'koneksi.php';

// Validasi password dan konfirmasi
if ($password !== $konfirmasi) {
    echo "<script>alert('Konfirmasi password tidak sesuai!'); history.back();</script>";
    exit;
}

// simpan password dalam bentuk plaintext (untuk tugas)
$query = "INSERT INTO pengguna (nama_user, email, no_telpon, password, id_lokasi, lokasi_detail)
          VALUES ('$nama', '$email', '$no_hp', '$password', '$id_lokasi', '$lokasi_detail')";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>
        alert('Registrasi berhasil!');
        window.location.href = 'login.php';
    </script>";
} else {
    echo "<script>
        alert('Registrasi gagal! Silakan coba lagi.');
        history.back();
    </script>";
}
?>
