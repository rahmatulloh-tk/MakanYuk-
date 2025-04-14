<?php
session_start();

$conn = mysqli_connect("localhost","root","","db_makanyukk");

if(!$conn){
	echo "Koneksi gagal";
	die();
} else {
//	echo "Koneksi berhasil";
}

// Menambah user baru
if(isset($_POST['addnewuser'])){
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $no_telpon = $_POST['no_telpon'];
    $password = $_POST['password'];
    $id_lokasi = $_POST['id_lokasi'];
    $lokasi_detail = $_POST['lokasi_detail'];

    // Validasi email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format email tidak valid!";
        exit;
    }

    // Simpan ke database
    $adduser = mysqli_query($conn, "INSERT INTO pengguna (nama_user, email, no_telpon, password, id_lokasi, lokasi_detail)
        VALUES ('$nama_user', '$email', '$no_telp', '$password', '$id_lokasi', '$lokasi_detail')");

    if($adduser){
        header('Location: user.php');
        exit;
    } else {
        echo "Gagal menambahkan user.";
        header('Location: user.php');
        exit;
    }
}

// menambahkan donasi baru
if (isset($_POST['addnewdonasi'])) {
    $id_user = $_POST['id_user']; // Sekarang ambil dari form
    $id_lokasi = $_POST['id_lokasi'];
    $alamat = $_POST['alamat'];
    $nama_makanan = $_POST['nama_makanan'];
    $kategori = $_POST['kategori'];
    $deskripsi_makanan = $_POST['deskripsi_makanan'];
    $jumlah = $_POST['jumlah'];
    $halal = $_POST['halal'];
    $kadaluwarsa = $_POST['kadaluwarsa'];
    $created_at = date('Y-m-d H:i:s');

    // Upload gambar
    $gambar_name = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $upload_dir = "uploads/";

    // Validasi upload folder (buat jika belum ada)
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Simpan file
    move_uploaded_file($gambar_tmp, $upload_dir . $gambar_name);

    // Query insert
    $insert = mysqli_query($conn, "INSERT INTO donasi (
        id_user, id_lokasi, alamat, nama_makanan, kategori, deskripsi_makanan, jumlah, halal, kadaluwarsa, gambar, created_at
    ) VALUES (
        '$id_user', '$id_lokasi', '$alamat', '$nama_makanan', '$kategori', '$deskripsi_makanan', '$jumlah', '$halal', '$kadaluwarsa', '$gambar_name', '$created_at'
    )");

    // Redirect
    if ($insert) {
        header("Location: donasi.php");
        exit;
    } else {
        echo "Gagal menambahkan donasi.";
        header("Location: donasi.php");
        exit;
    }
}

// menambah penerima donasi baru
if (isset($_POST['addnewpenerima'])) {
    $id_user = $_POST['id_user'];
    $id_donasi = $_POST['id_donasi'];
    $jumlah_porsi = $_POST['jumlah_porsi'];

    $insert = mysqli_query($conn, "INSERT INTO penerima_donasi (
        id_user, id_donasi, jumlah_porsi, received_at
    ) VALUES (
        '$id_user', '$id_donasi', '$jumlah_porsi', NOW()
    )");

    if ($insert) {
        header("Location: penerima_donasi.php");
        exit;
    } else {
        echo "Gagal menambahkan penerima.";
    }
}




?>