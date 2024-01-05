<?php
include('koneksi.php');

$nama_obat = $_POST['nama_obat'];
$kemasan = $_POST['kemasan'];
$harga = $_POST['harga'];

$query = mysqli_query($koneksi,"INSERT INTO obat (nama_obat, kemasan, harga) VALUES ('$nama_obat','$kemasan','$harga')");

if($query){
    header('Location:../admin_dashboard_obat.php?sukses=1');
} else{
    header('Location:../admin_dashboard_obat.php?error=1');

}

mysqli_close($koneksi);

?>