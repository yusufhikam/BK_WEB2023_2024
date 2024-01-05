<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Poliklinik</title>

  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-scroll">
  <div class="container-fluid">
    <a class="text-light navbar-brand" href="#">Poliklinik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="text-light nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="text-light nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="text-light nav-link" href="#">Contact Us</a>
        </li>
      </ul>
      <div class=" d-grid gap-2 d-md-flex justify-content-md-end">
      <a href="login_pasien.php" class="btn btn-light btn-1" role="button">Buat Janji</a>
        <a href="login.php" class="btn btn-light btn-2" role="button">Login Dokter/Admin</a>
      </div>
    </div>
  </div>
</nav>
<!-- akhir navbar -->

<!-- CAROUSEL -->

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
  
    <div class="carousel-item active">
      <img src="assets/images/cr1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/cr2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/cr3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <div class="carousel-caption d-flex align-items-center justify-content-center">
    <div class="text-light text-center">
      <h1>Poliklinik Keluarga Sejahtera</h1>
      <p>Caption Carousel</p>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- AKHIR CAROUSEL -->
<!-- main content -->
<div class="container-fluid bg-secondary-subtle pt-5 pb-5">
  <div class="container overflow-hidden text-center">
    <div class="row gx-5">
      <div class="col">
        <div class="d-flex flex-column align-items-center">
          <i class="fas fa-calendar-alt fa-7x me-3"></i>
          <div>
            <h2 class="display2 fw-bold lh-1 mb-2 mt-5">Jadwal Konsultasi Online</h2>
            <p class="text-justify">
              Daftar untuk periksa kini bisa melalui Online. Buat janji dengan dokter terlebih dahulu. 
              Registrasi akun pasien jika belum mempunyai Nomor Rekam Medis, setelah itu login dan mulai daftar konsultasi untuk mendapatkan nomor antrian.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="d-flex flex-column align-items-center">
          <i class="fas fa-stethoscope fa-7x me-3"></i>
          <div>
            <h2 class="display2 fw-bold lh-1 mb-2 mt-5">Layanan Terbaik</h2>
            <p class="text-justify">
            Kami menyajikan layanan kesehatan terbaik dengan fokus pada kenyamanan
            dan kecepatan. Daftar periksa secara online untuk pengalaman pendaftaran
            yang mudah dan efisien. Hubungi dokter Anda, buat janji, dan dapatkan nomor 
            antrian konsultasi dengan cepat.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="d-flex flex-column align-items-center">
          <i class="fas fa-user-md  fa-7x me-3"></i>
          <div>
            <h2 class="display2 fw-bold lh-1 mb-2 mt-5">Profil Dokter</h2>
            <p class="text-justify">
            Temui tim dokter kami yang berpengalaman dan berdedikasi untuk
            memberikan pelayanan kesehatan terbaik. Setiap dokter memiliki 
            spesialisasi yang beragam, siap membantu Anda mencapai kesehatan o
            ptimal.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div></div> 
<!-- akhir main content  -->

<footer class="text-white py-5">
  <div class="container layar-dalam">
    <div class="row">
      <div class="col-md-4">
        <h5>Visit</h5>
        <ul class="list-unstyled">
          <li><a href="https://www.facebook.com"  id="sc-ic" class="fab fa-facebook text-light"></a> Poliklinik Keluarga Sejahtera</li>
          <li><a href="https://instagram.com" id="sc-ic" class="fab fa-instagram text-light"></a> klinik.sejahtera</li>
          <li><a href="https://wa.me/+6282137023425" id="sc-ic" class="fas fa-phone-alt text-light"></a> Telepon</li>
          <li><a href="mailto:#" id="sc-ic" class="fas fa-envelope text-light"></a> Email</li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Contact Person</h5>
        <ul class="list-unstyled">
          <li><a href="https://wa.me/+6282137023425" class="text-light">Yusuf Hikam (ADMIN)</a></li>
          <li><a href="https://wa.me/+6289513108192" class="text-light">Yuka (ADMIN)</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Our Address</h5>
        <p class="text-light">Desa Sidorejo Gang Pudak II jl. Ahmad Yani No.9, Kecamatan Sale, Kabupaten Rembang, Provinsi Jawa Tengah</p>
      </div>
    </div>
  </div>
  <div class="container layar-dalam">
    <div class="row">
      <div class="col">
        <div class="copyright text-center">
          &copy; 2022 Yoeshika Pictures
        </div>
      </div>
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var navbar = document.querySelector('.navbar');
    var navbarBrand = document.querySelector('.navbar-brand');
    var btnBuatJanji = document.querySelector('.btn-1');
    var btnDokterKami = document.querySelector('.btn-2');

    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        navbar.classList.add('navbar-scroll', 'text-dark', 'animate__animated', 'animate__fadeInDown');
        navbar.classList.remove('text-light');
        navbarBrand.classList.remove('text-light');
        navbarBrand.classList.add('text-dark');
        btnBuatJanji.classList.remove('btn-light');
        btnDokterKami.classList.remove('btn-light');
        btnBuatJanji.classList.add('btn-primary');
        btnDokterKami.classList.add('btn-primary');

        var navLinks = document.querySelectorAll('.navbar-nav a.nav-link');
        navLinks.forEach(function(link) {
          link.classList.add('text-dark');
        });
      } else {
        navbar.classList.remove('navbar-scroll','text-dark', 'animate__animated', 'animate__fadeInDown');
        navbar.classList.add('text-light');
        navbarBrand.classList.add('text-light');
        navbarBrand.classList.remove('text-dark');
        btnBuatJanji.classList.add('btn-light');
        btnDokterKami.classList.add('btn-light');
        btnBuatJanji.classList.remove('btn-primary');
        btnDokterKami.classList.remove('btn-primary');

        var navLinks = document.querySelectorAll('.navbar-nav a.nav-link');
        navLinks.forEach(function(link) {
          link.classList.remove('text-dark');
        });
      }
    });
  });
</script>
</body>
</html>