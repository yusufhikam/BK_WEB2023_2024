<?php
session_name('dokter_admin_session');

session_start();
include('conf/koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include('dokter-header.php'); ?>
<!-- head -->
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center"> -->
        <!-- <img class="animation__shake" src="app/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
        <!-- </div> -->

        <!-- Navbar -->
        <?php include('dokter-navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="dokter_dashboard.php" class="brand-link">
            <img src="app/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="app/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="dokter_dashboard.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard</p>
                        <span class="right badge badge-success">Dokter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dokter_dashboard_periksa_pasien.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Periksa Pasien</p>
                        <span class="right badge badge-success">Dokter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dokter_dashboard_jadwal.php" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jadwal</p>
                        <span class="right badge badge-success">Dokter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dokter_dashboard_riwayat_pasien.php" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Riwayat Pasien</p>
                        <span class="right badge badge-success">Dokter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dokter_dashboard_profile.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Profile</p>
                        <span class="right badge badge-success">Dokter</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-custom">
                <a href="logout.php" class="btn btn-lg btn-link"><i class="fas fa-sign-out-alt text-danger"></i></a>
                <span class="text-white">Log Out</span>
            </div>
        </div>    <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Jadwal Periksa</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dokter_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="dokter_dashboard_jadwal.php">Kelola Jadwal Periksa</a></li>
                                <li class="breadcrumb-item active">Edit Jadwal Periksa</li>
                            </ol>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Your content goes here -->

                    <div class="row">
                        <div class="col">
                            <?php
                            $id_jadwal = isset($_GET['id_jadwal']) ? $_GET['id_jadwal'] : null;

                            if ($id_jadwal === null) {
                                echo "ID jadwal tidak ditemukan.";
                                exit;
                            }
                            $query = "SELECT * FROM jadwal_periksa WHERE id = '$id_jadwal'";

                            $result = $koneksi->query($query);
                            if($result){
                                $data = $result->fetch_assoc();
                            ?>
                                <!-- update form  -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Jadwal</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="conf/dokter_proses_update_jadwal.php?id_jadwal=<?php echo $id_jadwal; ?>" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $id_jadwal; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="hari">Hari</label>
                                                <select class="form-control" id="hari" name="hari" required>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jumat">Jumat</option>
                                                    <option value="Sabtu">Sabtu</option>
                                                    <option value="Minggu">Minggu</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jam_mulai">Jam Mulai</label>
                                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="<?php echo $data['jam_mulai'] ; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jam_selesai">Jam Selesai</label>
                                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="<?php echo $data['jam_selesai']; ?>" required>
                                            </div>
                                            
                                            <!-- Add more fields as needed -->

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>

                                <?php 
                            } else{
                                echo "Error : " . $query . "<br>" . $koneksi->error;
                            }
                            ?>
                            <!-- Add more content as needed -->

                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        <?php include('dokter-footer.php'); ?>
        <!-- akhir footer -->
    

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="app/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="app/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="app/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="app/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="app/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="app/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="app/plugins/moment/moment.min.js"></script>
<script src="app/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="app/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="app/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="app/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="app/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="app/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="app/dist/js/pages/dashboard.js"></script>
<!-- ./wrapper -->
</body>
</html>