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
        <title>Data Penerima Donasi</title>
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
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                User
                            </a>
                            <a class="nav-link" href="donasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Donasi
                            </a>
                            <a class="nav-link" href="penerima_donasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
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
                        <h1 class="mt-4">Data Penerima Donasi</h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">

                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Tambah Penerima Donasi
                                </button>

                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Nama Makanan</th>
                                        <th>Jumlah Porsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $ambil = mysqli_query($conn, "SELECT pd.*, u.nama_user, d.nama_makanan 
                                                                FROM penerima_donasi pd 
                                                                JOIN pengguna u ON pd.id_user = u.id_user 
                                                                JOIN donasi d ON pd.id_donasi = d.id_donasi");
                                    while($data = mysqli_fetch_array($ambil)){
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['nama_user']; ?></td>
                                        <td><?= $data['nama_makanan']; ?></td>
                                        <td><?= $data['jumlah_porsi']; ?> porsi</td>
                                        <td>
                                            <a href="edit.php?id=<?= $data['id_penerima']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="hapus.php?hapus_penerima=<?= $data['id_penerima']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
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
            <h4 class="modal-title" id="modalLabel">Tambah Penerima Donasi</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal body -->
        <form method="post">
            <div class="modal-body">

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

                <!-- Pilih Donasi -->
                <select name="id_donasi" class="form-control" required>
                    <option value="">Pilih Donasi</option>
                    <?php
                    $getdonasi = mysqli_query($conn, "SELECT * FROM donasi");
                    while($donasi = mysqli_fetch_array($getdonasi)) {
                        echo "<option value='".$donasi['id_donasi']."'>".$donasi['nama_makanan']." - ".$donasi['jumlah']." porsi</option>";
                    }
                    ?>
                </select>
                <br>

                <!-- Jumlah Porsi -->
                <input type="number" name="jumlah_porsi" placeholder="Jumlah Porsi yang Diterima" class="form-control" required>
                <br>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary" name="addnewpenerima">Submit</button>
            </div>
        </form>


    
</html>