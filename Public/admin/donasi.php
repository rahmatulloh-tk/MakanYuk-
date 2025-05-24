<?php
require 'koneksi.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Donasi</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Admin Makanyuk!</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User
                            </a>
                            <a class="nav-link" href="donasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-heart"></i></div>
                                Donasi
                            </a>
                            <a class="nav-link" href="penerima_donasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Penerima Donasi
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Donasi</h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">

                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Tambah Donasi
                                </button>
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Makanan</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Halal</th>
                                        <th>Kadaluwarsa</th>
                                        <th>Alamat</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $getdonasi = mysqli_query($conn, "SELECT * FROM donasi");
                                    while($d = mysqli_fetch_array($getdonasi)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama_makanan']; ?></td>
                                        <td><?= $d['kategori']; ?></td>
                                        <td><?= $d['jumlah']; ?> porsi</td>
                                        <td><?= $d['halal']; ?></td>
                                        <td><?= $d['kadaluwarsa']; ?></td>
                                        <td><?= $d['alamat']; ?></td>
                            
                                        <td>
                                            <img src="images/<?= $d['gambar']; ?>" width="100">
                                        </td>

                                        <td>
                                            <a href="edit.php?id=<?= $d['id_donasi']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="hapus_donasi.php?id=<?= $d['id_donasi']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright © Makanyuk 2025</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    <!-- The Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" id="modalLabel">Tambah Donasi</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal body -->
        <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <!-- Nama Makanan -->
                <input type="text" name="nama_makanan" placeholder="Nama Makanan" class="form-control" required>
                <br>

                <!-- Kategori -->
                <select name="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Makanan Basah">Makanan Basah</option>
                    <option value="Makanan Kering">Makanan Kering</option>
                    <option value="Minuman">Minuman</option>
                </select>
                <br>

                <!-- Deskripsi -->
                <textarea name="deskripsi_makanan" placeholder="Deskripsi Makanan" class="form-control" required></textarea>
                <br>

                <!-- Jumlah -->
                <input type="number" name="jumlah" placeholder="Jumlah Porsi" class="form-control" required>
                <br>

                <label>Status Halal:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="halal" id="halal1" value="Halal" required>
                    <label class="form-check-label" for="halal1">Halal</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="halal" id="halal2" value="Non-Halal">
                    <label class="form-check-label" for="halal2">Non-Halal</label>
                </div>

                <br><br>

                <!-- Tanggal Kadaluarsa -->
                <input type="date" name="kadaluwarsa" class="form-control" required>
                <br>

                <!-- Alamat -->
                <input type="text" name="alamat" placeholder="Alamat Pengambilan" class="form-control" required>
                <br>

                <!-- Pilih Lokasi -->
                <select name="id_lokasi" class="form-control" required>
                    <option value="">Pilih Lokasi</option>
                    <?php
                    $getlokasi = mysqli_query($conn, "SELECT * FROM lokasi");
                    while($lokasi = mysqli_fetch_array($getlokasi)) {
                        echo "<option value='".$lokasi['id_lokasi']."'>".$lokasi['nama_lokasi']."</option>";
                    }
                    ?>
                </select>
                <br>

                <!-- Pilih User -->
                <select name="id_user" class="form-control" required>
                    <option value="">Pilih User</option>
                    <?php
                    $getuser = mysqli_query($conn, "SELECT * FROM pengguna");
                    while($user = mysqli_fetch_array($getuser)) {
                        echo "<option value='".$user['id_user']."'>".$user['nama_user']."</option>";
                    }
                    ?>
                </select>
                <br>

                <!-- Upload Gambar -->
                <input type="file" name="gambar" class="form-control" required>
                <br>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary" name="addnewdonasi">Submit</button>
            </div>
        </form>



</html>