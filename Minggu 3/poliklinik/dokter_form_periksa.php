<?php
session_name('dokter_admin_session');

session_start();
include('conf/koneksi.php');

$mode_edit = isset($_GET['edit']) && $_GET['edit'] == 1;


if ($mode_edit && isset($_GET['id_pasien'])) {
    $id_pasien = $_GET['id_pasien'];

    $query_daftar_poli = "SELECT * FROM daftar_poli WHERE id_pasien = '$id_pasien' AND status = 1";
    $result_daftar_poli = $koneksi->query($query_daftar_poli);

    if ($result_daftar_poli && $result_daftar_poli->num_rows > 0) {
  
        $data_daftar_poli = $result_daftar_poli->fetch_assoc();
        $id_daftar_poli = $data_daftar_poli['id'];

        $query_periksa = "SELECT * FROM periksa WHERE id_daftar_poli = '$id_daftar_poli'";
        $result_periksa = $koneksi->query($query_periksa);

        if ($result_periksa) {
            $data_periksa = $result_periksa->fetch_assoc();
            $tgl_periksa = $data_periksa['tgl_periksa'];
            $catatan = $data_periksa['catatan'];
            $biaya_periksa = $data_periksa['biaya_periksa'];
            // Jika ada lebih banyak data yang ingin ditampilkan, tambahkan di sini
        } else {
            echo "Gagal ketika mengambil data pemeriksaan : ". $koneksi->error;
        }
    } else {
        echo "Gagal ketika mengambil data daftar poli : ". $koneksi->error;
    }
} 



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
                        <a href="dokter_dashboard.php" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard</p>
                        <span class="right badge badge-success">Dokter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dokter_dashboard_periksa_pasien.php" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Periksa Pasien</p>
                        <span class="right badge badge-success">Dokter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dokter_dashboard_jadwal.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jadwal</p>
                        <span class="right badge badge-success">Dokter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dokter_dashboard_riwayat_pasien.php" class="nav-link">
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
                            <h1 class="m-0">Periksa Pasien</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dokter_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Periksa Pasien</li>
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
                    <div class="col-8 mx-auto">

                    <?php
                    if(isset($_GET['id_pasien'])){
                        $id_pasien = $_GET['id_pasien'];

                        $query_pasien = "SELECT * FROM pasien WHERE id = '$id_pasien'";
                        $result_pasien = $koneksi->query($query_pasien);

                        if ($result_pasien) {
                            $data_pasien = $result_pasien->fetch_assoc();
                            $nama_pasien = $data_pasien['nama'];
                        } else{
                            echo "Gagal ketika mengambil data pasien : ". $koneksi->error;
                        }
                    } else{
                        echo "ID pasien tidak terdaftar";
                        exit;
                    }
                       
                    ?>
                    <!-- Form periksa -->
                    <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Data Pemeriksaan</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="conf/dokter_proses_periksa.php?id_pasien=<?php echo $id_pasien; ?>" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_pasien">Nama Pasien : </label>
                                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?php echo $nama_pasien; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_periksa">Tanggal Periksa</label>
                                        <?php
                                        if($mode_edit){
                                            echo '<input type="text" class="form-control" id="tgl_periksa" name="tgl_periksa" placeholder="" value="' . $tgl_periksa . '" readonly>';
                                        } else{
                                            echo '<input type="datetime-local" class="form-control" id="tgl_periksa" name="tgl_periksa" placeholder="" required>';

                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="obat">Obat</label>
                                        <?php 
                                        if($mode_edit){
                                            echo '<input type="text" class="form-control" id="nama_obat" name="nama_obat" value="' . $nama_obat . '" readonly>';
                                        } else {
                                        ?>
                                            <select class="form-control" id="nama_obat" name="nama_obat[]" required>
                                                <option value="" disabled selected>--Pilih Obat--</option>
                                                <?php 

                                                    $query_obat = "SELECT * FROM obat";
                                                    $result_obat = $koneksi->query($query_obat);
                                                    
                                                    if ($result_obat) {
                                                        while($data_obat = $result_obat->fetch_assoc()){
                                                            echo '<option value ="'. $data_obat['id'] . '" data-harga="' . $data_obat['harga'] . '">' . $data_obat['nama_obat'] . ' -- ' . 'Rp ' . $data_obat['harga'] .'</option>';                                                
                                                        }                                            
                                                    } else{
                                                        echo "Gagal mendapatkan data obat: ".$koneksi->error;
                                                    }
                                                
                                                ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <textarea class="form-control" id="catatan" name="catatan" placeholder="Berikan Catatan" required><?php echo ($mode_edit) ? $catatan : ''; ?></textarea>                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="biaya">Total Biaya</label>
                                        <input class="form-control" id="biaya" name="biaya" placeholder="Biaya Pemeriksaan" required readonly value="<?php echo ($mode_edit) ? $biaya_periksa : ''; ?>">
                                    </div>
                                    <!-- Add more fields as needed -->

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-left">Simpan</button>
                                    
                                    <a href="dokter_dashboard_periksa_pasien.php" class="btn btn-danger float-right">Batal</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    <!-- Add more content as needed -->

                </div>
                <!-- /.row -->
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

<script> 
document.addEventListener('DOMContentLoaded', function(){
    var dropdown = document.getElementById('nama_obat');
    var biayaInput = document.getElementById('biaya');

    dropdown.addEventListener('change', function(){
        var selectedOption = dropdown.options[dropdown.selectedIndex];
        var hargaObat = selectedOption.getAttribute('data-harga');

        var biayaPeriksa = 150000;
        var totalBiayaPeriksa = parseFloat(hargaObat) + biayaPeriksa;

        var formattedBiaya = formatCurrency(totalBiayaPeriksa);

        biayaInput.value = formattedBiaya;
    });

    function formatCurrency(amount){
        var formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });
        return formatter.format(amount);
    }

    
});

</script>
</body>
</html>