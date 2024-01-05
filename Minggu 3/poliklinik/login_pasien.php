<?php
session_name('pasien_session');
session_start();
include('conf/koneksi.php');


// proses login pasien
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        $_SESSION['login_gagal'] = "Silahkan Lengkapi Form Nama Lengkap dan Password Anda.";
    } else {
        $query = "SELECT * FROM pasien WHERE nama = '$username' AND no_hp = '$password'";
        $result = $koneksi->query($query);

        if($result){
          if($result->num_rows >0 ){
              $data_pasien = $result->fetch_assoc();

              $_SESSION['username'] = $username;
              $_SESSION['id_pasien'] = $data_pasien['id'];
              $_SESSION['no_rm'] = $data_pasien['no_rm'];

              header('Location: pasien_dashboard.php');
              exit();
          } else{
              $_SESSION['login_gagal'] = "Login Gagal. Nama Lengkap atau Password Salah";
          }
        }else {
          $_SESSION['login_gagal'] = "Query Error: " . $koneksi->error;
      }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pasien | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- <div class="login-logo">
    <a href="app/index2.html"><b>Admin</b>LTE</a>
  </div> -->
  <!-- /.login-logo -->
  <div class="card card-outlane card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1">Poliklinik Keluarga Sejahtera<b></b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login Untuk Daftar Konsultasi</p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password (nomor telepon)" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1 mt-4">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register_pasien.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="app/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="app/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
    $(document).ready(function() {
        <?php
            if(isset($_SESSION['login_gagal'])){
        ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: '<?php echo $_SESSION['login_gagal'];?>',
                    showCancelButton: false,
                    confirmButtonText: 'OK'
                });
        <?php
                unset($_SESSION['login_gagal']);
            }
        ?>
    });
</script>
</body>
</html>
