<?php
include('koneksi.php');

// Mendapatkan ID obat dari parameter URL
$id_obat = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses update data obat
    $nama_obat = $_POST['nama_obat'];
    $kemasan = $_POST['kemasan'];
    $harga = $_POST['harga'];

    $update_query = $koneksi->query("UPDATE obat SET nama_obat='$nama_obat', kemasan='$kemasan', harga='$harga' WHERE id=$id_obat");

    if ($update_query) {
        // Redirect ke halaman data obat setelah update
        header("Location:../admin_dashboard_obat.php");
        exit;
    } else {
        // Handle kesalahan update
        echo "Error updating obat: " . $koneksi->error;
    }
}
?>