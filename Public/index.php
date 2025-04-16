<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MakanYuk!</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="src/output.css">
  <style>
    /* Pastikan body dan html dapat di-scroll */
    html, body {
      overflow-x: hidden; /* Mencegah scroll horizontal */
    }

    /* Menambahkan margin-top untuk konten agar tidak terhalang navbar fixed */
    main {
      margin-top: 4rem; /* Sesuaikan dengan tinggi navbar */
    }
  </style>
  <!-- swipper js -->
   <!-- Swiper JS dan konfigurasi -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      new Swiper('.swiper', {
        direction: 'horizontal',
        loop: true,
        slidesPerView: 1.2,
        spaceBetween: 20,
        breakpoints: {
          640: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          },
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }
      });
    });
  </script>
</head>

<body>
<header id="navbar" class="bg-white fixed w-full top-0 left-0 z-50 shadow-md">
  <nav class="container mx-auto flex items-center justify-between h-16 px-4">

    <!-- Logo + Nama -->
    <div class="flex items-center gap-2">
      <img src="<?php echo 'http://localhost/MakanYuk/src/Images/LogoBiru.png'; ?>" alt="Logo" class="h-10">
      <span class="font-Poppins text-xl sm:text-2xl font-semibold">MakanYuk!</span>
    </div>

    <!-- Link Navigasi + Tombol -->
    <div class="hidden lg:flex items-center gap-6 text-sm sm:text-base font-medium text-gray-700">
      <a href="#beranda" class="nav-link">Beranda</a>
      <a href="#cara_donasi" class="nav-link">Cara Donasi</a>
      <a href="#tentang_kami" class="nav-link">Tentang Kami</a>
      <a href="#review" class="nav-link">Review</a>
      <a href="#kontak" class="nav-link">Kontak</a>

      <!-- Tombol Daftar -->
      <a href="login.php" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full shadow-md">
        Daftar
      </a>
    </div>

    <!-- Mobile Hamburger -->
    <div class="lg:hidden text-xl sm:text-3xl cursor-pointer z-50" id="hamburger">
      <i class="ri-menu-4-line"></i>
    </div>
  </nav>
</header>

<main>
  <!-- Beranda -->
  <section id="beranda" class="relative w-full min-h-screen faded-hero">
    <!-- Gambar Latar -->
    <img src="<?php echo 'http://localhost/MakanYuk/src/Images/Backround.png'; ?>" 
         alt="Header" 
         class="absolute top-0 left-0 w-full h-full object-cover">

    <!-- Overlay Gelap dan Konten -->
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center">
      <div class="px-6 container mx-auto md:flex md:justify-between items-center text-white">
        <!-- Konten Kiri -->
        <div class="md:w-3/6 text-center md:text-left md:pl-10">
          <h4 class="text-xl font-bold">MakanYuk</h4>
          <h3 class="text-5xl font-bold mb-5">Berbagi Makanan, Peduli Sesama</h3>
          <p class="text-gray-200 mb-5">
            Sekecil apa pun makananmu, bisa jadi berkah untuk yang lain. Lewat Makanyuk!, mari berbagi dengan cepat dan mudah.
            Bersama kita bisa lawan kelaparan dan kurangi pemborosan. Karena peduli itu sederhana, tapi dampaknya luar biasa.
          </p>
          <div class="flex gap-4 justify-center md:justify-start">
            <!-- Tombol Donasi -->
            <a href="#donasi" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full shadow-md">
              Donasi Sekarang
            </a>
            
        </div>
      </div>
    </div>
  </section>

  <!-- Cara Donasi -->
  <section id="cara_donasi" class="text-center py-12 bg-yellow-100 text-center px-6">
    <h2 class="text-2xl md:text-3xl font-bold text-blue-900 mb-10">Donasikan makananmu hari ini juga!</h2>

    <div class="flex justify-center items-center gap-x-6 md:gap-x-12 px-4">
      <!-- Step 1 -->
      <div class="flex flex-col items-center">
        <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center shadow-md">
          <img src="<?php echo 'http://localhost/MakanYuk/src/Images/bukaweb.png'; ?>" alt="Buka Website" class="w-16 h-16" />
        </div>
        <p class="font-bold mt-3">Buka Website</p>
      </div>

      <!-- Step 2 -->
      <div class="flex flex-col items-center">
        <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center shadow-md">
          <img src="<?php echo 'http://localhost/MakanYuk/src/Images/daftarsekarang.png'; ?>" alt="Login" class="w-16 h-16" />
        </div>
        <p class="font-bold mt-3">Login</p>
      </div>

      <!-- Step 3 -->
      <div class="flex flex-col items-center">
        <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center shadow-md">
          <img src="<?php echo 'http://localhost/MakanYuk/src/Images/form.png'; ?>" alt="Isi Form" class="w-16 h-16" />
        </div>
        <p class="font-bold mt-3">Isi Form</p>
      </div>

      <!-- Step 4 -->
      <div class="flex flex-col items-center">
        <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center shadow-md">
          <img src="<?php echo 'http://localhost/MakanYuk/src/Images/selesai.png'; ?>" alt="Selesai" class="w-16 h-16" />
        </div>
        <p class="font-bold mt-3">Selesai</p>
      </div>
    </div>
  </section>

  <!-- Tentang Kami -->
  <section id="tentang_kami" class="bg-orange-500 text-white py-16 px-4 md:px-20">
    <div class="flex flex-col md:flex-row items-center justify-between max-w-6xl mx-auto">
      <!-- Teks -->
      <div class="md:w-2/3 mb-8 md:mb-0">
        <h2 class="text-4xl font-bold mb-6">Tentang MakanYuk!</h2>
        <p class="text-white text-lg leading-relaxed mb-4">
          MakanYuk! merupakan platform berbagi makanan dengan tujuan untuk mengurangi pemborosan pangan dan membantu mereka yang membutuhkan. 
          Melalui website ini, anda dapat dengan mudah membagikan makanan berlebih kepada penerima terdekat secara gratis.
        </p>
        <p class="text-white text-lg leading-relaxed">
          Dengan menghubungkan pemberi dan penerima dalam satu ekosistem digital, MakanYuk! tidak hanya mengurangi limbah makanan, 
          tetapi juga membangun solidaritas sosial dan kepedulian terhadap sesama. Kami percaya bahwa setiap makanan berharga, dan dengan berbagi, 
          kita dapat menciptakan perubahan positif di masyarakat.
        </p>
      </div>

      <!-- Logo -->
      <div class="md:w-1/3 flex justify-center">
        <img src="<?php echo 'http://localhost/MakanYuk/src/Images/LogoBiru.png'; ?>" alt="Logo MakanYuk" class="w-64 h-auto" />
      </div>
    </div>
  </section>

  <!-- Review -->
  <section id="review" class="py-12 bg-yellow-100 text-center px-6">
  <div class="flex flex-col items-center gap-3 text-center mb-10 md:mb-20">
    <h2 class="text-3xl font-bold">Review</h2>
    <p class="max-w-2xl text-gray-700">Apa kata mereka tentang MakanYuk?</p>
  </div>

  <div class="swiper w-full max-w-6xl mx-auto">
    <div class="swiper-wrapper">
      <!-- Slide 1 -->
      <div class="swiper-slide bg-white p-6 rounded-xl shadow-md">
        <img src="<?php echo 'http://localhost/MakanYuk/src/Images/rev1.jpg'; ?>" alt="review_1"
             class="w-24 h-36 object-cover mx-auto rounded-lg" />
        <p class="font-medium">Bermanfaat, cepat, dan niat baiknya kerasa banget.</p>
      </div>
      <!-- Slide 2 -->
      <div class="swiper-slide bg-white p-6 rounded-xl shadow-md">
        <img src="<?php echo 'http://localhost/MakanYuk/src/Images/rev2.jpg'; ?>" alt="review_2"
        class="w-24 h-36 object-cover mx-auto rounded-lg"  />
        <p class="font-medium">Saya ikut bantu distribusi makanan dari Makanyuk! dan saya lihat sendiri wajah bahagia orang-orang yang menerima.</p>
      </div>
      <!-- Slide 3 -->
      <div class="swiper-slide bg-white p-6 rounded-xl shadow-md">
        <img src="<?php echo 'http://localhost/MakanYuk/src/Images/rev3.jpg'; ?>" alt="review_3"
        class="w-24 h-36 object-cover mx-auto rounded-lg"  />
        <p class="font-medium">Platform seperti ini seharusnya jadi standar di setiap kota besar. Good job, Makanyuk!</p>
      </div>
      <!-- Slide 4 -->
      <div class="swiper-slide bg-white p-6 rounded-xl shadow-md">
        <img src="<?php echo 'http://localhost/MakanYuk/src/Images/rev4.jpg'; ?>" alt="review_4"
        class="w-24 h-36 object-cover mx-auto rounded-lg"  />
        <p class="font-medium">Jadi superhero makanan tanpa pakai jubah. Cukup klik-klik di Makanyuk!</p>
      </div>
    </div>

    <!-- Pagination -->
    <div class="swiper-pagination mt-6"></div>

    <!-- Navigation (optional) -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</section>


  <!-- Kontak -->
  <footer id="kontak" class="bg-orange-400 text-white py-8 text-center">
    <div class="mb-4">
      <p class="text-lg font-semibold">Hubungi Kami</p>
      <p>📞 +62 812-xxxx-xxxx</p>
      <p>📧 makanyuk@gmail.com</p>
    </div>
    <p class="text-sm">&copy; 2025 MakanYuk! - Semua Hak Dilindungi.</p>
  </footer>

  <!-- Swipper Js -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</main>
</body>
</html>
