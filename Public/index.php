<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanYuk! - Berbagi Makanan</title>
    <script src="https://cdn.tailwindcss.com"></script> 
    <link rel="stylesheet" href="input.css">
    <style>
        :root {
            --Blue: #0D3B66;
            --Orane: #FF7F50;
            --Yellow: #F4D35E;
            --White: #E0E1DD;
            --danger: #D62828;
            --SoftYellow: #FAF0CA;
        }
    </style>
    
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navigasi -->
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <img src="<?php echo 'http://localhost/MakanYuk-/src/Images/LogoBiru.png'; ?>" alt="Logo" class="h-10">
            <span class="font-bold text-lg text-blue-700">MakanYuk!</span>
        </div>
        <div>
            <a href="#" class="nav-link">Cara Donasi</a>
            <a href="#" class="nav-link">Profil</a>
            <a href="#" class="nav-link">Kontak</a>
            <!-- Tombol Donasi -->
            <a href="CRUD.php" class="bg-blue-950 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition">
                DONASI SEKARANG
            </a>        </div>
    </nav>
    
    <!-- Header dengan Gambar Latar Belakang Fullsize -->
    <header class="relative w-full h-screen">
        <img src="<?php echo 'http://localhost/MakanYuk-/src/Images/Backround.png'; ?>" alt="Header" class="absolute top-0 left-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-white text-center px-4">
            <h1 class="text-4xl font-bold">MakanYuk! – Berbagi Makanan, Peduli Sesama</h1>
            <p class="mt-4 text-lg max-w-2xl">Bersama kita bisa mengurangi kelaparan dengan berbagi makanan kepada mereka yang membutuhkan.</p>
        </div>
    </header>

    <!-- Cara Donasi -->
    <section class="text-center py-12 bg-gray-200">
        <h2 class="section-title">Cara Donasi</h2>
        <div class="flex justify-center items-center gap-6 mt-4">
            <div class="circle-step">1</div>
            <div class="circle-step">2</div>
            <div class="circle-step">3</div>
        </div>
    </section>
    
    <!-- Tentang MakanYuk! -->
    <section class="py-12 bg-orange-200 text-center px-6">
        <h2 class="section-title">Tentang MakanYuk!</h2>
        <p class="mt-4 max-w-2xl mx-auto text-gray-700">MakanYuk! adalah platform berbagi makanan bagi yang membutuhkan. Dengan teknologi, kami menghubungkan pemberi makanan dengan penerima yang membutuhkan.</p>
    </section>
    
    <!-- Ulasan -->
    <section class="py-12 bg-yellow-100 text-center px-6">
        <h2 class="section-title">Ulasan</h2>
        <div class="flex justify-center gap-6 mt-4">
            <div class="review-box"></div>
            <div class="review-box"></div>
            <div class="review-box"></div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-orange-400 text-white py-8 text-center">
        <div class="mb-4">
            <p class="text-lg font-semibold">Hubungi Kami</p>
            <p>📞 +62 812-xxxx-xxxx</p>
            <p>📧 makanyuk@gmail.com</p>
        </div>
        <p class="text-sm">&copy; 2025 MakanYuk! - Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
