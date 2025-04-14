<?php
include 'koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM lokasi ORDER BY nama_lokasi ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - MakanYuk!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff9e6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
            border-radius: 10px;
        }
        .container h2 {
            text-align: center;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            background-color: #002a54;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .footer {
            text-align: center;
            margin-top: 15px;
        }
        .footer a {
            color: orange;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Daftar</h2>
    <form action="proses_register.php" method="POST">
        <input type="text" name="nama_user" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="no_telpon" placeholder="No. HP" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" required>

        <select name="id_lokasi" required>
            <option value="">-- Pilih Kecamatan --</option>
            <?php while($lokasi = mysqli_fetch_assoc($query)) : ?>
                <option value="<?= $lokasi['id_lokasi'] ?>"><?= $lokasi['nama_lokasi'] ?></option>
            <?php endwhile; ?>
        </select>

        <input type="text" name="lokasi_detail" placeholder="Detail Lokasi (Jalan, RT/RW, dll)" required>

        <button type="submit">DAFTAR</button>
    </form>
    <div class="footer">
        Sudah punya akun? <a href="login.php">Masuk</a>
    </div>
</div>
</body>
</html>
