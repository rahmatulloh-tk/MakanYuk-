<?php
require 'koneksi.php';
require 'cek.php';

$tabel = $_GET['tabel'];
$id = $_GET['id'];

if ($tabel == 'donasi') {
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM donasi WHERE id_donasi = '$id'"));
    // form edit donasi
    ?>
    <h2>Edit Donasi</h2>
    <form method="post">
        <input type="text" name="nama_makanan" value="<?= $data['nama_makanan']; ?>" required><br>
        <input type="text" name="kategori" value="<?= $data['kategori']; ?>" required><br>
        <textarea name="deskripsi_makanan"><?= $data['deskripsi_makanan']; ?></textarea><br>
        <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" required><br>
        <input type="text" name="halal" value="<?= $data['halal']; ?>" required><br>
        <input type="date" name="kadaluwarsa" value="<?= $data['kadaluwarsa']; ?>" required><br>
        <input type="text" name="alamat" value="<?= $data['alamat']; ?>" required><br>

        <select name="id_lokasi">
            <?php
            $lokasi = mysqli_query($conn, "SELECT * FROM lokasi");
            while ($l = mysqli_fetch_array($lokasi)) {
                $selected = ($l['id_lokasi'] == $data['id_lokasi']) ? "selected" : "";
                echo "<option value='".$l['id_lokasi']."' $selected>".$l['nama_lokasi']."</option>";
            }
            ?>
        </select><br>

        <select name="id_user">
            <?php
            $user = mysqli_query($conn, "SELECT * FROM pengguna");
            while ($u = mysqli_fetch_array($user)) {
                $selected = ($u['id_user'] == $data['id_user']) ? "selected" : "";
                echo "<option value='".$u['id_user']."' $selected>".$u['nama_user']."</option>";
            }
            ?>
        </select><br>

        <button type="submit" name="update_donasi">Simpan</button>
    </form>
    <?php

    if (isset($_POST['update_donasi'])) {
        $nama = $_POST['nama_makanan'];
        $kategori = $_POST['kategori'];
        $deskripsi = $_POST['deskripsi_makanan'];
        $jumlah = $_POST['jumlah'];
        $halal = $_POST['halal'];
        $kadaluwarsa = $_POST['kadaluwarsa'];
        $alamat = $_POST['alamat'];
        $id_lokasi = $_POST['id_lokasi'];
        $id_user = $_POST['id_user'];

        mysqli_query($conn, "UPDATE donasi SET 
            nama_makanan='$nama', kategori='$kategori', deskripsi_makanan='$deskripsi',
            jumlah='$jumlah', halal='$halal', kadaluwarsa='$kadaluwarsa',
            alamat='$alamat', id_lokasi='$id_lokasi', id_user='$id_user'
            WHERE id_donasi='$id'");
        echo "<script>alert('Donasi berhasil diupdate');window.location='donasi.php';</script>";
    }

} elseif ($tabel == 'user') {
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pengguna WHERE id_user = '$id'"));
    ?>
    <h2>Edit User</h2>
    <form method="post">
        <input type="text" name="nama_user" value="<?= $data['nama_user']; ?>" required><br>
        <input type="email" name="email" value="<?= $data['email']; ?>" required><br>
        <input type="text" name="username" value="<?= $data['username']; ?>" required><br>
        <button type="submit" name="update_user">Simpan</button>
    </form>
    <?php
    if (isset($_POST['update_user'])) {
        $nama = $_POST['nama_user'];
        $email = $_POST['email'];
        $username = $_POST['username'];

        mysqli_query($conn, "UPDATE pengguna SET nama_user='$nama', email='$email', username='$username' WHERE id_user='$id'");
        echo "<script>alert('User berhasil diupdate');window.location='user.php';</script>";
    }

} elseif ($tabel == 'penerima_donasi') {
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM penerima_donasi WHERE id_penerima = '$id'"));
    ?>
    <h2>Edit Penerima Donasi</h2>
    <form method="post">
        <input type="text" name="nama_penerima" value="<?= $data['nama_penerima']; ?>" required><br>
        <input type="text" name="alamat" value="<?= $data['alamat']; ?>" required><br>
        <button type="submit" name="update_penerima">Simpan</button>
    </form>
    <?php
    if (isset($_POST['update_penerima'])) {
        $nama = $_POST['nama_penerima'];
        $alamat = $_POST['alamat'];

        mysqli_query($conn, "UPDATE penerima_donasi SET nama_penerima='$nama', alamat='$alamat' WHERE id_penerima='$id'");
        echo "<script>alert('Penerima berhasil diupdate');window.location='penerima_donasi.php';</script>";
    }
}
?>
