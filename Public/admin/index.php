<?php
// koneksi.php
$koneksi = mysqli_connect("localhost", "root", "", "db_makanyuk");
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <!-- Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.php">Admin Makanyuk!</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    </nav>

    <!-- Sidebar -->
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

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <h2 class="mt-3">Grafik Penerima Donasi dan Donasi</h2> 
                    <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                        <canvas id="myChart"></canvas>
                    </div>
                    <br>
                    <button class="btn btn-primary" id="downloadPdf"><i class="fas fa-download"></i> Download PDF</button>
                </div>
            </main>

            <?php
            $jumlah_donasi = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM donasi"));
            $jumlah_penerima = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penerima_donasi"));
            ?>

            <!-- Script Chart & PDF -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
            <script>
                const ctx = document.getElementById("myChart").getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Donasi', 'Penerima Donasi'],
                        datasets: [{
                            label: 'Jumlah Orang',
                            data: [<?= $jumlah_donasi ?>, <?= $jumlah_penerima ?>],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 159, 64, 0.7)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0
                                }
                            }
                        }
                    }
                });

                document.getElementById('downloadPdf').addEventListener('click', () => {
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF();
                    const canvas = document.getElementById("myChart");
                    const imgData = canvas.toDataURL("image/png");
                    pdf.text("Grafik Donasi dan Penerima Donasi", 15, 20);
                    pdf.addImage(imgData, "PNG", 15, 30, 180, 100);
                    pdf.save("chart.pdf");
                });
            </script>

            <!-- Footer -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright © Makanyuk 2025</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts Tambahan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>