<?php 
session_start();

include('koneksi.php');

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $id_dokter = $_SESSION['id_dokter'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    $query ="INSERT INTO jadwal_periksa (id_dokter, hari, jam_mulai, jam_selesai) VALUES ('$id_dokter','$hari','$jam_mulai','$jam_selesai')";

    if($koneksi->query($query)=== TRUE){
        echo "DATA Jadwal berhasil di ditambah";
        header("location: ../dokter_dashboard_jadwal.php");
    } else{
        echo "Error : " . $query . "<br>" . $koneksi->error;
    }
}else{
    echo "Request gagal!";
}
$koneksi->close();
?>