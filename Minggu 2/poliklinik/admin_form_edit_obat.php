<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include('admin-header.php'); ?>
<!-- head -->
<body class="hold-transition sidebar-mini layout-fixed">
    
<div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center"> -->
        <!-- <img class="animation__shake" src="app/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
        <!-- </div> -->

            <!-- Navbar -->
        <?php include('admin-navbar.php'); ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="admin_dashboard.php" class="brand-link">
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
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Menu
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="admin_dashboard_dokter.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelola Dokter</p>
                                    </a>
                                </li>
                            </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin_dashboard_pasien.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Pasien</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin_dashboard_poli.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Poli</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin_dashboard_obat.php" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Obat</p>
                                </a>
                            </li>
                        </ul>
                        </li>
                    </ul>
                </nav>
                <div class="sidebar-custom">
                    <a href="logout.php" class="btn btn-lg btn-link"><i class="fas fa-sign-out-alt text-danger"></i></a>
                    <span class="text-white">Log Out</span>
                </div>
            </div>    <!-- /.sidebar -->
        </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Obat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="admin_dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="admin_dashboard_obat.php">Kelola Obat</a></li>
                <li class="breadcrumb-item active">Edit Data Obat</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Your content goes here -->

                <div class="row">
                    <div class="col-md-6">
                        <!-- Form update drug -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Obat</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php
                            include('conf/koneksi.php');

                            // cek data id
                            if(isset($_GET['id'])) {
                                $id_obat = $_GET['id'];

                                $result = $koneksi->query("SELECT * FROM obat WHERE id = $id_obat");
                                if ($result) {
                                        $data_obat = $result->fetch_assoc();
                                } else {
                                    echo "Error fetching data obat: " . $koneksi->error;
                                }
                            } else {
                                echo "ID obat tidak tersedia pada URL.";
                                exit;
                            }

                            
                            ?>
                            <form action="conf/admin_proses_update_obat.php?id=<?php echo $id_obat; ?>" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Obat</label>
                                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?php echo $data_obat['nama_obat']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kemasan">Kemasan</label>
                                        <input type="text" class="form-control" id="kemasan" name="kemasan" value="<?php echo $data_obat['kemasan']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $data_obat['harga']; ?>" required>
                                    </div>
                                    <!-- Add more fields as needed -->
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>

                        <!-- /.card -->
                    </div>
                   
                    <!-- Add more content as needed -->

                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- footer -->
    <?php include('admin-footer.php'); ?>
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