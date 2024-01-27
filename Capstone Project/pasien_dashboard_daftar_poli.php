<?php

session_start();
include('../../conf/koneksi.php');


if(isset($_SESSION['no_rm'])){
    $no_rm_pasien = $_SESSION['no_rm'];
} else{
    header('Location: ../../login_pasien.php');
    exit();
}

if (isset($_SESSION['id_pasien'])) {
    $id_pasien = $_SESSION['id_pasien'];
} else {
    // Redirect to login if id_pasien is not found in session
    header('Location: ../../login_pasien.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- head -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pasien Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../app/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../app/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../app/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../app/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../app/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../app/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../app/plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head><!-- head -->

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center"> -->
        <!-- <img class="animation__shake" src="../../app/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
        <!-- </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="pasien_dashboard.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav> <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 custom-sidebar">
            <!-- Brand Logo -->
            <a href="pasien_dashboard.php" class="brand-link">
                <img src="../../assets/images/LogoUdinus.png" alt="Udinus Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Poliklinik Udinus</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../app/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="pasien_dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                    <span class="right badge badge-danger">Pasien</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pasien_dashboard_poli.php" class="nav-link active">
                                <i class="nav-icon fas fa-notes-medical"></i>
                                <p>
                                    Daftar Poli
                                    <span class="right badge badge-danger">Pasien</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="sidebar-custom">
                    <a href="../../logout.php" class="btn btn-lg btn-link"><i
                            class="fas fa-sign-out-alt text-danger"></i></a>
                    <span class="text-white">Log Out</span>
                </div>
            </div> <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Daftar Poli</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="pasien_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Daftar Poli</li>
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
                        <div class="col-md-4">
                            <!-- Form daftar poli -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Poli</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="../../conf/pasien_proses_daftar_poli.php" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="no_rm">Nomor Rekam Medis</label>
                                            <input type="text" class="form-control" id="no_rm" name="no_rm"
                                                value="<?php echo $no_rm_pasien; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="pilih_poli">Pilih Poli</label>
                                            <select name="id_poli" class="form-control" onchange="load_jadwal();">
                                                <option value="" disabled selected>-- Pilih Poli --</option>
                                                <?php 
                                                $query_poli = "SELECT * FROM poli";
                                                $result_poli = $koneksi->query($query_poli);

                                                while ($row = $result_poli->fetch_assoc()){
                                                    echo "<option value='". $row['id']. "'>" . $row['nama_poli'] . "</option>";
                                                }
                                            ?>
                                            </select>
                                            <!-- pilihan dropdown list poli -->
                                        </div>
                                        <div class="form-group">
                                            <label for="pilih_jadwal">Pilih Jadwal</label>
                                            <!-- pilihan dropdown list jadwal-->
                                            <select name="id_jadwal" class="form-control">
                                                <option value="" disabled selected>--Pilih Jadwal--</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="keluhan">Keluhan</label>
                                            <textarea class="form-control" id="keluhan" name="keluhan"
                                                required></textarea>
                                        </div>
                                        <!-- Add more fields as needed -->

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Daftar</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- Table-->
                    <?php
                    // session_start();
                    $id_pasien = $_SESSION['id_pasien'];
            
                    // Include your database connection file (e.g., koneksi.php)
                    // include('koneksi.php');

                    // Query to retrieve data from the obat table
                    $query = "SELECT dp.no_antrian, p.nama_poli, d.nama AS nama_dokter, jp.hari, jp.jam_mulai, jp.jam_selesai, dp.status
                            FROM daftar_poli dp
                            JOIN poli p ON dp.id_poli = p.id
                            JOIN jadwal_periksa jp ON dp.id_jadwal = jp.id
                            JOIN dokter d ON jp.id_dokter = d.id
                            WHERE dp.id_pasien = '$id_pasien'
                            ORDER BY dp.no_antrian DESC";

                    // $query = "SELECT daftar_poli.no_antrian, daftar_poli.status, poli.nama_poli, dokter.nama AS nama_dokter, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai
                    //         FROM daftar_poli 
                    //         JOIN poli ON daftar_poli.id_poli = poli.id
                    //         JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
                    //         JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
                    //         WHERE daftar_poli.id_pasien = '$id_pasien'";
                    
                            // $result = $koneksi->query($query);
                            $result = mysqli_query($koneksi, $query);
                    ?>
                
                        <div class="col-md-8">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Riwayat Daftar Poli</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Poli</th>
                                                <th>Dokter</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
                                                <th>Antrian</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $no = 1;
                                        while ($data = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['nama_poli']; ?></td>
                                                <td><?php echo $data['nama_dokter']; ?></td>
                                                <td><?php echo $data['jam_mulai']; ?></td>
                                                <td><?php echo $data['jam_selesai']; ?></td>
                                                <td><?php echo $data['no_antrian']; ?></td>
                                                <td><?php echo $data['status'] == 'Sudah Diperiksa' ? 'Sudah Diperiksa' : 'Belum Diperiksa'; ?>
                                                </td>
                                               
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Detail Daftar Poli -->
                        <div class="modal fade custom-modal" id="detailModal" tabindex="-1" role="dialog"
                            aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary ">
                                        <h3 class="modal-title" id="detailModalLabel">Detail Pendaftaran Poli</h3>
                                        <div class="status-container">
                                            <p id="statusDetail"></p>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Tempat untuk menampilkan detail daftar poli -->
                                        <div id="detailContent">
                                            <!-- Detail Pendaftaran Poli -->
                                            <div id="detailContent" class="text-center">
                                                <div class="col">
                                                    <div class="col">
                                                        <label>Nama Pasien:</label>
                                                        <p id="namaPasienDetail"></p>
                                                    </div>
                                                    <div class="col">
                                                        <label>Poli:</label>
                                                        <p id="poliDetail"></p>
                                                    </div>
                                                    <div class="col">
                                                        <label>Jadwal:</label>
                                                        <p id="jadwalDetail"></p>
                                                    </div>
                                                    <div class="col">
                                                        <label>Dokter:</label>
                                                        <p id="dokterDetail">Dr. </p>
                                                    </div>
                                                    <div class="col">
                                                        <label>Keluhan:</label>
                                                        <p id="keluhanDetail"></p>
                                                    </div>
                                                    <div class="col" id="nomorAntrianCol">
                                                        <label>Nomor Antrian:</label>
                                                        <div class="card bg-info card-antrian">
                                                            <div class="card-body">
                                                                <h3 id="noAntrianDetail"></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of table -->
                            <!-- Add more content as needed -->

                        </div>
                        <!-- /.row -->
                    </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer> <!-- akhir footer -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <script src="../../app/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../app/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../app/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../../app/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../../app/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../app/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../app/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../app/plugins/moment/moment.min.js"></script>
    <script src="../../app/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../app/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../../app/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../app/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../app/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../app/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../app/dist/js/pages/dashboard.js"></script>
    <!-- SweetAlert2 -->
    <script src="../../app/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- ./wrapper -->
    <script>
    function load_jadwal() {
        // var id_poli = $("select[name='id_poli']").val();
        // var jadwal_dropdown = $("select[name='id_jadwal']");
        var id_poli = document.getElementsByName("id_poli")[0].value;
        var jadwal_dropdown = document.getElementsByName("id_jadwal")[0];

        // jadwal_dropdown.html = "<option value='' disabled selected>--Pilih Jadwal--</option>";
        jadwal_dropdown.innerHTML = "<option value='' disabled selected>--Pilih Jadwal--</option>";


        $.ajax({
            type: 'POST',
            url: '../../conf/pasien_ambil_jadwal_periksa.php', // Create a separate PHP file to handle this request
            data: {
                id_poli: id_poli
            },
            dataType: 'json',
            success: function(data) {
                // Populate the dropdown with retrieved data
                $.each(data, function(index, row) {
                    // jadwal_dropdown.append("<option value='" + row.id + "'>" + row.nama + " - " + row.hari + " (" + row.jam_mulai + " - " + row.jam_selesai + ")" + "</option>");
                    jadwal_dropdown.innerHTML += "<option value='" + row.id + "'>" + row.nama +
                        " - " + row.hari + " (" + row.jam_mulai + " - " + row.jam_selesai + ")" +
                        "</option>";

                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    </script>

    <script>
    $(document).ready(function() {
        <?php
        if (isset($_SESSION['success'])) {
        ?>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '<?php echo $_SESSION['success'];?>',
            showCancelButton: false,
            confirmButtonText: 'OK'
        });
        <?php
            unset($_SESSION['success']);
        }

        if (isset($_SESSION['error'])) {
        ?>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo $_SESSION['error'];?>',
            showCancelButton: false,
            confirmButtonText: 'OK'
        });
        <?php
            unset($_SESSION['error']);
        }
        ?>

        // modal detail periksa
        $(".btn-detail").on("click", function() {
            // Get the data from the clicked row
            console.log("tombol detail diklik");
            var namaPasien = $(this).data("nama");
            var noAntrian = $(this).data("no-antrian");
            var poli = $(this).data("poli");
            var dokter = $(this).data("dokter");
            var jamMulai = $(this).data("jam-mulai");
            var jamSelesai = $(this).data("jam-selesai");
            var status = $(this).data("status");

            // Set the data in the modal
            $("#statusDetail").text(status);
            $("#namaPasienDetail").text("Nama Pasien: " + namaPasien);
            $("#poliDetail").text("Poli: " + poli);
            $("#jadwalDetail").text("Jadwal: " + jamMulai + " - " + jamSelesai);
            $("#dokterDetail").text("Dokter: " + dokter);
            $("#noAntrianDetail").text(noAntrian);

            // Show the modal
            $("#detailModal").modal("show");
        });


        function setCardWidth() {
            var nomorAntrian = document.getElementById('noAntrianDetail').innerHTML;
            var nomorAntrianCol = document.getElementById('nomorAntrianCol');

            nomorAntrianCol.style.width = nomorAntrian.length * 20 + 'px';
        }

        $('#detailModal').on('shown.bs.modal', function() {
            setCardWidth();
        });



    });
    </script>

</body>

</html>
