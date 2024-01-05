<?php
include('conf/koneksi.php');
session_start();

function membuatNoRm($koneksi){
  $tahun_bulan = date('Ym');

  // cek jumlah pasien pada bulan ini
  $query = "SELECT COUNT(*) as totalPasien FROM pasien WHERE SUBSTRING(no_rm, 1, 6) = '$tahun_bulan'";
  $result = $koneksi->query($query);

  if($result){
    $row = $result->fetch_assoc();
    $urutan = $row['totalPasien'] + 1;
  }else{
    $urutan = 1;
  }

  $no_rm = $tahun_bulan . '-' . str_pad($urutan, 3, '0', STR_PAD_LEFT);

  return $no_rm;
}

// proses form pendaftaran

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $no_ktp = $_POST['no_ktp'];
  $no_hp = $_POST['no_hp'];
  $no_rm = membuatNoRm($koneksi);

  $query = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm)
            VALUES ('$nama','$alamat','$no_ktp','$no_hp','$no_rm')";
  
  $result = $koneksi->query($query);

  if($result){
    $_SESSION['registrasi_sukses'] = "Pendaftaran Berhasil. Nomor Rekam Medis Anda: $no_rm";
    // exit();
  } else {
    die ("Error: " . $query . "<br>" . $koneksi->error);
  }

  $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pasien | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Poliklinik</b> Keluarga Sejahtera</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register Pasien Baru</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Alamat" name="alamat">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nomor HP" name="no_hp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nomor KTP" name="no_ktp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="login_pasien.php" class="text-center">Saya Sudah memiliki Akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="app/dist/js/adminlte.min.js"></script>
<script src="app/plugins/sweetalert2/sweetalert2.min.js"></script>


<script>
    $(document).ready(function() {
      <?php
        if(isset($_SESSION['registrasi_sukses'])) {
      ?>
          Swal.fire({
          icon: 'success',
          title: 'Pendaftaran Berhasil',
          text: '<?php echo $_SESSION['registrasi_sukses'];?>',
          showCancelButton: false,
          confirmButtonText: 'OK'
        }).then((result)=>{
          if(result.isConfirmed){
            setTimeout(function() {
             window.location.href = 'login_pasien.php';
            }, 1500);
          }
        });
      <?php
        unset($_SESSION['registrasi_sukses']);
        }
      ?>
    });
</script>
</body>
</html>
