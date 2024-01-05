<?php 
include('koneksi.php');

if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['id'])){
    $id_jadwal = $_POST['id'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    $query ="UPDATE jadwal_periksa SET hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai' WHERE id = '$id_jadwal'";

    if($koneksi->query($query)=== TRUE){
        echo "DATA Jadwal berhasil di update";
        header("location: ../dokter_dashboard_jadwal.php");
    } else{
        echo "Error : " . $query . "<br>" . $koneksi->error;
    }
}else{
    echo "Request gagal!";
}
$koneksi->close();
?>